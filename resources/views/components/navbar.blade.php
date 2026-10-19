<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ route('homepage') }}">Presto.it</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homepage') }}">{{ __('ui.home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('article.index') }}">{{ __('ui.all_articles') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('ui.categories') }}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item text-capitalize"
                                    href="{{ route('byCategory', ['category' => $category]) }}">{{ $category->translated_name }}</a>
                            </li>
                            @if (!$loop->last)
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            </ul>

            <form class="d-flex mx-lg-3 my-2 my-lg-0" role="search" action="{{ route('article.search') }}" method="GET">
                <input class="form-control me-2" type="search" name="searched"
                    placeholder="{{ __('ui.search_placeholder') }}" aria-label="{{ __('ui.search') }}">
                <button class="btn btn-outline-success" type="submit">{{ __('ui.search') }}</button>
            </form>

            <ul class="navbar-nav ms-auto align-items-lg-center">
                @auth
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item me-lg-2">
                            <a class="nav-link btn btn-outline-success btn-sm position-relative"
                                href="{{ route('revisor.index') }}">
                                {{ __('ui.revisor_zone') }}
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ \App\Models\Article::toBeRevisedCount() }}
                                </span>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create.article') }}">{{ __('ui.publish') }}</a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link">{{ __('ui.hello') }}, {{ Auth::user()->name }}</span>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">{{ __('ui.login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">{{ __('ui.register') }}</a>
                    </li>
                @endauth

                <li class="nav-item d-flex align-items-center mx-lg-2">
                    <x-_locale lang="it" nation="it" />
                    <x-_locale lang="uk" nation="ua" />
                    <x-_locale lang="es" nation="es" />
                </li>

                @auth
                    <li class="nav-item">
                        <form method="POST" action="/logout" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">{{ __('ui.logout') }}</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>