@extends('templates.layout')
@section('content')
@if ($result)
    <ul>
        @foreach($result as $res)
            <li>{{ json_decode($res, true)['id'] }}</li>
            <li>{{ json_decode($res, true)['title'] }}</li>
            <li>{{ json_decode($res, true)['author'] }}</li>
            <li>{{ json_decode($res, true)['content'] }}</li>
        @endforeach
    </ul>
@else
    <h4>The posts have been successfully created!</h4>
@endif
@endsection
