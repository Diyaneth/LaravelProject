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

use App\Models\subscribe;

use App\Models\Feedback;

use App\Models\Message;

use App\Models\Mreply;

use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        
        $product=product::paginate(9);
        $comment=comment::orderby('id','desc')->get();
        $feedback=feedback::all();
        $subs_count=subscribe::all()->count();
        
        $reply=reply::all();
        return view('home.userpage',compact('product','comment','reply','feedback','subs_count'));
    }

    public function redirect()
    {
    $usertype=Auth::user()->usertype;

    if($usertype=='1')
    {
        $total_product=product::all()->count();
        $total_order=order::all()->count();
        $total_user=user::all()->count();
        $total_subs=subscribe::all()->count();
        $total_feedbacks=feedback::all()->count();
        $order=order::all();

        $total_revenue=0;

        foreach($order as $order)
        {
            $total_revenue=$total_revenue+$order->price;
        }

        $total_delivered=order::where('delivery_status','=','delivered')->get()->count();

        $total_processing=order::where('delivery_status','=','processing')->get()->count();

        $total_canceled=order::where('delivery_status','=','canceled')->get()->count();

        return view('admin.home',compact('total_product','total_order','total_user',
        'total_revenue','total_delivered','total_processing','total_canceled','total_subs','total_feedbacks'));
    }
    else
    {
        $product=product::paginate(9);
        $comment=comment::orderby('id','desc')->get();
        $feedback=feedback::all();
        $subs_count=subscribe::all()->count();
        $reply=reply::all();
        return view('home.userpage',compact('product','comment','reply','feedback','subs_count'));
    }
    }

    public function product_details($id)
    {
        $product=product::find($id);
        return view('home.product_details',compact('product'));
    }

    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;

            $product=product::find($id);
            $product_exist_id=cart::where('Product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();

            if($product_exist_id)
            {
                $cart=cart::find($product_exist_id)->first();
                $quantitiy=$cart->quantity;
                $cart->quantity=$quantitiy + $request->quantity;

            if($product->discount_price!=null)
                {
                    $cart->price=$product->discount_price * $cart->quantity;
                }
                else
                {
                    $cart->price=$product->price * $cart->quantity;
                }

                $cart->save();
                Alert::success('Product Added Successfully','We have Added product to the Cart');
                return redirect()->back();
            }
            else
            {

            $cart=new Cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;

            $cart->product_title=$product->title;

            if($product->discount_price!=null)
            {
                $cart->price=$product->discount_price * $request->quantity;
            }
            else
            {
                $cart->price=$product->price * $request->quantity;
            }
            
            $cart->image=$product->image;
            $cart->Product_id=$product->id;
            $cart->quantity=$request->quantity;
            $cart->save();
            Alert::success('Product Added Successfully','We have Added product to the Cart');
            return redirect()->back();

            }

            $cart=new Cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;

            $cart->product_title=$product->title;

            if($product->discount_price!=null)
            {
                $cart->price=$product->discount_price * $request->quantity;
            }
            else
            {
                $cart->price=$product->price * $request->quantity;
            }
            
            $cart->image=$product->image;
            $cart->Product_id=$product->id;
            $cart->quantity=$request->quantity;
            $cart->save();

            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $cart=cart::where('user_id','=',$id)->get();
            
            return view('home.showcart',compact('cart'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $cart=cart::find($id);
        $cart->delete();
        return redirect()->back();

    }

    public function cash_order()
    {
        $user=Auth::user();
        $userid=$user->id;
        $data=cart::where('user_id','=',$userid)->get();
        
        foreach($data as $data)
        {
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;    
            $order->address=$data->address;    
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->Product_id;

            $order->payment_status='Cash on Delivery';
            $order->delivery_status='processing';

            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
        }
        Alert::success('We have Received your Order.','We will connect with you soon.....');
        return redirect()->back();
    }

    public function stripe($totalprice)
    {
        return view('home.stripe',compact('totalprice'));
    }

    public function stripePost(Request $request,$totalprice)
    {
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "lkr",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment." 
        ]);

        $user=Auth::user();
        $userid=$user->id;
        $data=cart::where('user_id','=',$userid)->get();
        
        foreach($data as $data)
        {
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;    
            $order->address=$data->address;    
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->Product_id;

            $order->payment_status='Paid';
            $order->delivery_status='processing';

            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    public function show_order()
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;
            $order=order::where('user_id','=',$userid)->get();
            return view('home.order',compact('order'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order=order::find($id);
        $order->delivery_status='canceled';
        $order->save();
        return redirect()->back();
    }

    public function add_comment(Request $request)
    {
        if(Auth::id())
        {
            $comment=new comment;
            $comment->name=Auth::user()->name;
            $comment->user_id=Auth::user()->id;
            $comment->comment=$request->comment;

            $comment->save();
            return redirect()->back();
        }
    else
    {
        return redirect('login');
    }
    }

    public function add_reply(Request $request)
    {
        if(Auth::id())
        {
            $reply=new reply;
            $reply->name=Auth::user()->name;
            $reply->user_id=Auth::user()->id;
            $reply->comment_id=$request->commentId;
            $reply->reply=$request->reply;
            $reply->save();
            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }

    public function product_search(Request $request)
    {
        $comment=comment::orderby('id','desc')->get();
        $reply=reply::all();
        $search_text=$request->search;
        $product=product::where('title','LIKE',"%$search_text%")->orwhere('catagory','LIKE',"%$search_text%")->paginate(9);
        return view('home.userpage',compact('product','comment','reply'));

    }

    public function products()
    {
        $product=product::paginate(9);
        $comment=comment::orderby('id','desc')->get();
        $reply=reply::all();
        return view('home.all_product',compact('product','comment','reply'));
    }

    public function search_product(Request $request)
    {
        $comment=comment::orderby('id','desc')->get();
        $reply=reply::all();
        $search_text=$request->search;
        $product=product::where('title','LIKE',"%$search_text%")->orwhere('catagory','LIKE',"%$search_text%")->paginate(9);
        return view('home.all_product',compact('product','comment','reply'));

    }

    public function about()
    {
        return view('home.about');
    }

    public function testimonial()
    {
        return view('home.testimonial');
    }

    public function subscribe(Request $request)
    {
 
            
            $data=new subscribe;
            $data->email=$request->email;
            
            

                $data->save();
                return redirect()->back();
            

    }

    public function show_feedback()
    {
        $feedback=feedback::all();
        return view('home.feedback',compact('feedback'));
    }

    public function send_feedback(Request $request)
    {
        $feedback=new feedback;
        $feedback->F_name=$request->name;
        $feedback->F_feedback=$request->feedback;
        $feedback->save();
        Alert::success('Thanks for your Feedback','Feedback Send Successfully');
        return redirect()->back();
    }

    public function show_contact()
    {
        if(Auth::id())
        {
            return view('home.contact');
        }
        else
        {
            return redirect('login');  
        }
        
    }

    public function send_message(Request $request)
    {
        if(Auth::id())
        {
            $message=new message;
            $message->name=Auth::user()->name;
            $message->email=Auth::user()->email;
            $message->user_id=Auth::user()->id;
            $message->subject=$request->subject;
            $message->message=$request->message;
            $message->save();
            Alert::success('Successfully Sent your Message','We will reply soon');
            return redirect()->back();
        }
        else
            {
                return redirect('login');
            }
    }




}