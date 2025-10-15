@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Sửa sản phẩm</h2>

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Giá</label>
                <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}">
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Tồn kho</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}">
                @error('stock')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Danh mục</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $c)
                        <option value="{{ $c->id }}" {{ $product->category_id == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection
