@php
    $inputClasses = ($query ?? false)
                ? 'shadow-lg w-full border-2 border-b-0 border-gray-600 border-opacity-50 focus:border-gray-700 focus:border-opacity-50 bg-white h-10 px-12 pr-16 rounded-b-none rounded-t-lg text-sm focus:outline-none'
                : 'shadow-lg w-full border-2 border-transparent focus:border-gray-600 focus:border-opacity-50 bg-white h-10 px-12 pr-16 rounded-lg text-sm focus:outline-none';
@endphp

<div x-data @click.away="$wire.clear()">
    <form onsubmit="return false;" class="pt-4 relative mx-auto text-gray-600" autocomplete="off">
        <i class="pl-5 pt-3 absolute fas fa-search"></i>
        <input wire:model="query" class="{{$inputClasses}}"
            placeholder="¿Qué quieres aprender?" wire:keydown.escape="clear" wire:keydown.tab="clear" wire:keydown.arrow-up="decrementHighlight" wire:keydown.arrow-down="incrementHighlight" wire:keydown.enter="selectCourse"/>
        @if ($query)
            <button class="absolute border-transparent right-0 top-0 mt-5 mr-1 px-4 py-2 h-10 bg-white hover:text-gray-500 focus:bg-white text-gray-700 focus:outline-none" wire:click="clear">
                <i class="far fa-times-circle text-xl"></i>
            </button>

            <ul class="absolute shadow-lg z-40 left-0 w-full bg-white rounded-b-lg overflow-hidden border-2 border-t-0 border-gray-600 border-opacity-50">
                @forelse ($courses as $i => $course)
                    @if ($loop->first)
                        <li class="my-0 px-5">
                            <div class="border-t border-gray-600 border-opacity-50 flex items-center"></div>
                        </li>
                    @endif
                    <a class="cursor-pointer" href="{{route('courses.show', $course['slug'])}}">
                        <li x-on:mouseover="$wire.highlightIndex = -1" class="leading-10 my-2 px-5 text-sm border-2 border-transparent hover:border-gray-300 {{ $highlightIndex === $i ? 'bg-gray-300' : '' }}">
                            <div class="flex items-center">
                                <i class="text-gray-400 pr-4 fas fa-search"></i>{{$course['title']}}
                            </div>
                        </li>
                    </a>
                @empty
                    <li class="leading-10 my-0 px-5 text-sm cursor-not-allowed">
                        <div class="border-t pt-2 border-gray-600 border-opacity-50 flex items-center">
                            Upsss... No hay ninguna coincidencia... <i class="pl-2 text-gray-500 text-xl far fa-sad-tear"></i>
                        </div>
                    </li>
                @endforelse
            </ul>
        @endif
    </form>
</div>
