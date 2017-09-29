@extends('layouts.site')

@section('button_logo')


    <a class="btn btn-large btn-success" href="{{ route('articleLast',['id' => $article->id]) }}">Get started today</a>

@endsection