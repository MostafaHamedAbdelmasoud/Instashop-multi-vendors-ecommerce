@include('dashboard::errors')

@bsMultilangualFormTabs
{{ BsForm::text('name') }}
{{ BsForm::textarea('description') }}
{{ BsForm::textarea('meta_description')}}
{{ BsForm::textarea('keywords')}}
@endBsMultilangualFormTabs
{{ BsForm::text('domain') }}
{{ BsForm::textarea('plan')}}
{{ BsForm::file('store')}}

