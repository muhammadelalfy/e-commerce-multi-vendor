<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoriesContrller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //old way to filter
//        $request = request();
//        $query = Category::query(); //بترجع ال query builder الخاص بال category عشان اقدر اطبق عليه جمل where وغيرها
//        if ($name = $request->query('name')){
//            $query->where('name' , 'like' , "%{$name}%");
//        }
//
//        if ($status = $request->query('status')){
//            $query->where('status'  , $status);
//        }
//        $categories = $query->paginate(2);
        //left join with eloquent
        $categories = Category::with('parent')/*leftJoin('categories as parents' , 'categories.parent_id', '=' , 'parents.id')
            ->select(['categories.*' , 'parents.name as parent_name'])
            */->filter(\request()->query())->paginate(2);
//            dump($categories);
        return response()->view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        $parents = Category::all();
        return view('dashboard.categories.create', compact('parents', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->except('logo_image');
        if ($request->hasFile('logo_image')) {

            $file = $request->file('logo_image'); //object of uploadedfile
            $path = $file->store('uploads', ['disk'=>'public']); //STORE LOCAL IN STORAGE/APP
            // dd($path);

            $data['logo_image'] = $path;
        }
        $data['slug'] = Str::slug($request->name);

        Category::create($data);
        //PRG
        return redirect(route('categories.index'))->with(['success' => 'category saved successfully']);
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

        // dd($category->description);
        try {

            $category = Category::findOrFail($id);
        } catch (Exception $e) {
            Log::info($e);
            return redirect()->route('categories.index')->with(['info' => 'record not found']);
        }
        $parents = Category::where('id', '<>', $id)->where(function ($q) use ($id) {

            $q->whereNull('parent_id')
                ->orWhere('parent_id', '<>', $id);
        })->get();
        return view('dashboard.categories.edit', compact('parents', 'category'));
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
        // dd($request);
        $data = $request->except('logo_image');


        if ($request->hasFile('logo_image')) {
            $file = $request->file('logo_image'); //object of uploadedfile
            $path = $file->store('uploads', ['disk'=>'public']); //STORE LOCAL IN STORAGE/APP
            $data['logo_image'] = $path;

        }
      //  CQIzLWruuE7kJd4SgdSXdQ2JokrtwkltNXvWamEU
//uvHyuRTTp0MHOj2xLj0heTAJcuugm7lk3Syv2Wmm
        // try {
            $categories = Category::all();
            $category = Category::findOrFail($id);
            $old_img = $category->logo_image;
            // dd( $old_img);

            // dd($old_img);

            if($old_img != null && isset($data['logo_image'])){
                Storage::disk('public')->delete($old_img);
            }
            // dd( $data['logo_image'] );
        // } catch (Exception $e) {
        //     return redirect()->route('dashboard.categories.index')->with(['info' => 'record not found']);
        // }
        // $category->update($request->except(['logo_image']));
      //  dd($data);
      $category->update($data);

    //    $category->fill($data); //modify model object only
       // $category->save(); //modify database row
        return redirect(route('categories.index'))->with(['info' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // dd('s');
        $category->delete(); //delete data only from db but category object still exists
//        if($category->logo_image){
//            Storage::disk('public')->delete($category->logo_image);
//        }
        return redirect(route('categories.index'))->with(['success' => 'deleted successfully']);

    }
    public function trashed(){
        $categories = Category::onlyTrashed()->paginate(1);
        return view('dashboard.categories.trashed' , compact('categories'));
    }

    public function restore($id){
        $trashedCategory = Category::onlyTrashed()->findOrFail($id);
        $trashedCategory->restore();
        return redirect()->back()->with('success' , 'restored successfully');
    }

    public function forceDelete($id){
        $trashedCategory = Category::onlyTrashed()->findOrFail($id);
        $trashedCategory->forceDelete();
        if($trashedCategory->logo_image){
            Storage::disk('public')->delete($trashedCategory->logo_image);
        }
        return redirect()->route('categories.trashed')->with('success' , 'deleted permanent !');
    }
}
