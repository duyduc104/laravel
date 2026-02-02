<div class="card">
    <div class="card-header border-transparent">
        <h3 class="card-title">Latest Orders</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table m-0">
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
                            <td class="text-center text-muted">{{ $product->id }}</td>
                            <td>
                                <a href="{{ route('product.detail', $product->id) }}" class="text-dark fw-bold">
                                    {{ Str::limit($product->name, 50) }}
                                </a>
                            </td>
                            <td class="text-center">
                                @if ($product->quatity <= 0)
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
                                    <a href="{{ route('product.edit', $product->id) }}"
                                        class="btn btn-sm btn-outline-info mr-2 rounded-pill">
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
        <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        <div class="mt-4">
            {{ $productsRange->links() }}
        </div>
    </div>
    <!-- /.card-footer -->
</div>
