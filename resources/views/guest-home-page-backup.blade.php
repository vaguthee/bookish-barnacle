@extends('layouts.guest-page-show')
@section('title') Home @endsection
@section('description') cheapest tourist accomodations in Maldives @endsection
@section('image')  @endsection
@section('keywords')  @endsection
@section('tags')  @endsection


@section('content')
<div class="w-full max-w-screen-xl mx-auto px-6">
  <div class="container">
    <div class="mb-10 flex items-center">
      <h1 class="inline font-semibold text-3xl mr-auto">{{config('app.name')}}</h1> 
      <div class="relative ml-4 text-sm">
        <div>
         <div class="pt-2 relative mx-auto text-gray-600">
            <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
              type="search" name="search" placeholder="Search" onkeydown="pressedEnter()">
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

  @foreach($pages as $page)
    <div class="border-t border-very-light flex items-center ltr flex-row" onClick="goToUrl('{{route('guestShowPage', $page->slug)}}');">
      <div class="no-underline text-text-color  flex-grow">
        <div title="{{$page->title}}" class="py-4">
          <h2 class="text-xl font-semibold mb-3">{{$page->title}}</h2>
          <p class="mb-3">{{$page->excerpt}}</p> 
          <!-- <small class="text-light"><span>Published a day ago</span><span> by Mohamed Aiman</span> <span>— Tags: Amazon, S3</span></small> -->
        </div>
      </div> 
      <div class="no-underline ml-auto hidden lg:block">
        <div class="w-16 h-16 rounded-full bg-cover" style="background-image: url('{{$page->feature_image_url}}');"></div>
      </div>
    </div>
  @endforeach
  </div>
</div>

<div class="w-full max-w-screen-xl mx-auto px-6">
  <ins class="bookingaff" data-aid="2060572" data-target_aid="2060572" data-prod="dfl2" data-width="100%" data-height="auto" data-lang="en" data-currency="USD" data-dest_id="4862" data-dest_type="region" data-df_num_properties="9">
      <!-- Anything inside will go away once widget is loaded. -->
          <!-- <a href="//www.booking.com?aid=2060572">Booking.com</a> -->
  </ins>
  <script type="text/javascript">
      (function(d, sc, u) {
        var s = d.createElement(sc), p = d.getElementsByTagName(sc)[0];
        s.type = 'text/javascript';
        s.async = true;
        s.src = u + '?v=' + (+new Date());
        p.parentNode.insertBefore(s,p);
        })(document, 'script', '//aff.bstatic.com/static/affiliate_base/js/flexiproduct.js');
  </script>
</div>
@endsection

@section('page-last-scripts')

<script>
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
