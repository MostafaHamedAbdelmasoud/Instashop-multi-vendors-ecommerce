<?php

return [
    'plural' => 'العضويات',
    'types' => [
        \Modules\Accounts\Entities\User::ADMIN_TYPE => 'مسئول',
        \Modules\Accounts\Entities\User::CUSTOMER_TYPE => 'عميل',
        \Modules\Accounts\Entities\User::STORE_OWNER_TYPE => 'صاحب متجر',
        \Modules\Accounts\Entities\User::SUPERVISOR_TYPE => 'مشرف',
        \Modules\Accounts\Entities\User::SHIPPING_COMPANY_OWNER_TYPE => 'صاحب شركة شحن',
        \Modules\Accounts\Entities\User::DELEGATE_TYPE => 'مندوب  ',
    ],
];
