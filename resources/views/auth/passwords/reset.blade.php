@extends('layouts.guest-page-show')
@section('title') {{ __('Reset Password') }} @endsection
@section('description') Login page @endsection
@section('content')
<div class="w-full max-w-screen-xl mx-auto px-6 mb-6">
<div class="w-full max-w-xs mx-auto">
  <div class="flex flex-wrap justify-between">
    <div class="flex-1">
      <h1 class="flex justify-center  text-gray-500 font-bold">{{ __('Reset Password') }}</h1>
      <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 justify-center" method="post" action="{{ route('password.update') }}">
        @csrf
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
            {{ __('E-Mail Address') }}
          </label>
          <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            {{ __('Password') }}
          </label>
          <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password" required autocomplete="new-password">
            @error('password')
               <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="password-confirm">
            {{ __('Confirm Password') }}
          </label>
          <input id="password-confirm" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password_confirmation" required autocomplete="new-password">
        </div>
        <div class="flex items-center justify-between">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            {{ __('Reset Password') }}
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

@endsection
