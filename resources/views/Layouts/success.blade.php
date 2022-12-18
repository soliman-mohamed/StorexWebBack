@if(session('success'))
    <div class="toast show text-bg-success text-white align-items-center" role="alert">
        <div class="d-flex"><div class="toast-body"> {{ session('success') }} </div>
        <button type="button" class="btn-close me-2 m-auto" data-coreui-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
@endif

