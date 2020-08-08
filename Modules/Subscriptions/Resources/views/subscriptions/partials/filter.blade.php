{{ BsForm::resource('subscriptions::subscriptions')->get(url()->current()) }}
@component('dashboard::layouts.components.box')
    @slot('title', trans('subscriptions::subscriptions.actions.filter'))

    <div class="row">
        <div class="col-md-6">
            {{ BsForm::text('model_type')->value(request('model_type')) }}
        </div>
        <div class="col-md-6">
            {{ BsForm::number('perPage')
                ->value(request('perPage', 15))
                ->min(1)
                 ->label(trans('subscriptions::subscriptions.perPage')) }}
        </div>

    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fas fa fa-fw fa-filter"></i>
            @lang('subscriptions::subscriptions.actions.filter')
        </button>
    @endslot
@endcomponent
{{ BsForm::close() }}
