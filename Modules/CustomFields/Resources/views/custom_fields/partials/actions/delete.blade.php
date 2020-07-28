@can('delete', $customField)
    <a href="#user-{{ $customField->id }}-delete-model"
       class="btn btn-outline-danger btn-sm"
       data-toggle="modal">
        <i class="fas fa fa-fw fa-user-times"></i>
    </a>


    <!-- Modal -->
    <div class="modal fade" id="user-{{ $customField->id }}-delete-model" tabindex="-1" role="dialog"
         aria-labelledby="modal-title-{{ $customField->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-{{ $customField->id }}">@lang('custom_fields::custom_fields.dialogs.delete.title')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('custom_fields::custom_fields.dialogs.delete.info')
                </div>
                <div class="modal-footer">
                    {{ BsForm::delete(route('dashboard.custom_fields.destroy', $customField)) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        @lang('custom_fields::custom_fields.dialogs.delete.cancel')
                    </button>
                    <button type="submit" class="btn btn-danger">
                        @lang('custom_fields::custom_fields.dialogs.delete.confirm')
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
