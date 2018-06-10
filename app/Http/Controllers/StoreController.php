<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
/*Extras*/
use App\Store;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Alert;

class StoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $stores = DB::collection('stores')->get();

        return view('stores.index', compact('stores'));
    }
    public function create()
    {
        $categories = Category::where('parent', null)->get();
        return view('stores.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $store = new Store;
        $store_categories = implode(',', $request->input('store_categories'));
        $store->store_name =  $request->input('store_name');
        $store->store_email =  $request->input('store_email');
        $store->store_phone =  $request->input('store_phone');
        $store->store_email =  $request->input('username');
        $store->store_phone =  $request->input('password');
        $store->location =  $request->input('location');
        $store->latitude =  $request->input('latitude');
        $store->longitude =  $request->input('longitude');
        $store->store_categories =  $store_categories;
        $store->status = $request->input('status') ;
        $store->save();
      //  $stores = DB::collection('stores')->get();
        //return view('stores', compact('stores'));
      Alert::message('Store created successfully');
      return redirect()->route('stores.index');
      }
}
