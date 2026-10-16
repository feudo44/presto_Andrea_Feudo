<x-layout>
    <div class="container-fluid">
        <div class="row height-custom justify-content-center align-items-start py-5 g-4">
            <div class="col-12">
                <h1 class="display-1">{{ __('ui.all_articles') }}</h1>
            </div>
        </div>
        <div class="row height-custom justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-12 col-md-4">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="text-center">{{ __('ui.no_articles') }}</h3>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center">
            <div>{{ $articles->links() }}</div>
        </div>
    </div>
</x-layout>