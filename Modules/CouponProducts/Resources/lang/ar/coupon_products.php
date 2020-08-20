<?php

return [
    'plural' => 'الكوبونات الخاصة',
    'singular' => 'الكوبون الخاص',
    'empty' => 'لا توجد أقسام',
    'select' => 'اختر الكوبون الخاص',
    'perPage' => 'عدد النتائج في الصفحة',
    'actions' => [
        'list' => ' عرض الكل ',
        'show' => 'عرض',
        'create' => 'إضافة كوبون للمنتج جديد',
        // create category
        'create_coupon_category' => 'إضافة كوبون للقسم جديد',
        //
        'new' => 'إضافة',
        'edit' => 'تعديل  الكوبون الخاص',
        'delete' => 'حذف الكوبون الخاص',
        'save' => 'حفظ',
        'filter' => 'بحث',
    ],
    'messages' => [
        'created' => 'تم إضافة الكوبون الخاص بنجاح .',
        'updated' => 'تم تعديل الكوبون الخاص بنجاح .',
        'deleted' => 'تم حذف الكوبون الخاص بنجاح .',
    ],
    'attributes' => [
        'model_type' => 'النوع',
        'coupon_id' => 'كود الكوبون',
        'model_id' => 'الإسم',
        'type' => 'الحالة',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا الكوبون الخاص ?',
            'confirm' => 'حذف',
            'cancel' => 'إلغاء',
        ],
    ],
    'additions' =>[
        'category' => 'قسم',
        'product' => 'منتج',
        'included' => 'متضمن',
        'excluded' => 'مستبعد',
    ],
];
