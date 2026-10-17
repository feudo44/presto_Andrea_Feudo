<div>
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form wire:submit="store" class="p-4 shadow rounded">
        <div class="mb-3">
            <label for="title" class="form-label">{{ __('ui.title_label') }}</label>
            <input type="text" id="title" wire:model.blur="title"
                class="form-control @error('title') is-invalid @enderror">
            @error('title')
            <p class="text-danger small">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">{{ __('ui.description_label') }}</label>
            <textarea id="description" wire:model.blur="description" rows="4"
                class="form-control @error('description') is-invalid @enderror"></textarea>
            @error('description')
            <p class="text-danger small">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">{{ __('ui.price_label') }}</label>
            <input type="number" step="0.01" id="price" wire:model.blur="price"
                class="form-control @error('price') is-invalid @enderror">
            @error('price')
            <p class="text-danger small">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">{{ __('ui.category_label') }}</label>
            <select id="category" wire:model="category" class="form-select @error('category') is-invalid @enderror">
                <option value="">{{ __('ui.select_category') }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
            <p class="text-danger small">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">{{ __('ui.images_label') }}</label>
            <input type="file" id="images" wire:model="temporary_images" multiple accept="image/*"
                class="form-control @error('temporary_images.*') is-invalid @enderror">
            <div wire:loading wire:target="temporary_images" class="small text-muted mt-1">...</div>
            @error('temporary_images.*')
            <p class="text-danger small">{{ $message }}</p> @enderror
            @error('images.*')
            <p class="text-danger small">{{ $message }}</p> @enderror
        </div>

        @if (!empty($images))
            <div class="row mb-3">
                @foreach ($images as $key => $image)
                    <div class="col-6 col-md-4 text-center mb-3">
                        <img src="{{ $image->temporaryUrl() }}" class="img-fluid rounded shadow" alt="Anteprima">
                        <button type="button" class="btn btn-sm btn-danger mt-2"
                            wire:click="removeImage({{ $key }})">{{ __('ui.remove') }}</button>
                    </div>
                @endforeach
            </div>
        @endif

        <button type="submit" class="btn btn-primary">{{ __('ui.create_ad') }}</button>
    </form>
</div>