<?php

return [
    'plural' => 'الإشتراكات',
    'singular' => 'الإشتراك',
    'empty' => 'لا توجد أقسام',
    'select' => 'اختر الإشتراك',
    'perPage' => 'عدد النتائج في الصفحة',
    'actions' => [
        'list' => ' عرض الكل ',
        'show' => 'عرض',
        'create' => 'إضافة إشتراك متجر جديد',
        'create_shipping_company' => 'إضافة إشتراك نقل جديد',
        'new' => 'إضافة',
        'edit' => 'تعديل  الإشتراك',
        'delete' => 'حذف الإشتراك',
        'save' => 'حفظ',
        'filter' => 'بحث',
    ],
    'messages' => [
        'created' => 'تم إضافة الإشتراك بنجاح .',
        'updated' => 'تم تعديل الإشتراك بنجاح .',
        'deleted' => 'تم حذف الإشتراك بنجاح .',
    ],
    'attributes' => [
        'model_type' => ' النوع',
        'model_id_shipping_company' => 'شركة النقل',
        'model_id' => ' إسم المتشرك',
        'start_at' => 'تاريخ البدء',
        'end_at' => 'تاريخ الإنتهاء',
        'paid_amount' => 'السعر المدفوع ',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا الإشتراك ?',
            'confirm' => 'حذف',
            'cancel' => 'إلغاء',
        ],
    ],
    'additions' => [
        'model_name' => 'إسم المشترك',
        'shipping_company' => 'شركة نقل',
        'store' => 'متجر',
    ],
];
