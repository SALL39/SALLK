@extends('layouts.theme')
@section('content')
<div class="card mb-4">
   <div class="card-body">
      <div class="d-flex justify-content-between">
         <div>
            <h4 style="color:black;" class="card-title mb-0">Product Stock History</h4>
         </div>
      </div>
      <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-border table-data3">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Specification</th>
                            <th>Add Stock</th>
                            <th>Add Stock Value</th>
                            <th>Remove Stock</th>
                            <th>Remove Stock Value</th>
                            <th>Customer Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="color:black">
                        @foreach($data as $list)
                        <tr>
                            <td>{{ date('d-m-Y', strtotime($list->created_at)) }}</td>
                            <td>{{optional($list->product)->name}}</td>
                            <td>{{ $list->addqty }}</td>
                            <td>{{ $list->addvalue }}</td>
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
