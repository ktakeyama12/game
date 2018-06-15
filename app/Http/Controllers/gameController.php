<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mono;

class gameController extends Controller
{
    
    public function index()
    {
    $mono = Mono::all();
    //$users = User::all();
        
    $a = $mono->toArray();
        
        return view('welcome', [
            'mono' => $mono,
            //'users' => $users,
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
        $mono = new Mono;

        return view('create', [
            'mono' => $mono,
        ]);
    }
    public function store(Request $request)
    {
        
        $mono = new Mono;
        $mono->userid = $request->userid;
        $mono->mono = $request->mono;
        $mono->save();

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
     
     //マッチ度の計算。アレイの中で一致しているモノを表示し、それをもとに計算する機能。
    public function match($userId){
        $match=10;
        if (\Auth::check()) {
            $user = \Auth::user();
            foreach($userId as $key){
                foreach($user as $value){
                    if($key == $value){
                        $match*=2;
                        print 'Nice! you have '.$value.'. '.$userId.' have '.$key.' in common!';
                    }
                }
            }
            print 'you are '.$match.' % matched with '.$userId.'. you should have lunch together';
        }
    }
    
    //毎日の餌
    public function eat($input){
        array_push($this, $input);
    }
    
    //食べたものリスト
    public function food($userId){
        foreach($userId as $key){
            print $key;
        }
    }
    
    
}