@extends('layouts.editor')

@section('title') Dashboard @endsection

@section('content')
<div class="w-full max-w-screen-xl mx-auto px-6 mt-2">
  <div class="container">
    <div class="mb-10 flex items-center">
      <h1 class="inline font-semibold text-3xl mr-auto">Dashboard</h1> 
      <div class="relative ml-4 text-sm">
      </div>
    </div>
  </div>
</div>
@if($page)
<div class="mt-6 w-full max-w-screen-xl mx-auto px-6 ql-editor">
    {!! $page->body !!}
</div>
@endif
@endsection
