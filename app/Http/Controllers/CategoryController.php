<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO implement this
        $categories = category::paginate(3);;

        return view('categories.index', ['categories' => $categories]);
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
    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|min:2|max:255',
            'description'      => 'required|string|min:15',
        ]);

        $category = Category::create($request->only(['name', 'description']));
        
        if ($category)
            request()->session()->flash('success', 'Category was created successfully.');
        else
            request()->session()->flash('danger', 'Something went wrong.');
        
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // TODO implement this
        $category->firstOrFail();
        return view('categories.show', ['category' => $category]);
        // TODO Create the view
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // TODO implement this
        return view('categories.edit', ['category' => $category]);
        // TODO Create the view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // TODO implement this
        $request->validate([
            'name'             => 'required|string|min:2|max:255',
            'description'      => 'required|string|min:15',
        ]);
        $category = Category::create($request->only(['name', 'description']));
        if ($category)
        request()->session()->flash('success', 'Category was created successfully.');
    else
        request()->session()->flash('danger', 'Something went wrong.');
    
    return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // TODO implement this
    }
}
