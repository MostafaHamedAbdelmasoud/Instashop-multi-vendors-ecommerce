<?php

return [
    'plural' => 'Accounts',
    'types' => [
        \Modules\Accounts\Entities\User::ADMIN_TYPE => 'Admin',
        \Modules\Accounts\Entities\User::CUSTOMER_TYPE => 'Customer',
        \Modules\Accounts\Entities\User::STORE_OWNER_TYPE => 'StoreOwner',
        \Modules\Accounts\Entities\User::SUPERVISOR_TYPE => 'Supervisor',
        \Modules\Accounts\Entities\User::SHIPPING_COMPANY_OWNER_TYPE => 'ShippingCompanyOwner',
        \Modules\Accounts\Entities\User::DELEGATE_TYPE => 'Delegate',
    ],
];
