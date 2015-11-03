<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Order;
use App\OrderItem;
use App\Product;
use DB;
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
        $q = Input::get('q');

        /* 정렬이 있는경우 */
        if($sortBy and $direction ){
          /*  정렬이 있고 검색이 있는 경우
        */
          //   $order = Order::whereHas('orderItem', function($query) use ($q){
          //     $query->where('product_code','LIKE',"%$q%");
          // })->with('orderItem')->orderBy($sortBy,$direction)->paginate($limit);

          $order = Order::whereHas('orderItem', function($query)use($q){
            $query->where('order_items.product_code','Like',"%$q%");
          })->with(['orderItem'=>function($query)use($sortBy,$direction){
            $query->join('products','order_items.product_id','=','products.id');
          }])->orderBy($sortBy,$direction)->paginate($limit);

          if($q)
          {
        // /* 정렬이 있지만 검색은 없는경우
        // */
          }else{
            //$order = Order::with('orderItem')->orderBy($sortBy, $direction)->paginate($limit);
            $order = Order::with(['orderItem'=>function($query) use($sortBy, $direction){
              $query->leftJoin('products','order_items.product_id','=','products.id')->get();
            }])->orderBy($sortBy, $direction)->paginate($limit);
          }

        //정렬이 없는 경우
        }else{
          /* 정렬은 없지만 검색이 있는 경우
        */
          if($q)
          {
            $order = Order::whereHas('orderItem', function($query)use($q){
              $query->where('order_items.product_code','Like',"%$q%");
            })->with(['orderItem'=>function($query){
              $query->join('products','order_items.product_id','=','products.id');
            }])->orderBy('order_date','desc')->paginate($limit);
                //return dd($order);
          }else{

            $order = Order::with(['orderItem'=>function($query){
              $query->leftJoin('products','order_items.product_id','=','products.id')->get();
            }])->orderBy('id','desc')->paginate($limit);
          }
        }
         //return dd($order);
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


        $order = Order::findOrFail($id);
        OrderItem::where('order_id',$id)->delete();
         $customer = Customer::where('order_relationship',$id)->first();

         $customer->first_name = Input::get('first_name');
         $customer->contact_email = Input::get('contact_email');
         $customer->contact_number = Input::get('contact_number');
         $customer->street = Input::get('street');
         $customer->city = Input::get('city');
         $customer->state = Input::get('state');
         $customer->zip = Input::get('zip');
         $customer->country = Input::get('country');

        $order->market_place = Input::get('market_place');
        $order->customer_name = Input::get('first_name');

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
          $product_cnt = count(Input::get('product_name'));

          /*주문 수정의 product_id가 리셋될때 product_code를 통해 id를 조회하고 등록한다.*/
          for($i=0; $i<$product_cnt;$i++){
              $order_item = new OrderItem;
              $order_item->order_id = $order->id;

              $product_code =   $order_item->product_code =Input::get('product_name')[$i];
                  $product_id = Product::where('product_code','=',$product_code)->pluck('id');
              $order_item->product_id = $product_id;
              $order_item->size_color =Input::get('size_color')[$i];;
              $order_item->price =Input::get('price')[$i];;
              $order_item->quantity =Input::get('quantity')[$i];;
              $order_item->total =Input::get('total')[$i];;
              $order_item->sales_price =Input::get('sales_price')[$i];;
              $order_item->save();
          }

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
      $customer->save();
      $order->save();
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
      //"undefined397,399,"
      $product_id = Input::get('product_id');
      $product_id = str_replace ("undefined", "", $product_id);
      $product_id = substr($product_id,0,-1);

      $product_id_arr = explode(",",$product_id);

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
        $customer->first_name                = Input::get('first_name');
        $customer->contact_email          = Input::get('contact_email');
        $customer->contact_number       = Input::get('contact_number');
        $customer->street                         = Input::get('street');
        $customer->city                            = Input::get('city');
        $customer->state                           = Input::get('state');
        $customer->zip                              = Input::get('zip');
        $customer->country                      = Input::get('country');

        $customer->order_relationship    = $order->id;

        $order->market_place                    = Input::get('market_place');
        $order->customer_name                = Input::get('first_name') . Input::get('last_name');
        $order->order_status                      = 'Unshipped';
        $order->customer_id                      = $customer->id;


        // 배열의 갯수만큼 반복적으로 오더_아이템을 생성 - 저장
        $product_cnt = count(Input::get('product_name'));
        for($i=0; $i<$product_cnt;$i++){
            $order_item = new OrderItem;
            $order_item->product_id = $product_id_arr[$i];
            $order_item->order_id = $order->id;
            $order_item->product_code =Input::get('product_name')[$i];
            $order_item->size_color =Input::get('size_color')[$i];;
            $order_item->price =Input::get('price')[$i];;
            $order_item->quantity =Input::get('quantity')[$i];;
            $order_item->total =Input::get('total')[$i];;
            $order_item->sales_price =Input::get('sales_price')[$i];;
            $order_item->save();
        }
        $order->sales_owner = Input::get('sales_owner');
        $order->order_date    = Input::get('order_date');
        $order->notes             = Input::get('notes');
        $order->sub_total      = Input::get('sub_total');
        $order->vat                = Input::get('vat');
        $order->discount      = Input::get('discount');
        $order->grand_total     = Input::get('grand_total');
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
        $order_item = OrderItem::where('order_id',$id)->get();
        $customer =  Customer::where('order_relationship',$id)->first();
        if($customer==null){
          $customer_name =  substr($order->customer_name,0,6);
          $customer = Customer::where('first_name','LIKE',"%$customer_name%")->first();
        }


        //return dd($customer);
        return compact('order', 'customer','order_item');
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

      $order_item = OrderItem::where('order_id',$id)->get();


      //오더 아이템의 갯수만큼 텍스트 박스를 늘려서, 값을 넣어야한다.
      $customer =  Customer::where('order_relationship',$id)->first();

      if($customer==null){
        $customer_name =  substr($order->customer_name,0,6);
        $customer = Customer::where('first_name','LIKE',"%$customer_name%")->first();
      }
      // 여기를 contact_number로 변경하고 없
      //$customer = Customer::where('first_name','LIKE',"%$customer_name%")->get();
      /* product_name 컬럼안의 갯수만큼 배열 변수를 만들어야한다. */
       //$order->product_name_arr = explode(",",$order->product_name);
      //갯수를 구한다.
      //dd($order->product_name_arr);

      return view('order.edit', compact('order','customer','order_item'));
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

    protected function resondWithPagination($order, $data)
    {
      return $this->respond([
        $data,
        'paginator'=>[
          'total_count' => $order->getTotal(),
          'total_pages' => ceil($order->getTotal()/ $order->getPerPage()),
          'current_page' => $order->getCurrentPage(),
          'limit'           => $order->getPerPage()
          ]
        ]);
    }
}
