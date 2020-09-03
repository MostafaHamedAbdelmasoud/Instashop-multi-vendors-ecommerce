{{ BsForm::resource('categories::categories')->get(url()->current()) }}
@component('dashboard::layouts.components.box')
    @slot('title', trans('categories::categories.actions.filter'))

    <div class="row">
        <div class="col-md-6">
            {{ BsForm::text('id')->value(request('id')) }}
        </div>
        <div class="col-md-6">
            {{ BsForm::number('perPage')
                ->value(request('perPage', 15))
                ->min(1)
                 ->label(trans('accounts::delegates.perPage')) }}
        </div>

    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fas fa fa-fw fa-filter"></i>
            @lang('categories::categories.actions.filter')
        </button>
    @endslot
@endcomponent
{{ BsForm::close() }}
