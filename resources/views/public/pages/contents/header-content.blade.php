<section>
    <div class="start flex min-h-screen justify-center bg-cover bg-center md:justify-start"
        style="background-image: url({{ asset('img/home3.jpeg') }});">
        <div class="flex flex-col justify-center bg-stone-900 bg-opacity-80 p-6 text-center xl:p-24">
            <div class="max-w-md">
                <h1 class="line1 text-9xl">Welcome</h1>
                <h2 class="text-3xl text-slate-50 md:text-4xl">FRITUUR HEIDI</h2>
                <i class="fas fa-asterisk fa-2xl"></i>
                <div class="divider"></div>
            </div>
            <div class="mt-6 max-w-md">
                <p class="text-slate-50">Zaakvoerster Heidi en team verwelkomen u in ons sfeervol eethuisje en
                    frituur. </p>
                <p class="mb-5 text-slate-50">
                    Sinds december 1989 kunt u bij ons terecht voor een lekker zakje of bakje frieten en nog
                    vele zelfgemaakte gerechten en broodjes.</p>
                <p class="mb-5">Online bestellingen plaatsen kan op ieder moment.</p>
                <a href="{{ route('order.main') }}"><button class="btn btn-primary">Bestel Online</button></a>
            </div>
        </div>
    </div>
</section>

{{-- GSAP --}}
<script>
    let tl = gsap.timeline({
        scrollTrigger: {
            trigger: '.start',
            start: "top center",
            end: "bottom bottom",
            scrub: 1,
        }
    });
    tl.from('.line1', 1, {
        opacity: 0,
        scale: 2,
        delay: 2,
    })
</script>
