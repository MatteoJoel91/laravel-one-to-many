@extends('admin.layouts.base')

@section('content')
    <div class="container">
      <a href="{{route('admin.posts.create')}}" class="btn btn-primary my-3">Crea un nuovo post</a>
      <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Titolo</th>
              <th scope="col">Contenuto</th>
              <th scope="col">Slug</th>
              <th scope="col">Categoria</th>
              <th scope="col" class="text-center">Azioni</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
                <tr>
                  <th>{{$post->id}}</th>
                  <td>{{$post->title}}</td>
                  <td>{{substr($post->content, 0, 30)}}</td>
                  <td>{{$post->slug}}</td>
                  <td>{{$post->category->name}}</td>
                  <td>
                    <div class="d-flex justify-content-center">

                      <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-primary mx-1">Info</a>
                      <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-warning mx-1">Modifica</a>
                      
                      <form method="POST" action="{{route('admin.posts.destroy', $post->id)}}">

                        @csrf

                        @method('DELETE')

                        <button type='submit' class="btn btn-danger text-light mx-1">Elimina</button>

                      </form>
                    </div>
                    
                  </td>
                </tr>
            @endforeach
            
          </tbody>
        </table>
    </div>
@endsection
