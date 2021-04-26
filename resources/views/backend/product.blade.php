@extends('backend.master')
@section('main')
@section('title','Danh sách sản phẩm')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">Danh sách sản phẩm</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <a href="{{route('products.index')}}" class="btn btn-primary">Thêm sản phẩm</a>
                            <table class="table table-bordered" style="margin-top:20px;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>ID</th>
                                        <th width="30%">Tên Sản phẩm</th>
                                        <th>Giá sản phẩm</th>
                                        <th width="20%">Ảnh sản phẩm</th>
                                        <th>Danh mục</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $pro)
                                    <tr>
                                        <td>{{$pro->id}}</td>
                                        <td>{{$pro->pro_name}}</td>
                                        <td>{{$pro->pro_price}}</td>
                                        <td>
                                            <img width="200px" src="{{$pro->pro_img}}" class="thumbnail">
                                        </td>
                                        <td>{{$pro->cate_pro}}</td>
                                        <td>
                                            <a href="{{route('products.edit',['product'=>$pro->id])}}"
                                                class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>
                                                Sửa</a>
                                            <a href="#" class="btn btn-danger"><i class="fa fa-trash"
                                                    aria-hidden="true"></i> Xóa</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div style="display:flex; justify-content:center">
                        {{$product->links()}}
                    </div>
                </div>

            </div>


        </div>
    </div>
    <!--/.row-->

</div>
<!--/.main-->
@stop