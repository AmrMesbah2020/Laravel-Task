@extends('layouts.app')

@section('title')view post @endsection

@section('content')
<div class="card mb-3">
  <div class="card-header">
    Post info
  </div>
  <div class="card-body">
    <h5 class="card-title">title:- Special title treatment</h5>
    <h3>Description :-</h3>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
  </div>
</div>

<div class="card">
  <div class="card-header">
    post creator info
  </div>
  <div class="card-body">
    <h5 class="card-title">name :- Ahmed</h5>
    <h5 class="card-title">email :- Ahmed</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
  </div>
</div>

@endsection