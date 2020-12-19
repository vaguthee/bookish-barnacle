@extends('layouts.editor')

@section('title') Edit Page @endsection

@section('content')
<div class="w-full max-w-screen-xl mx-auto px-6 mt-2">
  <div class="container">
    <div class="mb-10 flex items-center">
      <h1 class="inline font-semibold text-3xl mr-auto">Edit Page</h1> 
      <div class="relative ml-4 text-sm">
      </div>
    </div>
  </div>
</div>
<div class="w-full max-w-screen-xl mx-auto px-6">
  <div class="m-1">
      <a href="{{route('pages.editCard', $page->id)}}" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit Card</a>
      <a href="{{route('pages.metaEdit', $page->id)}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit Meta</a>
      <a href="{{route('pics.create')}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Upload New Image</a>
      <a href="{{route('pics.index')}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Images</a>
      @if(is_as_admin(auth()->user()))
      <a href="{{route('pages.editHtml', $page->id)}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit Html</a>
      @endif
      <a href="{{route('pages.show', $page->id)}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Preview</a>
      @if($page->published)
      <a href="{{route('pages.unpublish', $page->id)}}" target="_blank" class="no-underline bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Unpublish</a>
      <a href="{{route('guestShowPage', $page->slug)}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Public View</a>
      @else
      <a href="{{route('pages.publish', $page->id)}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Publish</a>
      <a href="{{route('guestShowPage', $page->slug)}}" target="_blank" class="no-underline bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Public View</a>
      @endif
  </div>

<div class="mt-6 w-full max-w-screen-xl mx-auto">
  <div class="mt-10">
    <div class="flex items-center">
      <div class="relative text-sm font-semibold">Edit Page Content Here (Auto save every 5 seconds enabled)</div>
    </div>
  </div>

  <div class="mt-3">
  <form method="post" action="{{ route('pages.store') }}" enctype="multipart/form-data">
      @csrf
      <input name="page_id" type="hidden" value="{{$page->id}}">
      <input name="body" type="hidden">
      <div id="editor-container">
        {!! $page->body !!}
      </div>
  </form>
  </div>
</div>
<div class="mt-6 w-full max-w-screen-xl mx-auto">
  <div class="mt-10">
    <div class="flex items-center">
      <!-- <h1 class="inline font-semibold text-3xl mr-auto">Edit Page Content Here</h1>  -->
      <div class="relative text-sm font-semibold">Meta Data</div>
    </div>
  </div>
  <table class="table-auto mt-3">
    <tr><td class="border px-4 py-2"><b>Title</b></td><td class="border px-4 py-2">{{$page->title}}</td></tr>
    <tr><td class="border px-4 py-2"><b>Slug</b></td><td class="border px-4 py-2">{{$page->slug}}</td></tr>
    <tr><td class="border px-4 py-2"><b>Tags</b></td><td class="border px-4 py-2">{{$page->tags}}</td></tr>
    <tr><td class="border px-4 py-2"><b>Keywords</b></td><td class="border px-4 py-2">{{$page->keywords}}</td></tr>
    <tr><td class="border px-4 py-2"><b>Excerpt</b></td><td class="border px-4 py-2">{{$page->excerpt}}</td></tr>
    <tr><td class="border px-4 py-2"><b>Feature Image</b></td><td class="border px-4 py-2"><img src="{{$page->feature_image_url}}" alt="{{$page->feature_image_url}}"></td></tr>
    <tr><td class="border px-4 py-2"><b>Feature Image Url</b></td><td class="border px-4 py-2">{{$page->feature_image_url}}</td></tr>
  </table>
</div>
@endsection

@section('page-last-scripts')

<script>
var toolbarOptions = [
    ['link'],
    ['image'],
    [{ 'align': [] }],
    [{ 'header': 1 }, { 'header': 2 }],               // custom button values
    [{ 'font': [] }],
    [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
    [{ 'indent': '-1' }, { 'indent': '+1' }],          // outdent/indent
    [{ 'direction': 'rtl' }],                         // text direction


    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    ['blockquote', 'code-block'],
    [{ 'script': 'sub' }, { 'script': 'super' }],      // superscript/subscript
    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme

    ['clean']                                         // remove formatting button
];

$(document).ready(function(){
    var page_id = document.querySelector('input[name=page_id]').value;
    var Delta = Quill.import('delta');
    var quill = new Quill('#editor-container', {
      modules: {
        toolbar: {
            container: toolbarOptions,
            handlers: {
                image: imageHandler
            }
        }
      },
      placeholder: 'write here.... what you write here will be displayed as your page content. You can format the page content using above editor tools.',
      theme: 'snow'
    });

    // Store accumulated changes
    var change = new Delta();
    quill.on('text-change', function(delta) {
      change = change.compose(delta);
    });

    // Save periodically
    setInterval(function() {
      if (change.length() > 0) {
        console.log('Saving changes', change);
        /* 
        Send partial changes
        $.post('/your-endpoint', { 
          partial: JSON.stringify(change) 
        });
        Send entire document
        */
        saveChanges();
        change = new Delta();
      }
    }, 5*1000);

    function saveChanges() {
      $.post('{{ route('pages.store') }}', { 
        page_id: page_id,
        body: quill.root.innerHTML,
        // body: JSON.stringify(quill.getContents()),
        _token: $('meta[name="csrf-token"]').attr('content')
      }).then(function() {

      });
    }

    // Check for unsaved data
    window.onbeforeunload = function() {
      if (change.length() > 0) {
        return 'There are unsaved changes. Are you sure you want to leave?';
      }
    }

    //manual submit
    var form = document.querySelector('form');
    form.onsubmit = function() {
        // alert('xxx');
      // Populate hidden form on submit
      var body = document.querySelector('input[name=body]');
      // body.value = JSON.stringify(quill.getContents());
      body.value = quill.root.innerHTML;
      
      // console.log("Submitted", $(form).serialize(), $(form).serializeArray());
      
      // // No back end to actually submit to!
      // alert('Open the console to see the submit data!')
      // return false;
    };
});

function imageHandler() {
    var range = this.quill.getSelection();
    var value = prompt('Paste the image url. Go to images to copy the image url. If you have not uploaded the image yet, upload it first to get the url.');
    if(value){
        this.quill.insertEmbed(range.index, 'image', value, Quill.sources.USER);
    }
}

</script>

@endsection
