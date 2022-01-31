@extends('layouts.app')


@section('title')edit post @endsection

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="post" action="{{ route('posts.update')}}">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{$post['title']}}">
            </div>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="id" value="{{$post['id']}}" hidden>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" >{{$post['description']}}</textarea>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label" >Post Creator</label>
                <select class="form-control" name="post_creator" value="{{$post['post_creator']}}">
                    <option value="{{$post->user->id}}">{{$post->user->name}}</option>
                </select>
            </div>

            <button class="btn btn-success">Edit</button>
        </form>

@endsection
