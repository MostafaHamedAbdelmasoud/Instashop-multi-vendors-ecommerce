@include('dashboard::errors')




{{BsForm::select($name = 'model_type', $options = [trans('offers::offers.additions.product'),trans('offers::offers.additions.category'),trans('offers::offers.additions.store')], $value = null)}}


{{ BsForm::text('name') }}
{{ BsForm::text('fixed_discount_price') }}
{{ BsForm::text('percentage_discount_price') }}
{{ BsForm::number('model_id') }}
{{ BsForm::date('expire_at') }}


