@extends('layouts.app')

@section('title', 'Profile')

@section('main')
    <x-web-container class="">
        <section class="flex flex-col items-center gap-4 py-20">
            <h3 class="font-black text-2xl">{{ __('messages.edit') }} {{ __('messages.account') }}</h3>
            <section class="w-3/4 flex gap-4 justify-center">
                <article class="w-1/2 bg-gray-800 p-8 rounded-lg">
                    @include('profile.partials.update-profile-information-form')
                </article>
                <article class="w-1/2 bg-gray-800 p-8 rounded-lg">
                    @include('profile.partials.update-password-form')
                </article>
            </section>
        </section>
    </x-web-container>
@endsection
