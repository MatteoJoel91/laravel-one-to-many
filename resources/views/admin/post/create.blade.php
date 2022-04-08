@extends('admin.layouts.base')

@section('content')
    <div class="container">

      <form method="POST" action="{{route('admin.posts.store')}}">

        @csrf

        <div class="form-group mb-3">
          <label for="category_id">Categoria</label>
          <select class="form-control" id="category_id" name="category_id" aria-label="Default select example">
            <option value="category_id">Nessuna categoria</option>
            @foreach ($categories as $category)
                <option {{old('category_id') == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div>

        @foreach ($tags as $tag)
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                {{$tag->name}}
              </label>
            </div>
        @endforeach
        

        <div class="mb-3">
          <label for="title" class="form-label">Titolo</label>
          <input type="title" class="form-control" id="title" name="title" value="{{old('title', '')}}">
        </div>

        <div class="mb-3">
          <label for="content" class="form-label">Contenuto post</label>
          <textarea class="form-control" id="content" rows="8" name="content" value="{{old('content', '')}}"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Invia</button>

      </form>
    </div>
@endsection