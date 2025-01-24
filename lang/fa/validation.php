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

    "accepted"         => ":attribute باید پذیرفته شده باشد.",
    'accepted_if'      => 'هنگامی که :other، :value است باید با :attribute توافق کنید.',
    "active_url"       => "آدرس :attribute معتبر نیست",
    "after"            => ":attribute باید تاریخی بعد از :date باشد.",
    'after_or_equal'   => ':attribute باید بعد از یا برابر تاریخ :date باشد.',
    "alpha"            => ":attribute باید شامل حروف الفبا باشد.",
    "alpha_dash"       => ":attribute باید شامل حروف الفبا و عدد و خظ تیره(-) باشد.",
    "alpha_num"        => ":attribute باید شامل حروف الفبا و عدد باشد.",
    "array"            => ":attribute باید شامل آرایه باشد.",
    "before"           => ":attribute باید تاریخی قبل از :date باشد.",
    'before_or_equal' => ':attribute باید قبل از یا برابر تاریخ :date باشد.',
    "between"          => [
        "numeric" => ":attribute باید بین :min و :max باشد.",
        "file"    => ":attribute باید بین :min و :max کیلوبایت باشد.",
        "string"  => ":attribute باید بین :min و :max کاراکتر باشد.",
        "array"   => ":attribute باید بین :min و :max آیتم باشد.",
    ],
    "boolean"          => "فیلد :attribute فقط میتواند صحیح و یا غلط باشد",
    "confirmed"        => ":attribute با تاییدیه مطابقت ندارد.",
    "date"             => ":attribute یک تاریخ معتبر نیست.",
    'date_equals'      => ':attribute باید برابر تاریخ :date باشد.',
    "date_format"      => ":attribute با الگوی :format مطاقبت ندارد.",
    'declined'         => ':attribute باید پذیرفته نشود.',
    'declined_if'      => 'هنگامی که :other، :value است باید با :attribute نپذیرید.',
    "different"        => ":attribute و :other باید متفاوت باشند.",
    "digits"           => ":attribute باید :digits رقم باشد.",
    "digits_between"   => ":attribute باید بین :min و :max رقم باشد.",
    'dimensions'       => 'dimensions مربوط به فیلد :attribute اشتباه است.',
    'distinct'         => ':attribute مقدار تکراری دارد.',
    "email"            => "فرمت :attribute معتبر نیست.",
    'ends_with'        => ':attribute باید با این مقدار تمام شود: :values.',
    "exists"           => ":attribute انتخاب شده، معتبر نیست.",
    'file' 	       => 'فیلد :attribute باید فایل باشد.',
    "filled"           => "فیلد :attribute الزامی است",
    'gt' => [
        'numeric' => ':attribute باید بیشتر از :value باشد.',
        'file'    => ':attribute باید بیشتر از :value کیلوبایت باشد.',
        'string'  => ':attribute باید بیشتر از :value کاراکتر باشد.',
        'array'   => ':attribute باید بیشتر از :value ایتم باشد.',
    ],
    'gte' => [
        'numeric' => ':attribute باید بیشتر یا برابر :value باشد.',
        'file'    => ':attribute باید بیشتر یا برابر :value کیلوبایت باشد.',
        'string'  => ':attribute باید بیشتر یا برابر :value کاراکتر باشد.',
        'array'   => ':attribute باید :value ایتم یا بیشتر را داشته باشد.',
    ],
    "image"            => ":attribute باید تصویر باشد.",
    "in"               => ":attribute انتخاب شده، معتبر نیست.",
    "integer"          => ":attribute باید نوع داده ای عددی (integer) باشد.",
    'in_array'         => 'فیلد :attribute در :other موجود نیست.',
    "ip"               => ":attribute باید IP آدرس معتبر باشد.",
    'ipv4'             => ':attribute باید یک ادرس درست IPv4 باشد.',
    'ipv6'             => ':attribute باید یک ادرس درست IPv6 باشد.',
    'json'             => ':attribute یک مقدار درست JSON باشد.',
    'lt' => [
        'numeric' => ':attribute باید کمتر از :value باشد.',
        'file'    => ':attribute باید کمتر از :value کیلوبایت باشد.',
        'string'  => ':attribute باید کمتر از :value کاراکتر باشد.',
        'array'   => ':attribute باید :value ایتم یا کمتر را داشته باشد.',
    ],
    'lte' => [
        'numeric' => ':attribute باید کمتر یا برابر :value باشد.',
        'file'    => ':attribute باید کمتر یا برابر :value کیلوبایت باشد.',
        'string'  => ':attribute باید کمتر یا برابر :value کاراکتر باشد.',
        'array'   => ':attribute باید :value ایتم یا کمتر را داشته باشد.',
    ],
    "max"              => [
        "numeric" => ":attribute نباید بزرگتر از :max باشد.",
        "file"    => ":attribute نباید بزرگتر از :max کیلوبایت باشد.",
        "string"  => ":attribute نباید بیشتر از :max کاراکتر باشد.",
        "array"   => ":attribute نباید بیشتر از :max آیتم باشد.",
    ],
    "mimes"            => ":attribute باید یکی از فرمت های :values باشد.",
    'mimetypes'        => ':attribute باید تایپ ان از نوع: :values باشد.',
    "min"              => [
        "numeric" => ":attribute نباید کوچکتر از :min باشد.",
        "file"    => ":attribute نباید کوچکتر از :min کیلوبایت باشد.",
        "string"  => ":attribute نباید کمتر از :min کاراکتر باشد.",
        "array"   => ":attribute نباید کمتر از :min آیتم باشد.",
    ],
    'multiple_of'      => ':attribute باید ضریبی از :value باشد.',
    "not_in"           => ":attribute انتخاب شده، معتبر نیست.",
    'not_regex'        => ':attribute فرمت معتبر نیست.',
    "numeric"          => ":attribute باید شامل عدد باشد.",
    'password'         => 'رمز عبور اشتباه است.',
    'present'          => ':attribute باید وجود داشته باشد.',
    'prohibited'       => 'فیلد :attribute ممنوع است.',
    'prohibited_if'    => 'هنگام که :other، :value است فیلد :attribute ممنوع است.',
    'prohibited_unless' => ':attribute ممنوع است مگر اینکه :other برابر با (:values) باشد.',
    'prohibits'        => 'هنگام ورود فیلد :attribute، وارد کردن فیلد :other ممنوع است.',
    "regex"            => ":attribute یک فرمت معتبر نیست",
    // "required"         => "فیلد :attribute الزامی است",
    "required"         => "تکمیل فیلد :attribute ضروری است",
    "required_if"      => "فیلد :attribute هنگامی که :other برابر با :value است، الزامیست.",
    'required_unless'  => 'قیلد :attribute الزامیست مگر این فیلد :other مقدارش  :values باشد.',
    "required_with"    => ":attribute الزامی است زمانی که :values موجود است.",
    "required_with_all" => ":attribute الزامی است زمانی که :values موجود است.",
    "required_without" => ":attribute الزامی است زمانی که :values موجود نیست.",
    "required_without_all" => ":attribute الزامی است زمانی که :values موجود نیست.",
    "same"             => ":attribute و :other باید مانند هم باشند.",
    "size"             => [
        "numeric" => ":attribute باید برابر با :size باشد.",
        "file"    => ":attribute باید برابر با :size کیلوبایت باشد.",
        "string"  => ":attribute باید برابر با :size کاراکتر باشد.",
        "array"   => ":attribute باسد شامل :size آیتم باشد.",
    ],
    'starts_with'      => ':attribute باید با یکی از این مقادیر شروع شود: :values.',
    "string"           => ":attribute باید رشته باشد.",
    "timezone"         => "فیلد :attribute باید یک منطقه صحیح باشد.",
    "unique"           => ":attribute قبلا انتخاب شده است.",
    'uploaded'         => 'فیلد :attribute به درستی اپلود نشد.',
    "url"              => "فرمت آدرس :attribute اشتباه است.",
    'uuid'             => ':attribute باید یک فرمت درست UUID باشد.',

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

    'custom' => [],

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
        "name" => "نام",
        "username" => "نام کاربری",
        // "email" => "پست الکترونیکی",
        "email" => "ایمیل",
        "first_name" => "نام",
        "last_name" => "نام خانوادگی",
        "family" => "نام خانوادگی",
        "password" => "رمز عبور",
        "password_confirmation" => "تاییدیه ی رمز عبور",
        "city" => "شهر",
        "country" => "کشور",
        "address" => "نشانی",
        "phone" => "تلفن",
        "mobile" => "تلفن همراه",
        "age" => "سن",
        "sex" => "جنسیت",
        "gender" => "جنسیت",
        "day" => "روز",
        "month" => "ماه",
        "year" => "سال",
        "hour" => "ساعت",
        "minute" => "دقیقه",
        "second" => "ثانیه",
        "title" => "عنوان",
        "text" => "متن",
        "content" => "محتوا",
        "description" => "توضیحات",
        "excerpt" => "گلچین کردن",
        "date" => "تاریخ",
        "time" => "زمان",
        "available" => "موجود",
        "size" => "اندازه",
		"file" => "فایل",
		"fullname" => "نام کامل",
		"cellphone" => "شماره موبایل",
		"g-recaptcha-response" => "کپچا",



        'ideaOneStar.title' => 'عنوان ایده',
        'ideaTwoStar.field_of_activity' => 'حوزه فعالیت',
        'ideaOneStar.summary_of_idea' => 'خلاصه ایده',
        'ideaTwoStar.which_customer_needs_will_be_solved_with_your_idea' => 'نیاز مشتریان',
        'ideaNonStar.how_solutions_meet_the_needs_customers' => 'راهکار ها',
        'ideaNonStar.business_model_and_initial_pricing_of_idea' => 'مدل کسب و کار',
        'ideaNonStar.idea_marketing_plan' => 'برنامه بازاریابی',
        'ideaNonStar.unique_value_proposition_of_idea_to_potential_customers' => 'ارزش پیشنهادی',
        'ideaNonStar.available_options_for_customers_to_meet_their_needs' => 'گزینه های در دسترس',
        'ideaNonStar.three_most_important_competitors_of_idea' => 'رقبای ایده',
        'ideaNonStar.competitive_advantage_of_idea' => 'مزیت رقابتی',
        'ideaNonStar.about_your_team' => 'درباره تیم',
        'ideaTwoStar.current_stage_of_the_idea' => 'مرحله ایده',
        'ideaNonStar.ever_registered_business_company_for_idea' => 'ثبت شرکت تجاری',
        'ideaNonStar.established_year' => 'سال تاسیس',
        'ideaNonStar.plans_and_executive_activities_in_first_12_months_activity' => 'برنامه و فعالیت ها',
        'ideaTwoStar.required_investment_amount' => 'مبلغ سرمایه گذاری',
        'ideaNonStar.email' => 'ایمیل',
        'ideaNonStar.cell_phone_number' => 'تلفن همراه',
        'ideaNonStar.website' => 'وبسایت',
        'ideaNonStar.description' => 'توضیحات',

        'teammateTwoStar.name' => 'نام',
        'teammateTwoStar.family' => 'نام خانوادگی',
        'teammateTwoStar.geographical_area_startup' => 'حوزه جغرافیایی',
        'teammateTwoStar.favorite_startup_field' => 'حوزه استارتاپی',
        'teammateNonStar.personal_website_or_blog' => 'سایت یا بلاگ شخصی',
        'teammateNonStar.knowledge_of_foreign_languages' => 'آشنایی با زبان های خارجه',
        'teammateNonStar.last_educational_certificate' => 'آخرین مدرک تحصیلی',
        'teammateNonStar.field_of_study' => 'رشته تحصیلی',
        'teammateNonStar.foreign_language_do_you_know' => 'زبان خارجی',
        'teammateNonStar.language_certificate' => 'مدرک معتبر',
        'teammateNonStar.province_of_residence' => 'استان',
        'teammateNonStar.time_and_place_limitations_for_startup_team' => 'محدودیت مکان و زمان',
        'teammateNonStar.resume' => 'رزومه',
        'teammateOneStar.specialties' => 'تخصص ها',
        'teammateNonStar.email' => 'ایمیل',
        'teammateNonStar.cell_phone_number' => 'تلفن همراه',

        'locationNonStar.personal_website_or_blog' => 'سایت یا بلاگ شخصی',
        'locationOneStar.experience_working_with_startup_companies' => 'سابقه همکاری',
        'locationOneStar.meterage' => 'متراژ',
        'locationTwoStar.province' => 'استان',
        'locationOneStar.city' => 'شهر',
        'locationOneStar.location_shared_or_exclusive' => 'نوع فضا',
        'locationNonStar.maximum_people_can_work_in_location' => 'ظرفیت',
        'locationNonStar.parking"' => 'پارکینگ',
        'locationTwoStar.have_internet' => 'اینترنت',
        'locationNonStar.email' => 'ایمیل',
        'locationTwoStar.distance_to_public_transport_station' => 'فاصله تا ایستگاه',
        'locationNonStar.cell_phone_number' => 'تلفن همراه',
        'locationTwoStar.advance_payment_and_rental_amount' => 'مبلغ پیش پرداخت',
        'images' => 'تصاویر',

        'geographical_area_startup' => 'حوزه جغرافیایی',
        'favorite_startup_field' => 'حوزه استارتاپی',
        'supported_startup_team' => 'سابقه حمایت از استارتاپ',
        'personal_website_or_blog' => 'سایت یا بلاگ شخصی',
        'amount_of_investment' => 'بودجه حمایت',
        'location_for_startup_team_members' => 'دارا بودن فضا',
        'cell_phone_number' => 'تلفن همراه',


        'user.name' => 'نام',
        'user.cellphone' => 'تلفن همراه',
        'user.email' => 'ایمیل',
        'userInfo.national_code' => 'کد ملی',
        'userInfo.year_of_birth' => 'سال تولد',
        'userInfo.province_of_residence' => 'استان',
        'userInfo.residence_address' => 'آدرس',
        'userInfo.level_of_education' => 'میزان تحصیلات',
        'userInfo.field_of_study' => 'رشته تحصیلی',
        'userInfo.familiarity_with_startup_activities' => 'میزان آشنایی به فعالیت های استارتاپی',
        'userInfo.how_to_get_to_know_ArmanIdea_website' => 'نحوه آشنایی',

    ],
];
