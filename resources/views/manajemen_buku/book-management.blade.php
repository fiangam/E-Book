@extends('layouts.master')

@section('konten')

<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><i class="fa-solid fa-table"></i> Book List</h4>
                    @if (session('success'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>                
                    @endif

                    @if (session('error'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>                    
                    @endif

                    <p>
                        <a class="btn btn-outline-primary mt-2" href="{{ route('ebooks.create') }}"><i class="fa-solid fa-plus"></i> New Book</a>                    
                    </p>
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>File E-Book</th>
                            <th>Tanggal Terbit</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($ebooks as $ebook)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ebook->judul }}</td>
                            <td>{{ ($ebook->kategori_name != null) ? $ebook->kategori_name : '' }}</td>
                            <td><a class="nav-link link-dark" href="{{ asset('uploads/' .  $ebook->file_ebook) }}">{{ $ebook->file_ebook }}</a></td>
                            <td>{{ $ebook->tanggal_terbit }}</td>
                            <td>
                            <a href="#" class="btn btn-sm btn-inverse-danger" onclick="
                                    event.preventDefault();
                                    if (confirm('Do you want to remove this?')) {
                                    document.getElementById('delete-row-{{ $ebook->id }}').submit();
                                    }">
                                delete
                            </a>
                            <form id="delete-row-{{ $ebook->id }}" action="{{ route('ebooks.destroy', ['id' => $ebook->id]) }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                            </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                            <td colspan="8">
                                No record found!
                            </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>

@endsection