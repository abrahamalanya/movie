@extends('layouts.app')

@section('title', 'Movie List')

@section('main')
    <x-web-container class="pt-[100px] flex gap-5 flex-col mb-10">
        <a href="{{ route('movie.create') }}">Agregar</a>
        <div>
            <ul>
                @foreach ($movies as $item)
                    <li>
                        <a href="{{ route('movie.edit', $item) }}">{{ $item->title }}</a>
                        <form action="{{ route('movie.destroy', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
        <div>
            {{ $movies->links() }}
        </div>
    </x-web-container>
@endsection
