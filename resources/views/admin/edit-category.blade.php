@extends('layouts.theme')
@section('content')
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
        <h3 style="color:black;">Category Edit</h3>
        <div>
            <a href="{{ route('indexCategory') }}"><button class="btn btn-danger">Back</button></a>
        </div>
    </div>
    <div class="card-body">
    <div class="example">
        <form method="post" action="{{ route('updateCategory') }}">
            @csrf
            <div class="mb-3 col-6">
                <label for="exampleInputEmail1" class="form-label" style="color:black;">Edit Category</label>
                <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @if($errors->has('category_name'))
                    <span class="text-danger ">{{ $errors->first('category_name') }}</span>
                @endif
            </div>
            <input type="hidden" name="id" value="{{ $category->id }}">
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </form>
    </div>
    </div>
</div>

@endsection
