@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Chỉnh sửa danh mục: {{ $category->name }}</h3>
            </div>
            
            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tên danh mục <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                               value="{{ old('name', $category->name) }}">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="parent_id">Danh mục cha</label>
                        <select name="parent_id" class="form-control">
                            <option value="">-- Chọn danh mục cha --</option>
                            @foreach($parentCategories as $parent)
                                <option value="{{ $parent->id }}" {{ $category->parent_id == $parent->id ? 'selected' : '' }}>
                                    {{ $parent->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $category->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Hình ảnh hiện tại</label>
                        <div class="mb-2">
                            @if($category->image)
                                <img src="{{ asset('uploads/categories/' . $category->image) }}" width="100">
                            @else
                                <p class="text-muted">Chưa có ảnh</p>
                            @endif
                        </div>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="image">
                            <label class="custom-file-label" for="image">Thay đổi ảnh mới (nếu muốn)</label>
                        </div>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" id="is_active" 
                               {{ $category->is_active ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Hiển thị danh mục</label>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Cập nhật</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection