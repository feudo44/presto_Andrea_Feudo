<footer class="bg-dark text-white py-4 mt-5">
    <div class="container">
        <div class="row align-items-center text-center text-md-start">
            <div class="col-12 col-md-4 mb-2 mb-md-0">
                @auth
                    @if (!Auth::user()->is_revisor)
                        <a href="{{ route('become.revisor') }}" class="btn btn-outline-light">Lavora con noi</a>
                    @endif
                @endauth
            </div>
            <div class="col-12 col-md-4 text-center">
                <p class="mb-0">© Presto.it - Il portale degli annunci</p>
            </div>
            <div class="col-12 col-md-4"></div>
        </div>
    </div>
</footer>