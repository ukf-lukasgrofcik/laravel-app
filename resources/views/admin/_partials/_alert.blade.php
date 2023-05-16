@if( session('alert') && session('message') )
    <div class="row mt-3">
        <div class="col-sm-12">
            <div class="alert alert-{{ session('alert') }} alert-dismissible fade show" role="alert">
                {!! session('message') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
