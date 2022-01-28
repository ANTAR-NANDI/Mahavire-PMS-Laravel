@extends('Admin.layouts.defaults')
@section('abc')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Add Product</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="post" action="{{ URL::to('add-product')}}">
        @csrf
        <div class="row">
          <div class="col-md-4">
            <div class="card-body">
              <div class="form-group">
                <label for="Sku">SKU<span class="required-star">*</span></label>
                <input type="text" name="sku" class="form-control" placeholder="Enter Name">
              </div>

              <div class="form-group">
                <label for="title">Title<span class="required-star">*</span></label>
                <input type="text" name="title" class="form-control" placeholder="Enter Title">
              </div>
              
              <div class="form-group">
                <label for="Cost">Product Cost<span class="required-star">*</span></label>
                <input type="number" name="cost"  class="form-control" placeholder="Enter Cost" step=".01">
              </div>

              <div class="form-group">
                <label for="Shipping">Product Shipping<span class="required-star">*</span></label>
                <input type="number" name="shipping" class="form-control" placeholder="Enter Shipping" step=".01">
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-body">
              <div class="form-group">
                <label for="Commision">Product Comission<span class="required-star">*</span></label>
                <input type="number" name="commision" class="form-control" placeholder="Enter Commision" step=".01">
              </div>

              <div class="form-group">
                <label for="Product Profit">Product Profit<span class="required-star">*</span></label>
                <input type="number" name="profit" class="form-control" placeholder="Enter Profit" step=".01">
              </div>

              <div class="form-group">
                <label for="Max Price">Max Price<span class="required-star">*</span></label>
                <input type="number" name="max_price" class="form-control" placeholder="Enter Max Price" step=".01">
              </div>
                  
                  
              <div class="save-button">
                <button type="submit" class="btn btn-primary">Add Product</button>
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