<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Order;
// use Acme\Repos\OrderRepoInterface;



class OrderController extends Controller
{
//OrderRepoInterface $orderRepo
  public function __construct()
  {
    $this->middleware('auth');
    // $this->OrderRepo = $orderRepo;

  }

  protected $orderRepo;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sortBy = Input::get('sortBy');
        $direction =  Input::get('direction');
        $limit = Input::get('limit')? Input::get('limit'):20;
        $query = Input::get('q');

        //sortBy가 있는경우
        if($sortBy and $direction){

          if($query)
          {
            $order = Order::where('product_name','LIKE',"%$query%")->
                            orWhere('id','LIKE',"%$query%")->
                            orWhere('customer_name','LIKE',"%$query%")->
                            orderBy($sortBy, $direction)->
                            paginate($limit);
          }else
          {
            $order = Order::orderBy($sortBy, $direction)->paginate($limit);
          }
        }else{
          //sortBy가 없는경우
          if($query)
          {
            $order = Order::where('product_name','LIKE',"%$query%")->
                            orWhere('id','LIKE',"%$query%")->
                            orWhere('customer_name','LIKE',"%$query%")->
                            paginate($limit);
          }else
          {
          //  $order = Order::sortable()->paginate(20);
             $order = Order::orderBy('id','desc')->paginate($limit);
          }

        }
        // $sortBy = Request::get('sortBy');
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

        $customer =  Customer::where('order_relationship',$id)->first();

        $customer->first_name = Input::get('first_name');
        $customer->contact_email = Input::get('contact_email');
        $customer->contact_number = Input::get('contact_number');
        $customer->street = Input::get('street');
        $customer->city = Input::get('city');
        $customer->state = Input::get('state');
        $customer->zip = Input::get('zip');
        $customer->country = Input::get('country');
        $customer->save();

        // $order->size_color =  Input::get('size_color');
        // $order->quantity =  Input::get('quantity');
        // $order->sales_price =  Input::get('sales_price');
        // $order->notes =  Input::get('notes');

        $order->market_place = implode(",", Input::get('market_place'));
        $order->customer_name = Input::get('first_name') . Input::get('last_name');
        if(Input::get('track_number')){
          $order->order_status = 'Shipped';
          //기존의 트랙넘버가 없거나 변경이 되었을 경우
          if($order->track_number =='' or $order->track_number!=Input::get('track_number')){
            $order->shipped_date = date("Y-m-d");
          }
          //track_number값이 있으면 변경이 된거다. 지금 부터 하루동안은 이 오더는 빨간색으로 표시 되도록 한다.
        }else{
          $order->order_status = 'Unshipped';
        }
        $order->product_name =    implode(",", Input::get('product_name'));
        $order->size_color =      implode(",", Input::get('size_color'));
        $order->price =           implode(",", Input::get('price'));
        $order->quantity =        implode(",", Input::get('quantity'));
        $order->total =           implode(",", Input::get('total'));
        $order->sales_price =     implode(",", Input::get('sales_price'));
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







        //  아래의 명령은 사용하기 어렵다. product_name[] 배열을 ,로 나누어줘야 한다.
        // $order->update($request->all());


        return redirect()->route('orders');
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
        $order->customer_name = Input::get('first_name') . Input::get('last_name');
        $order->order_status = 'Unshipped';

        $order->product_name =    implode(",", Input::get('product_name'));
        $order->size_color =      implode(",", Input::get('size_color'));
        $order->price =           implode(",", Input::get('price'));
        $order->quantity =        implode(",", Input::get('quantity'));
        $order->total =           implode(",", Input::get('total'));
        $order->sales_price =     implode(",", Input::get('sales_price'));
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

        return redirect()->route('orders');

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
        $order = Order::findOrFail($id);

        $customer =  Customer::where('order_relationship',$id)->first();
        if($customer==null){
          $customer_name =  substr($order->customer_name,0,6);

          $customer = Customer::where('first_name','LIKE',"%$customer_name%")->first();

        }


        //return dd($customer);
        return compact('order', 'customer');
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

      $customer =  Customer::where('order_relationship',$id)->first();

      if($customer==null){
        $customer_name =  substr($order->customer_name,0,6);

        $customer = Customer::where('first_name','LIKE',"%$customer_name%")->first();



      }
      // 여기를 contact_number로 변경하고 없
      //$customer = Customer::where('first_name','LIKE',"%$customer_name%")->get();
      /* product_name 컬럼안의 갯수만큼 배열 변수를 만들어야한다. */
       $order->product_name_arr = explode(",",$order->product_name);
      //갯수를 구한다.
      //dd($order->product_name_arr);

      return view('order.edit', compact('order','customer'));
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
        return redirect()->route('orders');

    }
}
