@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Invoices</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Invoice Number</th>
                    <th>User</th>
                    <th>Total Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoices as $invoice)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $invoice->invoice_number }}</td>
                        <td>{{ $invoice->user->name }}</td>
                        <td>Rp {{ number_format($invoice->total_price, 2) }}</td>
                        <td>
                            <a href="{{ route('admin.invoices.show', $invoice->id) }}" class="btn btn-info btn-sm">View</a>
                            <form action="{{ route('admin.invoices.destroy', $invoice->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $invoices->links() }}
    </div>
@endsection
