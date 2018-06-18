@extends('layouts.app')

@section('content')

    <h1>{{ $mono->userid }} の詳細ページ</h1>
    <li>Userid:{{ $mono->userid }}</li>
    <?php
        //$b = unserialize($mono->mono);
        //array_push($b, "uho");
        //var_dump($b);
    ?>
    <li>Mono:{{ $mono->mono }}</li>
    
    {!! Form::model($mono, ['route' => ['game.update', $mono->id], 'method' => 'put']) !!}
        <div class="form-group">
            {!! Form::label('mono', 'ステータス:') !!}
            
    
<input class="form-control" name="mono" type="text" value="">
            
        </div>
    {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}
    {!! Form::close() !!}

@endsection