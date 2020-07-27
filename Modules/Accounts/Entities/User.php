<?php

namespace Modules\Accounts\Entities;

use Parental\HasChildren;
use App\Http\Filters\Filterable;
use Chatify\Http\Models\Message;
use Modules\Support\Traits\Selectable;
use Illuminate\Notifications\Notifiable;
use Laracasts\Presenter\PresentableTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Modules\Accounts\Entities\Helpers\UserHelpers;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Accounts\Entities\Presenters\UserPresenter;

class User extends Authenticatable implements HasMedia
{
    use Notifiable,
        UserHelpers,
        HasChildren,
        HasMediaTrait,
        HasChildren,
        PresentableTrait,
        Filterable,
        Selectable;

    /**
     * The code of admin type.
     *
     * @var string
     */
    const ADMIN_TYPE = 'admin';

    /**
     * The code of customer type.
     *
     * @var string
     */
    const CUSTOMER_TYPE = 'customer';

    /**
     * The code of store owner type.
     *
     * @var string
     */
    const STORE_OWNER_TYPE = 'store_owner';

    /**
     * The code of supervisor type.
     *
     * @var string
     */
    const SUPERVISOR_TYPE = 'supervisor';

    /**
     * The code of shipping company owner type.
     *
     * @var string
     */
    const SHIPPING_COMPANY_OWNER_TYPE = 'shipping_company_owner';

    /**
     * The code of shipping company owner type.
     *
     * @var string
     */
    const DELEGATE_TYPE = 'delegate';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'country_id',
        'remember_token',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['media'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array
     */
    protected $childTypes = [
        self::ADMIN_TYPE => Admin::class,
        self::CUSTOMER_TYPE => Customer::class,
        self::STORE_OWNER_TYPE => StoreOwner::class,
        self::SUPERVISOR_TYPE => Supervisor::class,
        self::SHIPPING_COMPANY_OWNER_TYPE => ShippingCompanyOwner::class,
        self::DELEGATE_TYPE => Delegate::class,
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The presenter class name.
     *
     * @var string
     */
    protected $presenter = UserPresenter::class;

    /**
     * Get the number of models to return per page.
     *
     * @return int
     */
    public function getPerPage()
    {
        return request('perPage', parent::getPerPage());
    }

    /**
     * Define the media collections.
     *
     * @return void
     */
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('avatars')
            ->useFallbackUrl('https://www.gravatar.com/avatar/'.md5($this->email).'?d=mm')
            ->singleFile();
    }
}
