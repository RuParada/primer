@extends('layouts.site')

@section('content')

<form method="POST" action="{{route('articleStore')}}">
  <div class="form-group">
    <label for="title">Заголовок:</label>
    <input type="text" class="form-control" id="title">
  </div>
  <div class="form-group">
    <label for="alias">Псевдоним:</label>
    <input type="text" class="form-control" id="alias">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Описание:</label>
    <textarea class="form-control" name="desc"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Полный текст:</label>
    <textarea class="form-control" name="text"></textarea>
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>

	{{ csrf_field() }}
</form>

@endsection