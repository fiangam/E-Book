@extends('layouts.master')

@section('konten')

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h1 class="card-title">Tambahkan Buku Baru</h1>
                    <p class="card-description"> Masukkan Value Di Bawah </p>
                    <form class="forms-sample" method="POST" action="{{ route('create-manajemen') }}" enctype="multipart/form-data">
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
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" value="{{ old('judul') }}" placeholder="judul">
                    </div>

                    <div class="form-group">
                    <label class="form-label">Kategori</label>
                        <select name="id_kategori" class="form-control form-control-lg">
                        <option value="">-- kategori --</option>
                            @foreach ($kategoris as $kategoriID => $name)
                            <option value="{{ $kategoriID }}" 
                                @selected(old('id_kategori')==$kategoriID)>
                                {{ $name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label class="form-label">Tanggal Terbit</label>
                        <input type="date" class="form-control" name="tanggal_terbit" value="{{ old('tanggal_terbit') }}"  placeholder="Tanggal Buku">
                    </div>
                    <div class="form-group col-md-5">
                        <label class="form-label">File E-Book</label>
                        <input type="file" class="form-control" name="file_ebook" value="{{ old('file_ebook') }}"  placeholder="File Ebook">
                    </div>
                      <button type="submit" class="btn btn-inverse-success mr-2">Submit</button>
                      <a href="{{ route('book-management') }}" class="btn btn-inverse-dark">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>

@endsection