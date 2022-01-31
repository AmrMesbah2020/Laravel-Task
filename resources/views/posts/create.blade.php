@extends('layouts.app')


@section('title')create new post @endsection

@section('content')
<h1>Create Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label" >Post Creator</label>
                <select class="form-control" name="post_creator">
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                </select>
            </div>


            <div class="row mb-3">
                <label for="photo" class="col-md-4 col-form-label text-md-end">Upload image</label>

                <div class="col-md-6">
                    <input id="photo" type="file" class="form-control" name="photo">
                </div>
            </div>


            <button class="btn btn-success">Create Post</button>
        </form>

@endsection
