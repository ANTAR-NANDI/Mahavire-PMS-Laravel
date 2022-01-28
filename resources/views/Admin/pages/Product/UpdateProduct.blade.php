@extends('Admin.layouts.defaults')
@section('abc')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Update Product -- <strong>{{$editproduct->sku}}</strong></h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="post" action="{{ URL::to('update-product/'.$editproduct->id)}}">
      @csrf
        <div class="row">
          <div class="col-md-4">
            <div class="card-body">
              <div class="form-group">
                <label for="Sku">SKU<span class="required-star">*</span></label>
                <input type="text" name="sku" value="{{$editproduct->sku}}" class="form-control" placeholder="Enter Name">
              </div>

              <div class="form-group">
                <label for="Amount">Title<span class="required-star">*</span></label>
                <input type="text" name="title" value="{{$editproduct->title}}"  class="form-control" placeholder="Enter Title">
              </div>
              
              <div class="form-group">
                <label for="Cost">Product Cost<span class="required-star">*</span></label>
                <input type="number" name="cost" value="{{$editproduct->cost}}"  class="form-control" placeholder="Enter Cost">
              </div>

              <div class="form-group">
                <label for="Shipping">Product Shipping<span class="required-star">*</span></label>
                <input type="number" name="shipping" value="{{$editproduct->shipping}}"  class="form-control" placeholder="Enter Shipping">
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-body">

              <div class="form-group">
                <label for="Commision">Product Comission<span class="required-star">*</span></label>
                <input type="number" name="commision" value="{{$editproduct->commision}}" class="form-control" placeholder="Enter commision">
              </div>

              <div class="form-group">
                <label for="Product Profit">Product Profit<span class="required-star">*</span></label>
                <input type="number" name="profit" value="{{$editproduct->profit}}" class="form-control" placeholder="Enter Profit">
              </div>

              <div class="form-group">
                <label for="Max Price">Max Price<span class="required-star">*</span></label>
                <input type="number" name="max_price" value="{{$editproduct->max_price}}" class="form-control" placeholder="Enter Max Price">
              </div>
              <div class="save-button">
                <button type="submit" class="btn btn-primary">Update Product</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->

        
      </form>
    </div>
    <!-- /.content -->
  </div>







@stop