<section class="start2">
    <div class="mt-12 flex flex-col justify-around p-4 md:flex-row md:p-24">
        <div class="flex flex-col justify-center text-center md:w-2/4" id="aboutus">
            <h1 class="line2 text-9xl">Discover</h1>
            <h2 class="line2 mb-3 text-3xl text-slate-50 md:text-4xl">Eigenaars</h2>
            <i class="fas fa-asterisk fa-2xl line2"></i>
            <div class="divider line2"></div>
            <p class="line3 mb-4 text-slate-50">De eerste eigenaar van deze frituur is ermee begonnen in de jaren 50 in
                een
                mobiele
                frituur. Waarna het gebouw geplaatst werd en hierna zijn er nog een aantal andere eigenaars geweest.
                Heidi haar ouders hebben in 1989 de frituur overgenomen en toen heeft Heidi die samen uitgebaat met
                haar
                broer.</p>
            <p class="line3 mb-5"> Evenals het restaurant in 1993 heeft Heidi dan de zaak overgenomen en tot op het heden
                doet ze dit
                beroep nog altijd met hart en ziel.</p>
            <a href="#contactus"><button class="btn btn-primary bestel">Contacteer Ons</button></a>
        </div>
        <div class="mt-5 flex">
            <figure><img src="{{ asset('img/fast.jpg') }}" alt="fast"></figure>
        </div>
    </div>
</section>
<section class="start3">
    <div class="my-32 bg-cover bg-center" style="background-image: url('{{ asset('img/divider.jpeg') }}')">
        <div class="line3 flex flex-col justify-center bg-stone-900 bg-opacity-70 p-6 text-center xl:p-24">
            <div class="line6">
                <h1 class="text-9xl">Tasteful</h1>
                <h2 class="mb-3 text-3xl text-slate-50 md:text-4xl">Ruime Keuze</h2>
                <a href="{{ route('order.main') }}"><button class="btn btn-primary bestel">Ontdek Onze
                        Menu</button></a>
            </div>
        </div>
    </div>
</section>

{{-- GSAP --}}
<script>
    if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(window.navigator.userAgent)) {
        ScrollTrigger.create({
            trigger: 'start2',
            start: 'top top',
            endTrigger: 'start3',
            end: 'bottom top',
        });

        let tl2 = gsap.timeline({
            scrollTrigger: {
                trigger: '.start2',
                start: "top center",
                end: "bottom bottom",
                scrub: 3,
            }
        });
        tl2.from('.line2', 1, {
            opacity: 0,
            scale: 2,
            delay: 0,
        }).from('.line3', 1, {
            x: -200,
            opacity: 0,
        }).from('img', 1.5, {
            x: 200,
            opacity: 0,
        });

        let tl3 = gsap.timeline({
            scrollTrigger: {
                trigger: '.start3',
                start: "top center",
                end: "bottom bottom",
                scrub: 2.5,
            }
        });

        tl3.from('.start3', 1, {
            y: -200,
            opacity: 0,
            delay: 0,
        }).from('.line6', 1, {
            opacity: 0,
            scale: 2,
            delay: 0,
        });
    }

    TweenMax.to('.bestel', 1, {
        scale: 1.2,
        repeat: -1,
        ease: Back.easeOut,
        yoyo: true,
        yoyoEase: true
    });
</script>
