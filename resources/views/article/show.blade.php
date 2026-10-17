<x-layout>
    <div class="container">
        <div class="row height-custom justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-4">{{ __('ui.article_detail') }}: {{ $article->title }}</h1>
            </div>
        </div>
        <div class="row height-custom justify-content-center align-items-start py-5 g-4">
            <div class="col-12 col-md-6 mb-3">
                @if ($article->images->count())
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach ($article->images as $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ asset('storage/' . $image->path) }}" class="d-block w-100 rounded shadow"
                                        alt="{{ $article->title }}">
                                </div>
                            @endforeach
                        </div>
                        @if ($article->images->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">{{ __('ui.previous') }}</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">{{ __('ui.next') }}</span>
                            </button>
                        @endif
                    </div>
                @else
                    <div class="bg-body-secondary rounded shadow d-flex align-items-center justify-content-center text-muted"
                        style="height: 400px;">
                        {{ __('ui.no_images') }}
                    </div>
                @endif
            </div>
            <div class="col-12 col-md-6 mb-3 text-center">
                <h2 class="display-5"><span class="fw-bold">{{ __('ui.title_label') }}:</span> {{ $article->title }}
                </h2>
                <h4 class="fw-bold">{{ __('ui.price_label') }}: {{ $article->price }} €</h4>
                <h5>{{ __('ui.description_label') }}:</h5>
                <p>{{ $article->description }}</p>
            </div>
        </div>
    </div>
</x-layout>