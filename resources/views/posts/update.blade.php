@extends('templates.layout')
@section('content')
@if ($updatedFirstPost || $updatedLastPost)
    <h4>The following entities have been updated</h4>
    {{ $updatedFirstPost }}
    {{ $updatedLastPost }}
@endif
@endsection
