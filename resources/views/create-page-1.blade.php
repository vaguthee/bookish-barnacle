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

<div id="scrolling-container">
    <div id="quill-container">
    </div>
</div>

@endsection

@section('page-last-scripts')

<script>
$(document).ready(function(){
    var quill = new Quill('#quill-container', {
      modules: {
        toolbar: [
          [{ header: [1, 2, false] }],
          ['bold', 'italic', 'underline'],
          ['image', 'code-block']
        ]
      },
      scrollingContainer: '#scrolling-container', 
      placeholder: 'Compose an epic...',
      theme: 'snow'
    });
});
</script>

@endsection
