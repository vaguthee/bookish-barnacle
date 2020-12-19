@extends('layouts.editor')

@section('title') Upload Image @endsection

@section('content')
<div class="w-full max-w-screen-xl mx-auto px-6 mt-2">
  <div class="container">
    <div class="mb-10 flex items-center">
      <h1 class="inline font-semibold text-3xl mr-auto">Upload New Image</h1> 
      <div class="relative ml-4 text-sm">
      </div>
    </div>
  </div>
</div>

<div class="w-full max-w-screen-xl mx-auto px-6">
<form method="post" action="{{ route('pics.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="tags">
        Reference
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="reference" type="text" placeholder="something you can use to search file later">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="tags">
        Image File
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="image" type="file" placeholder="image">
    </div>
    <button class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Upload Image</button>
</form>
</div>
@endsection
