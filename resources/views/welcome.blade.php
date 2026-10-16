<x-layout>
    <div class="container-fluid text-center">
        <div class="row justify-content-center align-items-center py-5">
            <div class="col-12">
                <h1 class="display-1">Presto.it</h1>
                <div class="my-3">
                    @auth
                        <a class="btn btn-dark" href="{{ route('create.article') }}">{{ __('ui.publish') }}</a>
                    @endauth
                </div>
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
    </div>
</x-layout>