@extends('Admin.layouts.defaults')
@section('abc')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!-- /.card -->

  <div class="card">
    <div class="card-header">
      <div class="row">

        <div class="col-md-4">
          <h3 class="card-title">Total Amazon Sales</h3>
        </div>
        <div class="col-md-4"></div>

      </div>

      <!-- /.card-header -->
      <div class="card-body">
        <table id="product-table" class="table table-striped">
          <thead>
            <tr>
              <th>Sl</th>
              <th>Sku</th>
              <th>Title</th>
              <th>Quantity</th>
              <th>Vendor</th>
              <th>Brand</th>
              <th>Smart-type</th>
              <th>Total Order</th>
              <th>Unit Sold</th>
              <th>Payment</th>
              <th>Item-Price</th>
              <th>Revenue</th>
              <th>Comission</th>
              <th>Tax</th>
              <th>Discount</th>
              <th>Shipping Cost</th>
              <th>Shipping Cost</th>
              <th>Item Cost</th>
              <th>Profit</th>
              <th>Margin-Percentage</th>



            </tr>
          </thead>
          <tbody>
            @if(session('msg'))
            <div class="alert alert-success">
              {{ session('msg')}}
            </div>

            @endif
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>{{ $TotalUnitsSold }}</td>
              <td></td>
              <td></td>

              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>{{ $TotalItemCost }}</td>
              <td></td>
              <td></td>
            </tr>
            @foreach($amazons as $d)
            <tr>
              <td>{{ $d->id }}</td>
              <td>{{ $d->Sku }}</td>
              <td>{{ $d->Title }}</td>
              <td>{{ $d->QuantityinStock }}</td>
              <td>{{ $d->Vendor }}</td>
              <td>{{ $d->Brand }}</td>
              <td>{{ $d->SmartType }}</td>
              <td>{{ $d->TotalOrders }}</td>
              <td>{{ $d->UnitsSold }}</td>
              <td>{{ $d->Payment }}</td>
              <td>{{ $d->ItemPrice }}</td>
              <td>{{ $d->Revenue }}</td>
              <td>{{ $d->Commission }}</td>
              <td>{{ $d->Tax }}</td>
              <td>{{ $d->Discount }}</td>
              <td>{{ $d->ShippingPrice }}</td>
              <td>{{ $d->ShippingCost }}</td>
              <td>{{ $d->ItemCost }}</td>
              <td>{{ $d->Profit }}</td>
              <td>{{ $d->MarginPercentage }}</td>
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