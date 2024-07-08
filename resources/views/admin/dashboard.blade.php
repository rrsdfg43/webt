@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
@stop

@section('content')

<div class="container">
  
      <div class="row pt-4">
        <div class="col-md-3">
          <i class="fa fa-plus shadow-lg p-3 mb-5 bg-white rounded fa-2x" aria-hidden="true"></i>
        </div>
        <div class="col-md-3">
          <i class="fa fa-pencil shadow-lg p-3 mb-5 bg-white rounded fa-2x" aria-hidden="true"></i>
        </div>
        <div class="col-md-3">
          <a href="{{ route('admin.home') }}">
          <i class="fa fa-table shadow-lg p-3 mb-5 bg-white rounded fa-2x" aria-hidden="true"></i>
          </a>
        </div>
        <div class="col-md-3">
          <i class="fa fa-user shadow-lg p-3 mb-5 bg-white rounded fa-2x" aria-hidden="true"></i>
        </div>
      </div>



      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Title</h5>
          <p class="card-text">Content</p>
        </div>
      </div>

    
  </div>

@endsection