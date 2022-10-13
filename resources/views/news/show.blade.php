@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Naujiena</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="d-grid gap-4">
                                <a class="btn btn-outline-success mb-2" href="{{route('news-index')}}">Paspauskite
                                    norėdami pamatyti naujienų sąrašą</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3>
                            {{$news->categoryInfo->category_title}}
                        </h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="d-grid gap-4 mb-5">
                                <h1>{{$news->title}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="d-grid gap-4 mb-5">
                                <p>
                                    {{$news->content}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <section class="comment-list mb-5 col-8">
                            <h2 class="section-title mb-5 text-center" data-aos="fade-up">Visi komentarai ({{
                                $news->comments->count() }})</h2>
                            @foreach($news->comments as $comment)
                            <div class="comment-text mb-4">
                                <span class="username">
                                    <div>
                                        {{ $comment->userInfo->email }}
                                    </div>
                                    <span class="text-muted float-end">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                                </span>
                                {{ $comment->comment }}
                            </div>
                            @endforeach
                        </section>
                    </div>
                    <section class="comment-section">
                        <h2 class="section-title mb-5 text-center" data-aos="fade-up">Pridėti komentarą</h2>
                        <form action=" {{ route('news-comments-store', $news->id) }} " method="post" class="mb-0">
                            @csrf
                            @method('post')
                            <div class="row justify-content-center">
                                <div class="form-group col-8 mb-3" data-aos="fade-up">
                                    <label for="comments" class="sr-only">Tekstas</label>
                                    <textarea name="comment" id="comments" class="form-control"
                                        placeholder="Jūsų komentaras"></textarea>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-2">
                                    <div class="d-grid gap-4" data-aos="fade-up">
                                        <input type="submit" value="Komentuoti" class="btn btn-warning">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection