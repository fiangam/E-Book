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
                        <a class="btn btn-outline-primary mt-2" href="{{ route('input-kategori') }}"><i class="fa-solid fa-plus"></i> New Kategori</a>
                    </p>
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($kategoris as $kategori)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kategori->name }}</td>
                            <td>
                            <a href="{{ route('kategoris.edit', ['id' => $kategori->id]) }}" class="btn btn-secondary btn-sm">edit</a>
                            <a href="#" class="btn btn-sm btn-inverse-danger" onclick="
                                    event.preventDefault();
                                    if (confirm('Do you want to remove this?')) {
                                    document.getElementById('delete-row-{{ $kategori->id }}').submit();
                                    }">
                                delete
                            </a>
                            <form id="delete-row-{{ $kategori->id }}" action="{{ route('kategoris.destroy', ['id' => $kategori->id]) }}" method="POST">
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