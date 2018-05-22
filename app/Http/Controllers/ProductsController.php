<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use View;
use Validator;

class ProductsController extends Controller
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
        $item = Product::paginate(2);
        return view('products.index', ['products' => $item]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ];
        $validator = Validator::make($data, [
           'title' => 'required',
           'price' => 'required',
           'description' => 'required',
        ]);
        if ($validator->fails())
        {
           return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        else
        {
        Product::create($data);
        return redirect('/products/create')->with('flash_message', "Creado con exito");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Product::FindOrFail($id);
        return view('products.show', ['product' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Product::FindOrFail($id);
        return view('products.edit', ['product' => $item]);
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
        $product = Product::findOrFail($id);
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ];
        $validator = Validator::make($data, [
           'title' => 'required',
           'price' => 'required',
           'description' => 'required',
        ]);
        if ($validator->fails()) 
        {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        else
        {
            $product->update($data);
            return redirect('/products/'.$id.'/edit')->with('flash_message', "Actualizado con exito");
        }
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/products')->with('flash_message', "Eliminado con exito");
    }
}
