@extends('layouts.app')

@section('title', 'Login')

@section('main')
    <article class="w-full h-[450px] md:h-[700px] flex items-center relative">
        <x-web-container>
            <section class="max-w-[800px] mx-auto flex flex-col gap-6 items-center text-center relative">
                <x-auth.form-login />
            </section>
        </x-web-container>
    </article>
@endsection
