@extends('layouts.editor')

@section('page-head-scripts')
<style type="text/css">
html {
  height: 100%;
}
body {
  margin: 0;
  height: 100%;
}

/* Tell Quill not to scroll */
#quill-container {
  height: auto;
  min-height: 100%;
  padding: 50px;
}
#quill-container .ql-editor {
  font-size: 18px;
  overflow-y: visible; 
}

/* Specify our own scrolling container */
#scrolling-container {
  height: 100%;
  min-height: 100%;
  overflow-y: auto;
}



</style>

@endsection

@section('title') New Page @endsection

@section('content')
<div class="w-full max-w-screen-xl mx-auto px-6 mt-2">
  <div class="container">
    <div class="mb-10 flex items-center">
      <h1 class="inline font-semibold text-3xl mr-auto">Create A New Page</h1> 
      <div class="relative ml-4 text-sm">
      </div>
    </div>
  </div>
</div>

<div class="mt-4 w-full max-w-screen-xl mx-auto px-6">
  <div class="m-1">
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
  <div class="mt-4">
    <form method="post" action="{{ route('pages.store') }}" enctype="multipart/form-data" id="body-form">
        @csrf
        <input name="page_id" type="hidden" value="{{$page->id}}">
        <input name="body" type="hidden">
        <div id="editor-container">
          <p>Write here...</p>
        </div>
        <p class="mt-3"><i>Auto save every 5 seconds enabled</i></p>
    </form>
  </div>
</div>
@endsection

@section('page-last-scripts')

<script>
var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    ['blockquote', 'code-block'],

    [{ 'header': 1 }, { 'header': 2 }],               // custom button values
    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
    [{ 'script': 'sub' }, { 'script': 'super' }],      // superscript/subscript
    [{ 'indent': '-1' }, { 'indent': '+1' }],          // outdent/indent
    [{ 'direction': 'rtl' }],                         // text direction

    [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    [{ 'font': [] }],
    [{ 'align': [] }],

    ['clean'],                                         // remove formatting button
    ['image']
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
      placeholder: 'Compose an epic...',
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
        $.post('{{ route('pages.store') }}', { 
          page_id: page_id,
          body: quill.root.innerHTML,
          // body: JSON.stringify(quill.getContents()),
          _token: $('meta[name="csrf-token"]').attr('content')
        });
        change = new Delta();
      }
    }, 5*1000);

    // Check for unsaved data
    window.onbeforeunload = function() {
      if (change.length() > 0) {
        return 'There are unsaved changes. Are you sure you want to leave?';
      }
    }

    //manual submit
    var form = document.querySelector('#body-form');
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
    var value = prompt('What is the image URL');
    if(value){
        this.quill.insertEmbed(range.index, 'image', value, Quill.sources.USER);
    }
}

</script>

@endsection
