<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => "ﺗﺄﻛﻴﺪ :attribute ﻻ ﻳﺘﻄﺎﺑﻖ.",
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits'               => 'حقل :attribute لابد أن يكون :digits أرقام.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    "email"                => "ﻳﺠﺐ ﺃﻥ ﻳﻜﻮﻥ :attribute ﺑﺮﻳﺪ ﺇﻟﻜﺘﺮﻭﻧﻲ ﺻﺤﻴﺢ.",
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => 'The :attribute field must have a value.',
    "image"                => "ﻳﺠﺐ ﺃﻥ ﻳﻜﻮﻥ :attribute ﺻﻮﺭﺓ.",
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'ﻳﺠﺐ ﺃﻥ ﻳﻜﻮﻥ :attribute رقم.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    "max" => array(
        "numeric" => "ﻳﺠﺐ ﺃﻻ ﻳﻜﻮﻥ :attribute ﺃﻛﺒﺮ ﻣﻦ :max.",
        "file" => "ﻳﺠﺐ ﺃﻻ ﻳﻜﻮﻥ :attribute ﺃﻛﺒﺮ ﻣﻦ :max ﻛﻴﻠﻮﺑﺎﻳﺖ.",
        "string" => "ﻳﺠﺐ ﺃﻻ ﻳﻜﻮﻥ :attribute ﺃﻛﺒﺮ ﻣﻦ :max ﺣﺮﻑ.",
        "array" => "ﻳﺠﺐ ﺃﻻ ﻳﻜﻮﻥ :attribute ﺃﻛﺒﺮ ﻣﻦ :max ﻋﻨﺼﺮ.",
    ),
    "mimes"                => "ﻳﺠﺐ ﺃﻥ ﻳﻜﻮﻥ :attribute ﻣﻠﻒ ﻣﻦ ﻧﻮﻉ: :values.",
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    "min" => array(
        "numeric" => "ﻳﺠﺐ ﺃﻥ ﻳﻜﻮﻥ :attribute ﻋﻠﻰ اﻷﻗﻞ :min.",
        "file" => "ﻳﺠﺐ ﺃﻥ ﻳﻜﻮﻥ :attribute ﻋﻠﻰ اﻷﻗﻞ :min ﻛﻴﻠﻮﺑﺎﻳﺖ.",
        "string" => "ﻳﺠﺐ ﺃﻥ ﻳﻜﻮﻥ :attribute ﻋﻠﻰ اﻷﻗﻞ :min ﺣﺮﻑ.",
        "array" => "ﻳﺠﺐ ﺃﻥ ﻳﻜﻮﻥ :attribute ﻋﻠﻰ اﻷﻗﻞ :min ﻋﻨﺼﺮ.",
    ),
    'not_in'               => 'The selected :attribute is invalid.',
    "numeric"              => "ﻳﺠﺐ ﺃﻥ ﻳﻜﻮﻥ :attribute ﺭﻗﻢ.",
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'حـﻘﻞ :attribute غير صحيح.',
    "required"             => "حـﻘﻞ :attribute ﻣﻄﻠﻮﺏ ﺇﺩﺧﺎﻟﻪ.",
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    "unique"               => "ﻟﻘﺪ ﺗﻢ ﺇﺩﺧﺎﻝ :attribute ﻣﻤﺎﺛﻞ ﻣﺴﺒﻘﺎ.",
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name' => 'الإسم',
        'category_id' => 'التصنيف',
        'subcategory_id' => 'التصنيف الفرعي',
        'currency_id' => 'العملة',
        'text' => 'النص',
        'title' => 'عنوان الاعلان ',
        'image[]' => 'الصور',
        'picture' => 'الصورة',
        'price' => 'السعر',
        'phone' => 'الهاتف',
        'country_id' => 'الدولة',
        'city_id' => 'المدينة',
        'images' => 'الصور الفرعية',
        'user_id' => 'صاحب الاعلان',
        'old_password' => 'كلمة المرور القديمة',
        'new_password' => 'كلمة المرور الجديدة',
        'confirm_password' => 'اعادة كلمة المرور',

        'name_ar' => 'الاسم بالعربية',
        'name_en' => 'الاسم بالانجليزية',
        'code' => 'الكود',
        'email' => 'البريد الإلكترونى',
        'username' => 'إسم المستخدم',
        'password' => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'date' => 'تاريخ غلق المزايدة',
        'facebook' => 'الفيسبوك',
        'twitter' => 'تويتر',
        'instagram' => 'الإنستجرام',
        'google' => 'جوجل',
        'youtube' => 'يوتيوب',
        'linkedin' => 'لينكدان',
        'full_name' => 'الاسم بالكامل',
        'bio' => 'نبذه',
        'lat' => 'خط الطول ',
        'lng' => 'خط العرض ',
        'description' => 'التفاصيل',
        'slug' => 'الرابط',
        'order' => 'الترتيب',
        'ar' => 'الاسم',
        'en' => 'الاسم باللغة الانجليزية',
        'lang' => 'اللغة',
        'currency' => 'العملة',
        'images' => 'الصور',
        'body' => 'النص',
        'city' => 'المدينة',
        'owner_ar' => 'صاحب الحساب بالعربية',
        'owner_en' => 'صاحب الحساب بالانجليزية',
        'account' => 'رقم الحساب',
        'ipan' => 'الايبان',
        'amount' => 'مبلغ العمولة',
        'ad_id' => 'رقم الإعلان',
        'bank' => 'البنك الذي تم التحويل إليه',
        'time' => 'وقت غلق المزاد',
        'year' => 'الموديل',

        'blacklist' => 'رقم الحساب',
        'equal' => 'يعادل',
        'days' => 'مدة الاشتراك',
        'products_namber' => 'عدد الاعلانات',
        'map' => 'الخريطة',
        'photos' => 'السماح بألبوم صور',
        'chat' => 'الشات المباشر',
        'comments' => 'السماح بالتعليقات',
        'comment' => 'تعليق',
        'follow' => 'متابعة المتجر',
        'reviews' => 'سجل الزوار',
        'mobile' => 'رقم جوال',
        'social' => 'التواصل الاجتماعي',
        'days_work' => 'أيام العمل',
        'hours_work' => 'ساعات العمل',
        'stuff_namber' => 'عدد الموظفين',
        'search_appearance' => 'نتائج البحث',
        'description_ar' => 'الوصف بالعربية',
        'description_en' => 'الوصف بالانجليزية',
        'commission' => 'العمولة',
        'notes' => 'الملاحظات',
        'district' => 'المنطقة',
        'street' => 'الشارع',
        'details' => 'التفاصيل',
        'owner_name' => 'صاحب الحساب',
        'value' => 'المبلغ',
        'address_id' => 'العنوان',
        'address' => 'العنوان',
        'cover' => 'صورة الغلاف',
        'brand_id' => 'الماركة',
        'condition' => 'الحالة',
        'advantages' => 'المميزات',
        'disadvantages' => 'العيوب',
        'video' => 'الفيديو',
        'bidding_price' => 'سعر فتح المزاد',
        'expected_bidding' => 'أعلى سعر متوقع',
        'min_bidding' => 'أقل سعر للمزايدة',
    ],

];
