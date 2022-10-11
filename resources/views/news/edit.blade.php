@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">Redaguoti naujienos informaciją</div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a class="btn btn-outline-success mb-2" href="{{route('news-index')}}">Grižti prie naujienų sąrašo</a>
                    </div>
                    <form method="post" action="{{route('news-update', $news)}}" enctype="multipart/form-data">
                        @if (Auth::user()->role > 9)
                            <div class="form-group mt-4">
                                    <label>Antraštė</label>
                                    <input name="newTitle" type="text" class="form-control" value="{{$news->title}}">
                                <div class="form-group mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Naujienos tekstas</label>
                                    <textarea name="newContent" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$news->content}}</textarea>
                                </div>
                                <div style="color: crimson;">{{ $errors->first('price') }}</div>
                            </div>
                            <div class="form-group mt-4">
                                <label for="exampleInputPassword1" class="form-label">Kategorija</label>
                                <div>
                                    <select name="newCategory" class="form-select">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($category->id == $news->category_id) selected @endif>{{$category->category_title}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                    <label>Nuotrauka</label>
                                <div>
                                    <img class="photo-box" src="{{ $news->image_path }}" />
                                    <input name="food_photo" type="file" class="form-control">
                                </div>
                            </div>
                            <div class="mx-auto mt-4">
                                <button type="submit" name="submit" value="send" class="btn btn-outline-success btn-sm">REDAGUOTI</button>
                            </div>
                        @endif
                        @csrf
                        @method('put')
                    </form>
                    @if (Auth::user()->role < 9)
                        @if($news->image_path)
                            <form method="post" action="{{route('dish-delete-picture', $news)}}" enctype="multipart/form-data">
                                <button type="submit" class="btn btn-outline-danger btn-sm">Ištrinti nuotrauką</button>
                                @csrf
                                @method('put')
                            </form>
                        @endif
                    @endif
@endsection
