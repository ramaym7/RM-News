@extends('admin.master_admin')
@section('title')
Edit News
@endsection

@section('content')
<div class="container mt-dashboard">
    @if ($errors->any())
    <div class="alert alert-danger mb-3">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('dashboard.update', $post->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <textarea class="form-control" id="editor" rows="30" name="body">{!! $post->body !!}</textarea>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label">Title News</label>
                    <input class="form-control" type="text" name="title" value="{{$post->title}}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Category News</label>
                    <select class="form-control" name="category_id" required>
                        <option selected disabled value="{{ $post->category_id }}">{{ $post->category->title }}</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Image News</label>
                    <input class="form-control" type="file" accept="image/*" name="image">
                </div>
                <div class="mb-3">
                    <button class="btn base-btn" type="submit">Create</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
