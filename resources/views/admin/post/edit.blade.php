@extends('admin.layouts.base')

@section('content')
    <div class="container">

      <h1>Modifica il post</h1>

      <form method="POST" action="{{route('admin.posts.update', $post->id)}}">

        @csrf

        @method('PUT')

        <div class="form-group mb-3">
          <label for="category_id">Categoria</label>
          <select class="form-control" id="category_id" name="category_id" aria-label="Default select example">
            <option value="category_id">Nessuna categoria</option>
            @foreach ($categories as $category)
                <option {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div>

        <label for="title" class="form-label">Tags</label>
        <div class="d-flex">
          @foreach ($tags as $tag)

            @if ($errors->any())
              <div class="form-check mb-3 mr-4">
                <input class="form-check-input" name="tags[]" type="checkbox" id="tag_{{$tag->id}}" value={{$tag->id}} {{in_array($tag->id, old('tags', []))?'checked':''}}> 
                <label class="form-check-label" for="tag_{{$tag->id}}">
                  {{$tag->name}}
                </label>
              </div>

            @else
              <div class="form-check mb-3 mr-4">
                <input class="form-check-input" name="tags[]" type="checkbox" id="tag_{{$tag->id}}" value={{$tag->id}} {{ ($post->tags->contains($tag)) ? 'checked' : ''}}> 
                <label class="form-check-label" for="tag_{{$tag->id}}">
                  {{$tag->name}}
                </label>
              </div>
            @endif          
          @endforeach
        </div>

        <div class="mb-3">
          <label for="title" class="form-label">Titolo</label>
          <input type="title" class="form-control" id="title" name="title" value="{{old('title', $post->title)}}">
        </div>

        <div class="mb-3">
          <label for="content" class="form-label">Contenuto post</label>
          <textarea class="form-control" id="content" rows="8" name="content">{{old('content', $post->content)}}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Invia</button>
        <a href="{{route('admin.posts.index')}}" class="btn btn-danger">Annulla</a>

      </form>
    </div>
@endsection