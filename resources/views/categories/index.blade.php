@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách danh mục</h3>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="icon fas fa-check"></i>
                            {{ session('success') }}
                            <button type="button" class="close btn btn-dark text-white" data-dismiss="alert"
                                aria-label="Close" style="opacity: 1; padding: 5px 10px;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card-tools">
                        <form action="{{ route('categories.index') }}" method="GET" class="input-group input-group-sm"
                            style="width: 200px;">
                            <input type="text" name="search" class="form-control float-right"
                                placeholder="Tìm tên danh mục..." value="{{ request('search') }}">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Hình ảnh</th>
                                <th>Tên danh mục</th>
                                <th>Mô tả</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>
                                        @if ($category->image)
                                            <img src="{{ asset('uploads/categories/' . $category->image) }}" alt="img"
                                                style="width: 50px; height: auto;" class="img-thumbnail">
                                        @else
                                            <img src="{{ asset('adminLTE/dist/img/default-150x150.png') }}" alt="no-img"
                                                style="width: 50px;">
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $category->name }}</strong>
                                        @if ($category->parent_id)
                                            <br><small class="text-muted">(Con của ID: {{ $category->parent_id }})</small>
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($category->description, 30) }}</td>
                                    <td>
                                        @if ($category->is_active)
                                            <span class="badge badge-success">Hoạt động</span>
                                        @else
                                            <span class="badge badge-danger">Tạm khóa</span>
                                        @endif
                                    </td>
                                    <td>{{ $category->created_at->format('d/m/Y') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                            class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Không có dữ liệu danh mục.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="mt-4">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
