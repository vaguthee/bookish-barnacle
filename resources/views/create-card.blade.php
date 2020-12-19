@extends('layouts.editor')

@section('title') Add Listing @endsection

@section('content')
<div class="w-full max-w-screen-xl mx-auto px-6 mb-6">
  <div class="flex flex-wrap justify-between">
    <div class="flex-1">
      <h1 class="flex justify-center">Design The Card</h1>
      <span class="block text-green-700 text-xsm font-bold mb-5">
        DM me on Twitter (<a href="https://twitter.com/mohamed_aiman">@mohamed_aiman</a>) or on Instagram (<a href="https://instagram.com/smemaldives">@smemaldives</a>) if u need any assistance.
      </span>
      @if ($errors->any())
          @foreach($errors->all() as $error)
              <p class="text-red-500 text-s italic mb-3">{{$error}}</p>
          @endforeach
      @endif
      <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 justify-center" method="post" action="{{ route('pages.storeCard') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="tags">
            Business Name
          </label>
          <span class="block text-blue-700 text-xsm mb-2"><i>This is the title that will be shown in tab and will be used by search engines too.</i></span>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" type="text" placeholder="title">
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
            Description
          </label>
          <span class="block text-blue-700 text-xsm mb-2"><i>Write a short description for your business which includes the type of business and services that you provide. Also, mention which islands can receive your services.</i></span>
          <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="excerpt" type="text" placeholder="excerpt"></textarea>
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="tags">
            Tags
          </label>
          <span class="block text-blue-700 text-xsm mb-2"><i>These are the search keywords. Users will be able to search for your business using tags or your business name. Type in the tags which relate the most to your business. You can include up to 10 tags. (Use , to separate each tag).</i></span>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="tags" type="text" placeholder="tags (comma seperated)        Eg: Brownies,Cookies">
        </div>
<!--         <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="feature_image_url">
            Card Image
          </label>
          <span class="block text-blue-700 text-xsm mb-2"><i>Image that will be displayed on the card and as link preview. Copy paste a url from images.</span>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="feature_image_url" type="text" placeholder="feature image url">
        </div> -->
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
            Card Image
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="image" type="file" placeholder="image">
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="own_page_url">
            Link to your business page (one link only)
          </label>
          <span class="block text-blue-700 text-xsm mb-2"><i>This could be your Instagram page, Facebook or website link.</i></span>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="own_page_url" type="text" placeholder="Own site/page url">
        </div>
        <div class="flex items-center justify-between">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Create Card
          </button>
        </div>
      </form>
    </div>
</div>

@endsection
