@extends('user.layouts.app')

@section('title', 'Katalog Produk')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Katalog Produk</h2>

    <form method="GET" action="{{ route('user.catalog.filter') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <select name="category_id" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ isset($categoryId) && $categoryId == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    <div class="row">
        @forelse($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                @else
                    <img src="{{ asset('placeholder.png') }}" class="card-img-top" alt="Placeholder" style="height: 200px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">Rp. {{ number_format($product->price) }}</p>
                    <p class="card-text">Stok: {{ $product->stock }}</p>

                    @if($product->stock > 0)
                        <form method="POST" action="{{ route('user.cart.add', $product->id) }}">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="number" name="quantity" class="form-control" min="1" max="{{ $product->stock }}" value="1" required>
                                <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                            </div>
                        </form>
                    @else
                        <button class="btn btn-secondary w-100" disabled>Out of Stock</button>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-warning">Tidak ada produk yang tersedia.</div>
        @endforelse
    </div>
</div>
@endsection
