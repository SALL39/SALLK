@extends('layouts.theme')
@section('content')
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
        <h3 style="color:black;">Sub Category Edit</h3>
        <div>
            <a href="{{ route('indexSubCategory') }}"><button class="btn btn-danger">Back</button></a>
        </div>
    </div>
    <div class="card-body">
    <div class="example">
        <form method="post" action="{{ route('updateSubCategory') }}">
            @csrf
              <div class="mb-3 col-6">
                        <label for="category_name" class="control-label mb-1" style="color:black;">Select Category</label>
                        <select id="category_id" class="form-control" name="category_id">
                            @foreach($category as $val)
                            <option value="{{ $val->id }}"
                            @if($val->id == $subcategory->category_id)
                                selected="selected"
                            @endif
                            >
                                {{ $val->category_name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category_id'))
                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                        @endif
                    </div>
            <div class="mb-3 col-6">
                <label for="exampleInputEmail1" class="form-label" style="color:black;">Sub Category Name</label>
                <input type="text" name="sub_category_name" value="{{ $subcategory->sub_category_name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @if($errors->has('sub_category_name'))
                    <span class="text-danger ">{{ $errors->first('sub_category_name') }}</span>
                @endif
            </div>
            <input type="hidden" name="id" value="{{ $subcategory->id }}">
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </form>
    </div>
    </div>
</div>

@endsection
