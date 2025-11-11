<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            
            {{-- Bloco do logo removido daqui --}}

            <div class="relative z-10 w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
        </div>

        {{-- 💥 Canvas dos fogos de artifício --}}
    <canvas id="fireworks"></canvas>

    <script>
        const canvas = document.getElementById("fireworks");
        const ctx = canvas.getContext("2d");
        let w = window.innerWidth, h = window.innerHeight;
        canvas.width = w;
        canvas.height = h;

        // 🔹 Configuração para explosões brilhantes sobre qualquer cor
        ctx.globalCompositeOperation = "lighter";

        const fireworks = [];
        const particles = [];

        function random(min, max) {
            return Math.random() * (max - min) + min;
        }

        class Firework {
            constructor() {
                this.x = random(w * 0.2, w * 0.8);
                this.y = h;
                this.targetY = random(h * 0.2, h * 0.6);
                this.color = `hsl(${random(0, 360)}, 100%, 60%)`;
                this.speed = random(5, 7);
            }

            update() {
                this.y -= this.speed;
                if (this.y <= this.targetY) {
                    for (let i = 0; i < 80; i++) {
                        particles.push(new Particle(this.x, this.y, this.color));
                    }
                    fireworks.splice(fireworks.indexOf(this), 1);
                }
            }

            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, 2, 0, Math.PI * 2);
                ctx.fillStyle = this.color;
                ctx.fill();
            }
        }

        class Particle {
            constructor(x, y, color) {
                this.x = x;
                this.y = y;
                this.color = color;
                this.radius = 2.5;
                this.alpha = 1;
                this.speedX = random(-4, 4);
                this.speedY = random(-4, 4);
                this.gravity = 0.05;
            }

            update() {
                this.x += this.speedX;
                this.y += this.speedY + this.gravity;
                this.alpha -= 0.015;
            }

            draw() {
                ctx.globalAlpha = this.alpha;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                ctx.fillStyle = this.color;
                ctx.fill();
                ctx.globalAlpha = 1;
            }
        }

        function animate() {
            ctx.clearRect(0, 0, w, h);
            if (Math.random() < 0.05) fireworks.push(new Firework());
            fireworks.forEach(fw => { fw.update(); fw.draw(); });
            particles.forEach((p, i) => {
                p.update();
                p.draw();
                if (p.alpha <= 0) particles.splice(i, 1);
            });
            requestAnimationFrame(animate);
        }

        animate();

        window.addEventListener("resize", () => {
            w = window.innerWidth;
            h = window.innerHeight;
            canvas.width = w;
            canvas.height = h;
        });

        // 🔹 Canvas fixo e transparente no topo do layout
        canvas.style.position = "fixed";
        canvas.style.top = "0";
        canvas.style.left = "0";
        canvas.style.width = "100%";
        canvas.style.height = "100%";
        canvas.style.zIndex = "0";
        canvas.style.pointerEvents = "none";
        canvas.style.background = "transparent";
    </script>

    </body>
</html>
