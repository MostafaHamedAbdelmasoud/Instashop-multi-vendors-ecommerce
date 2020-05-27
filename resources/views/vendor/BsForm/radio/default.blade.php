<?php
$id = 'checkbox-'.Str::random('4').'-'.$name;
?>

<div class="form-group">
    <div class="form-check">
        {{ Form::radio($name, $value, $checked, ['class' => 'form-check-input', 'id' => $id]) }}
        <label class="form-check-label" for="{{ $id }}">
            {{ $label }}
        </label>
        <small class="form-text text-muted">{{ $note }}</small>
    </div>
</div>


