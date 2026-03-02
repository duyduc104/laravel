@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                    <div class="card-header bg-dark text-white d-flex align-items-center">
                        <h5 class="card-title mb-0" style="font-size: 1rem;">
                            <i class="fas fa-filter mr-2"></i> Bộ lọc Danh mục
                        </h5>
                    </div>

                    <div class="list-group list-group-flush" style="max-height: 500px; overflow-y: auto;">
                        <a href="{{ route('product.index') }}"
                            class="list-group-item list-group-item-action text-light border-0 d-flex justify-content-between align-items-center {{ !request('category') ? 'active-filter' : '' }}">
                            <span><i class="fas fa-boxes mr-2"></i> Tất cả sản phẩm</span>
                        </a>

                        @foreach ($categories as $cat)
                            <a href="{{ route('product.index', ['category' => $cat->id]) }}"
                                class="list-group-item list-group-item-action text-light border-0 d-flex justify-content-between align-items-center {{ request('category') == $cat->id ? 'active-filter' : '' }}">
                                <span class="text-truncate mr-2"><i class="far fa-folder mr-2"></i>
                                    {{ $cat->name }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="font-weight-bold text-muted small uppercase">Tiến độ mục tiêu</span>
                            <span class="badge badge-primary">{{ $totalProducts }} / {{ $goal }} sản phẩm</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                                role="progressbar" style="width: {{ $percent }}%"></div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold text-dark m-0">
                        @if (request('category'))
                            Danh mục: <span
                                class="text-primary">{{ $categories->firstWhere('id', request('category'))->name ?? '' }}</span>
                        @else
                            Danh sách Sản phẩm
                        @endif
                    </h3>
                    <a href="{{ route('product.add') }}" class="btn btn-primary shadow px-4 rounded-pill">
                        <i class="fas fa-plus-circle mr-1"></i> Thêm sản phẩm
                    </a>
                </div>

                <div class="card border-0 shadow-sm overflow-hidden">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover m-0 align-middle">
                                <thead class="bg-light text-muted small text-uppercase">
                                    <tr>
                                        <th class="text-center py-3" style="width: 70px;">ID</th>
                                        <th style="width: 100px;">Ảnh</th>
                                        <th>Tên & Danh mục</th>
                                        <th class="text-center">Kho hàng</th>
                                        <th class="text-right">Giá bán</th>
                                        <th class="text-center" style="width: 120px;">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($productsRange as $product)
                                        <tr>
                                            <td class="text-center font-weight-bold text-muted small">{{ $product->id }}
                                            </td>
                                            {{-- <td>
                                                <div class="avatar-wrapper rounded border">
                                                    <img src="{{ asset('uploads/products/' . ($product->image ?? 'default.jpg')) }}"
                                                        class="w-100 h-100" style="object-fit: cover;"
                                                        onerror="this.src='https://via.placeholder.com/150'">
                                                </div>
                                            </td> --}}
                                            <td>
                                                @if ($product->image)
                                                    <img src="{{ asset('uploads/products/' . $product->image) }}"
                                                        alt="img" style="width: 50px; height: auto;"
                                                        class="img-thumbnail">
                                                @else
                                                    <img src="{{ asset('adminLTE/dist/img/default-150x150.png') }}"
                                                        alt="no-img" style="width: 50px;">
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('product.detail', $product->id) }}"
                                                    class="text-dark font-weight-bold d-block mb-1">
                                                    {{ Str::limit($product->name, 50) }}
                                                </a>
                                                <span class="badge badge-soft-primary px-2 py-1">
                                                    <i class="fas fa-tag mr-1"></i> {{ $categories->firstWhere('id', $product->category_id)->name ?? 'N/A' }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                @if ($product->quatity <= 0)
                                                    <span
                                                        class="badge badge-danger-soft text-danger px-3 py-2 rounded-pill">Hết
                                                        hàng</span>
                                                @else
                                                    <div class="font-weight-bold">{{ $product->quatity }}</div>
                                                    <small class="text-muted">Sẵn có</small>
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <div class="text-primary font-weight-bold mb-0">
                                                    {{ number_format($product->price, 0, ',', '.') }}₫
                                                </div>
                                                @if ($product->sale_price > 0)
                                                    <del
                                                        class="text-muted small">{{ number_format($product->sale_price, 0, ',', '.') }}₫</del>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('product.edit', $product->id) }}"
                                                        class="btn btn-sm btn-outline-info border-0 rounded-circle mr-2">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-outline-danger border-0 rounded-circle" onclick="if(confirm('Bạn có chắc muốn xóa sản phẩm này?')) { document.getElementById('delete-form-{{ $product->id }}').submit(); }">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-5 text-muted font-italic">
                                                Không tìm thấy sản phẩm nào trong danh mục này.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-center custom-pagination">
                    {{ $productsRange->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>

    <style>
        .active-filter {
            background-color: #007bff !important;
            color: white !important;
            font-weight: 600;
            box-shadow: 0 4px 6px rgba(0, 123, 255, 0.2);
        }

        .list-group-item {
            transition: all 0.2s ease;
        }

        .list-group-item:hover:not(.active-filter) {
            background-color: #f8f9fa;
            padding-left: 1.5rem;
            color: #007bff;
        }

        .avatar-wrapper {
            width: 60px;
            height: 60px;
            overflow: hidden;
        }

        .badge-soft-primary {
            background-color: #e7f1ff;
            color: #007bff;
        }

        .badge-danger-soft {
            background-color: #fff5f5;
            border: 1px solid #feb2b2;
        }

        /* Tùy chỉnh thanh cuộn cho danh mục bên trái */
        .list-group::-webkit-scrollbar {
            width: 4px;
        }

        .list-group::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .list-group::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 10px;
        }
    </style>
@endsection
