<?php
return [
    'all_items' => 'همه',
    'messages' => [
        'errors' => [
            'login' => 'ابتدا باید وارد سیستم شوید.',
            'dont_have_permission_for_download' => 'شما امکان دانلود فایل مورد نظر را ندارید.',
            'dont_have_any_active_packages' => 'برای دانلود فایل‌ مربوط به این کتاب باید پکیج مناسب را تهیه کنید.',
            'download_book_pages_finished' => 'تعداد صفحات دانلود کتاب برای حساب کاربری به اتمام رسیده است.',
            'download_book_pages_low' => 'تعداد صفحات دانلود کتاب برای حساب کاربری شما کمتر از تعداد صفحات کتاب مورد نظر است.',
            'download_article_count_finished' => 'تعداد دانلود مقاله برای حساب کاربری شما به اتمام رسیده است.',
            'download_article_count_low' => 'تعداد دانلود مقاله برای حساب کاربری شما کمتر از سقف مجاز شما است.',
        ],
    ],
    'accessors' => [
        'is_accepted' => [
            '0' => 'تاییدنشده',
            '1' => 'تاییدشده',
        ],
        'is_registered' => [
            '0' => 'ثبت نام نشده',
            '1' => 'ثبت نام شده',
        ],
        'answer_types' => [
            'single' => 'یک‌گزینه‌ای',
            'multi' => 'چندگزینه‌ای',
        ],
        'has_description' => [
            '1' => 'بله',
            '0' => 'خیر',
        ],
        'is_free' => [
            '0' => 'غیر رایگان',
            '1' => 'رایگان',
        ],
        'is_read' => [
            '0' => 'دیده‌نشده',
            '1' => 'دیده‌شده',
        ],
        'is_payed' => [
            '0' => 'پرداخت‌نشده',
            '1' => 'پرداخت‌شده',
        ],
        'messages_type' => [
            'sent' => 'پیام‌های ارسال‌شده',
            'received' => 'پیام‌های دریافت‌شده',
        ],
        'messages' => [
            'type' => [
                'sent' => 'پیام‌های ارسال‌شده',
                'received' => 'پیام‌های دریافت‌شده',
                'all' => 'پیام‌ها'
            ],
            'side_type' => [
                'sent' => 'دریافت‌کننده',
                'received' => 'ارسال‌کننده',
            ],
        ],
        'book_type' => [
            '1' => 'کتاب',
            '2' => 'مقاله',
        ],
        'package_type' => [
            '1' => 'رایگان',
            '2' => 'همراه با پکیج',
        ],
        'post_type' => [
            'post' => 'پست',
            'audible' => 'کوتاه و شنیدنی'
        ]
    ],
    'constants' => [
        'WEBSITE' => 'وبسایت',
        'TELEGRAM' => 'تلگرام',
        'LINKEDIN' => 'لینکدین',
        'TWITTER' => 'توییتر',
        'INSTAGRAM' => 'اینستاگرام',
        'BOOK' => 'کتاب',
        'BLOG' => 'مقاله',
        'FREE' => 'رایگان',
        'WITH_PACKAGE' => 'همراه با پکیج',
        'ACTIVE' => 'فعال',
        'INACTIVE' => 'غیرفعال',
    ],
];