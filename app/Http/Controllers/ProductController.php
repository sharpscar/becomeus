<?php namespace App\Http\Controllers;

#use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        //출력될 갯수를 받아서 적용한다 추후 셀렉트 박스로 기능을 구현하면 된다.
         $limit = Input::get('limit')? : 10;
         $query = Request::get('q');

        if($query)
        {
          $products = Product::where('product_code', 'LIKE',"%$query%")->simplePaginate($limit);
        }
        else{
          $products = Product::simplePaginate($limit);   #orderBy('added_time','desc')->
        }

        return view('product.index', compact(['products','query']));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product.create');
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
        $validator = Validator::make($data = Input::all(), Product::$rules);
        if($validator->fails())
        {
          return redirect()->back()->withErrors($validator->errors())->withInput();
        }


        if( Input::hasFile('image_from_file'))
        {
          $image = Input::file('image_from_file');
          $newFileName = time().'-'.$thumbnail->getClientOriginalName();
          $image->move(storage_path().'/files/', $newFileName);
          $product->image = $newFileName
        }
        if(Input::has('image_from_url') ) 텍스트가 있을경우
        {

        }
        */

         $product = new Product;
         $product->product_code  =Input::get('productCode');
         $product->price  =Input::get('price_china');
         $product->status  =Input::get('status');
         $product->business_group  =Input::get('businessGroup');
         $product->product_group  =Input::get('productGroup');
         $product->marketplaces =Input::get('marketplaces');


         $product->stock  =Input::get('stock');
         $product->supplier  =Input::get('supplier');
         $product->added_time  = date( 'Y-m-d H:i:s', time() );
         $product->added_user  ='donghyun';
         $product->modified_time  =date( 'Y-m-d H:i:s', time() );
         $product->modified_user  ='notyet';
         $product->save();
         return redirect()->route('product.index');


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
        //
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
    }
}
