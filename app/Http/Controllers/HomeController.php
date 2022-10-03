<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

use Session;
use Stripe;

use App\Models\Comment;
use App\Models\Reply;

class HomeController extends Controller
{
    public function index() {
        // $product= Product::all();
        $product= Product::paginate(10);

        // $comment= Comment::all();
        $comment= Comment::orderby('id', 'desc')->get();
        
        $reply= Reply::all();

        return view('home.userpage', compact('product', 'comment', 'reply'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if($usertype=='1') {
            $total_product=Product::all()->count();
            $total_order=Order::all()->count();
            $total_user=User::all()->count();

            $order=Order::all();
            $total_revenue=0;
            foreach($order as $item) {
                $total_revenue = $total_revenue + $item->price;
            }

            $total_delivered=Order::where('delivery_status', '=', 'delivered')->get()->count();
            $total_processing=Order::where('delivery_status', '=', 'processing')->get()->count();

            return view('admin.home', compact('total_product', 'total_order', 'total_user', 'total_revenue', 'total_delivered', 'total_processing'));
        }
        else {
            // return view('dashboard');
            // return view('home.userpage');
            
            $product= Product::paginate(10);

            // $comment= Comment::all();
            $comment= Comment::orderby('id', 'desc')->get();

            $reply= Reply::all();
            return view('home.userpage', compact('product', 'comment', 'reply'));
        }
    }

    public function product_details($id) {
        $product= Product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request ,$id) {
        if(Auth::id()) {
            // return redirect()->back();
            $user=Auth::user();
            $product= Product::find($id);
            $cart=new Cart();
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;

            $cart->product_title=$product->title;

            if($product->discount_price!=null) {
                $cart->price=$product->discount_price * $request->quantity;
            }else {
                $cart->price=$product->price * $request->quantity;
            }
            $cart->image=$product->image;
            $cart->product_id=$product->id;

            $cart->quantity=$request->quantity;
            $cart->save();
            return redirect()->back();
        }
        else {
            return redirect('login');
        }
    }

    public function show_cart() {

        if(Auth::id()) {
            $id=Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();

            return view('home.showcart', compact('cart'));
        }
        else {
            return redirect('login');
        }
    }

    public function remove_cart($id) {
        $cart=Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function cash_order() {
        $user=Auth::user();
        $userid=$user->id;

        $data=Cart::where('user_id', '=', $userid)->get();

        foreach($data as $item) {
            $order=new Order();
            $order->name=$item->name;
            $order->email=$item->email;
            $order->phone=$item->phone;
            $order->address=$item->address;
            $order->user_id=$item->user_id;

            $order->product_title=$item->product_title;
            $order->price=$item->price;
            $order->quantity=$item->quantity;
            $order->image=$item->image;
            $order->product_id=$item->product_id;

            $order->payment_status='cash on delivery';
            $order->delivery_status='processing';

            $order->save();

            $cart_id=$item->id;
            $cart=Cart::find($cart_id);
            $cart->delete();
        }

        return redirect()->back()->with('message', 'We have received your order. We will connect with you soon...');
    }


    public function stripe($totalprice) {
        return view('home.stripe', compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)
        {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        
            Stripe\Charge::create ([
                    "amount" => $totalprice * 100,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Test description Suraiya" 
            ]);


            // for moving cart data into order table
             $user=Auth::user();
                $userid=$user->id;

                $data=Cart::where('user_id', '=', $userid)->get();

                foreach($data as $item) {
                    $order=new Order();
                    $order->name=$item->name;
                    $order->email=$item->email;
                    $order->phone=$item->phone;
                    $order->address=$item->address;
                    $order->user_id=$item->user_id;

                    $order->product_title=$item->product_title;
                    $order->price=$item->price;
                    $order->quantity=$item->quantity;
                    $order->image=$item->image;
                    $order->product_id=$item->product_id;

                    $order->payment_status='Paid';
                    $order->delivery_status='processing';

                    $order->save();

                    $cart_id=$item->id;
                    $cart=Cart::find($cart_id);
                    $cart->delete();
                }
            // for moving cart data into order table

        
            Session::flash('success', 'Payment successful!');
                
            return back();
        }


        // Show order in frontend
        public function show_order() {
            if(Auth::id()) {

                $user=Auth::user();
                $userid=$user->id;

                $order= Order::where('user_id', '=', $userid)->get();
                return view('home.order', compact('order'));
            }
            else {
                return redirect('login');
            }
        }

        public function cancel_order($id) {
            $order=Order::find($id);
            $order->delivery_status='You canceled this Order';
            $order->save();
            return redirect()->back();
        }

        // Comment
        public function add_comment(Request $request) {
            if(Auth::id()) {
                $comment=new Comment();

                $comment->name=Auth::user()->name;
                $comment->user_id=Auth::user()->id;
                $comment->comment=$request->comment;
                $comment->save();
                return redirect()->back();
            }
            else{
                return redirect('login');
            }
        }

        public function add_reply(Request $request) {
            if(Auth::id()) {
                $reply=new Reply();

                $reply->name=Auth::user()->name;
                $reply->user_id=Auth::user()->id;
                $reply->comment_id=$request->commentId;
                $reply->reply=$request->reply;
                $reply->save();
                return redirect()->back();

            }
            else {
                return redirect('login');
            }
        }

        // Product search
        public function product_search(Request $request) {

            $comment= Comment::orderby('id', 'desc')->get();
            $reply= Reply::all();

            $search_text=$request->search;
            // $product=Product::where('title', 'LIKE', '%$search_text%')->get();
            // $product=Product::where('title','LIKE',"%$search_text%")->paginate(10);
            $product=Product::where('title','LIKE',"%$search_text%")->orwhere('category','LIKE',"$search_text")->paginate(10);
            return view('home.userpage', compact('product', 'comment', 'reply'));
        }

}
