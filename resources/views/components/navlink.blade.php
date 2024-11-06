@props(['active' => false])
<a {{$attributes}}
class="{{ $active ? 'lg:text-secondary bg-lime-600 text-white' : 'lg:text-white lg:hover:bg-transparent lg:hover:text-lime-300 hover:bg-gray-200 text-primary' }} block py-2 px-3 rounded lg:bg-transparent lg:p-0 font-bold" aria-current="{{ $active ? 'page' : false}}">{{$slot}}</a>
