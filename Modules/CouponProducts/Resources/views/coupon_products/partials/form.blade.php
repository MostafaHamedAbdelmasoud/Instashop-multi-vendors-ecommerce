@include('dashboard::errors')

<select2
    name="coupon_id"
    label="@lang('coupons::coupons.singular')"
    placeholder="@lang('coupons::coupons.select')"
    remote-url="{{ route('coupons.select') }}"
    value="{{ $couponProduct->coupon_id ?? old('coupon_id') }}"
></select2>

{{ BsForm::select($name = 'model_type', $options = ['products','categories'], $value = null ) }}
{{ BsForm::number('model_id') }}
{{ BsForm::text('type') }}


