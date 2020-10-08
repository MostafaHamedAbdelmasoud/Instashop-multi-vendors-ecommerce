@include('dashboard::errors')


{{ BsForm::text('code') }}
{{ BsForm::text('fixed_discount') }}
{{ BsForm::text('percentage_discount') }}
{{ BsForm::number('max_usage_per_order') }}
{{ BsForm::number('max_usage_per_user') }}
{{ BsForm::text('min_total') }}


