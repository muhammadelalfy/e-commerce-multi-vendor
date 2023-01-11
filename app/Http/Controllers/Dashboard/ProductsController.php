<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $products = Product::paginate();
        return view('dashboard.products.index' , compact('products'));
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
        //
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
     * @return  View
     */
    public function edit($id)
    {

        $categories = Category::all();
        $product = Product::findOrFail($id);
        $tags = implode(',',$product->tags()->pluck('name')->toArray());
//dd($tags);
//        dd($categories);
        return view('dashboard.products.edit' , compact('categories' , 'product' , 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
//        dd(json_decode($request->tags));
        $product->update($request->except('tags'));
        $tags =  json_decode($request->post('tags'));
        $tag_ids=[];
        foreach ($tags as $item){
            $slug = Str::slug($item->value);
          $tag =  Tag::firstOrCreate([ 'slug' => $slug],['name' => $item->value ]); //search if there are model matching create new one with given parameters
            $tag_ids[] = $tag->id; //get ids of tags inserted
        }
        $product->tags()->sync($tag_ids); //sync searches if there are matches records if found dousnt delete the matched record if it has record not found in table will insertt it and if it doesnt have a record which exists in table delete it from table
        return redirect()->back()->with(['success' => 'Product updated']);
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
