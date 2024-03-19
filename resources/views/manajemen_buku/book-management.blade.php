@extends('layouts.master')

@section('konten')

<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><i class="fa-solid fa-table"></i> Book List</h4>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <p>
                        <a class="btn btn-outline-primary mt-2" href="{{ route('add-book') }}"><i class="fa-solid fa-plus"></i> New Book</a>                    </p>
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal Terbit</th>
                            <th>File E-Book</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($ebooks as $ebook)
                            <tr>
                            <td>{{ $ebook->judul }}</td>
                            <td>{{ ($ebook->kategori_name != null) ? $ebook->kategori_name : '' }}</td>
                            <td>{{ $ebook->tanggal_terbit }}</td>
                            <td>{{ $ebook->file_ebook }}</td>
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