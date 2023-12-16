<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

use App\Models\User;

class HomeController extends Controller
{
    public function index() {
        $product = Product::paginate(3);
        return view('home.userpage',compact('product'));
    }
    public function redirect()
{
    if (Auth::check()) {
        $user_type = Auth::user()->usertype;

        return $user_type == 1 ? view('admin.home') : view('home.userpage');
    }

    // Redirect to the login page or perform another action for non-authenticated users
    return redirect()->route('login');
}
public function product_details($id) {
    $product= product::findOrFail($id);
    
    return view('home.product_details',compact('product'));
}
public function add_cart(Request $request,$id) {
    if(Auth::id()) {
        $user=Auth::user();
        $product=product::find($id);
        $cart = new cart;
        $cart->name=$user->name;
        $cart->email=$user->email;
        $cart->phone=$user->phone;
        $cart->address=$user->address;
        $cart->user_id=$user->id;
        $cart->product_title=$product->title;
        ($product->discount) ?  $cart->price=$product->discount * $request->quantity : $cart->price=$product->price * $request->quantity;
        $cart->image=$product->image;
        $cart->product_id=$product->id;
        $cart->quantity=$request->quantity;
        $cart->save();
        return redirect()->back();

    }
    else
{
    return redirect("login");
}
}
public function show_cart() {
    if(Auth::id()) {

        $id = Auth::user()->id;
        $cart = Cart::where('user_id', $id)->get(); // Corrected syntax
        
        return view('home.show_cart', compact('cart'));
    } 
    else return redirect("login");
}
public function remove_cart($id) {
    $cart = Cart::findOrFail($id);
    $cart->delete();
    return redirect()->back();
}
public function order_details() {
    

        $id = Auth::user()->id;
        $cart = Cart::where('user_id', $id)->get(); // Corrected syntax
        foreach($cart as $data)
        {
            $order = new Order;
            $order->name = $data->name;
    $order->email = $data->email;
    $order->phone = $data->phone;
    $order->address = $data->address;
    $order->product_title = $data->product_title;
    $order->quantity = $data->quantity;
    $order->price = $data->price;
    $order->image = $data->image;
    $order->product_id = $data->product_id;
    $order->user_id = $data->user_id;
    $order->payment_status = "cash on delivery";
    $order->delivery_status = "processing";

    // Save the order to the database
    $order->save();
            $cart_id = $data->id;
            $cart = cart::findOrFail($cart_id);
            $cart->delete();
        }
        return redirect()->back();
       
    
}   
}
