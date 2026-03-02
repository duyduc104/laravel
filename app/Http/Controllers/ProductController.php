<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Http\Middleware\checkTimeAccess;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller implements HasMiddleware
{
    // add các middleware cho controller
    public static function middleware(): array
    {
        return [
            checkTimeAccess::class,
        ];
    }
    public function indexadmin(Request $request)
    {
        // Sử dụng request()->has() để kiểm tra sự tồn tại của tham số
        $categoryId = $request->query('category');

        // Luôn bắt đầu với query cơ bản
        $query = Product::where('is_delete', 0);

        // CHỈ lọc nếu $categoryId có giá trị thực (không null, không rỗng)
        if ($request->filled('category')) {
            $query->where('category_id', $categoryId);
        }

        // Phân trang đồng thời giữ lại các tham số trên URL
        $productsRange = $query->orderBy('id', 'desc')->paginate(10);

        // Thống kê mục tiêu
        $totalProducts = Product::where('is_delete', 0)->count();
        $goal = 500;
        $percent = $goal > 0 ? ($totalProducts / $goal) * 100 : 0;

        // Lấy danh sách danh mục để hiển thị ở sidebar
        $categories = Category::where('is_delete', 0)->get();

        return view('product.index', compact(
            'productsRange',
            'totalProducts',
            'goal',
            'percent',
            'categories'
        ));
    }
    public function index()
    {
        $productsRange = Product::paginate(5);
        $products = Product::all();
        $totalProducts = $products->count();
        $goal = 500;
        $percent = ($totalProducts / $goal) * 100;
        $categories = Category::all();
        return view('layouts.admin', compact('productsRange', 'products', 'totalProducts', 'goal', 'percent', 'categories'));
    }
    public function detail($id)
    {
        $product = Product::find($id);
        // $product = collect(Product::all())->firstWhere('id', $id);
        return view('product.detail', compact('product'));
    }
    public function create()
    {
        $title = "Thêm Sản Phẩm Mới";
        // Lấy danh mục để người dùng chọn khi tạo sản phẩm
        $categories = Category::where('is_delete', 0)->get();
        return view('product.add', compact('title', 'categories'));
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id'); // Lưu ID danh mục
        $product->price = $request->input('price');
        $product->sale_price = $request->input('sale_price', 0); // Mặc định 0 nếu không nhập
        $product->quatity = $request->input('quatity'); // Đúng tên cột quatity
        $product->description = $request->input('description');
        $product->is_active = $request->has('is_active') ? 1 : 0;

        // Xử lý upload ảnh nếu có
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $fileName);
            $product->image = $fileName;
        }

        $product->save();
        return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::where('is_delete', 0)->get();
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->sale_price = $request->input('sale_price');
        $product->quatity = $request->input('quatity');
        $product->description = $request->input('description');
        $product->is_active = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $fileName);
            $product->image = $fileName;
        }

        $product->save();
        return redirect()->route('product.index')->with('success', 'Cập nhật thành công');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->is_delete = 1; // Đánh dấu là đã xóa
            $product->save();
            return redirect()->route('product.index')->with('success', 'Xóa sản phẩm thành công');
        }
        return redirect()->route('product.index')->with('error', 'Sản phẩm không tồn tại');
    }
}
