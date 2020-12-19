@extends('layouts.guest')

@section('title') {{$template->title}} @endsection

@section('page-head-scripts')
@endsection
@section('content')
<div class="w-full max-w-screen-xl mx-auto px-6">
    <a href="{{route('pages.fromTemplate', $template->id)}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create A Page From This Template</a>
</div>
<hr class="mt-3">
<div class="w-full max-w-screen-xl mx-auto px-6">
    <div class="ql-container ql-bubble ql-disabled">
        <div class="ql-editor">
          {!! $template->body !!}
        </div>
    </div>
</div>
@endsection

@section('page-last-scripts')
@endsection
