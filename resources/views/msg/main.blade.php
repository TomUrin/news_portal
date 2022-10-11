<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('success'))
            <div class="alert alert-success" align="center" role="alert">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger" align="center" role="alert">
                {{ session('error') }}
            </div>
            @endif

            @if(session('infoUpdate'))
            <div class="alert alert-success" align="center" role="alert">
                {{ session('infoUpdate') }}
            </div>
            @endif

            @if(session('deleted'))
            <div class="alert alert-success" align="center" role="alert">
                {{ session('deleted') }}
            </div>
            @endif
        </div>
    </div>
</div>