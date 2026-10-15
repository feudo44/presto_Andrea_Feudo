<x-layout>
    <div class="container-fluid text-center">
        <div class="row justify-content-center align-items-center py-5">
            @if (session()->has('errorMessage'))
                <div class="alert alert-danger text-center shadow rounded w-50 mx-auto mt-3">
                    {{ session('errorMessage') }}
                </div>
            @endif
            <div class="col-12">
                <h1 class="display-1">Presto.it</h1>
                <div class="my-3">
                    @auth
                        <a class="btn btn-dark" href="{{ route('create.article') }}">Pubblica un articolo</a>
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
                    <h3 class="text-center">Non sono ancora stati creati articoli</h3>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>