<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class AdminController extends Controller
{
    public function view_category() {
        $data = category::all();
        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request) {

        $data=new category;
        $data->category_name=$request->category;
        $data->save();
        return redirect()->back()->with('message','Category Added Successfully');
    }
    public function delete_category($id) {

        $data= category::findOrFail($id);
        $data->delete();
       
        return redirect()->back()->with('message','Category Deleted Successfully');
    }
    public function view_product() {
        $category = category::all();
       $product = product::all();
        return view('admin.product',compact('category','product'));
    }
    public function add_product(Request $request) {
        $data = new Product;
        $data->title=$request->title;
        $data->description=$request->description;
        $image=$request->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
    
            // Check if the file is valid
            if ($image->isValid()) {
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $image->move('product', $imagename);
                $data->image = $imagename;
            } else {
                return redirect()->back()->with('error', 'Invalid file upload');
            }
        }
        $data->category=$request->category;
        $data->quantity=$request->quantity;
        $data->price=$request->price;
        $data->discount=$request->discount;
        $data->save();
        return redirect()->back()->with('message','Product Added Successfully');
    }
    public function show_product() {
        $product = product::all();
        return view('admin.show_product',compact('product'));
    }
    public function delete_product($id) {

        $data= product::findOrFail($id);
        $data->delete();
       
        return redirect()->back()->with('message','Product Deleted Successfully');
    }
    public function update_product($id) {

        $product= product::findOrFail($id);
        $category = category::all();
        return view('admin.update_product',compact('product',"category"));
    }
    public function update_product_confirm(Request $request,$id) {

        $product= product::findOrFail($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $image=$request->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
    
            // Check if the file is valid
            if ($image->isValid()) {
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $image->move('product', $imagename);
                $product->image = $imagename;
            } else {
                return redirect()->back()->with('error', 'Invalid file upload');
            }
        }
        $product->category=$request->category;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount=$request->discount;
        $product->save();
        return view('admin.update_product',compact('product',"category"));
    }
}
