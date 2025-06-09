@extends('layouts.app')

@section('view')
    <div class="w-full h-screen relative">
        <img src="{{ asset('images/petani.webp') }}" alt="Petani" class="w-screen h-screen fixed z[-1]">
        <div class="w-full h-screen fixed bg-[#3B7BDB]/60"></div>
        <div class="absolute top-0 left-0 w-[50%] h-screen bg-white flex justify-center items-center">
            <a href="{{ route('login') }}" class="absolute top-10 left-10">
                <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.0637 20.0418L19.6179 27.5959C19.9262 27.9043 20.0742 28.264 20.0619 28.6751C20.0495 29.0862 19.8887 29.4459 19.5793 29.7542C19.271 30.0369 18.9113 30.1849 18.5002 30.1982C18.0891 30.2116 17.7293 30.0636 17.421 29.7542L7.246 19.5793C7.09183 19.4251 6.98237 19.2581 6.91762 19.0782C6.85287 18.8983 6.82153 18.7056 6.82358 18.5001C6.82564 18.2945 6.85801 18.1018 6.92071 17.922C6.9834 17.7421 7.09235 17.5751 7.24754 17.4209L17.4225 7.24592C17.7052 6.96328 18.0587 6.82196 18.4832 6.82196C18.9077 6.82196 19.2736 6.96328 19.5809 7.24592C19.8892 7.55425 20.0434 7.92065 20.0434 8.34513C20.0434 8.7696 19.8892 9.13549 19.5809 9.44279L12.0637 16.9584H29.2918C29.7286 16.9584 30.095 17.1064 30.391 17.4024C30.687 17.6984 30.8345 18.0643 30.8335 18.5001C30.8325 18.9359 30.6845 19.3023 30.3895 19.5993C30.0945 19.8963 29.7286 20.0438 29.2918 20.0418H12.0637Z"
                        fill="black" />
                </svg>
            </a>
            <div class=" justify-center flex flex-col items-center w-[80%]">
                <img src="{{ asset('images/colored_logo_penta.png') }}" alt="Logo" class="w-32">
                <h1 class="font-medium">Portal Dashboard Nunukan: Statistik Produksi dan PDRB </h1>
                <form class="form-filament" method="POST" action="{{ route('dashboard.login') }}">
                    @csrf

                    <label for="email" class="mt-4">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan Email" required>

                    <label for="password" class="mt-4">Password</label>
                    <div class="relative h-fit">
                        <input type="password" id="password" name="password" placeholder="Enter password"
                            style="padding-right: 40px;" />
                        <button type="button" id="togglePassword"
                            class="absolute right-3 top-1/2 -translate-y-1/2 bg-transparent border-0 cursor-pointer text-base">
                            👁️
                        </button>
                    </div>
                    <p class="text-center mt-4">lupa password? <a href="{{ route('forgot-password') }}" class="text-blue-600">klik di sini</a></p>
                    <button class="filament-button" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @include('js-components.hidden-password')
@endsection
