@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">Pridėti naujieną</div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a class="btn btn-outline-success mb-5" href="{{route('news-index')}}">Paspauskite norėdami pamatyti naujienų sąrašą</a>
                    </div>
                    <form class="create" action="{{route('news-store')}}" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="exampleInputPassword1" class="form-label">Kategorija</label>
                            <div>
                                <select name="category_id" class="form-select">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_title}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="color: crimson;">{{ $errors->first('workshop') }}</div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Antraštė</label>
                            <input name="title" type="text" class="form-control">
                            <div style="color: crimson;">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Naujienos tekstas</label>
                            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            <div style="color: crimson;">{{ $errors->first('surname') }}</div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nuotrauka</label>
                            <input name="news_photo" type="file" class="form-control">
                            <div style="color: crimson;">{{ $errors->first('photo') }}</div>
                        </div>
                        @csrf
                        @method('post')
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="d-grid gap-2">
                                    <button type="submit" name="submit" value="send" class="btn btn-outline-success mt-5 btn-lg">Pridėti</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="w-4/8 m-auto text-center">
    @foreach ($errors->all() as $error)
    <li class="text-danger list-none">
        {{ $error }}
    </li>
    @endforeach
</div>
@endif
@endsection
