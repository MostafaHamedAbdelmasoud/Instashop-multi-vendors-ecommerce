@php($errorBag = $errorBag ?? 'default')
@if ($errors->{$errorBag}->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->{$errorBag}->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
