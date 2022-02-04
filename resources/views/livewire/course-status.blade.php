<div class="mt-8">
    <div class="container grid grid-cols-3 gap-8">
        <div class="col-span-2">
            {!!$current->iframe!!}
            {{$current->name}}
            <p>Índice: {{$this->index}}</p>
            <p>Anterior: @if ($this->previous)
                {{$this->previous->id}}
            @endif</p>
            <p>Siguiente: @if ($this->next)
                {{$this->next->id}}
            @endif</p>
        </div>

        {{-- Esta columna pertenece a las secciones del curso y las lecciones
            como así tambíen contiene la información del profesor --}}
        <div class="card">
            <div class="card-body">
                {{-- Información del curso y profesor --}}
                <h1>{{$course->title}}</h1>
                <div class="flex items-center">
                    <figure>
                        <img src="{{$course->teacher->profile_photo_url}}" alt="">
                    </figure>
                    <div>
                        <p>{{$course->teacher->name}}</p>
                        <a class="text-blue-500" href="">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                    </div>
                </div>

                {{-- Secciones del curso (temario) --}}
                <ul>
                    @foreach ($course->sections as $section)
                        <li>
                            <a class="font-bold" href="">{{$section->name}}</a>
                            {{-- Lecciones de cada sección --}}
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li>
                                        <a class="cursor-pointer" wire:click="changeLesson({{$lesson}})">{{$lesson->id}} @if($lesson->completed)</a>
                                            (Completado)
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</div>
