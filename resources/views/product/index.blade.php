@extends('layouts.admin')

@section('content_real')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-dark m-0">Quản lý Danh Mục Sản Phẩm</h3>
            <a href="{{ route('product.add') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus"></i> Thêm sản phẩm
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover m-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-center" style="width: 80px;">ID</th>
                                <th>Tên sản phẩm</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-right">Giá bán</th>
                                <th class="text-center" style="width: 200px;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productsRange as $product)
                                <tr>
                                    <td class="text-center text-muted">#{{ $product->id }}</td>
                                    <td>
                                        <a href="{{ route('product.detail', $product->id) }}" class="text-dark fw-bold">
                                            {{ Str::limit($product->name, 50) }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        @if($product->quatity <= 0)
                                            <span class="badge badge-danger">Hết hàng</span>
                                        @else
                                            <span class="badge badge-light border">{{ $product->quatity }}</span>
                                        @endif
                                    </td>
                                    <td class="text-right text-primary font-weight-bold">
                                        ${{ number_format($product->price, 2) }}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-outline-info mr-2 rounded-pill">
                                                <i class="fas fa-edit"></i> Sửa
                                            </a>
                                            <button class="btn btn-sm btn-outline-danger rounded-pill">
                                                <i class="fas fa-trash"></i> Xoá
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $productsRange->links() }}
        </div>

        <div class="text-center mt-4">
            <hr class="my-4 opacity-25">
            <a href="{{ route('welcome') }}" class="btn btn-link text-muted text-decoration-none small">
                <i class="fas fa-arrow-left mr-1"></i> Quay lại Trang Chủ
            </a>
        </div>
    </div>
@endsection