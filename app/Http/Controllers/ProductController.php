<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Image;
use DB;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Validator;
#use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
#use App\Http\Requests;
use Database\seeds\ProductCsvSeeder;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Product;
use App\Photo;


class ProductController extends Controller
{


  public function __construct()
  {
    #$this->middleware('auth');
    $this->middleware('auth');

  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

    // public function addPhoto(Request $request)
    // {
    //
    // }

    public function importPage(){
      return view('product.importPage');
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


      #return redirect()->route('product.index');
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

    protected function makePhoto(UploadedFile $file)
    {

      return Photo::named($file->getClientOriginalName())
      ->move($file);
    }

    public function autocomplete()
    {
       $term = Input::get('term');
      // $result= array();
      $data = DB::table("products")->select('product_code','price')->where('product_code', 'LIKE', '%'.$term.'%')->get();


      foreach($data as $code){

      $results[]   = ['value'=>$code->product_code,'price'=>$code->price];
      }
      return \Response::json($results);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new Product;
        $product->save();

        if( Input::hasFile('image_from_file'))
        {

          //Validation
          // $this->validate($request,[
          //   'image_from_file' => 'jpg,jpeg,png,bmp,gif'
          //   ]);

          $photo = $this->makePhoto($request->file('image_from_file'));             //사진을 만들고 Photo모델의 move메서드에서 섬네일 리사이징
          $product->addPhoto($photo);
          $product->image = $photo->thumbnail_path;
        }
         $product->product_code  =Input::get('product_code');
         $product->price  =Input::get('price_china');
         $product->price_krw  =Input::get('price_krw');
         $product->status  =Input::get('status');
         $product->category  =Input::get('category');
         $product->brand  =Input::get('brand');
         $product->stock  =Input::get('stock');
         $product->variation  =Input::get('variation');
         $product->color  =Input::get('color');
         $product->weight  =Input::get('weight');
         $product->demension  =Input::get('demension');
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
        return view('product.show');
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

         #$data = Input::all();

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
          if( Input::hasFile('image_from_file'))
          {
            //validate
            // $this->validate($request,[
            //   'image_from_file' => 'jpg,jpeg,png,bmp,gif'
            //   ]);

            $photo = $this->makePhoto($request->file('image_from_file'));             //사진을 만들고 Photo모델의 move메서드에서 섬네일 리사이징
            $product->addPhoto($photo);
            $product->image = $photo->thumbnail_path;
          }

          $product->marketplaces  = implode(",",Input::get('marketplaces'));
          // $product->update($request->all());

          $product->product_code  =Input::get('product_code');
          $product->price  =Input::get('price_china');
          $product->price_krw  =Input::get('price_krw');
          $product->status  =Input::get('status');
          $product->category  =Input::get('category');
          $product->brand  =Input::get('brand');
          $product->stock  =Input::get('stock');
          $product->variation  =Input::get('variation');
          $product->color  =Input::get('color');
          $product->weight  =Input::get('weight');
          $product->demension  =Input::get('demension');
          $product->material_china  =Input::get('material_china');
          $product->material_english  =Input::get('material_english');
          $product->product_name  =Input::get('product_name');
          $product->description  =Input::get('description');
          $product->keyword  =Input::get('keyword');
          $product->business_group  =Input::get('business_group');
          $product->product_group  =Input::get('product_group');
          // $product->marketplaces =Input::get('marketplaces');
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
