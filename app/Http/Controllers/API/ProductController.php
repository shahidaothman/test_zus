<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validate());
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product = Product::create($request->validate());
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->noContent();
    }

    public function insertProduct(Request $request)
    {
        $product = new Product([
            'name'  => $request->name,
            'status' => $request->status,
            'description' => $request->description,
            'price' => $request->price,

        ]);
        return $product->save();
    }

    public function editProduct($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return response()->json($product);
    }

    public function updateProduct(Request $request)
    {

    //    dd ($request);
        $product = Product::find($request->id);
        $product->name = $request->name; 
        $product->price = $request->price; 
        $product->status = $request->status; 
        $product->description = $request->description; 
        $product = $product->save();

    //  $data = array();

    // $data['name']= $request->name;
    // $data['status']=$request->status;
    // $data['description'] = $request->description;
    // $data['price'] = $request->price;

    // $product  = DB::table('products')->where('id',$id)->update($data);
    // return response()->json($product);
    }
}
