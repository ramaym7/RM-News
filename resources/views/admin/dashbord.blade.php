@extends('admin.master_admin')
@section('title')
Dashboard
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

        @if ($categories->count()==0)
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div><span class="title-sm">Kategori Tidak ada...</span><span class="title-md">Tambahkan kategori terlebih dahulu</span></div>
            <a href="{{ route('category') }}" class="btn base-btn" role="button">Create Category</a>
        </div>
        @else
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div><span class="title-sm">All data for</span><span class="title-md">News</span></div>
            <a href="{{ route('dashboard.create') }}" class="btn base-btn" role="button">Create News</a>
        </div>
        @endif


        @if ($posts->count()==0)
        <div class="alert alert-warning text-center " role="alert">
            Tidak ada data, silahkan tambah data berita...
          </div>
        @else

        <div class="card shadow-md">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th class="td-img">Image</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td class="td-img"><img class="img-tbl" src="{{ asset('storage/'. $post->image) }}"></td>
                                <td>{{ Str::limit($post->title, 50) }}</td>
                                <td>{{ $post->category->title }}</td>
                                <td>
                                    <a href="{{route('dashboard.destroy', $post->id)}}" class="btn text-danger" role="button">Delete</a>
                                    <a href="{{ route('dashboard.show', $post->id) }}" class="btn base-btn" role="button">Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- Paginate --}}
        <div class="mt-3 d-flex justify-content-end">
            {{ $posts->links() }}
        </div>
        @endif

    </div>
</section>
@endsection
