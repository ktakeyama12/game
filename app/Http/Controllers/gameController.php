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
        $mono = Mono::find($id);
        //$a = $mono->toArray();
        return view('game.show', [
            'mono' => $mono,
            //'a' => $a
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
        $b = json_encode(array($request->mono));
        $mono->mono = $b;
        //$mono->mono = $request->mono;
        $mono->save();

        return redirect('/');
    }
    public function edit($id)
    {
        $mono = Mono::find($id);

        return view('game.edit', [
            'mono' => $mono,
        ]);
    }
    public function update(Request $request, $id)
    {
        $mono = Mono::find($id);
        $b=json_decode($mono->mono);
        //var_dump($request->mono);exit;
        array_push($b, $request->mono);
        $mono->mono=json_encode($b);
        
        //$mono->mono = $request->mono;
        $mono->save();
        return view('game.show', [
            'mono' => $mono,
        ]);
        //return view('game.update');
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