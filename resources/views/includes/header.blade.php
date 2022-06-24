<section>
    @if (Route::currentRouteName() == 'order.main')
        <div class="hero bg-base-200 h-screen sm:w-screen md:w-[60rem]">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-8xl">Bestel Online</h1>
                    <p class="py-6">Een categorie kun je bekijken door op de categorienaam
                        te klikken.</p>
                </div>
            </div>
        </div>
    @else
</section>
@endif
