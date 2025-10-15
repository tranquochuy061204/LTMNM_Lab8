<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Student;
use Illuminate\Http\Request;

class QueryDemoController extends Controller
{
    public function index()
    {
        // 1️⃣ Sản phẩm có giá > 100.000
        $expensiveProducts = Product::where('price', '>', 100000)->get();

        // 2️⃣ Đếm số sản phẩm mỗi danh mục
        $categories = Category::withCount('products')->get();

        // 3️⃣ Sinh viên kèm số lượng môn học đã đăng ký
        $students = Student::withCount('courses')->get();

        return view('queries.index', compact('expensiveProducts', 'categories', 'students'));
    }
}
