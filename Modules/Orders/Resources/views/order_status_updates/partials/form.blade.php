@include('dashboard::errors')


<select2
    name="order_status_id"
    label="@lang('orders::order_status_updates.singular')"
    placeholder="@lang('orders::order_status_updates.select')"
    remote-url="{{ route('order_statues.select') }}"
    value="{{ $orderStatusUpdate->order_status_id ?? old('order_status_id') }}"
></select2>


{{--<select2--}}
{{--    name="coupon_id"--}}
{{--    label="@lang('orders::order.singular')"--}}
{{--    placeholder="@lang('orders::order.select')"--}}
{{--    remote-url="{{ route('coupons.select') }}"--}}
{{--    value="{{ $orderStatusUpdate->coupon_id  ?? old('coupon_id') }}"--}}
{{--></select2>--}}


{{ BsForm::textarea('notes') }}


