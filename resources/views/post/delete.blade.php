@extends('templates.layout')
@section('content')
    @if ($deleted)
        <div class="alert-success">Post {{ $postId }} has been successfully deleted</div>
    @endif
@endsection
