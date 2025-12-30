<div>
    
    @if ($allOption)
        <label for="{{ $name }}_all" class="mb-1 flex items-center">
            <input type="radio" id="{{ $name }}_all" name="{{ $name }}" value=""
                @checked(!request($name) || ($value ?? '') === '') />
            <span class="ml-2">All</span>
        </label>
    @endif

    @foreach ($optionsWithLabels as $label => $option)
        <label for="{{ $name }}_{{ $option }}" class="mb-1 flex items-center">
            <input type="radio" id="{{ $name }}_{{ $option }}" name="{{ $name }}" value="{{ $option }}"
                @checked($option === ($value ?? request($name))) />
            <span class="ml-2">{{ $label }}</span>
        </label>
    @endforeach
</div>
