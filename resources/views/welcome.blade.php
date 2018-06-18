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
      <br>
        @foreach ($mono as $mono)
            <li>ID:{{ $mono->userid}}
            {!! link_to_route('game.show', $mono->id, ['mono' => $mono->id]) !!}
            <br>
            {!! Form::model($mono, ['route' => ['game.destroy', $mono->id], 'method' => 'delete']) !!}
            {!! Form::submit('削除') !!}
            {!! Form::close() !!}
            </li>
        @endforeach
       
        <?php
            var_dump($a);
            for($i=0;$i<count($a);$i++){
                for($j=$i;$j<count($a);$j++){
                    if($i==$j){
                        continue;
                    }
                    //$matchpercent="0";
                    $jibun=json_decode($a[$i]["mono"]);
                    $aite=json_decode($a[$j]["mono"]);
                    foreach($jibun as $q){
                        foreach($aite as $w){
                            //print (" jibun-" . $q . " aite-" . $w);
                            if($q==$w){
                                print ("match");
                                print (" jibun-" . $q . " aite-" . $w);
                            }
                        }
                    }
                }
            }
            //var_dump($a);
            //print (count($a));
        ?>
    </body>
</html>
