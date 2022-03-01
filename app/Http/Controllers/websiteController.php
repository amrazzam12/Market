<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Session;
use Psy\Util\Str;

class websiteController extends Controller
{
    public function index() {
        return view('website.index' , [
            'mainBanners' =>Banner::where('status' , 'primary')->take(3)->get(),
            'banners' => Banner::where('status' ,  'main')->take(2)->get(),
            'hotProductsBanner' =>Banner::where('status' , 'hot')->take(1)->get() ,
            'latestProductsBanner' => Banner::where('status' , 'latest')->take(1)->get() ,
            'saleProducts' => Product::where('sale' , '>' , '0')->orderBy('sale' , 'desc')->take(15)->get(),
            'latestProducts' => Product::orderBy('id' , 'desc')->take(15)->get(),
            'hotProducts' => Product::orderBy('sales' , 'desc')->take(15)->get()
        ]);
    }


    public function shop() {
        $products = Product::paginate(15);
        if (\request()->has('filter')){
            $filter = \request()->get('filter');
            if ($filter == 'hot') {
                $products = Product::orderBy('sales' , 'desc')->paginate(15);
            } elseif($filter == 'new') {
                $products = Product::orderBy('id' , 'desc')->paginate(15);
            }
            elseif($filter == 'TopRated') {
                $products = Product::join('reviews' , 'products.id' , '=' , 'reviews.product_id')
                    ->selectRaw('products.* , ceil(AVG(reviews.rating)) AS `average` ')
                    ->groupBy('products.id')
                    ->orderBy('average' , 'DESC')->paginate(15);
            } elseif($filter == 'OnSale'){
                $products = Product::orderBy('sale' , 'DESC')->paginate(15);
            }
        };

        if (\request()->has('category')){
            $categoryFilter = \request()->get('category');
            $cat = Category::where('name' , $categoryFilter)->get();
            $products = Product::where('cat_id' , $cat[0]['id'])
                ->orwhere('subcat_id' , $cat[0]['id'])
                ->paginate(15);
        }

        return view('website.shop' , [
            'shopBanner' => Banner::where('slug' , 'shop')->take(1)->get(),
            'categories' => Category::where('parent_id' , '1')->get(),
            'subcategories' => Category::where('parent_id' , '!=' , '1')->get(),
            'products' => $products,
            'hotProducts' => Product::orderBy('sales' , 'desc')->take(5)->get()
        ]);
    }


    public function showProduct($id) {
        $subcat = \request()->get('related');
        return view('website.detail' , [
            'product' => Product::findOrFail($id),
            'rating' => Product::findOrFail($id)->ratingAvg,
            'popularProducts' => Product::orderBy('sales' , 'desc')->take(4)->get(),
            'relatedProducts' => Product::where('subcat_id' , $subcat)->take(5)->get()
        ]);
    }



    public function aboutUs() {
        return view('website.about-us' , [
            'countOfItems' => count(Product::all()),
            'countOfUsers' => count(User::all()),
        ]);
    }


    public function cart()
    {
        Auth::user() ? $view = 'website.cart' : $view = 'auth.login';
        $cartProducts = \session()->get('cart');
        $totalPrice = 0;
        if ($cartProducts != null) {
            foreach ($cartProducts as $key => $value){
                $totalPrice += $cartProducts[$key]['totalPrice'];
            }
        }
        return view($view , [
            'popularProducts' => Product::orderBy('sales' , 'desc')->take(10)->get(),
            'cartProducts' => $cartProducts,
            'totalPrice' => $totalPrice

        ]);
    }
    public function addToCart($id , Request $request) {

        if (Auth::user()) {
            $cart = \session()->get('cart');

            if ($cart == null){         //IF The Cart Is Empty
                $cart = [
                    $id => [
                        'product_name' => $request['name'],
                        'price' => $request['price'] * 1,
                        'quantity' => $request['product-quatity'] * 1,
                        'totalPrice' => $request['price'] * $request['product-quatity'],
                        'image' => $request['image']
                    ]];
                \session()->put('cart' , $cart);

            } else { //IF The Cart Is Not Empty
                if (isset($cart[$id])) {
                    $cart[$id]['quantity']  += $request['product-quatity'];
                    $cart[$id]['totalPrice'] += $request['price'] * $request['product-quatity'];
                    \session()->put('cart' , $cart);
                } else{
                    $cart[$id] = [
                        'product_name' => $request['name'],
                        'price' => $request['price'] * 1,
                        'quantity' => $request['product-quatity'] * 1,
                        'totalPrice' => $request['price'] * $request['product-quatity'],
                        'image' => $request['image']
                    ];
                    \session()->put('cart' , $cart);
                }
        }
            return redirect()->back();
        }

        return redirect()->route('login');

    }

    public function wishlist()
    {

        if (Auth::user()){
        $view = 'website.wishlist';
        $wishlist = Wishlist::where('user_id' , '=' , \auth()->user()->id)->get();

        return view($view , [
            'popularProducts' => Product::orderBy('sales' , 'desc')->take(10)->get(),
            'wishlist' => $wishlist
        ]);}
        return redirect('login');
    }

    public function addToWishlist(Request $request) {
        $all = Wishlist::where('user_id' , '=' , $request->user_id)->get();
        $exists = false;
        foreach ($all as $w) {
            if ($w['product_id'] == $request->product_id)
                $exists = true;
        }

        if ($exists == false){
            $wishlist = Wishlist::create($request->except('_token'));
        }
        return redirect()->back();


    }

    public function deleteFromWishlist($id) {

        Wishlist::find($id)->delete();
        return redirect()->back();

    }

    public function cartDelete() {
        \session()->forget('cart');
        return redirect()->back();
    }

    public function makeReview(Request $request) {
        Review::create($request->except('submit'));
        return redirect()->back();

    }


    public function checkout() {
        $totalPrice = 0;
        $cartProducts = \session('cart');
        if ($cartProducts != null) {
            foreach ($cartProducts as $key => $value){
                $totalPrice += $cartProducts[$key]['totalPrice'];
            }
        }
        return view('website.checkout' , [
            'totalPrice' => $totalPrice,
            'mostViewedProducts' => Product::orderBy('views' , 'desc')->take(15)->get()
        ]);
    }

    public function placeOrder(Request $request) {
        $latestOrder = Order::orderBy('created_at','DESC')->first();
        $ordNum =  rand(1,111000)  . '.' . ($latestOrder->order_number);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email_address' => 'required',
            'address' => 'required',
            'city' => 'required',
        ]);
       $order =  Order::create([
           'order_number' => $ordNum,
           'user_id' => \auth()->user()->id,
           'item_count' => 0,
           'total_price' => 0,
           'first_name' => $request->first_name,
           'last_name' => $request->last_name,
           'phone_number' => $request->phone_number,
           'email_address' => $request->email_address,
           'address' => $request->address,
           'city' => $request->city,
       ]);
        $cart = \session()->get('cart');
        $orderPrice = 50;
        $itemCount = 0;
        foreach($cart as $key => $value){
            $orderProduct = OrderProducts::create([
                'user_id' => \auth()->user()->id,
                'product_id' => $key,
                'order_id' => $order['id'],
                'price' => $cart[$key]['price'],
                'quantity' => $cart[$key]['quantity'],
                'total_price' => $cart[$key]['totalPrice'],
            ]);
            $orderPrice += $cart[$key]['totalPrice'];
            $itemCount += $cart[$key]['quantity'];

            $order->item_count = $itemCount;
            $order->total_price = $orderPrice;

            $order->save();
            $product = Product::find($key);
            $product->sales++;
            $product->save();

        }

       $this->cartDelete();

       return redirect()->back();


    }

    public function contact() {
        return view('website.contact-us');
    }

    public function contactPost(Request $request) {
        DB::table('contacts')->insert([$request->except('_token' , 'ok')]);
        return redirect()->back();

    }


}
