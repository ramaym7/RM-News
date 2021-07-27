@extends('admin.master_admin')
@section('title')
Create News
@endsection

@section('content')
<div class="container mt-dashboard">
    <form method="POST" action="{{ route('dashboard.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <textarea class="form-control" id="editor" rows="20" name="body"></textarea>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label">Title News</label>
                    <input class="form-control" type="text" name="title" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Category News</label>
                    <select class="form-control" name="category_id" required>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Image News</label>
                    <input class="form-control" type="file" accept="image/*" name="image" required>
                </div>
                <div class="mb-3">
                    <button class="btn base-btn" type="submit">Create</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
