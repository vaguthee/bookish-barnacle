@extends('layouts.editor')

@section('title') Images @endsection

@section('content')
<div class="w-full max-w-screen-xl mx-auto px-6">
  <div class="container">
    <div class="mb-2 flex items-center">
      <h1 class="inline font-semibold text-3xl mr-auto">Images</h1> 
      <div class="relative ml-4 text-sm">
        <div>
         <div class="pt-2 relative mx-auto text-gray-600">
            <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
              type="search" name="search" placeholder="Search" onkeydown="pressedEnter()" value="{{$q}}" id="search" autofocus>
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
        </div> <!---->
      </div>
    </div>
  <div class="container">
    <div class="mb-10 mt-10 flex items-center">
      <a href="{{route('pics.create')}}" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Upload New</a>
    </div>
  </div>
  <div class="container">
    <div class="mb-10 flex items-center">
      <p>Here you can search for the images uploaded from your currently active profile. All images uploaded to this site are publicly visibile through url as it is meant to be used in your pages. To use an image on a page, upload it, copy the provided url and paste it into image tool on "create page" or "edit page" page. To upload a new photo go to "New Image".</p> 
    </div>
  </div>

  @foreach($images as $image)
    <div class="border-t border-very-light flex items-center ltr flex-row">
      <div class="no-underline text-text-color  flex-grow">
        <div title="{{$image->reference}}" class="py-4">
          <h2 class="text-xl font-semibold mb-3">{{$image->reference}}</h2>
          <input type="text" class="mb-3 w-10/12 bg-blue-100" onclick="copyToClipBoard(this)" value="{{$image->url}}" readonly />
        </div>
      </div> 
      <div class="no-underline ml-auto hidden lg:block">
        <div class="w-16 h-16 rounded-full bg-cover" style="background-image: url('{{$image->url}}');" onclick="openImage('{{$image->url}}')"></div>
      </div>
    </div>
  @endforeach
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

function goToUrl(url) {
  window.location.href=url;
}
function search() {
  var search = document.querySelector('input[name=search]');
  var url = "{{route('pics.index')}}";
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
function openImage(url) {
  window.open(url, '_blank');
}

function copyToClipBoard(copyText) {
  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied url to clipboard: " + copyText.value);
}
</script>