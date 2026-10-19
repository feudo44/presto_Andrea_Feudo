<x-layout>
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-12">
                <div class="rounded shadow bg-body-secondary">
                    <h1 class="display-5 text-center pb-2">{{ __('ui.revisor_dashboard') }}</h1>
                </div>
            </div>
        </div>

        @if ($article_to_check)
            <div class="row justify-content-center pt-5">
                <div class="col-md-8">
                    <div class="row justify-content-center">
                        @forelse ($article_to_check->images as $image)
                            <div class="col-12 col-md-6 mb-4">
                                <div class="text-center">
                                    <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid rounded shadow"
                                        alt="{{ $article_to_check->title }}">
                                </div>

                                <div class="mt-3 small">
                                    @if ($image->adult)
                                        <p class="fw-bold mb-1">{{ __('ui.ratings') }}</p>
                                        <div class="mb-3">
                                            @foreach (['adult', 'violence', 'spoof', 'medical', 'racy'] as $field)
                                                <div class="d-flex align-items-center mb-1">
                                                    <i class="{{ $image->$field }} me-2"></i>
                                                    <span>{{ __('ui.' . $field) }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="fst-italic text-muted">{{ __('ui.analysis_pending') }}</p>
                                    @endif

                                    <p class="fw-bold mb-1">{{ __('ui.labels') }}</p>
                                    @if ($image->labels)
                                        <div class="d-flex flex-wrap gap-1">
                                            @foreach ($image->labels as $label)
                                                <span class="badge text-bg-secondary">{{ $label }}</span>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="fst-italic text-muted mb-0">{{ __('ui.no_labels') }}</p>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <p class="fst-italic text-muted">{{ __('ui.no_images') }}</p>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                    <div>
                        <h1>{{ $article_to_check->title }}</h1>
                        <h3>{{ __('ui.author') }}: {{ $article_to_check->user?->name }}</h3>
                        <h4>{{ $article_to_check->price }} €</h4>
                        <h4 class="fst-italic text-muted">#{{ $article_to_check->category?->name }}</h4>
                        <p class="h6">{{ $article_to_check->description }}</p>
                    </div>
                    <div class="d-flex pb-4 justify-content-around">
                        <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger py-2 px-5 fw-bold">{{ __('ui.reject') }}</button>
                        </form>
                        <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success py-2 px-5 fw-bold">{{ __('ui.accept') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center align-items-center height-custom text-center">
                <div class="col-12">
                    <h1 class="fst-italic display-4">{{ __('ui.no_articles_to_review') }}</h1>
                    <a href="{{ route('homepage') }}" class="mt-5 btn btn-success">{{ __('ui.back_home') }}</a>
                </div>
            </div>
        @endif
    </div>
</x-layout>