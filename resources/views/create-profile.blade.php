@extends('layouts.editor')

@section('title') Create Profile @endsection

@section('content')
<div class="w-full max-w-screen-xl mx-auto px-6 mt-2">
  <div class="container">
    <div class="mb-10 flex items-center">
      <h1 class="inline font-semibold text-3xl mr-auto">Create A New Profile</h1> 
      <div class="relative ml-4 text-sm">
      </div>
    </div>
  </div>
</div>

<div class="w-full max-w-screen-xl mx-auto px-6 mb-6">
  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" action="{{ route('profiles.store') }}">
    @csrf
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="tags">
        Name
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" type="text" placeholder="name">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="tags">
        Type
      </label>
       <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="type">
          <option value="Personal"  selected>Personal</option>
          <option value="Business" >Business</option>
        </select>
    </div>
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Create Profile
      </button>
    </div>
  </form>
</div>
@endsection
