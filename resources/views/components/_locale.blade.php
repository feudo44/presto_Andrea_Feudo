@props(['lang', 'nation'])

<form action="{{ route('setLocale', $lang) }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn border-0 p-1">
        <x-dynamic-component :component="'flag-country-' . $nation" width="28" height="20" />
    </button>
</form>