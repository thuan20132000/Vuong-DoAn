@extends('admin.layouts.master')
@section('title')
    Thêm sản phẩm
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Product</h6>
        </div>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
                </div>
                @endif
                @if (session('loi'))
                <div class="alert alert-danger">
                    {{session('loi')}}
                </div>
                @endif
            @if (session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
        <div class="row" style="margin: 5px">
            <div class="col-lg-12">

                <form role="form" action="admin/product/add" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control idCategory" name="idCategory">
                            <option selected disabled>Chọn danh mục</option>
                            @foreach ($category as $ct)
                            <option value="{{$ct->id}}">{{$ct->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product Type</label>
                        <select class="form-control idProductType" name="idProductType">
                            <option selected disabled>Chọn loại sản phẩm</option>
                            @foreach ($producttype as $pt)
                            <option value="{{$pt->id}}">{{$pt->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <fieldset class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                    </fieldset>
                    <div class="form-group">
                        <label for="quantity">Số lượng</label>
                        <input type="number" name="quantity" min="1" value="1" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Đơn giá</label>
                        <input type="text" name="price" placeholder="Nhập đơn giá" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Giá khuyến mãi</label>
                        <input type="text" name="promotional" value="0" placeholder="Nhập giá khuyến mãi nếu có" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">Ảnh minh họa</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Mô tả sản phẩm</label>
                        <textarea name="description" id="demo" class="form-control" cols="5" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Chi tiết sản phẩm</label>
                        <textarea name="detail" id="demo" class="form-control" cols="5" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Bảo hành</label>
                        <input type="text" name="warranty" placeholder="Nhập thời gian bảo hành" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1">Hiển thị</option>
                            <option value="0">Không hiển thị</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-primary">Làm mới</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
