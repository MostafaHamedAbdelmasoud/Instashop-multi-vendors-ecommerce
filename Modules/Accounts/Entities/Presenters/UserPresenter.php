<?php

namespace Modules\Accounts\Entities\Presenters;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{
    /**
     * Display the localed type.
     *
     * @return string
     */
    public function type()
    {
        return trans('accounts::users.types.'.$this->entity->type);
    }
}
