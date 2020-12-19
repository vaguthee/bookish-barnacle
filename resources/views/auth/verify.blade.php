@extends('layouts.guest-page-show')
@section('title') {{ __('Verify Your Email Address') }} @endsection
@section('description') Email Verification @endsection
@section('content')
<div class="w-full max-w-screen-xl mx-auto px-6 mb-6">
<div class="w-full mx-auto">
  <div class="flex flex-wrap justify-between">
    <div class="flex-1">
      <h1 class="flex justify-center  text-gray-500 font-bold">{{ __('Verify Your Email Address') }}</h1>

        @if (session('resent'))
            <p class="text-green-500 text-s italic mb-3">{{ __('A fresh verification link has been sent to your email address.') }}</p>
        @endif

      <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 justify-center" method="post" action="{{ route('verification.resend') }}">
        {{ __('Before proceeding, please check your email for a verification link.') }}
        <br/>
        {{ __('If you did not receive the email') }},
        @csrf
        <div class="flex items-center justify-between">
          <button class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            {{ __('click here to request another') }}
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

@endsection
