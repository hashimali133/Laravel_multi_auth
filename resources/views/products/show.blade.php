@extends('products.layout')

@section('content')
<div class="card mt-5">
    <h2 class="card-header">Show Product</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i>
                Back</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No.</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Published Date</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->book_title }}</td>
                    <td>{{ $product->author }}</td>
                    <td>{{ $product->genre }}</td>
                    <td>{{ $product->published_date }}</td>
                    <td>{{ $product->status }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">There are no data.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection