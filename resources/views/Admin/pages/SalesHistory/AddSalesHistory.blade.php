@extends('Admin.layouts.defaults')
@section('abc')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Sales Info</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{ URL::to('admin/store-sales-info')}}">
      @csrf
      <div class="row">
        <div class="col-md-4">
            <div class="card-body">
            @if(Session::has('success'))
              <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
              </div>
            @endif
              <div class="form-group">
                <label>Category Name<span class="required-star">*</span></label>
                <select name="cat_id" class="form-control select2" style="width: 100%;">
                  <option value="">--Enter category--</option>
                  @foreach($categories as $d)
                    <option value="{{$d->id}}">{{ $d->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="Year">Enter Year<span class="required-star">*</span></label>
                <input type="number" name="year" class="form-control" placeholder="Enter Year" min="1900" max="2099" step="1">
              </div>

              <div class="form-group">
                <label>Enter Month</label>
                <select name="month" class="form-control select2" style="width: 100%;">
                  <option value="january" selected="selected">January</option>
                  <option value="february">February</option>
                  <option value="march">March</option>
                  <option value="april">April</option>
                  <option value="may">May</option>
                  <option value="june">June</option>
                  <option value="july">July</option>
                  <option value="august">August</option>
                  <option value="september">September</option>
                  <option value="october">October</option>
                  <option value="november">November</option>
                  <option value="december">December</option>
                </select>
              </div>
              <div class="form-group">
                <label for="Amount">Enter Amount<span class="required-star">*</span></label>
                <input type="number" name="amount" class="form-control" placeholder="Enter Amount" step=".01">
              </div>
              <div class="save-button">
                <button type="submit" class="btn btn-primary">Add Sales Info</button>
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