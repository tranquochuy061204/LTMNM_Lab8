@extends('layouts.app')

@section('title', 'Eloquent Query Builder Demo')

@section('content')
    <div class="container my-4">

        <h2 class="text-primary mb-4 text-center">🧮 Eloquent Query Builder – Bài 8</h2>

        {{-- 1️⃣ Sản phẩm có giá > 100.000 --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white fw-bold">
                1️⃣ Sản phẩm có giá > 100.000đ
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Danh mục</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expensiveProducts as $p)
                            <tr>
                                <td>{{ $p->name }}</td>
                                <td>{{ number_format($p->price, 0, ',', '.') }} đ</td>
                                <td>{{ $p->category->name ?? '—' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- 2️⃣ Đếm số sản phẩm mỗi danh mục --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-success text-white fw-bold">
                2️⃣ Số lượng sản phẩm trong từng danh mục
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Danh mục</th>
                            <th>Số sản phẩm</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $c)
                            <tr>
                                <td>{{ $c->name }}</td>
                                <td class="text-center fw-bold">{{ $c->products_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- 3️⃣ Số lượng môn học mỗi sinh viên --}}
        <div class="card shadow-sm">
            <div class="card-header bg-warning fw-bold">
                3️⃣ Sinh viên và số lượng môn học đã đăng ký
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Tên sinh viên</th>
                            <th>Email</th>
                            <th>Số môn học</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $s)
                            <tr>
                                <td>{{ $s->name }}</td>
                                <td>{{ $s->email }}</td>
                                <td class="text-center fw-bold">{{ $s->courses_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
