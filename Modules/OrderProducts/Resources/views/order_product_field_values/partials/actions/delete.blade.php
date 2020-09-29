@can('delete', $orderProductFieldValue)
    <a href="#user-{{ $orderProductFieldValue->id }}-delete-model"
       class="btn btn-outline-danger btn-sm"
       data-toggle="modal">
        <i class="fas fa fa-fw fa-user-times"></i>
    </a>


    <!-- Modal -->
    <div class="modal fade" id="user-{{ $orderProductFieldValue->id }}-delete-model" tabindex="-1" role="dialog"
         aria-labelledby="modal-title-{{ $orderProductFieldValue->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-{{ $orderProductFieldValue->id }}">@lang('order_products::order_products.dialogs.delete.title')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('order_products::order_products.dialogs.delete.info')
                </div>
                <div class="modal-footer">
                    {{ BsForm::delete(route('dashboard.order_products.order_product_field_values.destroy', [$orderProduct,$orderProductFieldValue])) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        @lang('order_products::order_products.dialogs.delete.cancel')
                    </button>
                    <button type="submit" class="btn btn-danger">
                        @lang('order_products::order_products.dialogs.delete.confirm')
                    </button>
                    {{ BsForm::close() }}
                </div>
            </div>
        </div>
    </div>
@else
    <button
        type="button"
        disabled
        class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-user-times"></i>
    </button>
@endcan
