<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class controllerProduct extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexView()
    {
        return view('products');
    }

    public function index()
    {
        $prods = Product::all();
        return $prods->toJson();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prod = new Product();
        $prod->name = $request->input('name');
        $prod->amount = $request->input('amount');
        $prod->price = $request->input('price');
        $prod->department_id = $request->input('department_id');
        $prod->save();

        return json_encode($prod);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prod = Product::find($id);
        if(isset($prod)){
            return json_encode($prod);
        }
        return response('Produto não encontrado', 404);
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
        $prod = Product::find($id);
        if(isset($prod)){
            $prod->name = $request->input('name');
            $prod->amount = $request->input('amount');
            $prod->price = $request->input('price');
            $prod->department_id = $request->input('department_id');
            $prod->save();
    
            return json_encode($prod);
        }
        return response('Produto não encontrado', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Product::find($id);
        if(isset($prod)){
            $prod->delete();
            return response('Produto foi removido do sistema', 200);
        }
        return response('Produto não encontrado', 404);
    }
}
