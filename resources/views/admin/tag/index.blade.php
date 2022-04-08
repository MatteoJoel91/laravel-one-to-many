@extends('admin.layouts.base')

@section('content')
    <div class="container">
      <a href="{{route('admin.posts.create')}}" class="btn btn-primary my-3">Crea un nuovo post</a>
      <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Slug</th>
              <th scope="col">Azioni</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tags as $tag)
                <tr>
                  <th>{{$tag->id}}</th>
                  <td>{{$tag->name}}</td>
                  <td>{{$tag->slug}}</td>
                  <td>
                    <a href="{{route('admin.tags.show', $tag->id)}}" class="btn btn-primary mx-1">Info</a>
                  </td>
                </tr>
            @endforeach
            
          </tbody>
        </table>
    </div>
@endsection
