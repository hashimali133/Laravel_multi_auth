@extends('products.layout')

@section('content')
    <div class="card mt-5">
        <h2 class="card-header">Add New Book</h2>
        <div class="card-body">

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i>
                    Back</a>
            </div>

            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="inputbook_title" class="form-label"><strong>Book Title:</strong></label>
                    <input type="text" name="book_title" class="form-control @error('book_title') is-invalid @enderror"
                        id="inputbook_title" placeholder="Book Title">
                    @error('book_title')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label"><strong>Author:</strong></label>
                    <input type="text" class="form-control @error('author') is-invalid @enderror" name="author"
                        id="author" placeholder="author">
                    @error('author')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label"><strong>Genre:</strong></label>
                    <input type="text" class="form-control @error('genre') is-invalid @enderror" name="genre"
                        id="genre" placeholder="Genre">
                    @error('genre')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="published_date" class="form-label"><strong>Published Date:</strong></label>
                    <input type="date" class="form-control @error('published_date') is-invalid @enderror"
                        name="published_date" id="published_date" placeholder="Published Date">
                    @error('published_date')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label"><strong>Status:</strong></label>
                    <input type="text" class="form-control @error('status') is-invalid @enderror" name="status"
                        id="status" placeholder="status">
                    @error('status')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Submit</button>
            </form>

        </div>
    </div>
@endsection
