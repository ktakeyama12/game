<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>佐曽Rich</title>
    </head>
    
    <body>
        <h1>佐曽Rich</h1>
        <img src="rich.JPG"></img>
        <form method='POST'>
        <input type="text" name="food">
        <input type="submit" name="_token" value="{{ csrf_token() }}"> to {{ csrf_field() }}
     </form>
     <a href="food.blade.php">与えてきたエサ</a>
     <br>
      {!! link_to_route('game.create', '新規Usersakusei') !!}
      <?php var_dump ($a[0]);?>
      <br>
        @foreach ($mono as $mono)
            <li>ID:{{ $mono->userid}}
             {!! link_to_route('game.show', $mono->id, ['mono' => $mono->id]) !!}
             <br>
            </li>
        @endforeach
     <form method="post">
         {{ csrf_field() }}
 名前: <input type="text" name="name" />
 年齢: <input type="text" name="age" />
 <input type="submit" />
</form>

あなたは、<?php 
 if (isset($_POST['age'])) {
 echo (int)$_POST['age']; 
 }
 ?> 歳です
    </body>
</html>
