@extends('layouts.theme')
@section('content')
<div class="card mb-4">
   <div class="card-body">
      <div class="d-flex justify-content-between">
         <div>
            <h4 style="color:black;" class="card-title mb-0">Product Current Stock</h4>
         </div>
      </div>
      <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-border table-data3">
                    <thead>
                        <tr>
                            <th>Specification</th>
                            <th>Current Stock</th>
                            <th>Current Stock Value</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="color:black">
                        @foreach($data as $list)
                        <tr>
                            <td>{{optional($list->product)->name}}</td>
                            <td>{{ $list->current_qty }}</td>
                            <td>{{ $list->current_value }}</td>
                            <td>
                                <a href="{{url('admin/product-stock-history')}}?id={{$list->product_id}}"><button type="button" class="btn btn-danger">View Stock History</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
   </div>
</div>

@endsection
