@extends('admin.master_admin')
@section('title')
Category
@endsection

@section('content')
<section class="mt-dashboard">
    <div class="container">
        @if (session()->has('success'))
        <div class="d-flex justify-content-center">
            <div class="alert alert-success alert-dismissible fade show" style="width:400px" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif

        @error('title')
        <div class="d-flex justify-content-center">
            <div class="alert alert-danger alert-dismissible fade show" style="width:400px" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @enderror


        <div class="d-flex justify-content-between align-items-center mb-5">
            <div><span class="title-sm">All data for</span><span class="title-md">Categories</span></div>
            <a id="liveToastBtn" href="#modalCreate" data-bs-toggle="modal" class="btn base-btn" role="button">Create
                Kategori</a>
        </div>
        @if ($categories->count()==0)
        <div class="alert alert-warning text-center " role="alert">
            Tidak ada data, silahkan tambah data kategori...
        </div>
        @else
        <div class="card shadow-md">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $category->title }}</td>
                                <td>
                                    <a href="{{ route('category.destroy', $category->id) }}" class="btn text-danger"
                                        role="button">Delete</a>
                                    <a href="#modalCreate{{ $category->id }}" data-bs-toggle="modal"
                                        class="btn base-btn" role="button">Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Modal Create-->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('category.store') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-body">
                    <label class="form-label">Title Category</label>
                    <input class="form-control" type="text" name="title">
                    <div class="mt-2 text-danger">
                        @error('title')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn base-btn">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>

@foreach ($categories as $category)
<!-- Modal Edit-->
<div class="modal fade" id="modalCreate{{ $category->id }}" tabindex="-1" aria-labelledby="modalCreateLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('category.update',$category->id) }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-body">
                    <label class="form-label">Title Category</label>
                    <input class="form-control" type="text" value="{{ $category->title}}" name="title">
                    <div class="mt-2 text-danger">
                        @error('title')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn base-btn">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
@endsection
