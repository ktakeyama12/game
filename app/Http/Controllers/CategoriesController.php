<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\User;

class CategoriesController extends Controller
{
    
    public function index()
    {
    $categories = Category::all();
    $users = User::all();
        
    $a = $categories->toArray();
        
        return view('categories.index', [
            'categories' => $categories,
            'users' => $users,
                        'a' => $a,
        ]);
    }
    
    public function show($id)
    {
        $categories = Category::find($id);

        return view('categories.show', [
            'categories' => $categories,
        ]);
    }
    public function create()
    {
        $category = new Category;

        return view('categories.create', [
            'category' => $category,
        ]);
    }
    public function store(Request $request)
    {
        
        $category = new Category;
        $category->sports = $request->sports;
        $category->food = $request->food;
        $category->music = $request->music;
        $category->save();

        return redirect('/');
    }
    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', [
            'categories' => $categories,
        ]);
    }
    public function update(Request $request, $id)
    {
        $category = Message::find($id);
        $category->content = $request->content;
        $category->save();

        return redirect('/');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('/');
    }

}
