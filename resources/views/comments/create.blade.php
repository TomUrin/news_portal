@extends('layouts.app')

@section('content')
<section style="background-color: #eee;">

    <div class="container my-5 py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-start align-items-center">
                            <div>
                                <h6 class="fw-bold text-primary mb-1">Lily Coleman</h6>
                            </div>
                        </div>
                    </div>
                    <form class="create" action="{{route('comments-store')}}" method="post" enctype="multipart/form-data">
                        <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                            <div class="d-flex flex-start w-100">
                                <div class="form-outline w-100">
                                    <textarea name="content" class="form-control" id="textAreaExample" rows="4" style="background: #fff;"></textarea>
                                    <label class="form-label" for="textAreaExample">Tekstas</label>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="d-grid gap-2">
                                    <button type="submit" name="submit" value="send" class="btn btn-outline-success mt-5 btn-lg">Pridėti</button>
                                </div>
                            </div>
                        </div>
                        </div>
                        @csrf
                        @method('post')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
