<div class="card mx-auto card-w shadow text-center mb-3">
    @if ($article->images->isNotEmpty())
        <img src="{{ $article->images->first()->getUrl(300, 300) }}" class="card-img-top card-img-fixed"
            alt="{{ $article->title }}">
    @else
        <div
            class="card-img-top card-img-fixed bg-body-secondary d-flex align-items-center justify-content-center text-muted">
            {{ __('ui.no_images') }}
        </div>
    @endif
    <div class="card-body">
        <h4 class="card-title">{{ $article->title }}</h4>
        <h6 class="card-subtitle text-body-secondary">{{ $article->price }} €</h6>
        <div class="d-flex justify-content-evenly align-items-center mt-5">
            <a href="{{ route('article.show', compact('article')) }}" class="btn btn-primary">{{ __('ui.details') }}</a>
            @if ($article->category)
                <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                    class="btn btn-outline-info">{{ $article->category->translated_name }}</a>
            @endif
        </div>
    </div>
</div>