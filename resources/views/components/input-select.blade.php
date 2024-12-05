@props(['options' => [], 'value' => '', 'parent' => ''])

<select {{ $attributes->merge(['class' => '']) }}>
    {{ $slot }}
    @foreach($options as $option)
      <option value="{{ $option->id }}" {{ $value == $option->id ? 'selected' : ''}} data-parent="{{ $option->$parent }}">{{ $option->name }}</option>
    @endforeach
</select>