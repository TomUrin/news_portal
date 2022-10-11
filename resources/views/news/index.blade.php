@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            {{-- @include('front.box') --}}
            <div class="card">
                <div class="card-header">Naujienų sąrašas</div>
                <div class="card-body">
                    @if (Auth::user()->role > 9)
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="d-grid gap-2">
                                <a class="btn btn-outline-success mb-2" href="{{route('news-create')}}">Paspauskite norint pridėti naujieną</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Antraštė</th>
                                <th scope="col">Veiksmai</th>
                        </thead>
                        @foreach($news as $new)
                        <tbody>
                            <tr> 
                            <td scope="row"> {{$new->title}} </td>
                                @if (Auth::user()->role > 9)
                                <td scope="row" class="actions">
                                    <a class="btn btn-outline-warning btn-sm me-2 " href="{{route('news-edit', $new)}}">REDAGUOTI</a>
                                    <form method="POST" action="{{route('news-delete', $new)}}">
                                        <button class="btn btn-outline-danger btn-sm mt-2" type="submit">TRINTI</button>
                                </td>
                                @endif
                            </tr>
                        </tbody>
                        @csrf
                        @method('delete')
                        </form>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
