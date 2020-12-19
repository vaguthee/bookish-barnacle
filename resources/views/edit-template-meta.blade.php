@extends('layouts.editor')

@section('title') Edit Meta Data @endsection

@section('content')
<div class="w-full max-w-screen-xl mx-auto px-6 mb-6">
  <div class="flex flex-wrap justify-between">
    <div class="flex-1">
      <h1 class="flex justify-center">Edit Meta Data</h1>
      @if ($errors->any())
        @foreach($errors->all() as $error)
            <p class="text-red-500 text-s italic mb-3">{{$error}}</p>
        @endforeach
      @endif
      <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 justify-center" method="post" action="{{ route('templates.metaUpdate', $template->id) }}">
        @csrf
        @method('patch')
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="tags">
            Title of the template
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$template->title}}" name="title" type="text" placeholder="title">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="tags">
            Tags
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$template->tags}}" name="tags" type="text" placeholder="tags(comma seperated)">
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Keywords
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$template->keywords}}" name="keywords" type="text" placeholder="keywords(comma seperated)">
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            excerpt (Summary text)
          </label>
          <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="excerpt" type="text" placeholder="excerpt">{{$template->excerpt}}</textarea>
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Feature image url (Image that will be displayed on the card and as link previews)
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$template->feature_image_url}}" name="feature_image_url" type="text" placeholder="feature image url">
        </div>
        <div class="flex items-center justify-between">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Save Meta data
          </button>
        </div>
      </form>
    </div>
    <div class="flex-1">
      <h1 class="flex justify-center">Card Preview</h1><br/>
      <div class="flex justify-center">
        <div class="max-w-sm m-3 w-fullmax-w-sm rounded overflow-hidden shadow-lg" onClick="goToUrl('{{route('templates.show', $template->id)}}');">
          <div class="w-full h-48 bg-cover bg-center" style="background-image: url('{{$template->feature_image_url}}')" alt="{{$template->title}}"></div>
          <!-- <img class="w-full h-48 object-cover object-top" src="" alt=""> -->
          <div class="px-6 py-4">
            <div class="font-bold font-serif text-xl mb-2 truncate text-gray-800">{{$template->title}}</div>
            <p class="font-serif text-gray-700 text-base leading-8">
              {{$template->excerpt}}
            </p>
          </div>
          <div class="px-6 py-4">
            @foreach($template->tagsArray as $tag)
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#{{$tag}}</span>
            @endforeach
            <!-- <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#winter</span> -->
          </div>
         </div>
      </div>
    </div>
</div>

@endsection
