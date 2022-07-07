<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        // if($search = request('search')) {
        //     $categories =Category::where('name', 'like', "%$search%")->orderBy('id', 'desc')->paginate(5)->withQueryString();
        // } else {
        //     $categories = Category::orderBy('id', 'desc')->paginate(5);
        // }
       $categories =  Category::when('bool', function($query) { $query->
            where('name', 'like', '%'.request('search'). '%');
        })
        ->orderBy('id', 'desc')
        ->paginate(5)
        ->withQueryString();
      
        // $categories = Category::join('category_post', 'category_post.category_id', '=', 'categories.id')
        //         ->select('categories.*', 'categories.name as category')
        //         ->paginate(5);

        // $categories = DB::table('categories')
        //     ->join('category_post', 'categories.id', '=', 'category_post.category_id')
        //     ->get();

        
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        category::create([
            'name' => $request->name
        ]);

        // return "save";
        return redirect('categories')->with('success', 'A category is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return redirect('categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $category = Category::find($id);
       return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {   
        $category = Category::find($id);
        $category->update($request->only(['name']));
        return redirect('categories')->with('success', 'A category is deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
       return redirect('categories')->with('success', 'A category is updated successfully');
    }
}
