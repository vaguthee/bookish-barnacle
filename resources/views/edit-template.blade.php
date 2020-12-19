@extends('layouts.editor')

@section('title') Edit Template @endsection

@section('content')
<div class="w-full max-w-screen-xl mx-auto px-6 mt-2">
  <div class="container">
    <div class="mb-10 flex items-center">
      <h1 class="inline font-semibold text-3xl mr-auto">Edit Template</h1> 
      <div class="relative ml-4 text-sm">
      </div>
    </div>
  </div>
</div>
<div class="w-full max-w-screen-xl mx-auto px-6">
  <div class="m-1">
      <a href="{{route('pics.create')}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Upload New Image</a>
      <a href="{{route('pics.index')}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Images</a>
      <a href="{{route('templates.metaEdit', $template->id)}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit Meta</a>
      @if(is_as_admin(auth()->user()))
      <a href="{{route('templates.editHtml', $template->id)}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit Html</a>
      @endif
      <a href="{{route('templates.show', $template->id)}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Preview</a>
      @if($template->published)
      <a href="{{route('templates.unpublish', $template->id)}}" target="_blank" class="no-underline bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Unpublish</a>
      @else
      <a href="{{route('templates.publish', $template->id)}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Publish</a>
      @endif
  </div>
  <div class="mt-3">
  <form method="post" action="{{ route('templates.store') }}" enctype="multipart/form-data">
      @csrf
      <input name="template_id" type="hidden" value="{{$template->id}}">
      <input name="body" type="hidden">
      <div id="editor-container">
        {!! $template->body !!}
      </div>
      <p class="mt-3"><i>Auto save every 5 seconds enabled</i></p>
  </form>
  </div>
</div>
<div class="mt-6 w-full max-w-screen-xl mx-auto px-6">
  <h2>Meta Data</h2>
  <table class="table-auto">
    <tr><td class="border px-4 py-2"><b>Title</b></td><td class="border px-4 py-2">{{$template->title}}</td></tr>
    <tr><td class="border px-4 py-2"><b>Tags</b></td><td class="border px-4 py-2">{{$template->tags}}</td></tr>
    <tr><td class="border px-4 py-2"><b>Keywords</b></td><td class="border px-4 py-2">{{$template->keywords}}</td></tr>
    <tr><td class="border px-4 py-2"><b>Excerpt</b></td><td class="border px-4 py-2">{{$template->excerpt}}</td></tr>
    <tr><td class="border px-4 py-2"><b>Feature Image</b></td><td class="border px-4 py-2"><img src="{{$template->feature_image_url}}" alt="{{$template->feature_image_url}}"></td></tr>
    <tr><td class="border px-4 py-2"><b>Feature Image Url</b></td><td class="border px-4 py-2">{{$template->feature_image_url}}</td></tr>
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
    var template_id = document.querySelector('input[name=template_id]').value;
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
        saveChanges();
        change = new Delta();
      }
    }, 5*1000);

    function saveChanges() {
      $.post('{{ route('templates.store') }}', { 
        template_id: template_id,
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
    var value = prompt('What is the image URL');
    if(value){
        this.quill.insertEmbed(range.index, 'image', value, Quill.sources.USER);
    }
}

</script>

@endsection
