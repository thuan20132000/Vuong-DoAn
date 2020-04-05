<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductType;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList()
    {
        //

        $product = Product::with('productType')->paginate(5);
        return view(('admin.pages.product.list'),['product'=>$product]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdd()
    {
        //
        $category = Category::where('status',1)->get();
        $producttype = ProductType::where('status',1)->get();
        return view('admin.pages.product.add',['category'=>$category,'producttype'=>$producttype]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAdd(Request $request)
    {
        //
        if($request->hasFile('image')){
            $file = $request->image;
            $file_name = $file->getClientOriginalName();
            $file_type = $file->getMimeType();
            $file_size = $file->getSize();
            if($file_type == 'image/png'||$file_type == 'image/jpg'||$file_type == 'image/jpeg'||$file_type == 'image/gif' ){
                if($file_size <= 1048576){
                    $file_name = date('D-m-yyyy').'_'.rand().'_'.utf8tourl($file_name);
                    if($file->move('img/upload/product',$file_name)){
                        $this->validate($request,
                            [
                            'name'=>'required|min:3|max:100|unique:product,name',
                            'description'=>'required|min:3',
                            'quantity'=>'required|numeric',
                            'price'=>'required|numeric',
                            'promotional'=>'numeric',
                        ],
                        [
                            'name.required'=>'Tên loại sản phẩm không được để trống',
                            'name.unique'=>'Tên loại sản phẩm đã bị trùng',
                            'name.min'=>'Tên loại sản phẩm chứa từ 3-100 kí tự',
                            'name.max'=>'Tên loại sản phẩm chứa từ 3-100 kí tự',
                            'description.required'=>'Mô tả không được để trống',
                            'description.min'=>'Mô tả không ít hơn 3 kí tự',
                            'quantity.required'=>'Số lượng không được để trống',
                            'quantity.numeric'=>'Số lượng phải là số',
                            'price.required'=>'Giá không được để trống',
                            'price.numeric'=>'Giá phải là số',
                            'promotional.numeric'=>'Khuyến mãi phải là số',


                            ]);
                            $product = new Product();
                            $product->idProductType = $request->idProductType;
                            $product ->name= $request ->name;
                            $product ->quantity= $request ->quantity;
                            $product ->price= $request ->price;
                            $product ->promotional= $request ->promotional;
                            $product ->description= $request ->description;
                            $product->image = $file_name;
                            $product->detail = $request->detail;
                            $product->warranty = $request->warranty;
                            $product->slug = utf8tourl($request->name);
                            $product->status=$request->status;
                            $product->save();
                            return redirect('admin/product/add')->with('thongbao','Thêm sản phẩm mới thành công');
                    }
                }
                else{
                    return redirect('admin/product/add')->with('loi','Bạn không thể up ảnh kích thước quá lớn');
                }
            }
            else {
                return redirect('admin/product/add')->with('loi','Định dạng hình ảnh không hợp lệ');
            }

        }
        else{
            return redirect('admin/product/add')->with('loi','Bạn chưa chọn hình ảnh');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        //
        $category = Category::where('status',1)->get();
        $producttype = ProductType::where('status',1)->get();
        $product = Product::find($id);
        return view('admin.pages.product.edit',['product'=>$product,'category'=>$category,'producttype'=>$producttype]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function postEdit(Request $request,$id)
    {
        $product = Product::find($id);
        if($request->hasFile('image')){
            $file = $request->image;
            $file_name = $file->getClientOriginalName();
            $file_type = $file->getMimeType();
            $file_size = $file->getSize();
            if($file_type == 'image/png'||$file_type == 'image/jpg'||$file_type == 'image/jpeg'||$file_type == 'image/gif' ){
                if($file_size <= 1048576){
                    $file_name = date('D-m-yyyy').'_'.rand().'_'.utf8tourl($file_name);
                    if($file->move('img/upload/product',$file_name)){
                        $this->validate($request,
                        [
                            'name'=>'required|min:3|max:100',
                            'description'=>'required|min:3',
                            'quantity'=>'required|numeric',
                            'price'=>'required|numeric',
                            'promotional'=>'numeric',
                        ],
                        [
                            'name.required'=>'Tên loại sản phẩm không được để trống',
                            'name.unique'=>'Tên loại sản phẩm đã bị trùng',
                            'name.min'=>'Tên loại sản phẩm chứa từ 3-100 kí tự',
                            'name.max'=>'Tên loại sản phẩm chứa từ 3-100 kí tự',
                            'description.required'=>'Mô tả không được để trống',
                            'description.min'=>'Mô tả không ít hơn 3 kí tự',
                            'quantity.required'=>'Số lượng không được để trống',
                            'quantity.numeric'=>'Số lượng phải là số',
                            'price.required'=>'Giá không được để trống',
                            'price.numeric'=>'Giá phải là số',
                            'promotional.numeric'=>'Khuyến mãi phải là số',
                            ]);
                            $product->idProductType = $request->idProductType;
                            $product ->name= $request ->name;
                            $product ->quantity= $request ->quantity;
                            $product ->price= $request ->price;
                            $product ->promotional= $request ->promotional;
                            $product ->description= $request ->description;
                            $product->detail = $request->detail;
                            $product->warranty = $request->warranty;
                            $product->image = $file_name;
                            $product->slug = utf8tourl($request->name);
                            $product->status=$request->status;
                            $product->save();
                            return redirect('admin/product/edit/'.$id)->with('thongbao','Sửa sản phẩm mới thành công');
                    }
                }
                else{
                    return redirect('admin/product/edit/'.$id)->with('loi','Bạn không thể up ảnh kích thước quá lớn');
                }
            }
            else {
                return redirect('admin/product/edit/'.$id)->with('loi','Định dạng hình ảnh không hợp lệ');
            }

        }
        else{
            return redirect('admin/product/edit/'.$id)->with('loi','Bạn chưa chọn hình ảnh');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function getDelete($id)
    {
        //
        $product = Product::find($id);
        $product->delete();
        return back()->with('thongbao','Xóa thành công');
    }
}
