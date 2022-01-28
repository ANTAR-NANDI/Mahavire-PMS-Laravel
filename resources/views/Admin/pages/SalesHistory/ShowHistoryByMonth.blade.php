@extends('Admin.layouts.defaults')
@section('abc')

<div class="content-wrapper">
  <!-- /.card -->

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Sales History</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form method="post" action="{{ URL::to('admin/post-sale-history-by-month')}}">
      @csrf
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Select Year</label>
              <select name="year" class="form-control select2" style="width: 100%;">
                <option value="">--Select Year--</option>
                @foreach($years as $d)
                  <option value="{{$d->year}}">{{ $d->year }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
                <label>Select Month</label>
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
          </div>
          <div class="col-md-4 show-button">
            <button type="submit" class="btn btn-primary">Show</button>
          </div>
        </div>
        <!-- /.card-body -->
      </form>

      @if(count($sales) >0)
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Category Name</th>
          <th>Year</th>
          <th>Month</th>
          <th>Price</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
          @foreach($sales as $d)
          <tr>
            <td>{{ $d->name}}</td>
            <td>{{ $year}}</td>
            <td>{{ ucfirst(trans($month))}}</td>
            <td>{{ $d->$month }}</td>
            <td> 
              <a href="{{ URL::to('/admin/edit-sales-info'.'/'.$d->id .'/'.$year.'/'.$month)}}" class="btn btn-info btn-sm">Edit</a> 
              <a href="{{ URL::to('/admin/delete-sale-history'.'/'.$d->id .'/' . $year.'/'.$month)}}" class="btn btn-danger btn-sm">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
@stop