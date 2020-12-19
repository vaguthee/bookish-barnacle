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

@section('content')
<form method="post" action="{{ route('pages.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row form-group">
      <input name="about" type="hidden">
      <div id="editor-container">
        <p>Write here...</p>
      </div>
    </div>
    <button class="btn btn-primary" type="submit">Save Page</button>
</form>

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
    var quill = new Quill('#editor-container', {
        theme: 'snow',
        modules: {
            toolbar: {
                container: toolbarOptions,
                handlers: {
                    image: imageHandler
                }
            }
        },
    });

    var form = document.querySelector('form');
    form.onsubmit = function() {
        // alert('xxx');
      // Populate hidden form on submit
      var about = document.querySelector('input[name=about]');
      about.value = JSON.stringify(quill.getContents());
      
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
