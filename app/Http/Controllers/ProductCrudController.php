<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductCrudController extends Controller
{
    /** Hiển thị danh sách */
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('products.index', compact('products'));
    }

    /** Form thêm sản phẩm */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /** Lưu sản phẩm mới */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công!');
    }

    /** Form sửa sản phẩm */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /** Cập nhật sản phẩm */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    /** Xóa sản phẩm */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Xóa sản phẩm thành công!');
    }
}
