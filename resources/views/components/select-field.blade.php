<div class="form-group">
    <label for="{{ $id }}">{{ $label }}</label>
    <select
        wire:model.live="{{ $model }}"
        class="form-control"
        id="{{ $id }}"
    >
        <option value="">{{ $placeholder }}</option>
        @foreach($options as $option)
            @if(is_object($option))
                <option value="{{ $option->id }}">
                    {{ isset($formatter) ? $formatter($option->name) : $option->name }}
                </option>
            @else
                <option value="{{ $option }}">
                    {{ isset($formatter) ? $formatter($option) : $option }}
                </option>
            @endif
        @endforeach
    </select>
</div>
