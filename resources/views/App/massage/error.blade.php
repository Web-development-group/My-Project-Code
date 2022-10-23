@if (session()->has('error'))
<div class="alert alert-dismissanle alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>{!!session()->get('error')!!}</strong>
</div>

@endif
