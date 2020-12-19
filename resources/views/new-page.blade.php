@extends('layouts.editor')

@section('title') New Page @endsection

@section('content')
<div class="w-full max-w-screen-xl mx-auto px-6 mt-2">
  <div class="container">
    <div class="mb-10 flex items-center">
      <h1 class="inline font-semibold text-3xl mr-auto">Create New Page</h1> 
      <div class="relative ml-4 text-sm">
      </div>
    </div>
  </div>
</div>

<div class="w-full max-w-screen-xl mx-auto px-6">
  <h1 class="m-3">Create a new page from scratch</h1>
  <div class="m-3">
    <a href="{{route('pages.create')}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">New Page from Scratch</a>
  </div>
  <h1 class="m-3">or create from a template to get started</h1>
  <div class="mt-3">
    <div class="w-full max-w-screen-xl mx-auto px-4 mb-2">
      <div class="flex flex-wrap lg:justify-evenly">
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
      </div>
    </div>
    <div class="w-full max-w-screen-xl mx-auto px-1">
      @foreach($templates->chunk(3) as $templates)
      <div class="flex flex-wrap">
         @foreach($templates as $template)
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
              <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-1">#{{$tag}}</span>
              @endforeach
              <!-- <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#winter</span> -->
            </div>
           </div>
         @endforeach
      </div>
      @endforeach

      @if($templates->count() == 0)
        <h1 class="m-3">No templates to show</h1>
      @endif
    </div>
  </div>
</div>
@endsection

@section('page-last-scripts')

<script>
window.onload = function() {
  var input = document.getElementById("search")
  input.focus();
  var val = input.value;
  input.value = '';
  input.value = val;
};
function search() {
  var search = document.querySelector('input[name=search]');
  var url = "{{route('pages.new')}}";
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

@endsection
