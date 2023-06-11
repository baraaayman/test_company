@extends('app')
@section('style')
<style>
    .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
}
/* a {
  text-decoration: none;
  font-size: 22px;
  color: black;
} */
</style>
@endsection
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="card">
    {!! $qrCode !!}
    {{-- <img src=""  style="width:100%" alt="User Image"> --}}
  {{-- <img src="img.jpg" alt="John" style="width:100%"> --}}
  <h1>{{$user->name}}</h1>
  <p class="title">{{$user->type}}</p>
  <p>{{$user->email}}</p>
</div>

{{-- {!! $qrCode !!} --}}
@endsection
