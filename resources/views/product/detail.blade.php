@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">
        <div class="card border-0 shadow-sm p-4 rounded">
            <div class="mb-4">
                <a href="{{ route('product.index') }}" class="text-muted small">
                    <i class="fas fa-arrow-left mr-1"></i> Quay lại danh sách
                </a>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="main-image mb-3 border rounded overflow-hidden shadow-sm">
                        @php
                            $imageUrl = $product->image
                                ? asset('uploads/products/' . $product->image)
                                : asset('adminLTE/dist/img/default-150x150.png');
                        @endphp
                        <img src="{{ $imageUrl }}" class="w-100 h-100" id="currentImage" style="object-fit: cover;">
                    </div>
                    <div class="d-flex flex-wrap">
                        @for ($i = 0; $i < 4; $i++)
                            <img src="{{ $imageUrl }}" class="img-thumbnail mr-2 mb-2"
                                style="width: 70px; cursor: pointer; opacity: 0.7;">
                        @endfor
                    </div>
                </div>

                <div class="col-md-7 px-md-5">
                    <h2 class="font-weight-bold text-dark mb-1">{{ $product->name }}</h2>
                    <div class="d-flex align-items-center mb-3">
                        <p class="text-muted small mb-0 mr-3">Mã sản phẩm: <strong>#{{ $product->id }}</strong></p>
                        <p class="text-muted small mb-0">Tình trạng:
                            <span class="{{ $product->quatity > 0 ? 'text-success' : 'text-danger' }} font-weight-bold">
                                {{ $product->quatity > 0 ? 'Còn hàng' : 'Hết hàng' }}
                            </span>
                        </p>
                    </div>

                    <div class="price-section py-3 border-top border-bottom my-4 d-flex align-items-center">
                        @if ($product->sale_price > 0)
                            <h3 class="text-danger font-weight-bold mb-0 mr-3">
                                {{ number_format($product->sale_price, 0, ',', '.') }}₫</h3>
                            <del class="text-muted mr-3">{{ number_format($product->price, 0, ',', '.') }}₫</del>
                            @php
                                $discount = round((($product->price - $product->sale_price) / $product->price) * 100);
                            @endphp
                            <span class="badge badge-danger px-2 py-1">-{{ $discount }}%</span>
                        @else
                            <h3 class="text-primary font-weight-bold mb-0">
                                {{ number_format($product->price, 0, ',', '.') }}₫</h3>
                        @endif
                    </div>

                    <div class="attribute-selection mb-4">
                        <p class="font-weight-bold mb-2">Màu sắc:</p>
                        <div class="btn-group-toggle d-flex flex-wrap mb-3">
                            @foreach (['Đen', 'Dark Navy', 'Nâu', 'Be'] as $color)
                                <button
                                    class="btn btn-outline-secondary btn-sm mr-2 mb-2 px-3">{{ $color }}</button>
                            @endforeach
                        </div>

                        <p class="font-weight-bold mb-2">Kích thước:</p>
                        <div class="btn-group-toggle d-flex flex-wrap">
                            @foreach (['S', 'M', 'L', 'XL'] as $size)
                                <button
                                    class="btn btn-outline-secondary btn-sm mr-2 mb-2 px-4">{{ $size }}</button>
                            @endforeach
                        </div>
                    </div>

                    <div class="action-section mt-5 d-flex align-items-center">
                        <div class="input-group mr-3" style="width: 130px;">
                            <div class="input-group-prepend"><button class="btn btn-light border">-</button></div>
                            <input type="text" class="form-control text-center" value="1">
                            <div class="input-group-append"><button class="btn btn-light border">+</button></div>
                        </div>
                        <button class="btn btn-dark btn-lg px-5 shadow-sm font-weight-bold">THÊM VÀO GIỎ HÀNG</button>
                    </div>

                    <div class="description-section mt-5 p-3 bg-light rounded">
                        <h6 class="font-weight-bold"><i class="fas fa-info-circle mr-2"></i> Mô tả sản phẩm:</h6>
                        <p class="text-muted small mb-0">{{ $product->description ?? 'Chưa có mô tả cho sản phẩm này.' }}
                        </p>
                    </div>
                </div>
                @if ($product->quatity > 0)
                    <button class="btn btn-sm btn-block btn-danger shadow-sm rounded-pill font-weight-bold py-2 mt-4"
                        onclick="addToCart({{ $product->id }})">
                        <i class="fas fa-cart-plus mr-1"></i> MUA NGAY
                    </button>
                @else
                    <button class="btn btn-sm btn-block btn-secondary disabled rounded-pill py-2 mt-4"
                        onclick="addToCart({{ $product->id }}) disabled>
                        HẾT HÀNG
                    </button>
                @endif
            </div>
        </div>
    </div>

    <style>
        /* CSS để làm mượt giao diện */
        .main-image {
            height: 550px;
        }

        .main-image img {
            transition: transform 0.3s ease;
        }

        .main-image:hover img {
            transform: scale(1.05);
        }

        .btn-outline-secondary:hover {
            background-color: #343a40;
            color: white;
        }

        .badge-danger {
            font-size: 0.9rem;
            border-radius: 4px;
        }
    </style>
@endsection
