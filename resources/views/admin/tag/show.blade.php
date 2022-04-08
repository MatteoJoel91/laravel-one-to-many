@extends('admin.layouts.base')

@section('content')
    <div class="container">

      <h1 class="mb-2">Visualizza tag</h1>
      <div class="mb-2">Nome: {{$tag->name}}</div>
      <div class="mb-2">Slug: {{$tag->slug}}</div>

      <div class="d-flex mb-2">
        <ul>
          @foreach ($tag->posts as $post)

          <li>
            <a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a>
          </li>

          @endforeach
        </ul>
        
      </div>
      <a href="{{route('admin.tags.index')}}" class="btn btn-primary">Torna alla lista</a>
    </div>
@endsection