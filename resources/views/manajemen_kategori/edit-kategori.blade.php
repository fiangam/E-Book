@extends('layouts.master')

@section('konten')
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Typography </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">UI Elements</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Typography</li>
                </ol>
              </nav>
            </div>
            <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h1 class="card-title">Edit Kategori</h1>
                    <p class="card-description"> Masukkan Value Di Bawah </p>
                    <form class="forms-sample" method="POST" action="{{ route('kategoris.update', $kategori->id) }}">
                        @method('PUT')
                            @csrf

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <div class="alert-title"><h4>Whoops!</h4></div>
                            There are some problems with your input.
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div> 
                        @endif

                        @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                    <div class="form-group">
                        <label for="name" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $kategori->name) }}"  placeholder="Name">
                    </div>

                      <button type="submit" class="btn btn-inverse-success mr-2">Submit</button>
                      <a href="{{ route('kategori-management') }}" class="btn btn-inverse-dark">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>

@endsection