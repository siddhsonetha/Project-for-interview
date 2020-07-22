<?php

namespace App\Http\Controllers;

use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Product = Product::with('category')->get();
        return view('viewproduct',compact('Product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('product_image'))
        {
            $file=$request->file('product_image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/product',$filename);
        }
        $product=Product::create([
            'parent_id'=>$request->category,
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'product_description'=>$request->product_description,
            'product_image'=>$filename,
        ]);

        if($request->category=="")
        {
            $sub=SubCategory::where('id',$request->subcategory)->latest()->first();

            Product::where('sub_category_id',$sub->id)->update(['parent_id'=>$sub->category_id]);

        }
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
        $product=Product::find($id);
        return view('editproduct',compact('product'));
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
        $product=Product::find($id);
        $product->product_name=$request->get('product_name');
        $product->product_price=$request->get('product_price');
        $product->product_description=$request->get('product_description');

        if($request->hasFile('product_image'))
        {
            $file=$request->file('product_image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/product',$filename);
            $product->product_image=$filename;


        }
        $product->save();
        return redirect()->route('product.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findorfail($id);
        $product->delete();
        return redirect()->route('product.index');
    }
    public function export(Request $request)
    {
//        $type='xls';
//        $pro=$request->exp;
////
////        return Excel::download('itsolutionstuff_example', function($excel) use ($data) {
////            $excel->sheet('mySheet', function($sheet) use ($data)
////            {
////                $sheet->fromArray($data);
////            });
////        })->download($type);
//
//        Excel::download('Export data', function($excel) {
//
//            $excel->sheet('Sheet', function($sheet) {
//                $data = Product::where('id',$pro)->first();
//
//                $sheet->fromArray($data);
//            });
//        })->download('xls');
//
//
//
//
//
////        $product=Product::where('id',$pro)->first();
        $product=$request->exp;

        $request->session()->put('product',$product);

        return Excel::download(new UsersExport, 'users.xlsx');

    }


}
