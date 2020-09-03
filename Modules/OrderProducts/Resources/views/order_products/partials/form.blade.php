@include('dashboard::errors')


<select2
    name="order_id"
    label="@lang('orders::orders.singular')"
    placeholder="@lang('orders::orders.select')"
    remote-url="{{ route('orders.select') }}"
    value="{{ $orderProduct->order_id ?? old('order_id') }}"
></select2>

<select2
    name="product_id"
    label="@lang('products::products.singular')"
    placeholder="@lang('products::products.select')"
    remote-url="{{ route('products.select') }}"
    value="{{ $orderProduct->product_id ?? old('product_id') }}"
></select2>

{{ BsForm::text('price') }}
{{ BsForm::number('quantity') }}


