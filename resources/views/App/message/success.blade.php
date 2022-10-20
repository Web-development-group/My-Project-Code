@if (session()->has('success'))
    <div class="alert alert-dismissable alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="close">
            <span>&times;</span>
        </button>
        <strong>{!! session()->get('success') !!}</strong>
    </div>
@endif
