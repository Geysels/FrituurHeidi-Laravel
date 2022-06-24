<section class="start2">
    <div class="line2 mt-12 flex flex-col justify-between p-6 md:flex-row">
        <div class="flex flex-col justify-center text-center md:w-2/4">
            <h1 class="text-9xl">Discover</h1>
            <h2 class="mb-3 text-3xl text-slate-50 md:text-4xl">Eigenaars</h2>
            <i class="fas fa-asterisk fa-2xl"></i>
            <div class="divider"></div>
            <p class="text-slate-50">De eerste eigenaar van deze frituur is ermee begonnen in de jaren 50 in een
                mobiele
                frituur. Waarna het gebouw geplaatst werd en hierna zijn er nog een aantal andere eigenaars geweest.
                Heidi haar ouders hebben in 1989 de frituur overgenomen en toen heeft Heidi die samen uitgebaat met
                haar
                broer.</p>
            <p class="mb-5"> Evenals het restaurant in 1993 heeft Heidi dan de zaak overgenomen en tot op het heden
                doet ze dit
                beroep nog altijd met hart en ziel.</p>
            <a href="{{ route('order.main') }}"><button class="btn btn-primary">Contacteer Ons</button></a>
        </div>
        <div class="mt-5 flex">
            <figure><img src="{{ asset('img/fast.jpg') }}" alt="fast"></figure>
        </div>
    </div>
</section>
<section class="start3">
    <div class="my-20 bg-cover bg-center" style="background-image: url('{{ asset('img/divider.jpeg') }}')">
        <div class="line3 flex flex-col justify-center bg-stone-900 bg-opacity-70 p-6 text-center xl:p-24">
            <h1 class="text-9xl">Tasteful</h1>
            <h2 class="mb-3 text-3xl text-slate-50 md:text-4xl">Ruime Keuze</h2>
            <a href="{{ route('order.main') }}"><button class="btn btn-primary">Ontdek Onze Menu</button></a>
        </div>
    </div>
</section>

<script>
    ScrollTrigger.create({
        trigger: 'start2',
        start: 'top top',
        endTrigger: 'start3',
        end: 'bottom top',
        pin: '.pin-me'
    })
    let tl2 = gsap.timeline({
        scrollTrigger: {
            trigger: '.start2',
            start: "top center",
            end: "bottom bottom",
            scrub: 1,
            markers: true,
        }
    });
    tl2.from('.line2', 1, {
        opacity: 0,
        scale: 1.5,
        delay: 0,
    })
    let tl3 = gsap.timeline({
        scrollTrigger: {
            trigger: '.start3',
            start: "top center",
            end: "bottom bottom",
            scrub: 1,
            markers: true,
        }
    });
    tl3.from('.line3', 1, {
        opacity: 0,
        scale: 2,
        delay: 1,
    })
</script>
