@extends('layouts.app')

@section('title', 'Profile')

@section('main')
    <article class="w-full h-full flex items-center relative">
        <x-web-container>
            <section class="max-w-[800px] py-12 mx-auto flex flex-col items-center text-center relative">
                <span class="font-black text-[50px] md:text-[90px] mb-[10px] md:mb-0">Profile</span>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>
            
                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>
            
                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </x-web-container>
    </article>
@endsection
