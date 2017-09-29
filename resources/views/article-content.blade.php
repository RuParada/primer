@extends('layouts.site')

@section('content')

<!-- Example one row -->
<div class="row-fluid">
  @if($article)
    <div class="span4">
      <h2>{{ $article->title }}</h2>
      <p>{!! $article->text !!}</p>
    </div>
  @endif
</div>
@endsection