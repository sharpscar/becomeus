<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Order;

class OrderController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $order = Order::orderBy('order_date','desc')->paginate(10);
        return view('order.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('order.create');




    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /*
        $this->registProduct();
        $this->registCustomer();
        */
        #return $request->all();
        #return Input::get('price');
        $order = new Order;
        $order->save();                                                          //order_id를 얻기위해 저장함
        $customer = new Customer;
        $customer->first_name = Input::get('first_name');
        $customer->contact_email = Input::get('contact_email');
        $customer->contact_number = Input::get('contact_number');
        $customer->street = Input::get('street');
        $customer->city = Input::get('city');
        $customer->state = Input::get('state');
        $customer->zip = Input::get('zip');
        $customer->country = Input::get('country');
        $customer->order_relationship = $order->id;
        $order->market_place = Input::get('market_place');
        $order->customer_name = Input::get('first_name') . Input::get('last_name'). ' - 1@1.com';
        $order->order_status = 'pending(defaultVal)';
        $order->product_name = implode(",", Input::get('product_name'));
        $order->size_color = Input::get('size_color');
        $order->price = Input::get('price');
        $order->quantity = Input::get('quantity');
        $order->total = Input::get('total');
        $order->sales_price = Input::get('sales_price');
        $order->sales_owner = Input::get('sales_owner');
        $order->order_date = Input::get('order_date');

        $order->notes = Input::get('notes');
        $order->sub_total = Input::get('sub_total');
        $order->vat = Input::get('vat');
        $order->discount = Input::get('discount');
        $order->grand_total = Input::get('grand_total');
        $order->delivery_date = Input::get('delivery_date');
        $order->delivery_agency = Input::get('delivery_agency');
        $order->track_number = Input::get('track_number');


        $order->save();
        $customer->save();

        return redirect()->route('orders.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $order = Order::findOrFail($id);
      $customer_name = $order->customer_name;


      //Liu Zhao Wen - 1@1.com

      $customer_name = substr($customer_name,0,strpos($customer_name, "-")-1);



      $customer = Customer::where('first_name', $customer_name)->get();

      return view('order.edit', compact('order','customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $order = Order::findOrFail($id);

        $order->size_color =  Input::get('size_color');
        $order->quantity =  Input::get('quantity');
        $order->sales_price =  Input::get('sales_price');
        $order->notes =  Input::get('notes');

        //고객정보는 바꿀필요없다.
        $order->update($request->all());

        return redirect()->route('orders.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Order::destroy($id);
        return redirect()->route('orders.index');

    }
}
