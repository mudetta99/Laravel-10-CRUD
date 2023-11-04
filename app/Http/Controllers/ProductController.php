<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // HIDE ALL UNTILL LOGIN IN
    // public function __construct(){
    //     $this -> middleware('auth');
    // }

    // HIDE ALL EXCEPT WHAT YOU CHOOSE
    // public function __construct(){
    //     $this -> middleware('auth') -> except(['index', 'show']);
    // }
        
    // HIDE ONLY WHAT YOU CHOOSE
    // public function __construct() {
    //     $this->middleware('auth') -> only(['store', 'create', 'edit', 'destroy', 'update']);
    // }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $products = Product::latest() -> paginate(5);
        return view('products.index', compact('products'))
            -> with('i', (request() -> input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request -> all());


        $request -> validate([
            'name' => 'required',
            'details' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,svg,avif|max:2048'
        ]);

        $input = $request -> all();

        if ($image = $request -> file('image')) {

            $destinationPath = 'images/';
            $profileImage = date('YmdHis').".".$image -> getClientOriginalExtension();
            $image -> move( $destinationPath, $profileImage);
            $input['image'] = "$profileImage";

            Product::create($input);
            return redirect() -> route('products.index')
                -> with ('success', 'product added successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request -> validate([
            'name' => 'required',
            'details' => 'required'
        ]);

        $input = $request -> all();
        if ($image = $request -> file('image')) {

            $destinationPath = 'images/';
            $profileImage = date('YmdHis').".".$image -> getClientOriginalExtension();
            $image -> move( $destinationPath, $profileImage );
            $input['image'] = "$profileImage";

        }else {
            unset( $input['image'] );
        }

        $product -> update($input);
        return redirect() -> route('products.index')
            -> with('success', 'product updated successfullly');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product -> delete();

        return redirect() -> route('products.index')
            -> with ('success','product deleted successfully');
            
    }       
}
