@extends('Admin.layouts.defaults')
@section('abc')

<div class="content-wrapper">
  <!-- /.card -->

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Sales History Of <b>{{$year ?' - '. $year:''}}</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form method="post" action="{{ URL::to('admin/post-sale-history-by-year')}}">
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
          <div class="col-md-4 show-button">
            <button type="submit" class="btn btn-primary">Show</button>
          </div>
        </div>
        <!-- /.card-body -->
      </form>

      @if(count($sales) >0)
      <table class="table table-striped">
        <thead>
        <tr>
          <th></th>
          <th>Jan</th>
          <th>Feb</th>
          <th>Mar</th>
          <th>Apr</th>
          <th>May</th>
          <th>June</th>
          <th>July</th>
          <th>Aug</th>
          <th>Sept</th>
          <th>Oct</th>
          <th>Nov</th>
          <th>Dec</th>
          <th>Total</th>
        </tr>
        </thead>
        <tbody>
          @foreach($sales as $d)
          <tr>
            <td>{{ $d->name}}</td>
            <td>{{ $d->january ? $d->january : '-' }}</td>
            <td>{{ $d->february ? $d->february : '-' }}</td>
            <td>{{ $d->march ? $d->march : '-' }}</td>
            <td>{{ $d->april ? $d->april : '-' }}</td>
            <td>{{ $d->may ? $d->may : '-' }}</td>
            <td>{{ $d->june ? $d->june : '-' }}</td>
            <td>{{ $d->july ? $d->july : '-' }}</td>
            <td>{{ $d->august ? $d->august : '-' }}</td>
            <td>{{ $d->september ? $d->september : '-' }}</td>
            <td>{{ $d->october ? $d->october : '-' }}</td>
            <td>{{ $d->november ? $d->november : '-' }}</td>
            <td>{{ $d->december ? $d->december : '-' }}</td>
            <td>{{ $d->january + $d->february + $d->march + $d->april + $d->may + $d->june +$d->july + $d->august + $d->september + $d->october + $d->november + $d->december}}</td>
          </tr>
          @endforeach
          <tr>
            <td>Profit</td>
            @foreach($profit as $profit)
            <td>{{$profit}}</td>
            @endforeach
            <td>{{$total_profit}}</td>
          </tr>
        </tbody>
      </table>
      @endif
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
@stop