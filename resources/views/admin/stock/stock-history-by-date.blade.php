@extends('layouts.theme')
@section('content')
<div class="card mb-4">
   <div class="card-body">
      <div class="d-flex justify-content-between">
         <div>
            <h4 style="color:black;" class="card-title mb-0">Product Sale By Date</h4>
         </div>
      </div>
      <div class="row m-t-30 mt-5">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <form action="">
            <div class="row">
                <div class="col-md-3">
                    <label style="color: black;" class="control-label mb-1">Select Product</label>
                    <select name="product_id" class="form-control">
                        @foreach($products as $val)
                        <option 
                        @if($val->id == $productid)
                            selected="selected"
                        @endif
                        value="{{ $val->id }}">{{ $val->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label style="color: black;" class="control-label mb-1">From Date</label>
                    <input type="text" value="{{ $fromdate }}" name="fromdate" id="datepicker1" class="form-control">
                </div>
                <div class="col-md-3">
                    <label style="color: black;" class="control-label mb-1">To Date</label>
                    <input type="text" value="{{ $todate }}" name="todate" id="datepicker2" class="form-control">
                </div>
                <div class="col-md-3">
                   <button type="submit" class="btn btn-danger mt-4">Search</button>
                </div>
            </div>
            </form>
            <div class="table-responsive m-b-40">
                <table class="table table-border table-data3">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Specification</th>
                            <th>Stock Qty</th>
                            <th>Stock Value</th>
                            <th>Customer Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="color:black">
                        @foreach($data as $list)
                        <tr>
                            <td>{{ date('d-m-Y', strtotime($list->created_at)) }}</td>
                            <td>{{optional($list->product)->name}}</td>
                            <td>{{ $list->subqty }}</td>
                            <td>{{ $list->subvalue }}</td>
                            <td>{{ $list->customer_name }}</td>
                            <td>
                                <a href="{{url('admin/stock/print/')}}?id={{$list->id}}"><button type="button" class="btn btn-danger">Print</button></a>
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

@section("customscript")
<script>
  $(function() {
    $( "#datepicker1" ).datepicker();
  } );
  $(function() {
    $( "#datepicker2" ).datepicker();
  } );
</script>
@endsection