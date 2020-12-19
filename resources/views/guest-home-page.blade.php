@extends('layouts.guest-page-show')
@section('title') {{config('app.name')}} @endsection
@section('description') {{config('app.site_description')}} @endsection
@section('keywords')  @endsection
@section('tags')  @endsection

@section('page-head-scripts')
<style type="text/css">
input[type="text"] {
  font-size: 16px;
}
</style>
@endsection

@section('content')
<div class="flex max-w-screen-xl mx-auto items-center justify-between flex-wrap bg-white-500 p-6 active pr-5">
  <div class="flex items-center flex-wrap">
    <p class="break-normal font-semibold text-xl font-serif text-teal-700">{!! config('app.description') !!}</p>
  </div>
</div>


<div class="w-full max-w-screen-xl mx-auto px-4 mb-2">
  <div class="flex flex-wrap lg:justify-end">
    <div class="max-w-sm w-fullmax-w-sm"> 
      <div>
         <div class="pt-2 relative mx-auto text-gray-600">
            <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
              type="search" name="search" placeholder="Search" onkeydown="pressedEnter()" id="search" value="{{$q}}">
            <button type="submit" class="absolute right-0 top-0 mt-5 mr-4" onClick="search();">
              <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                width="512px" height="512px">
                <path
                  d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
              </svg>
            </button>
          </div>
      </div>
    </div>
    <a href="#" class="no-underline block mt-4 lg:inline-block lg:mt-0 text-teal-700 hover:text-black mr-6 ml-6"></a>
  </div>
</div>

<div class="w-full max-w-screen-xl mx-auto px-1">
  @foreach($pages->chunk(3) as $pages)
  <div class="flex flex-wrap">
     @foreach($pages as $page)
      @if($page->own_page_url)
        <div class="max-w-sm m-3 w-fullmax-w-sm rounded overflow-hidden shadow-lg cursor-pointer" onClick="goToUrl('{{$page->own_page_url}}');">
      @elseif(strlen($page->body) > 20)
        <div class="max-w-sm m-3 w-fullmax-w-sm rounded overflow-hidden shadow-lg cursor-pointer" onClick="goToUrl('{{route('guestShowPage', $page->slug)}}');">
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
     @endforeach
  </div>
  @endforeach

  @if($pages->count() == 0)
  <div class="flex flex-wrap justify-center">
    <h2>0 search results</h2>
  </div>
  @endif
</div>

@endsection

@section('page-last-scripts')

<script>
window.onload = function() {
  if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
      //mobile code
   } else {
      var input = document.getElementById("search");
      input.focus();
      var val = input.value;
      input.value = '';
      input.value = val;
   }
};

function goToUrl(url) {
  window.location.href=url;
}
function search() {
  var search = document.querySelector('input[name=search]');
  var url = "{{route('guestSearchPage')}}";
  if (search.value != "") {
    url = url + '?q=' + search.value;
  }
  window.location.href= url;
}

function pressedEnter() {
    if(event.key === 'Enter') {
        search();       
    }
}

</script>
