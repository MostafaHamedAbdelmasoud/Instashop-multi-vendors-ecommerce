@can('delete', $shippingCompany)
    <a href="#shipping_company-{{ $shippingCompany->id }}-delete-model"
       class="btn btn-outline-danger btn-sm"
       data-toggle="modal">
        <i class="fas fa fa-fw fa-user-times"></i>
    </a>


    <!-- Modal -->
    <div class="modal fade" id="shipping_company-{{ $shippingCompany->id }}-delete-model" tabindex="-1" role="dialog"
         aria-labelledby="modal-title-{{ $shippingCompany->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-{{ $shippingCompany->id }}">@lang('accounts::shipping_companies.dialogs.delete.title')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('accounts::shipping_companies.dialogs.delete.info')
                </div>
                <div class="modal-footer">
                    {{ BsForm::delete(route('dashboard.shipping_company_owners.shipping_companies.destroy', [$shippingCompanyOwner, $shippingCompany])) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        @lang('accounts::shipping_companies.dialogs.delete.cancel')
                    </button>
                    <button type="submit" class="btn btn-danger">
                        @lang('accounts::shipping_companies.dialogs.delete.confirm')
                    </button>
                    {{ BsForm::close() }}
                </div>
            </div>
        </div>
    </div>
@endcan
