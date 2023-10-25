<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.js"
        integrity="sha512-is1ls2rgwpFZyixqKFEExPHVUUL+pPkBEPw47s/6NDQ4n1m6T/ySeDW3p54jp45z2EJ0RSOgilqee1WhtelXfA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"
        integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            /* background-image: url('https://external-preview.redd.it/Tf2MC-orVRAI8OL5tjyF4k4H2Q6QLHTWllekGfqdt3c.png?width=960&crop=smart&auto=webp&s=be4ab9a2fa3ca2f7011799377f118a8dbc64aacb'); */
            background-size: cover;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        canvas {
            filter: blur(1px);
            position: absolute;
            z-index: -1;
        }
    </style>
</head>

<body>
    <canvas id="canvas"></canvas>
    <x-navbar />
    <div class="container mt-5">
        {{ $slot }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script>
        // Change Theme Mode
        themeMode = localStorage.getItem('theme');
        changeDOM(themeMode);

        function change() {
            var data = $('html').attr('data-bs-theme')
            localStorage.setItem('theme', data);
            changeDOM(data);
        }

        function changeDOM(data) {
            if (data == "dark") {
                $('html').attr('data-bs-theme', "light")
                $('#btn-theme').html(
                    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars-fill" viewBox="0 0 16 16"> <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/> <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/> </svg> Light'
                )
                fillStyle = 'rgba(20, 20, 20, 1)';
            } else {
                $('html').attr('data-bs-theme', "dark")
                $('#btn-theme').html(
                    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-high-fill" viewBox="0 0 16 16"> <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/> </svg> Dark'
                )
                fillStyle = 'rgba(30, 30, 30, 1)';

            }
        }
    </script>
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script>
        // Animation in Background
        animation();
        var fillStyle = 'rgba(30, 30, 30, 1)';

        function animation() {
            let c = init("canvas"),
                w = (canvas.width = window.innerWidth),
                h = (canvas.height = window.innerHeight);
            //initiation

            class firefly {
                constructor() {
                    this.x = Math.random() * w;
                    this.y = Math.random() * h;
                    this.s = Math.random() * 2;
                    this.ang = Math.random() * 2 * Math.PI;
                    this.v = this.s * this.s / 4;
                }
                move() {
                    this.x += this.v * Math.cos(this.ang);
                    this.y += this.v * Math.sin(this.ang);
                    this.ang += Math.random() * 20 * Math.PI / 180 - 10 * Math.PI / 180;
                }
                show() {
                    c.beginPath();
                    c.arc(this.x, this.y, this.s, 0, 2 * Math.PI);
                    c.fillStyle = "#fddba3";
                    c.fill();
                }
            }

            let f = [];

            function draw() {
                if (f.length < 100) {
                    for (let j = 0; j < 100; j++) {
                        f.push(new firefly());
                    }
                }
                //animation
                for (let i = 0; i < f.length; i++) {
                    f[i].move();
                    f[i].show();
                    if (f[i].x < 0 || f[i].x > w || f[i].y < 0 || f[i].y > h) {
                        f.splice(i, 1);
                    }
                }
            }

            let mouse = {};
            let last_mouse = {};

            canvas.addEventListener(
                "mousemove",
                function(e) {
                    last_mouse.x = mouse.x;
                    last_mouse.y = mouse.y;

                    mouse.x = e.pageX - this.offsetLeft;
                    mouse.y = e.pageY - this.offsetTop;
                },
                false
            );

            function init(elemid) {
                let canvas = document.getElementById(elemid),
                    c = canvas.getContext("2d"),
                    w = (canvas.width = window.innerWidth),
                    h = (canvas.height = window.innerHeight);
                c.fillStyle = "rgba(30,30,30,1)";
                c.fillRect(0, 0, w, h);
                return c;
            }

            window.requestAnimFrame = (function() {
                return (
                    window.requestAnimationFrame ||
                    window.webkitRequestAnimationFrame ||
                    window.mozRequestAnimationFrame ||
                    window.oRequestAnimationFrame ||
                    window.msRequestAnimationFrame ||
                    function(callback) {
                        window.setTimeout(callback);
                    }
                );
            });

            function loop() {
                window.requestAnimFrame(loop);
                c.clearRect(0, 0, w, h);
                draw();
            }

            window.addEventListener("resize", function() {
                (w = canvas.width = window.innerWidth),
                (h = canvas.height = window.innerHeight);
                loop();
            });

            loop();
            setInterval(loop, 1000 / 80);
        }
    </script>
    @stack('js')
</body>

</html>
