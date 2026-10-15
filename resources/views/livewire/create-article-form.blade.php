<div>
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form wire:submit="store" class="p-4 shadow rounded">
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" id="title" wire:model.blur="title" class="form-control @error('title') is-invalid @enderror">
            @error('title') <p class="text-danger small">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea id="description" wire:model.blur="description" rows="4" class="form-control @error('description') is-invalid @enderror"></textarea>
            @error('description') <p class="text-danger small">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" step="0.01" id="price" wire:model.blur="price" class="form-control @error('price') is-invalid @enderror">
            @error('price') <p class="text-danger small">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <select id="category" wire:model="category" class="form-select @error('category') is-invalid @enderror">
                <option value="">Seleziona una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category') <p class="text-danger small">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Crea annuncio</button>
    </form>
</div>