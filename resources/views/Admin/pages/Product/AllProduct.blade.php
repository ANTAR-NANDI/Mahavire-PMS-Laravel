@extends('Admin.layouts.defaults')
@section('abc')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <!-- /.card -->

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Products</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="product-table" class="table table-striped">
          <thead>
          <tr>
            <th>SKU</th>
            <th>Cost</th>
            <th>Shipping</th>
            <th>Commision</th>
            <th>Profit</th>
            <th>Item Price</th>
            <th>Min Price</th>
            <th>Max Price</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
            @if(session('msg'))
              <div class="alert alert-success">
                {{ session('msg')}}
              </div>

            @endif
            @foreach($products as $d)
            <tr>
              <td>{{ $d->sku }}</td>
              <td>{{ $d->cost }}</td>
              <td>{{ $d->shipping }}</td>
              <td>{{ $d->commision }}</td>
              <td>{{ $d->profit }}</td>
              <td>{{ $d->item_price }}</td>
              <td>{{ $d->min_price }}</td>
              <td>{{ $d->max_price }}</td>
              <td> 
                <a href="{{ URL::to('/admin/edit-product/'.$d->id)}}" class="btn btn-info btn-sm">Edit</a> 
                <a href="{{ URL::to('/admin/delete-product/'.$d->id)}}" class="btn btn-danger btn-sm">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@stop