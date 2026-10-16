<x-layout>
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-12 col-md-6">
                <h1 class="text-center mb-4">{{ __('ui.login') }}</h1>
                <form method="POST" action="/login">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('ui.email') }}</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                        @error('email')
                        <p class="text-danger small">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('ui.password') }}</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('ui.login') }}</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>