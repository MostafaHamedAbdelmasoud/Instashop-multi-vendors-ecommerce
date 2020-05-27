{{ BsForm::resource('accounts::shipping_companies')->get(url()->current()) }}
@component('dashboard::layouts.components.box')
    @slot('title', trans('accounts::shipping_companies.actions.filter'))

    <div class="row">
        <div class="col-md-3">
            {{ BsForm::text('name')->value(request('name')) }}
        </div>

        <div class="col-md-3">
            {{ BsForm::number('perPage')
                ->value(request('perPage', 15))
                ->min(1)
                 ->label(trans('accounts::shipping_companies.perPage')) }}
        </div>
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fas fa fa-fw fa-filter"></i>
            @lang('accounts::shipping_companies.actions.filter')
        </button>
    @endslot
@endcomponent
{{ BsForm::close() }}
