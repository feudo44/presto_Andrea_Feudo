<x-layout>
    <div class="container my-5">
        <h1 class="display-5 mb-4">{{ __('ui.results_for') }} "{{ $query }}"</h1>

        <div class="row">
            @forelse ($articles as $article)
                <div class="col-12 col-md-4 mb-4 d-flex justify-content-center">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <p class="lead">{{ __('ui.no_results') }}</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    </div>
</x-layout>