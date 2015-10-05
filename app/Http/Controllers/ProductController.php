<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
#use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
#use App\Http\Requests;
use Database\seeds\ProductCsvSeeder;
use App\Http\Controllers\Controller;
use App\Product;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{


  public function __construct()
  {
    #$this->middleware('auth');
    $this->middleware('auth', ['except' => ['home']]);

  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        #return \Auth::user()->name;

        //출력될 갯수를 받아서 적용한다 추후 셀렉트 박스로 기능을 구현하면 된다.
         $limit = Input::get('limit')? : 10;
         $query = Input::get('q');

        if($query)
        {
          $products = Product::where('product_code', 'LIKE',"%$query%")->simplePaginate($limit);
        }
        else{
          $products = Product::orderBy('id','desc')->simplePaginate($limit);   #orderBy('added_time','desc')->
        }

        return view('product.index', compact(['products','query']));


    }

    public function importData(Request $request)
    {
      $file = $request->file('file');

      $name = time() . $file->getClientOriginalName();
      #$file->getClientOriginalName();
      $file->move('csv', $name);

      Excel::load('public/csv/'.$name, function($reader){
        $reader->each(function($row){

          Product::create($row->all());

        });
      });

      //message Done'


      return redirect()->route('product.index');
    }

    public function exportData(Request $request)
    {
      $data = Product::all();
      #return dd($data);
       Excel::create('product', function($excel){

        $excel->sheet('noname', function($sheet){
          $sheet->with(
            Product::all()
        );
        });

      })->export('csv');

      return redirect()->route('/');
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


        if( Input::hasFile('image_from_file'))
        {
          $image = Input::file('image_from_file');
          $newFileName = date( 'Y_m_d_H_i_s', time() ).'_'.$image->getClientOriginalName();
          $image->move(storage_path().'/files/', $newFileName);
          $product->image = $newFileName;
        }
         $product->product_code  =Input::get('product_code');
         $product->price_cny  =Input::get('price_china');
         $product->price_krw  =Input::get('price_krw');
         $product->status  =Input::get('status');
         $product->category  =Input::get('category');
         $product->brand  =Input::get('brand');
         $product->stock  =Input::get('stock');
         $product->variation  =Input::get('variation');
         $product->color  =Input::get('color');
         $product->weight  =Input::get('weight');
         $product->dimension  =Input::get('dimension');
         $product->material_china  =Input::get('material_china');
         $product->material_english  =Input::get('material_english');
         $product->product_name  =Input::get('product_name');
         $product->description  =Input::get('description');
         $product->keyword  =Input::get('keyword');
         $product->business_group  =Input::get('business_group');
         $product->product_group  =Input::get('product_group');
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

        $product = Product::find($id);
      #  return dd($product);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Request $request,
     */
    public function update(Request $request, $id)
    {
        //

         $product = Product::findOrFail($id);


         #$product->product_code = Input::get('product_code');

         $data = Input::all();

        //  $rules = array(
        //    'business_group'=>'required',
        //    'product_group'=>'required',
        //    'product_code'=>'required',
        //    'supplier'=>'required',
        //    'price'=>'required',
        //    'stock'=>'required',
        //    'weight'=>'required',
        //    'dimension'=>'required',
        //    'material_china'=>'required'
        //  );
        //  $validator = Validator::make($data = Input::all(),$rules);
         //
        //  if($validator->fails()){
        //    return redirect()->back()->withErrors($validator)->withInput();
        //  }

          # $product->update(Input::all());
          $product->product_code  =Input::get('product_code');
          $product->price_cny  =Input::get('price_china');
          $product->price_krw  =Input::get('price_krw');
          $product->status  =Input::get('status');
          $product->category  =Input::get('category');
          $product->brand  =Input::get('brand');
          $product->stock  =Input::get('stock');
          $product->variation  =Input::get('variation');
          $product->color  =Input::get('color');
          $product->weight  =Input::get('weight');
          $product->dimension  =Input::get('dimension');
          $product->material_china  =Input::get('material_china');
          $product->material_english  =Input::get('material_english');
          $product->product_name  =Input::get('product_name');
          $product->description  =Input::get('description');
          $product->keyword  =Input::get('keyword');
          $product->business_group  =Input::get('business_group');
          $product->product_group  =Input::get('product_group');
          $product->marketplaces =Input::get('marketplaces');
          $product->stock  =Input::get('stock');
          $product->supplier  =Input::get('supplier');
          $product->added_time  = date( 'Y-m-d H:i:s', time() );
          $product->added_user  ='donghyun';
          $product->modified_time  =date( 'Y-m-d H:i:s', time() );
          $product->modified_user  ='notyet';
          $product->save();
          return redirect()->route('product.index');
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

        Product::destroy($id);
        return redirect()->route('product.index');

    }
}
