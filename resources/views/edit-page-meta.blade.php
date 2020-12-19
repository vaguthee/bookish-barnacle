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
      <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 justify-center" method="post" action="{{ route('pages.metaUpdate', $page->id) }}">
        @csrf
        @method('patch')
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="tags">
            Title
          </label>
          <span class="block text-blue-700 text-xsm font-bold mb-2">This is the title that will be shown in tab and will be used by search engines too.</span>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$page->title}}" name="title" type="text" placeholder="title">
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="tags">
            Slug (Url)
          </label>
          <div>
            @if($page->slug)
              <a class="no-underline text-m text-green-700" href="https://smemaldives.com/{{$page->slug}}">https://smemaldives.com/{{$page->slug}}</a>
            @else
            <span class="text-m text-green-700">https://smemaldives.com/your-slug-here</span>
            @endif
            <span class="block text-blue-700 text-xsm font-bold mb-2">You can use this unique url/link to share your page with others. Update it from below.</span>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$page->slug}}" name="slug" type="text" placeholder="url of this page">

          </div>
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="tags">
            Tags
          </label>
          <span class="block text-blue-700 text-xsm font-bold mb-2">Search keywords. Users will use this to search your business, type in tags most related to your business.</span>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$page->tags}}" name="tags" type="text" placeholder="tags (comma seperated)        Eg: Brownies,Cookies">
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Excerpt (Summary text)
          </label>
          <span class="block text-blue-700 text-xsm font-bold mb-2">Description to be shown in the card of the page.</span>
          <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="excerpt" type="text" placeholder="excerpt">{{$page->excerpt}}</textarea>
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Feature image url
          </label>
          <span class="block text-blue-700 text-xsm font-bold mb-2">Image that will be displayed on the card and as link preview. Copy paste a url from images.</span>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$page->feature_image_url}}" name="feature_image_url" type="text" placeholder="feature image url">
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Own page url
          </label>
          <span class="block text-blue-700 text-xsm font-bold mb-2">If this is set the user will be redirected to this page when clicked to card. Page content wont be shown.</span>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$page->own_page_url}}" name="own_page_url" type="text" placeholder="Own site/page url">
        </div>
        <div class="mb-6">
          <div class="md:w-full"></div>
          <label class="md:w-full block text-gray-500 font-bold">
            @if($page->as_template)
            <input class="mr-2 leading-tight" type="checkbox" name="as_template" checked>
            @else
            <input class="mr-2 leading-tight" type="checkbox" name="as_template">
            @endif
            <span class="text-sm">
              Contribute my template, so that others use my page as a template. You need to publish it later from templates page.
            </span>
          </label>
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
          @if($page->own_page_url)
            <div class="max-w-sm m-3 w-fullmax-w-sm rounded overflow-hidden shadow-lg" onClick="goToUrl('{{$page->own_page_url}}');">
          @elseif(strlen($page->own_page_url) > 20)
            <div class="max-w-sm m-3 w-fullmax-w-sm rounded overflow-hidden shadow-lg" onClick="goToUrl('{{route('guestShowPage', $page->slug)}}');">
          @else
            <div class="max-w-sm m-3 w-fullmax-w-sm rounded overflow-hidden shadow-lg">
          @endif
          <div class="w-full h-48 bg-cover bg-center" style="background-image: url('{{$page->feature_image_url}}')" alt="{{$page->title}}"></div>
          <!-- <img class="w-full h-48 object-cover object-top" src="" alt=""> -->
          <div class="px-6 py-4">
            <div class="font-bold font-serif text-xl mb-2 truncate text-gray-800">{{$page->title}}</div>
            <p class="font-serif text-gray-700 text-base leading-8">
              {{$page->excerpt}}
            </p>
          </div>
          <div class="px-6 py-4">
            @foreach($page->tagsArray as $tag)
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mt-1">#{{$tag}}</span>
            @endforeach
            <!-- <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#winter</span> -->
          </div>
         </div>
      </div>
    </div>
</div>

@endsection
