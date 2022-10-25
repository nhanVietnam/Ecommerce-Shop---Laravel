@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Product Stock List: <span
                                    class="badge badge-pill badge-danger">{{ count($products) }}</span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name Vn</th>
                                            <th>Product Price</th>
                                            <th>Quantity</th>
                                            <th>Discount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($product->product_thumbnail) }}"
                                                        style="width:60px; height:50px" alt="">
                                                </td>
                                                <td>{{ $product->product_name_vn }}</td>
                                                <td>{{ str_replace(',', '.', number_format($product->selling_price)) }}đ
                                                </td>
                                                <td>
                                                    @if ($product->product_quantity != 0)
                                                        {{ $product->product_quantity }}
                                                    @else
                                                        <span
                                                            class="badge badge-pill badge-danger">{{ $product->product_quantity }}</span>
                                                    @endif

                                                </td>
                                                <td>
                                                    @if (!isset($product->discount_price) || $product->discount_price == 0)
                                                        <span class="badge badge-pill badge-success">No Discount</span>
                                                    @else
                                                        @php
                                                            $amount = $product->selling_price - $product->discount_price;
                                                            $discount = ($amount / $product->selling_price) * 100;
                                                        @endphp
                                                        <span
                                                            class="badge badge-pill badge-success">{{ round($discount) }}
                                                            %</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($product->status == 1)
                                                        <span class="badge badge-pill badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-success">Inactive</span>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
