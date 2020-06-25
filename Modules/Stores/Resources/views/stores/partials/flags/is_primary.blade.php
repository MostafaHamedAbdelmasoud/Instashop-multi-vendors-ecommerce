@if($address->is_primary)
    <i class="fas fa-lg fa-fw fa-check text-success"></i>
@else
    <i class="fas fa-lg fa-fw fa-times text-danger"></i>
@endif