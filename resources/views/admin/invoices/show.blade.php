@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Invoice #{{ $invoice->invoice_number }}</h1>
        <p><strong>User:</strong> {{ $invoice->user->name }}</p>
        <p><strong>Address:</strong> {{ $invoice->address }}</p>
        <p><strong>Postal Code:</strong> {{ $invoice->postal_code }}</p>
        <p><strong>Total Price:</strong> Rp {{ number_format($invoice->total_price, 2) }}</p>

        <h3>Order Details</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice->details as $detail)
                    <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>Rp {{ number_format($detail->subtotal, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('admin.invoices.index') }}" class="btn btn-primary">Back to Invoices</a>
    </div>
@endsection
