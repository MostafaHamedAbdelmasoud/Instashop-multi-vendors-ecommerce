@include('dashboard::errors')
{{ BsForm::text('name') }}
{{ BsForm::text('domain') }}
{{ BsForm::textarea('description') }}
{{ BsForm::textarea('meta_description') }}
{{ BsForm::textarea('keywords') }}
{{ BsForm::text('plan') }}
