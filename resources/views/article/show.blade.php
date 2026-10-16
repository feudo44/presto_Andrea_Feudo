<x-layout>
    <div class="container">
        <div class="row height-custom justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-4">{{ __('ui.article_detail') }}: {{ $article->title }}</h1>
            </div>
        </div>
        <div class="row height-custom justify-content-center align-items-start py-5 g-4">
            <div class="col-12 col-md-6 mb-3">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/400" class="d-block w-100 rounded shadow" alt="{{ __('ui.placeholder') }} 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/400" class="d-block w-100 rounded shadow" alt="{{ __('ui.placeholder') }} 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/400" class="d-block w-100 rounded shadow" alt="{{ __('ui.placeholder') }} 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">{{ __('ui.previous') }}</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">{{ __('ui.next') }}</span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3 text-center">
                <h2 class="display-5"><span class="fw-bold">{{ __('ui.title_label') }}:</span> {{ $article->title }}</h2>
                <h4 class="fw-bold">{{ __('ui.price_label') }}: {{ $article->price }} €</h4>
                <h5>{{ __('ui.description_label') }}:</h5>
                <p>{{ $article->description }}</p>
            </div>
        </div>
    </div>
</x-layout>