@extends('layouts.guest-page-show')
@section('title'){{$page->title }}@endsection
@section('description'){{$page->excerpt }}@endsection
@section('image'){{$page->feature_image_url }}@endsection
@section('keywords'){{$page->keywords }}@endsection
@section('tags'){{$page->tags }}@endsection
@section('content')
<div class="w-full max-w-screen-xl mx-auto px-6">
    <div class="ql-container ql-bubble ql-disabled">
        <div class="ql-editor">
          {!! $page->body !!}
        </div>
    </div>
</div>
@endsection
@section('page-last-scripts')
@endsection
