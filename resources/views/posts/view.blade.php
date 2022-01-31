@extends('layouts.app')

@section('title')view post @endsection

@section('content')
<div class="card mb-3">
    @if ($post->photo)
    <img src="/opt/lampp/htdocs/example-app/storage/app/{{$post->photo}}" class="card-img-top" >
    @endif
  <div class="card-header">
    Post info
  </div>
  <div class="card-body">

    <h5 class="card-title"><small>title:- </small>{{$post->title}}</h5>
    <h3><small>Description :- </small>{{$post['description']}} </h3>
    <p class="card-text"><small> created at : </small>{{ \Carbon\Carbon::parse($post['created_at'])->format('d-M-Y') }}</p>
  </div>
</div>

<div class="card">
  <div class="card-header">
    post creator info
  </div>
  <div class="card-body">
    <h5 class="card-title"><small>name : </small>{{$post->user->name}}</h5>
    <h5 class="card-title"><small>email :- </small>{{$post->user->email}}</h5>
    <p class="card-text"><small>ID : </small>{{$post->user->id}}</p>
  </div>
</div>

@endsection
