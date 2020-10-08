@extends('products::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('template_banners.name') !!}
    </p>
@endsection
