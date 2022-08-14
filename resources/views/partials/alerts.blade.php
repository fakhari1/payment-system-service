<div class="col-md-6 mt-5">

    @if(session('success_msg'))
        <div class="alert alert-success">
            {{ session('success_msg') }}
        </div>
    @endif

    @if(session('error_msg'))
        <div class="alert alert-danger">
            {{ session('error_msg') }}
        </div>
    @endif

    @if(session('warn_message'))
        <div class="alert alert-warning w-50 mx-auto d-block p-2">
            {{ session('warn_message') }}
        </div>
    @endif
</div>
