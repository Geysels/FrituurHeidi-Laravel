@extends('public.layouts.default')
@section('content')
<section>
        <div class="flex min-h-screen justify-center bg-cover bg-center md:justify-start"
            style="background-image: url({{ asset('img/bestellen4.jpeg') }})">
            <div class="flex w-screen flex-col justify-center bg-stone-900 bg-opacity-95 p-6 text-center xl:p-20">
                <h1 class="mb-8 text-center text-8xl">Keuzestress?</h1>
                <a class="mb-4 text-center text-2xl">
                    We kennen het allemaal wel, we willen iets nieuws proberen bij de frituur maar er is zoveel keuze.
                    Via onderstaande knop bieden we u een willekeurige categorie aan om het iets makkelijker te maken!
                </a>
                <a class="mb-2 text-center text-2xl">
                    Eenmaal u denkt iets gevonden te hebben, kan u bij "Bestel Online" snel bestellen!
                </a>
	
	<button id = "button" onclick = "RandomCategory()" class="btn btn-ghost upper-case hidden text-xl md:flex mt-4" >
		Klik hier
	</button>
	
	<p id = "Randomcategory2" class="mt-4 text-3xl"></p>
	
	<script>
		var down = document.getElementById('Randomcategory2');
		
		var arr = ["Bicky", "Burgers", "Frieten", "Grote broodjes", "Hotdogs", "Koude broodjes", "Koude schotels", "Mitraillet", "Snacks", "Warme schotels"];
		
		function RandomCategory() {
			down.innerHTML =
				arr[Math.floor(Math.random() * arr.length)];
		}
	</script>        
        </div>
    </section>
@endsection