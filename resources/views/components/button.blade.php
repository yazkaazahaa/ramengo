@props([
    'variant'=>'primary'
])

@php

$colors=[

'primary'=>'bg-orange-500 hover:bg-orange-600 text-white',

'secondary'=>'bg-gray-200 hover:bg-gray-300 text-black',

'danger'=>'bg-red-500 hover:bg-red-600 text-white'

];

@endphp

<button
{{$attributes->merge([

'class'=>'px-4 py-2 rounded-xl font-semibold transition '.$colors[$variant]

])}}

>

{{$slot}}

</button>