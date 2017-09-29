@extends('layouts.site')

@section('content')
<!-- Jumbotron -->


<!-- Example row of columns -->
<div class="row-fluid">
	@foreach($articles as $article)
    <div class="span4">
      <h2>{{ $article->title }}</h2>
      <p>{!! $article->desc !!}</p>
      <p><a class="btn" href="{{ route('articleShow',['id' => $article->id]) }}">View details artId={{ $article->id }} &raquo;</a></p>
    </div>
  @endforeach
</div>
@endsection