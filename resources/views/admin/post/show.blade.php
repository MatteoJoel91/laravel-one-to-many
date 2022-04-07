@extends('admin.layouts.base')

@section('content')
    <div class="container">

      <h1 class="mb-2">Visualizza post</h1>
      <div class="mb-2">Titolo: {{$post->title}}</div>
      <div class="mb-2">Categoria: {{$post->category->name}}</div>
      <div class="mb-2">Contenuto: {!! $post->content !!}</div>
      <div class="mb-2">Slug: {{$post->slug}}</div>
      <a href="{{route('admin.posts.index')}}" class="btn btn-primary">Torna alla lista</a>
    </div>
@endsection