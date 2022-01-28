@extends('Admin.layouts.defaults')
@section('abc')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Sales Info</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{ URL::to('admin/update-sale-history')}}">
      @csrf
      <div class="row">
        <div class="col-md-4">
          <div class="card-body">
            <div class="form-group">
              <label>Category Name</label>
              <select name="cat_id" class="form-control select2" style="width: 100%;" disabled>
                <option value="">--Enter category--</option>
                  <option selected>{{ $sales->name }}</option>
              </select>
            </div>

            <div class="form-group">
              <label for="Year">Year</label>
              <input type="number" name="year" class="form-control" placeholder="Enter Year" min="1900" max="2099" step="1" value="$year" disabled>
            </div>

            <div class="form-group">
              <label>Month</label>
              <select name="month" class="form-control select2" style="width: 100%;" disabled>
                <option value="january" {{$month == 'january' ? 'selected' : ''}}>January</option>
                <option value="february" {{$month == 'february' ? 'selected' :''}}>February</option>
                <option value="march"  {{$month == 'march' ? 'selected' : ''}}>March</option>
                <option value="april"  {{$month == 'april' ? 'selected' : ''}}>April</option>
                <option value="may"  {{$month == 'may' ? 'selected' : ''}}>May</option>
                <option value="june"  {{$month == 'june' ? 'selected' : ''}}>June</option>
                <option value="july"  {{$month == 'july' ? 'selected' : ''}}>July</option>
                <option value="august"  {{$month == 'august' ? 'selected' : ''}}>August</option>
                <option value="september" {{$month == 'september' ? 'selected' : ''}}>September</option>
                <option value="october"  {{$month == 'october' ? 'selected' : ''}}>October</option>
                <option value="november"  {{$month == 'november' ? 'selected' : ''}}>November</option>
                <option value="december"  {{$month == 'december' ? 'selected' : ''}}>December</option>
              </select>
            </div>
            <input type="hidden" name="id" value="{{$sales->id}}">
            <input type="hidden" name="month" value="{{$month}}">
            <input type="hidden" name="year" value="{{$year}}">
            <div class="form-group">
              <label for="Amount">Enter Amount<span class="required-star">*</span></label>
              <input type="number" name="amount" class="form-control" placeholder="Enter Amount" step=".01" value="{{$sales->$month}}">
            </div>
            <div class="save-button">
              <button type="submit" class="btn btn-primary">Edit Sales Info</button>
            </div>
            @if(Session::has('success'))
              <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
              </div>
            @elseif(Session::has('error'))
              <div class="alert alert-danger" role="alert">
                {{Session::get('error')}}
              </div>
            @endif
          </div>

        </div>
      </div>
      <!-- /.card-body -->
    </form>
  </div>
  <!-- /.content -->
</div>

@stop