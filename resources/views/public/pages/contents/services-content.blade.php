<section>
    <div class="mt-12 flex flex-col justify-between p-6 md:flex-row">
        <div class="discover flex flex-col justify-center text-center md:w-2/4">
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
            <figure class="image"><img src="{{ asset('img/fast.jpg') }}" alt="fast"></figure>
        </div>
    </div>
    <div class="my-20 bg-cover bg-center" style="background-image: url('{{ asset('img/divider.jpeg') }}')">
        <div class="flex flex-col justify-center bg-stone-900 bg-opacity-70 p-6 text-center xl:p-24">
            <h1 class="text-9xl">Tasteful</h1>
            <h2 class="mb-3 text-3xl text-slate-50 md:text-4xl">Ruime Keuze</h2>
            <a href="{{ route('order.main') }}"><button class="btn btn-primary">Ontdek Onze Menu</button></a>
        </div>
    </div>
</section>


<script type="text/javascript">
    if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(window.navigator.userAgent)) {
        gsap.to(".discover", {
            scrollTrigger: {
                trigger: ".discover",
                start: "top bottom",
                end: "bottom top",
                scrub: 1
            },
            x: 50
        })

        gsap.to(".image", {
            scrollTrigger: {
                trigger: ".image",
                start: "top bottom",
                end: "bottom top",
                scrub: 1,
            },
            x: -50,

        })
    }
</script>
