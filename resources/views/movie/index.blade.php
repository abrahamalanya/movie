@extends('layouts.app')

@section('title', 'Movie List')

@section('main')
    <x-web-container class="pt-[100px] flex gap-5 flex-col mb-10">
        <a href="{{ route('movie.create') }}">Agregar</a>
        <section>
            <ul class="flex flex-col gap-2">
                @foreach ($movies as $item)
                    <li class="bg-slate-700 rounded-lg px-4 py-2 flex gap-4">
                        <div class="w-[130px] h-[150px]">
                            <img src="{{ asset('storage/'.$item->poster) }}" alt="{{ $item->title }}" class="w-full h-full object-cover rounded-xl overflow-hidden">
                        </div>
                        <div class="w-full flex flex-col justify-start items-start">
                            <a href="{{ route('movie.edit', $item) }}" class="capitalize text-xs md:text-2xl mb-[10px] leading-6 truncate font-semibold">
                                {{ $item->title }}
                            </a>
                            @foreach ($item->genres as $genre)
                                <span class="relative flex flex-wrap justify-end bg-red-500 py-[3px] px-[5px] text-xs rounded text-white whitespace-nowrap lowercase">
                                    {{ $genre->name }}
                                </span>
                            @endforeach
                            <form action="{{ route('movie.destroy', $item) }}" method="POST" class="mt-6">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </section>
        <section>
            {{ $movies->links() }}
        </section>
    </x-web-container>
@endsection
