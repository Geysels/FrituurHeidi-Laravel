<section class="start">
    <div class="flex min-h-screen justify-center bg-cover bg-center md:justify-start"
        style="background-image: url({{ asset('img/home3.jpeg') }});">
        <div class="flex flex-col justify-center bg-stone-900 bg-opacity-80 p-6 text-center xl:p-24">
            <div class="max-w-md">
                <h1 class="line1 text-9xl">Welcome</h1>
                <h2 class="line1 text-3xl text-slate-50 md:text-4xl">FRITUUR HEIDI</h2>
                <i class="fas fa-asterisk fa-2xl line1"></i>
                <div class="divider line1"></div>
            </div>
            <div class="line5 mt-4 max-w-md">
                <p class="text-slate-50">Zaakvoerster Heidi en team verwelkomen u in ons sfeervol eethuisje en
                    frituur. </p>
                <p class="mb-6 text-slate-50">
                    Sinds december 1989 kunt u bij ons terecht voor een lekker zakje of bakje frieten en nog
                    vele zelfgemaakte gerechten en broodjes.</p>
                <p class="mb-5">Online bestellingen plaatsen kan op ieder moment.</p>
                <a href="{{ route('order.main') }}"><button class="btn btn-primary bestel">Bestel
                        Online</button></a>
            </div>
        </div>
    </div>
</section>

{{-- GSAP --}}
<script>
    if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(window.navigator.userAgent)) {
        window.onload = function() {
            var tl = new TimelineMax();
            tl.from('.line1', 1, {
                opacity: 0,
                scale: 4,
                delay: 0,
            }).from('.line5', 1, {
                y: -200,
                opacity: 0,
            });
        }
    }
    TweenMax.to('.bestel', 1, {
        scale: 1.2,
        repeat: -1,
        ease: Back.easeOut,
        yoyo: true,
        yoyoEase: true
    });
</script>
