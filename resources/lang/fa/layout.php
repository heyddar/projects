<?php

return [

    'layout' => [

        'admin' => [],

        'front' => [
            'title' => 'کلام امامیه',
            'menus' => [
                'home' => 'خانه',
                'contact_us' => 'تماس با ما',
                'about_us' => 'درباره ما',
                'products' => 'محصولات',
                'packages' => 'پکیج‌ها',
                'basket' => 'سبد خرید',
                'login' => 'ورود',
                'register' => 'ثبت نام',
                'blog' => 'وبلاگ',
                'search' => 'جستجو',
            ],
        ],
    ],

    'home' => [

        'admin' => [],

        'front' => [
            'titles' => [
                'instagram' => 'اینستاگرام',
                'packages' => 'پکیج‌ها',
                'products' => 'محصولات',
                'sliders' => 'اسلایدر',
                'home' => 'خانه',
            ],
        ],
    ],

    'menu' => [
        'product_menu' => [
            'category' => 'دسته‌بندی',
            'made_of' => 'جنس مواد',
            'usage_type' => 'نوع کاربری',
        ]
    ],

    'pages' => [
        'products' => [
            'index' => [
                'title' => 'محصولات',
                'description' => 'لیست محصولات',
            ],
            'details' => [
                'title' => 'محصول',
                'description' => 'جزئیات محصول',
            ],
        ]
    ],

    'auth' => [
        'login' => [
            'page' => [
                'title' => 'ورود به سـامـانه',
            ],
            'form' => [
                'mobile' => 'شماره همراه',
                'remember_me' => 'مرا به خاطر بسپار',
                'btn_login' => 'ورود به سیستم',
                'logging_in' => 'درحال ورود ...',
                'username' => 'نام کاربری (یا پست الکترونیکی)',
                'password' => 'رمز عبور',
            ],
            'validation' => [
                'mobile' => 'شماره همراه',
                'username' => 'نام کاربری',
                'email' => 'پست الکترونیکی',
                'password' => 'رمز عبور',
                'captcha' => 'تصویر',
            ],
            'response' => [
                'register' => 'متاسفانه اکانت شما فعال نشده است!',
                'confirm' => '',
                'reject' => 'متاسفانه ثبت نام شما مورد پذیرش واقع نشده است.',
                'block' => 'متاسفانه اکانت شما به دلایل خاصی بلاک شده است.',
            ],
        ],
        'register' => [
            'page' => [
                'title' => 'ثبت نام',
            ],
            'form' => [
                'username' => 'نام کاربری',
                'email' => 'پست الکترونیکی',
                'password' => 'رمز عبور',
                'password_confirmation' => 'تکرار رمز عبور',
                'first_name' => 'نام',
                'last_name' => 'نام خانوادگی',
                'mobile' => 'شماره همراه',
                'captcha' => 'تصویر',
                'btn_register' => 'ثبت نام',
                'registering' => 'درحال ارسال اطلاعات ...',
            ],
            'validation' => [
                'username' => 'نام کاربری',
                'email' => 'پست الکترونیکی',
                'password' => 'رمز عبور',
                'password_confirmation' => 'تکرار رمز عبور',
                'first_name' => 'نام',
                'last_name' => 'نام خانوادگی',
                'mobile' => 'شماره همراه',
                'captcha' => 'تصویر',
            ],
            'response' => [
                'success' => 'ثبت نام شما با موفقیت انجام شد و با تایید مدیر میتوانید وارد سایت شوید.'
            ],
        ],
    ],

];
