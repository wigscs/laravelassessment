@props(['label', 'name', 'preview' => null])

@php
    $defaults = [
        'type' => 'file',
        'id' => $name,
        'name' => $name,
        'value' => old($name)
    ];
@endphp

<x-forms.field :$label :$name>
    <div x-data="{ imgsrc: '{{ $preview ? asset($preview) : '' }}' }">
        <input {{ $attributes($defaults) }} accept="image/*" x-ref="myFile" @change="previewFile">
        <template x-if="imgsrc">
            <div class="mt-4">
                <img :src="imgsrc" height="100" width="100">
            </div>
        </template>
    </div>
</x-forms.field>

