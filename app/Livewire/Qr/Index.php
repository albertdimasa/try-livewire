<?php

namespace App\Livewire\Qr;

use App\Models\Absen;
use DateTime;
use Illuminate\Http\Client\Request;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    #[On('AbsenCreated')]
    public function create()
    {
        // Get Data from Livewire Component
        $content = request()->getContent();
        $contentToJSON = json_decode($content, true);

        // Parsing the data
        $data = $contentToJSON['components'][0]['calls'][0]['params'][1]['data'];
        $array = explode('-', $data);

        // Change timestamp to date
        $dateTimeObj = new DateTime("Asia/Jakarta");
        $dateTimeObj->setTimestamp($array[0]/1000);
        $dateTime = $dateTimeObj->format('Y-m-d H:i:s');

        // Check the database
        $absen = Absen::
        // where('user_id', $array[1])
                        // ->whereDate('clock_in', now()->toDateString())
                        whereDate('clock_in', date('Y-m-d'))
                        ->first();
        if ($absen == null) {
            // Insert to database
            $absen = Absen::create([
                'clock_in' => $dateTime,
                'user_id' => $array[1]
            ]);
            add_task("Scan barcode absen pada: $dateTime", $absen->user_id);
            $this->dispatch('notify', 'success');
        } else {
            $this->dispatch('notify', 'fail');
        }

    }

    public function render()
    {
        $absen = Absen::latest()->get();
        return view('livewire.qr.index', ['absen' => $absen]);
    }
}
