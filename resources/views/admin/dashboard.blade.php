@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <h1 class="mb-4">Dashboard Admin</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-bg-primary mb-3">
                <div class="card-header">Total Produk</div>
                <div class="card-body">
                    <h4 class="card-title">{{ $total_products ?? 0 }} Produk</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-success mb-3">
                <div class="card-header">Total Pengguna</div>
                <div class="card-body">
                    <h4 class="card-title">{{ $total_users ?? 0 }} User</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-warning mb-3">
                <div class="card-header">Total Invoice</div>
                <div class="card-body">
                    <h4 class="card-title">{{ $total_invoices ?? 0 }} Invoice</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.products.index') }}" class="btn btn-primary me-2">Kelola Produk</a>
        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary me-2">Kelola Kategori</a>
        <a href="{{ route('admin.invoices.index') }}" class="btn btn-warning">Kelola Invoice</a>
    </div>
@endsection
