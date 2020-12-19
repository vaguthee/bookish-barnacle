@extends('layouts.editor')

@section('title') Edit Page @endsection

@section('content')
<div class="w-full max-w-screen-xl mx-auto px-6">
  <div class="m-1">
      <a href="{{route('pics.create')}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Upload New Image</a>
      <a href="{{route('pics.index')}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Images</a>
      <a href="{{route('pages.metaEdit', $page->id)}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit Meta</a>
      <a href="{{route('pages.edit', $page->id)}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Basic Edit</a>
      <a href="{{route('pages.show', $page->id)}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Preview</a>
      @if($page->published)
      <a href="{{route('pages.unpublish', $page->id)}}" target="_blank" class="no-underline bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Unpublish</a>
      <a href="{{route('guestShowPage', $page->slug)}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Public View</a>
      @else
      <a href="{{route('pages.publish', $page->id)}}" target="_blank" class="no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Publish</a>
      <a href="{{route('guestShowPage', $page->slug)}}" target="_blank" class="no-underline bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Public View</a>
      @endif
  </div>
  <div class="mt-3">
  <p class="mt-3 bg-red-500"><i>Be carefull while editing html</i></p>
  <form method="post" action="{{ route('pages.updateHtml', $page->id) }}" enctype="multipart/form-data">
      @csrf
      @method('patch')
      <textarea name="body" class="w-full h-screen">
        {!! $page->body !!}
      </textarea>
      <button class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Update</button>
  </form>
  </div>
</div>
<div class="mt-6 w-full max-w-screen-xl mx-auto px-6">
  <h2>Meta Data</h2>
  <table class="table-auto">
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
