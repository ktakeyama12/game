@extends('layouts.app')

@section('content')

    <h1>メッセージ新規作成ページ</h1>
    {!! Form::model($mono, ['route' => 'game.store']) !!}

        {!! Form::label('userid', 'NAMAE:') !!}
        {!! Form::text('userid') !!}
        
        {!! Form::label('mono', 'SAISHO:') !!}
        {!! Form::text('mono') !!}

        {!! Form::submit('投稿') !!}
        
    {!! Form::close() !!}

@endsection