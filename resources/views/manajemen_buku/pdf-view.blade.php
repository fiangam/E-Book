@extends('layouts.master')

@section('konten')
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> PDF Reader </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tabel Buku</a></li>
                  <li class="breadcrumb-item active" aria-current="page">PDF Reader</li>
                </ol>
              </nav>
            </div>
            <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body d-flex justify-content-center align-items-center">
                    <iframe src="{{ asset('uploads/' . $ebook->file_ebook) }}" width="950" height="600" frameborder="0" scrolling="yes"></iframe>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection