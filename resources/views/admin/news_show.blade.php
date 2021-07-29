@extends('admin.master_admin')
@section('title')
{{ $post->title }}
@endsection
@section('content')
<section class="mt-dashboard">
    <div class="container">
        <div class="mb-4"><a href="{{ route('dashboard.edit', $post->id) }}" class="btn base-btn" role="button">Edit News</a></div>
        <div class="col-md-7">
            <div class="mb-3">
                <h2>{{ $post->title }}</h2>
            </div><img class="rounded img-fluid mb-3 w-100" src="{{ asset('storage/'. $post->image) }}">
            <div class="d-flex align-items-center mb-3">
                <span class="base-category me-2">{{ $post->category->title }}</span>
                <span class="base-date">{{ $post->created_at->format('d M Y') }}</span></div>
            <div>
                {!! $post->body !!}
            </div>

            <div class="mt-3">
                @foreach ($post->tags as $tag)
                    <div class="mb-3 d-inline-block">
                        <span class="base-category me-2">#{{ $tag->title }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
