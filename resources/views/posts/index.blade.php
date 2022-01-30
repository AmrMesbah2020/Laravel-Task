@extends('layouts.app')

@section('title')Index @endsection

@section('content')
<div class="text-center">
            <a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">title</th>
      <th scope="col">posted by</th>
      <th scope="col">created at</th>
      <th scope="col" colspan="3">actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach($posts as $post)
    <tr>
      <th scope="row">1</th>
      <td>{{$post['title']}}</td>
      <td>{{$post['posted_by']}}</td>
      <td>{{$post['created_at']}}</td>
      <td>
      <a href="{{route('posts.show',1)}}" class="btn btn-success">view</a>
      <a href="" class="btn btn-primary">edit</a>
      <a href="" class="btn btn-danger">delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection