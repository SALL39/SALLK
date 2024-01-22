@extends('layouts.theme')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h3 style="color:black;">{{ $type == 1 ? 'Add' : 'Remove' }} Stock</h3>
        </div>
        <div class="card-body">
            <div class="example">
                <form action="{{ route('storeStock') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" value="{{ $type }}">
                    <div class="row pl-3">
                        <div class="mb-3 col-6">
                            <label for="category_id" class="control-label mb-1" style="color:black;">Select Category</label>
                            <select id="category_id" class="form-control" name="category_id"
                            onchange="onChangeCategory(this.value)"
                            >
                                <option value="">Select Cateogry</option>
                                @foreach ($category as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                                <span class="text-danger">{{ $errors->first('category_id') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 col-6">
                            <label for="sub_category_id" class="control-label mb-1" style="color:black;">Select Sub Category</label>
                            <select onchange="onChangeSubCategory(this.value)" id="sub_category_id" class="form-control" name="sub_category_id">
                            </select>
                            @if ($errors->has('sub_category_id'))
                                <span class="text-danger">{{ $errors->first('sub_category_id') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row pl-3">
                        <div class="mb-3 col-6">
                            <label for="category_id" class="control-label mb-1" style="color:black;">Select Specification</label>
                            <select id="product_id" class="form-control" name="product_id">
                                
                            </select>
                            @if ($errors->has('product_id'))
                                <span class="text-danger">{{ $errors->first('category_id') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 col-6">
                            <label for="sub_category_id" class="control-label mb-1" style="color:black;">Enter Stock Qty</label>
                            <input type="text" class="form-control" name="qty">
                            @if ($errors->has('sub_category_id'))
                                <span class="text-danger">{{ $errors->first('sub_category_id') }}</span>
                            @endif
                        </div>
                        @if ($type == 2)
                        <div class="mb-3 col-6">
                            <label for="sub_category_id" class="control-label mb-1" style="color:black;">Enter Customer Name</label>
                            <input type="text" class="form-control" name="customer_name">
                            @if ($errors->has('customer_name'))
                                <span class="text-danger">{{ $errors->first('customer_name') }}</span>
                            @endif
                        </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary ml-3 ml-0">Submit</button>
                </form>
            </div>
        </div>
    </div>

    
@endsection

@section("customscript")
    <script>
        function onChangeCategory(id) {
            $('#sub_category_id').html("");
            $.ajax({
                url: baseurl + "/admin/sub-category-by-category" + "?id=" + id,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    if (res.data && res.data.length > 0) {
                        let html = '<option value="">Select Sub Category</option>'
                        for (const item of res.data) {
                            html += `<option value="${item.id}">${item.sub_category_name}</option>`
                        }
                        $('#sub_category_id').html(html);
                    }
                }
            });
        }

        function onChangeSubCategory(id) {
            $('#product_id').html("");
            $.ajax({
                url: baseurl + "/admin/product-by-sub-category" + "?id=" + id,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    if (res.data && res.data.length > 0) {
                        let html = '<option value="">Select Product</option>'
                        for (const item of res.data) {
                            html += `<option value="${item.id}">${item.name}</option>`
                        }
                        $('#product_id').html(html);
                    }
                }
            });
        }
        
    </script>
@endsection