@extends('admin.master_admin')
@section('title')
Dashboard
@endsection

@section('content')
<section class="mt-dashboard">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div><span class="title-sm">All data for</span><span class="title-md">News</span></div>
            <a href="{{ route('dashboard.create') }}" class="btn base-btn" role="button">Create News</a>
        </div>
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
    </div>
</section>
@endsection
