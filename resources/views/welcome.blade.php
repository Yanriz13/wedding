<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Yanuar & Elsa Wedding</title>

    @vite(['resources/css/app.css'])

    {{-- FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
/* OPENING SCREEN */
#openingScreen{
    position:fixed;
    inset:0;
    z-index:9999;
    background:#020617;
    display:flex;
    align-items:center;
    justify-content:center;
    overflow:hidden;
    transition:1.5s;
}

/* CURTAIN */
.curtain-left,
.curtain-right{
    position:absolute;
    top:0;
    width:50%;
    height:100%;
    background:linear-gradient(
        to bottom,
        #1e293b,
        #020617
    );
    z-index:2;
    transition:1.8s ease-in-out;
}

.curtain-left{
    left:0;
    border-right:1px solid rgba(255,255,255,.08);
}

.curtain-right{
    right:0;
    border-left:1px solid rgba(255,255,255,.08);
}

/* OPEN STATE */
#openingScreen.open .curtain-left{
    transform:translateX(-100%);
}

#openingScreen.open .curtain-right{
    transform:translateX(100%);
}

#openingScreen.open{
    opacity:0;
    visibility:hidden;
}

/* CENTER CONTENT */
.opening-content{
    position:relative;
    z-index:3;
    text-align:center;
    padding:20px;
    width:100%;
    max-width:340px;
}

/* PARTICLES */
.particle{
    position:absolute;
    width:6px;
    height:6px;
    border-radius:999px;
    background:rgba(245,212,135,.6);
    animation:floatParticle linear infinite;
}

@keyframes floatParticle{

    0%{
        transform:translateY(100vh) scale(0);
        opacity:0;
    }

    10%{
        opacity:1;
    }

    100%{
        transform:translateY(-120vh) scale(1);
        opacity:0;
    }

}

/* BODY LOCK */
body.locked{
    overflow:hidden;
}

/* MAIN CONTENT */
#mainContent{
    opacity:0;
    transform:translateY(30px);
    transition:1.2s;
}

#mainContent.show{
    opacity:1;
    transform:translateY(0);
}

/* GLOW EFFECT */
.opening-glow{
    position:absolute;
    width:300px;
    height:300px;
    background:#f5d487;
    filter:blur(120px);
    opacity:.12;
    border-radius:999px;
}

/* BUTTON */
.open-btn{
    background:#f5d487;
    color:#0f172a;
    transition:.4s;
}

.open-btn:hover{
    transform:scale(1.05);
}
        html{
            scroll-behavior:smooth;
        }

        body{
            background:#0f172a;
            color:white;
            font-family:'Inter',sans-serif;
            overflow-x:hidden;
        }

        .title{
            font-family:'Cormorant Garamond',serif;
        }

        .card{
            background:rgba(255,255,255,.05);
            backdrop-filter:blur(14px);
            border:1px solid rgba(255,255,255,.08);
        }

        .hero-bg{
            background:
            linear-gradient(
                to bottom,
                rgba(15,23,42,.65),
                rgba(15,23,42,.96)
            ),
            url("{{ asset('foto/pantai.jpeg') }}");

            background-size:cover;
            background-position:center;
        }

        .gold{
            color:#f5d487;
        }

        .btn-gold{
            background:#f5d487;
            color:#0f172a;
        }

        .section-space{
            padding-top:90px;
            padding-bottom:90px;
        }

        .music-spin{
            animation:spin 8s linear infinite;
        }

        @keyframes spin{
            from{
                transform:rotate(0deg);
            }
            to{
                transform:rotate(360deg);
            }
        }

    </style>

</head>
{{-- OPENING SCREEN --}}
<div id="openingScreen">

    {{-- GLOW --}}
    <div class="opening-glow"></div>

    {{-- CURTAIN --}}
    <div class="curtain-left"></div>
    <div class="curtain-right"></div>

    {{-- PARTICLES --}}
    @for($i = 0; $i < 30; $i++)

        <div
            class="particle"
            style="
                left: {{ rand(0,100) }}%;
                animation-duration: {{ rand(8,20) }}s;
                animation-delay: {{ rand(0,10) }}s;
            ">
        </div>

    @endfor

    {{-- CONTENT --}}
    <div class="opening-content">

        <p class="uppercase tracking-[6px] text-xs text-slate-400 mb-6">
            Wedding Invitation
        </p>

        <h1 class="title text-6xl leading-none mb-6">

            Yanuar
            <span class="gold">&</span>
            Elsa

        </h1>

        <p class="text-slate-300 text-sm leading-7 mb-10">

            Kepada Yth. <br>

            <span class="gold text-lg font-medium">
                {{ $guest ? urldecode($guest) : 'Tamu Undangan' }}
            </span>

        </p>

        <button
            id="openInvitation"
             class="inline-flex items-center gap-3 px-8 py-4 rounded-full btn-gold font-medium shadow-xl hover:scale-105 duration-300">

            ✨ Buka Undangan

        </button>

    </div>

</div>
<body class="locked">
<div id="mainContent">
    {{-- HERO --}}
    <section class="min-h-screen hero-bg flex items-center justify-center px-6 relative">

        <div class="max-w-md mx-auto text-center relative z-10">

            <p
                data-aos="fade-down"
                class="uppercase tracking-[4px] text-xs text-slate-300 mb-5">

                Wedding Invitation

            </p>

            <h1
                data-aos="zoom-in"
                class="title text-6xl leading-none font-semibold mb-6">

                Yanuar
                <span class="gold">&</span>
                Elsa

            </h1>

            <p
                data-aos="fade-up"
                class="text-slate-300 text-sm leading-7 mb-10">

                Minggu, 20 Desember 2026

            </p>

            @if($guest)

                <div
                    data-aos="fade-up"
                    class="card rounded-[28px] p-5 mb-8">

                    <p class="text-slate-400 text-sm mb-2">
                        Kepada Yth.
                    </p>

                    <h2 class="text-xl font-medium gold">
                        {{ urldecode($guest) }}
                    </h2>

                </div>

            @endif

            <a href="#opening"
                class="inline-flex items-center gap-3 px-8 py-4 rounded-full btn-gold font-medium shadow-xl hover:scale-105 duration-300">

                Scroll Undangan

            </a>

        </div>

    </section>

    {{-- OPENING --}}
    <section id="opening" class="section-space px-6">

        <div
            data-aos="fade-up"
            class="max-w-md mx-auto text-center">

            <h2 class="title text-5xl mb-6">
                Assalamu’alaikum
            </h2>

            <p class="text-slate-300 leading-8 text-sm">

                Dengan memohon rahmat dan ridho Allah SWT,
                kami mengundang Bapak/Ibu/Saudara/i
                untuk hadir dalam acara pernikahan kami.

            </p>

        </div>

    </section>

    {{-- COUPLE --}}
    <section class="px-6">

        <div class="max-w-md mx-auto space-y-6">

            {{-- PRIA --}}
            <div
                data-aos="fade-right"
                class="card rounded-[32px] p-8 text-center">

                <img
                    src="{{ asset('foto/nuang.jpeg') }}"
                    class="w-32 h-32 rounded-full object-cover mx-auto mb-6 border-4 border-[#f5d487]/20">

                <h3 class="title text-4xl gold">
                    Yanuar Rizki
                </h3>

                <p class="text-slate-400 text-sm mt-3">
                    Putra Terakhir
                </p>

            </div>

            {{-- WANITA --}}
            <div
                data-aos="fade-left"
                class="card rounded-[32px] p-8 text-center">

                <img
                   src="{{ asset('foto/ela.jpeg') }}"
                    class="w-32 h-32 rounded-full object-cover mx-auto mb-6 border-4 border-[#f5d487]/20">

                <h3 class="title text-4xl gold">
                    Elsa Novitasari
                </h3>

                <p class="text-slate-400 text-sm mt-3">
                    Putri Terakhir
                </p>

            </div>

        </div>

    </section>

    {{-- COUNTDOWN --}}
    <section class="section-space px-6">

        <div
            data-aos="zoom-in"
            class="max-w-md mx-auto card rounded-[32px] p-8">

            <h2 class="title text-5xl text-center mb-10">
                Save The Date
            </h2>

            <div class="grid grid-cols-4 gap-3 text-center">

                <div class="bg-white/5 rounded-2xl py-5">
                    <h3 id="days" class="text-2xl font-semibold gold">0</h3>
                    <p class="text-[11px] text-slate-400 mt-1">Hari</p>
                </div>

                <div class="bg-white/5 rounded-2xl py-5">
                    <h3 id="hours" class="text-2xl font-semibold gold">0</h3>
                    <p class="text-[11px] text-slate-400 mt-1">Jam</p>
                </div>

                <div class="bg-white/5 rounded-2xl py-5">
                    <h3 id="minutes" class="text-2xl font-semibold gold">0</h3>
                    <p class="text-[11px] text-slate-400 mt-1">Menit</p>
                </div>

                <div class="bg-white/5 rounded-2xl py-5">
                    <h3 id="seconds" class="text-2xl font-semibold gold">0</h3>
                    <p class="text-[11px] text-slate-400 mt-1">Detik</p>
                </div>

            </div>

        </div>

    </section>

    {{-- EVENT --}}
    <section class="px-6">

        <div class="max-w-md mx-auto space-y-5">

            <div
                data-aos="fade-up"
                class="card rounded-[32px] p-7">

                <div class="flex items-start gap-5">

                    <div class="w-14 h-14 rounded-2xl bg-[#f5d487] text-slate-900 flex items-center justify-center text-2xl">
                        💍
                    </div>

                    <div>

                        <h3 class="title text-3xl gold mb-2">
                            Akad Nikah
                        </h3>

                        <p class="text-slate-300 text-sm leading-7">
                            Minggu, 20 Desember 2026 <br>
                            08:00 WIB
                        </p>

                    </div>

                </div>

            </div>

            <div
                data-aos="fade-up"
                class="card rounded-[32px] p-7">

                <div class="flex items-start gap-5">

                    <div class="w-14 h-14 rounded-2xl bg-[#f5d487] text-slate-900 flex items-center justify-center text-2xl">
                        🎉
                    </div>

                    <div>

                        <h3 class="title text-3xl gold mb-2">
                            Resepsi
                        </h3>

                        <p class="text-slate-300 text-sm leading-7">
                            Minggu, 20 Desember 2026 <br>
                            11:00 WIB
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- LOCATION --}}
    <section class="section-space px-6">

        <div
            data-aos="fade-up"
            class="max-w-md mx-auto card rounded-[32px] overflow-hidden">

            <iframe
                src="https://maps.google.com/maps?q=jakarta&t=&z=13&ie=UTF8&iwloc=&output=embed"
                class="w-full h-64">
            </iframe>

            <div class="p-8 text-center">

                <h2 class="title text-4xl gold mb-4">
                    Lokasi Acara
                </h2>

                <p class="text-slate-300 text-sm leading-7 mb-8">
                    Gedung Pernikahan Bahagia <br>
                    Jakarta Selatan
                </p>

                <a href="https://maps.google.com"
                    target="_blank"
                    class="inline-flex items-center gap-2 px-6 py-4 rounded-full btn-gold font-medium">

                    📍 Buka Maps

                </a>

            </div>

        </div>

    </section>

    {{-- GALLERY --}}
    <section class="px-6">

        <div class="max-w-md mx-auto">

            <h2
                data-aos="fade-up"
                class="title text-5xl text-center mb-10">

                Gallery

            </h2>

            <div class="grid grid-cols-2 gap-4">

                <img
                    data-aos="zoom-in"
                    src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=1000"
                    class="rounded-[24px] h-48 object-cover w-full">

                <img
                    data-aos="zoom-in"
                    src="https://images.unsplash.com/photo-1520854221256-17451cc331bf?q=80&w=1000"
                    class="rounded-[24px] h-48 object-cover w-full">

                <img
                    data-aos="zoom-in"
                    src="https://images.unsplash.com/photo-1522673607200-164d1b6ce486?q=80&w=1000"
                    class="rounded-[24px] h-48 object-cover w-full">

                <img
                    data-aos="zoom-in"
                    src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?q=80&w=1000"
                    class="rounded-[24px] h-48 object-cover w-full">

            </div>

        </div>

    </section>

    {{-- RSVP --}}
    <section class="section-space px-6 pb-32">

        <div
            data-aos="fade-up"
            class="max-w-md mx-auto card rounded-[32px] p-8">

            <h2 class="title text-5xl text-center mb-10">
                RSVP
            </h2>

            <form class="space-y-4">

                <input
                    type="text"
                    placeholder="Nama"
                    class="w-full rounded-2xl bg-white/5 border border-white/10 px-5 py-4 outline-none">

                <select
                    class="w-full rounded-2xl bg-white/5 border border-white/10 px-5 py-4 outline-none">

                    <option>Konfirmasi Kehadiran</option>
                    <option>Hadir</option>
                    <option>Tidak Hadir</option>

                </select>

                <textarea
                    rows="4"
                    placeholder="Ucapan & Doa"
                    class="w-full rounded-2xl bg-white/5 border border-white/10 px-5 py-4 outline-none"></textarea>

                <button
                    class="w-full py-4 rounded-2xl btn-gold font-semibold">

                    Kirim RSVP

                </button>

            </form>

        </div>

    </section>
</div>
    {{-- MUSIC --}}
    <button
        id="musicToggle"
        class="fixed bottom-6 right-6 z-50 w-14 h-14 rounded-full bg-[#f5d487] text-slate-900 shadow-2xl flex items-center justify-center">

        <div class="music-spin">
            🎵
        </div>

    </button>

  <audio id="music" loop>
    <source src="{{ asset('musik/videoplayback (2).m4a') }}" type="audio/mp4">
</audio>

    {{-- SCRIPT --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>

        AOS.init({
            once:true,
            duration:1000
        });

        const targetDate = new Date("Dec 20, 2026 10:00:00").getTime();
const openingScreen = document.getElementById('openingScreen');
    const openInvitation = document.getElementById('openInvitation');
    const mainContent = document.getElementById('mainContent');
    const body = document.body;

    openInvitation.addEventListener('click', () => {

        openingScreen.classList.add('open');

        body.classList.remove('locked');

        mainContent.classList.add('show');

        /* AUTO MUSIC */
        music.play();

    });

        setInterval(() => {

            const now = new Date().getTime();

            const distance = targetDate - now;

            document.getElementById("days").innerHTML =
                Math.floor(distance / (1000 * 60 * 60 * 24));

            document.getElementById("hours").innerHTML =
                Math.floor((distance % (1000 * 60 * 60 * 24))
                / (1000 * 60 * 60));

            document.getElementById("minutes").innerHTML =
                Math.floor((distance % (1000 * 60 * 60))
                / (1000 * 60));

            document.getElementById("seconds").innerHTML =
                Math.floor((distance % (1000 * 60))
                / 1000);

        },1000);

        const music = document.getElementById('music');
        const musicToggle = document.getElementById('musicToggle');

        let isPlaying = false;

        musicToggle.addEventListener('click', () => {

            if(isPlaying){
                music.pause();
            }else{
                music.play();
            }

            isPlaying = !isPlaying;

        });

    </script>

</body>
</html>