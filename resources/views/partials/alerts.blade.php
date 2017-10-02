@if (isset($errors) && count($errors->all()) > 0)
    <div class="style-msg alertmsg kk-alert">
        <a class="close" data-dismiss="alert">×</a>
        <div class="sb-msg">
            Please check the form below for errors
        </div>
    </div>
@endif

<?php $types = ['success', 'error', 'warning', 'info']; ?>

@foreach ($types as $type)
    @if ($message = Session::get($type))
        <?php if ($type === 'warning') $type = 'alert'; ?>
        <div class="style-msg {{ $type }}msg kk-alert" style="margin-bottom: 0">
            <div class="sb-msg">
                {!! $message !!}
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    @endif
@endforeach
