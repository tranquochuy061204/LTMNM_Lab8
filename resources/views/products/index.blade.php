@extends('layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">📦 Danh sách sản phẩm</h2>
            <a href="{{ route('products.create') }}" class="btn btn-success shadow-sm">
                <i class="fa fa-plus-circle me-1"></i> Thêm sản phẩm
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-lg rounded-4 border-0">
            <div class="card-body p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-primary text-center">
                        <tr>
                            <th style="width: 30%">Tên sản phẩm</th>
                            <th style="width: 20%">Giá</th>
                            <th style="width: 25%">Danh mục</th>
                            <th style="width: 25%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $p)
                            <tr>
                                <td class="fw-semibold">{{ ucfirst($p->name) }}</td>
                                <td>{{ number_format($p->price, 0, ',', '.') }} đ</td>
                                <td>{{ $p->category->name ?? '—' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('products.edit', $p->id) }}" class="btn btn-sm btn-warning me-1">
                                        <i class="fa fa-edit"></i> Sửa
                                    </a>
                                    <form action="{{ route('products.destroy', $p->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')"
                                            class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i> Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-between align-items-center p-3">
                    <div>
                        {{ $products->links('pagination::bootstrap-5') }}
                    </div>
                    <small class="text-muted">
                        Hiển thị {{ $products->firstItem() }}–{{ $products->lastItem() }} trong {{ $products->total() }}
                        sản phẩm
                    </small>
                </div>
            </div>
        </div>
    </div>
@endsection
