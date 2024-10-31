@extends('layouts.app')

@section('content')
<div class="container h-100 mt-5">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="email">
                            {{ __('E-Mail Address') }}:
                        </label>
                        

                        <input id="email" type="email"
                        class="form-control" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <p>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password">
                            {{ __('Password') }}:
                        </label>

                        <input id="password" type="password"
                        class="form-control" name="password"
                            required>

                        @error('password')
                        <p class="mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>



                    <div class="flex flex-wrap">
                    <button type="submit" class="btn btn-primary">  {{ __('Login') }}</button>
                

                        @if (Route::has('register'))
                        <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                            {{ __("Don't have an account?") }}
                            <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </p>
                        @endif
                    </div>
                </form>

        </div>
    </div>
    @endsection
