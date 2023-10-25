<div class="card mb-3" data-anijs="if: mouseover, do: rubberBand animated">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-text">{{ $desc }}</p>
        <a wire:navigate href={{ $link }} class="btn btn-sm btn-info">Coba Fitur</a>
    </div>
</div>
