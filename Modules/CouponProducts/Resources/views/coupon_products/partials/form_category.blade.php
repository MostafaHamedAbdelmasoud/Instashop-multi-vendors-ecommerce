@include('dashboard::errors')

<select2
    name="coupon_id"
    label="@lang('coupons::coupons.singular')"
    placeholder="@lang('coupons::coupons.select')"
    remote-url="{{ route('coupons.select') }}"
    value="{{ $couponProduct->coupon_id ?? old('coupon_id') }}"
></select2>

{{ BsForm::radio($name='model_type' ,$value = 'category' ,$checked = true )->label(__('coupon_products::coupon_products.additions.category') )}}

<select2
    name="model_id"
    label="@lang('categories::categories.singular')"
    placeholder="@lang('categories::categories.select')"
    remote-url="{{ route('categories.select') }}"
    value="{{ $couponProduct->model_id ?? old('model_id') }}"
></select2>


{{BsForm::select($name = 'type', $options = [__('coupon_products::coupon_products.additions.included'),__('coupon_products::coupon_products.additions.excluded')], $value = null)}}


