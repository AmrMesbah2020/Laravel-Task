@extends('layouts.app')

@section('title')Index @endsection

@section('content')
<div class="text-center">
            <a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
</div>

<table class="table">
  <thead>
    <tr>
    <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">posted by</th>
      <th scope="col">created at</th>
      <th scope="col">post slug</th>
      <th scope="col" colspan="3">actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post['id']}}</th>
      <td>{{$post['title']}}</td>
      <td>{{ isset($post->user) ? $post->user->name : 'Not Found' }}</td>
      <td>{{\Carbon\Carbon::parse($post['created_at'])->format('d-M-Y')}}</td>
      <td>{{$post['slug']}}</td>
      <td>
      <a href="{{route('posts.show',$post['slug'])}}" class="btn btn-success">view</a>

      <a href="{{route('posts.edit',$post['slug'])}}" class="btn btn-primary">edit</a>
        <form style="display: inline-block" action="{{route('posts.destroy',$post['id'])}}" method="POST">
           @csrf @method('DELETE')
      <button type="submit" class="btn btn-danger" id="delete" onClick="return confirm('are you sure??')">delete</button>
    </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<ul class="pagination">{{ $posts->links() }}</ul>

@endsection
