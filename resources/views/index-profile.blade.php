@extends('layouts.editor')

@section('title') Profiles @endsection

@section('content')
<div class="w-full max-w-screen-xl mx-auto px-6">
  <div class="container">
    <div class="mb-2 flex items-center">
      <h1 class="inline font-semibold text-3xl mr-auto">Profiles</h1> 
      <div class="relative ml-4 text-sm">
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
        </div> <!---->
      </div>
    </div>
  <div class="container">
    <div class="mb-10 mt-10 flex items-center">
      <a href="{{route('profiles.create')}}" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">New Profile</a>
    </div>
  </div>
  <div class="container">
    <div class="mb-10 flex items-center">
      <p>Every user is created with a default personal profile. If you have multiple businesses, you can create a profile for each business. It will make it easier to manage as multiple users can be assinged to manage a single business profile. Pages are created for the 'currently selected' profile. To switch the profile click the profile name button on navigation bar next to sign out button.</p> 
    </div>
  </div>

  @foreach($profiles as $profile)
    <div class="border-t border-very-light flex items-center ltr flex-row" onClick="goToUrl('{{route('profiles.edit', $profile->id)}}');">
      <div class="no-underline text-text-color  flex-grow">
        <div title="{{$profile->title}}" class="py-4">
          <h2 class="text-xl font-semibold mb-3">{{$profile->name}}</h2>
          <p class="mb-3">{{$profile->type}}
            @if(auth()->user()->acting_profile_id == $profile->id) 
              (Currently Selected)
            @endif
          </p> 
          <!-- <small class="text-light"><span>Published a day ago</span><span> by Mohamed Aiman</span> <span>— Tags: Amazon, S3</span></small> -->
        </div>
      </div> 
    </div>
  @endforeach
  </div>
</div>
@endsection

@section('profile-last-scripts')

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
  var url = "{{route('profiles.index')}}";
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
