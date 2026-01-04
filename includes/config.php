<?php
// بدء الجلسة (يجب أن يكون في أول سطر دائماً)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// =========================================================
// 1. إعدادات اللغة (Language Settings)
// =========================================================

// التحقق مما إذا كان المستخدم طلب تغيير اللغة عبر الرابط (?lang=en)
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

// تحديد اللغة الحالية (الافتراضي: العربية)
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'ar';

// تحديد اتجاه الصفحة بناءً على اللغة
$dir = ($lang == 'ar') ? 'rtl' : 'ltr';

// =========================================================
// 2. مصفوفة الترجمات (Translation Array)
// =========================================================
$trans = [
    'ar' => [
        // --- عام ---
        'dash_overview' => 'نظرة عامة',
        'sar' => 'ر.س',
        'usd' => '$',
        'night' => 'لليلة',
        'logout' => 'تسجيل خروج',
        'welcome' => 'أهلاً بك',
        'search' => 'بحث',
        'back_home' => 'عودة للرئيسية',
        'actions' => 'إجراءات',
        'status' => 'الحالة',
        
        // --- القائمة الجانبية (الأدمن) ---
        'admin_badge' => 'مدير النظام',
        'menu_chalets' => 'إدارة الشاليهات',
        'menu_users' => 'المستخدمين',
        'menu_settings' => 'إعدادات الموقع',
        
        // --- القائمة الجانبية (المالك) ---
        'owner_badge' => 'مالك عقار',
        'menu_my_chalets' => 'شاليهاتي',
        'menu_bookings' => 'الحجوزات',
        'menu_finance' => 'المحفظة والأرباح',
        
        // --- القائمة الجانبية (المستخدم) ---
        'user_badge' => 'حساب ضيف',
        'menu_my_bookings' => 'حجوزاتي',
        'menu_favorites' => 'المفضلة',
        'menu_profile' => 'إعدادات الحساب',

        // --- الجداول والبيانات ---
        'full_name' => 'الاسم الكامل',
        'role' => 'الدور',
        'email' => 'البريد الإلكتروني',
        'register_date' => 'تاريخ التسجيل',
        'chalet_name' => 'اسم الشاليه',
        'location' => 'الموقع',
        'price' => 'السعر',
        
        // --- حالات الحجز ---
        'status_active' => 'نشط',
        'status_pending' => 'قيد الانتظار',
        'status_rejected' => 'مرفوض',
        'status_confirmed' => 'مؤكد',



        'menu_add_chalet' => 'إضافة شاليه',



        'chalet_description' => 'الوصف التفصيلي',
        'area' => 'المساحة',
        'upload_images' => 'رفع الصور',
        'amenities' => 'المرافق',



        'bookings_subtitle' => 'لديك طلبان جديدان بحاجة لاتخاذ إجراء',
        'all' => 'الكل',
        'booking_id' => 'رقم الحجز',
        'guest' => 'الضيف',
        'date' => 'التاريخ',
        'nights' => 'ليالي',
        'night_single' => 'ليلة',



        'active_chalets' => 'شاليهات نشطة',
        'monthly_bookings' => 'حجوزات الشهر',
        'earnings' => 'الأرباح',
        'latest_bookings' => 'آخر الحجوزات',



        'my_chalets_subtitle' => 'لديك 3 شاليهات مسجلة',
'add_new' => 'إضافة جديد',
'views' => 'مشاهدة',
'edit' => 'تعديل',
'delete' => 'حذف',
'activate' => 'تفعيل',
'status_inactive' => 'غير نشط',



'footer_desc' => 'منصة إجازة هي وجهتك الأولى لحجز الشاليهات والاستراحات في المملكة، نجمع بين الرفاهية والخصوصية.',
'quick_links' => 'روابط سريعة',
'nav_home' => 'الرئيسية',
'nav_about' => 'من نحن',
'support' => 'الدعم والمساعدة',
'contact_us' => 'اتصل بنا',
'privacy_policy' => 'سياسة الخصوصية',
'terms' => 'الشروط والأحكام',
'follow_us' => 'تابعنا',
'copyright' => 'جميع الحقوق محفوظة لمنصة إجازة',




'site_title' => 'منصة إجازة - احجز شاليهك الآن',
'nav_login' => 'تسجيل الدخول',




'filter_title' => 'تصفية النتائج',
'smart_search' => 'بحث ذكي',
'search_placeholder' => 'مثال: مسبح، إطلالة...',
'price_range' => 'نطاق السعر',
// 'amenities' => 'المرافق',
'pool' => 'مسبح',
'parking' => 'موقف سيارات',
'cancellation_policy' => 'سياسة الإلغاء',
'free_cancellation' => 'إلغاء مجاني',




'booking_history_subtitle' => 'عرض ومتابعة جميع حجوزاتك السابقة والقادمة',
'status_completed' => 'مكتمل',
'rate_now' => 'قيّم الآن',


'favorites_subtitle' => 'قائمة الشاليهات التي نالت إعجابك',
'book_now' => 'احجز الآن',




'user_dash_subtitle' => 'هل أنت مستعد لإجازتك القادمة؟',
'search_chalet' => 'ابحث عن شاليه',
'past_bookings' => 'حجوزات سابقة',
'upcoming_trip' => 'رحلة قادمة',
'favorite_chalets' => 'شاليهات مفضلة',
'upcoming_trip_title' => 'رحلتك القادمة',
'view_details' => 'عرض التفاصيل',
'cancel_booking' => 'إلغاء الحجز',




'profile_subtitle' => 'تعديل بياناتك الشخصية وإعدادات الأمان',
'change_photo' => 'تغيير الصورة',
'first_name' => 'الاسم الأول',
'last_name' => 'اسم العائلة',
'phone' => 'رقم الجوال',
'security' => 'الأمان وكلمة المرور',
'new_password' => 'كلمة المرور الجديدة',
'password_placeholder' => 'اتركه فارغاً إذا لم ترد التغيير',
'save_changes' => 'حفظ التغييرات',




'about_hero_title' => 'نصنع ذكريات لا تُنسى',
'about_hero_desc' => 'منصة إجازة هي وجهتك الأولى لحجز الشاليهات والاستراحات في المملكة. نجمع بين الرفاهية، الخصوصية، وسهولة الحجز في مكان واحد.',
'who_we_are' => 'من نحن',
'our_story_title' => 'نغير مفهوم العطلات القصيرة',
'our_story_p1' => 'انطلقت "إجازة" برؤية واضحة: حل مشكلة البحث الطويل والمعقد عن أماكن الإقامة الترفيهية. كنا نؤمن بأن حجز شاليه لقضاء عطلة نهاية الأسبوع يجب أن يكون بنفس سهولة حجز فندق عالمي.',
'our_story_p2' => 'اليوم، نفخر بكوننا حلقة الوصل الموثوقة بين آلاف الملاك والضيوف الباحثين عن الراحة والخصوصية، مع ضمان تجربة دفع آمنة وخدمة عملاء على مدار الساعة.',
'why_choose_us' => 'لماذا تختار منصة إجازة؟',
'why_choose_desc' => 'نقدم لك تجربة حجز متكاملة تضمن حقك وراحتك',
'feature_secure' => 'دفع آمن 100%',
'feature_secure_desc' => 'نظام مدفوعات محمي بالكامل، نضمن حقك ولا يتم تحويل المبلغ للمالك إلا بعد تسجيل دخولك.',
'feature_verified' => 'عقارات موثقة',
'feature_verified_desc' => 'يقوم فريقنا بالتحقق من هوية الملاك وجودة الشاليهات لضمان تطابق الصور مع الواقع.',
'feature_support' => 'دعم متواصل',
'feature_support_desc' => 'فريق خدمة العملاء جاهز لمساعدتك في أي وقت، من لحظة الحجز حتى المغادرة.',
'stat_chalets' => 'شاليه مسجل',
'stat_nights' => 'ليلة محجوزة',
'stat_rating' => 'تقييم العملاء',
'cta_owner_title' => 'لديك شاليه أو استراحة؟',
'cta_owner_desc' => 'انضم إلى آلاف الملاك الذين يحققون دخلاً إضافياً عبر منصة إجازة. تسجيل العقار مجاني وسهل!',
'btn_register_owner' => 'سجل كمالك الآن',




'booking_success_title' => 'تم الحجز بنجاح!',
'booking_success_msg' => 'شكراً لك، تم تأكيد حجزك وسيتم إرسال التفاصيل عبر البريد الإلكتروني.',
'booking_ref' => 'رقم الحجز المرجعي',





'city_riyadh' => 'الرياض',
'reviews' => 'تقييم',
'superhost' => 'مضيف متميز',
'about_place' => 'حول هذا المكان',
// 'amenities' => 'المرافق',
'amenity_pool' => 'مسبح خاص',
'amenity_wifi' => 'واي فاي',
'amenity_ac' => 'تكييف',
'amenity_parking' => 'موقف سيارات',
'amenity_bbq' => 'منطقة شواء',
'host' => 'المضيف',
'verified_identity' => 'هوية موثقة',
'response_time' => 'سرعة الرد',
'contact_host' => 'تواصل مع المضيف',
'chalet_policies' => 'سياسات الشاليه',
'checkin_rules' => 'قوانين الدخول والخروج',
'checkin' => 'تسجيل الدخول',
'checkout' => 'تسجيل الخروج',
'free_cancel_text' => 'إلغاء مجاني حتى 48 ساعة قبل الوصول',
'read_full_policy' => 'قراءة السياسة الكاملة',
'cleanliness' => 'النظافة',
'accuracy' => 'دقة الوصف',
'communication' => 'التواصل',
'show_all_reviews' => 'عرض كافة التعليقات',
'booking_dates' => 'تاريخ الحجز',
'guests' => 'ضيوف',
'no_charge_yet' => 'لن يتم خصم المبلغ الآن',
'cleaning_fee' => 'رسوم التنظيف',
'service_fee' => 'رسوم خدمة',
'total' => 'الإجمالي',
'report_chalet' => 'الإبلاغ عن هذا الشاليه',






'checkout_title' => 'إتمام الحجز والدفع',
'personal_info' => 'بياناتك الشخصية',
'secure_payment' => 'الدفع الآمن',
'card_number' => 'رقم البطاقة',
'expiry_date' => 'تاريخ الانتهاء',
'cvc_code' => 'رمز CVC',
'confirm_pay' => 'تأكيد ودفع',
'agree_terms' => 'بالضغط على الزر، أنت توافق على الشروط والأحكام',
'booking_summary' => 'ملخص الحجز',
'dates' => 'التواريخ',
'adults' => 'بالغين',
'child' => 'طفل',





'contact_hero_title' => 'كيف يمكننا مساعدتك؟',
'contact_hero_desc' => 'فريق دعم إجازة متواجد لخدمتك. سواء كان لديك استفسار عن حجز، أو اقتراح، أو مشكلة تقنية، نحن هنا للاستماع.',
'call_us' => 'اتصل بنا',
'working_hours' => 'من الأحد إلى الخميس (9ص - 5م)',
'email_desc' => 'للشكاوى والاقتراحات',
'headquarters' => 'المقر الرئيسي',
'address_text' => 'الرياض، طريق الملك فهد، برج العنود',
'our_location_map' => 'موقعنا على الخريطة',
'send_message_title' => 'أرسل لنا رسالة',
'send_message_desc' => 'سنقوم بالرد عليك في أقرب وقت ممكن',
'name_placeholder' => 'مثال: محمد عبدالله',
'inquiry_type' => 'نوع الاستفسار',
'inquiry_general' => 'استفسار عام',
'inquiry_booking' => 'مشكلة في الحجز',
'inquiry_complaint' => 'شكوى على مضيف',
'inquiry_partnership' => 'طلب شراكة',
'message_label' => 'الرسالة',
'message_placeholder' => 'اكتب تفاصيل رسالتك هنا...',
'btn_send_message' => 'إرسال الرسالة',
'msg_sent_alert' => 'تم إرسال رسالتك بنجاح!',
'faq_title' => 'أسئلة قد تهمك',
'faq_q1' => 'كيف يمكنني إلغاء الحجز؟',
'faq_a1' => 'يمكنك إلغاء الحجز من خلال لوحة التحكم الخاصة بك في قسم "حجوزاتي"، مع مراعاة سياسة الإلغاء الخاصة بالمضيف.',
'faq_q2' => 'متى يتم استرداد المبلغ؟',
'faq_a2' => 'يتم معالجة استرداد المبالغ تلقائياً خلال 5-10 أيام عمل حسب البنك الخاص بك.',
'faq_q3' => 'كيف أسجل شاليهي؟',
'faq_a3' => 'ببساطة اضغط على زر "لوحة المالك" في الأعلى، وأنشئ حساباً جديداً ثم ابدأ بإضافة صور وتفاصيل عقارك.',





'welcome_back' => 'مرحباً بعودتك',
'login_subtitle' => 'سجل الدخول للمتابعة',
'password' => 'كلمة المرور',
'remember_me' => 'تذكرني',
'forgot_password' => 'نسيت كلمة المرور؟',
'login_btn' => 'تسجيل الدخول',
'no_account' => 'ليس لديك حساب؟',
'create_account' => 'إنشاء حساب جديد',



'hero_title' => 'احجز مكانك المثالي في ثوانٍ',
'hero_subtitle' => 'استمتع بأفضل الأوقات مع العائلة والأصدقاء في أرقى الشاليهات والاستراحات',

'privacy_title' => 'سياسة الخصوصية',
'last_updated' => 'آخر تحديث',
'privacy_intro_title' => 'مقدمة عامة',
'privacy_intro_text' => 'في منصة "إجازة"، ندرك أهمية الخصوصية بالنسبة لك، ونلتزم بحماية بياناتك الشخصية بشفافية تامة. توضح هذه السياسة كيفية جمعنا، استخدامنا، ومشاركتنا لمعلوماتك عند استخدامك لموقعنا. باستخدامك للمنصة، فإنك توافق على هذه الممارسات.',
'privacy_collection_title' => 'المعلومات التي نجمعها',
'privacy_col_1_title' => 'معلومات الحساب',
'privacy_col_1_desc' => 'مثل الاسم، البريد الإلكتروني، رقم الهاتف، وكلمة المرور.',
'privacy_col_2_title' => 'معلومات الدفع',
'privacy_col_2_desc' => 'يتم معالجتها عبر بوابات دفع آمنة ومشفرة ولا نحتفظ بها مباشرة.',
'privacy_col_3_title' => 'بيانات الحجز',
'privacy_col_3_desc' => 'تواريخ الوصول والمغادرة، عدد الضيوف، والمرافق المفضلة.',
'privacy_col_4_title' => 'المحتوى المشارك',
'privacy_col_4_desc' => 'التعليقات، التقييمات، والصور التي ترفعها للمنصة.',
'privacy_usage_title' => 'كيف نستخدم بياناتك',
'privacy_usage_intro' => 'نستخدم المعلومات التي نجمعها لأغراض محددة تشمل:',
'usage_booking_title' => 'إتمام الحجوزات',
'usage_booking_desc' => 'لمعالجة طلباتك وتأكيد الحجز مع المضيف.',
'usage_service_title' => 'تحسين الخدمة',
'usage_service_desc' => 'لفهم كيفية استخدامك للموقع وتطوير ميزات جديدة.',
'usage_security_title' => 'الأمان والحماية',
'usage_security_desc' => 'للكشف عن أي نشاط احتيالي ومنعه.',
'usage_comm_title' => 'التواصل',
'usage_comm_desc' => 'لإرسال تأكيدات الحجز وتحديثات السياسة.',
'privacy_sharing_title' => 'مشاركة البيانات',
'privacy_sharing_text' => 'نحن لا نبيع بياناتك الشخصية لأي طرف ثالث. قد نشارك بياناتك فقط في الحالات التالية:',
'share_hosts' => 'مع <strong>المضيفين</strong> لإتمام عملية الحجز.',
'share_providers' => 'مع <strong>مقدمي الخدمات</strong> (مثل معالجة المدفوعات).',
'share_legal' => 'امتثالاً <strong>للقوانين</strong> عند الطلب من الجهات الرسمية.',
'privacy_contact_title' => 'لديك استفسار؟',
'privacy_contact_text' => 'إذا كان لديك أي أسئلة حول سياسة الخصوصية، لا تتردد في التواصل معنا.',
'contact_support_btn' => 'تواصل مع الدعم',


'create_account_title' => 'إنشاء حساب جديد',
'create_account_subtitle' => 'انضم إلينا واستمتع بأفضل العروض',
'register_owner_title' => 'سجل كشريك (مالك)',
'register_owner_subtitle' => 'ابدأ بتأجير عقارك وضاعف دخلك معنا',
'agree_to' => 'أوافق على',
'terms_and_conditions' => 'الشروط والأحكام',
'register_btn' => 'تسجيل',
'already_have_account' => 'لديك حساب بالفعل؟',



'edit_search' => 'تعديل البحث',
'sort_by' => 'ترتيب حسب',
'sort_lowest_price' => 'الأقل سعراً',
'sort_top_rated' => 'الأعلى تقييماً',
'sort_newest' => 'الأحدث',





'terms_title' => 'الشروط والأحكام',
'terms_agreement_title' => 'الموافقة على الشروط',
'terms_agreement_text' => 'مرحباً بكم في منصة "إجازة". تحكم هذه الشروط والأحكام استخدامك لموقعنا وخدماتنا. من خلال الوصول إلى المنصة أو استخدامها، فإنك توافق على الالتزام بهذه الشروط.',
'warning_label' => 'تنبيه',
'terms_warning_text' => 'إذا كنت لا توافق على أي جزء من هذه الشروط، يرجى عدم استخدام خدماتنا.',
'terms_account_title' => 'الحساب والتسجيل',
'terms_account_1' => 'يجب أن يكون عمرك 18 عاماً على الأقل لإنشاء حساب.',
'terms_account_2' => 'أنت مسؤول عن الحفاظ على سرية معلومات حسابك وكلمة المرور.',
'terms_account_3' => 'يجب تقديم معلومات دقيقة وكاملة عند التسجيل (الاسم الحقيقي، رقم الهاتف).',
'terms_account_4' => 'يحق لإدارة المنصة تعليق أو إغلاق أي حساب ينتهك هذه الشروط.',
'terms_booking_title' => 'الحجز والدفع',
'payment_policy_title' => 'سياسة الدفع',
'payment_policy_desc' => 'يتم دفع قيمة الحجز بالكامل عبر المنصة لضمان الجدية. نقبل البطاقات الائتمانية ومدى.',
'booking_confirm_title' => 'تأكيد الحجز',
'booking_confirm_desc' => 'يعتبر الحجز مؤكداً فقط بعد استلام رسالة التأكيد الإلكترونية وظهوره في صفحة "حجوزاتي".',
'price_fees_title' => 'الأسعار والرسوم',
'price_fees_desc' => 'الأسعار المعروضة تشمل رسوم الخدمة والضريبة ما لم ينص على خلاف ذلك.',
'cancellation_refund_title' => 'الإلغاء والاسترداد',
'cancellation_intro' => 'تختلف سياسة الإلغاء بحسب المضيف والعقار، وتظهر بوضوح في صفحة تفاصيل الشاليه قبل الحجز. بشكل عام:',
'cancel_flexible' => 'مرن',
'cancel_flexible_desc' => 'استرداد كامل المبلغ عند الإلغاء قبل 48 ساعة من الوصول.',
'cancel_moderate' => 'متوسط',
'cancel_moderate_desc' => 'استرداد 50% عند الإلغاء قبل 5 أيام.',
'cancel_strict' => 'صارم',
'cancel_strict_desc' => 'لا يوجد استرداد للمبلغ إلا في حالات قاهرة.',
'disclaimer_title' => 'إخلاء المسؤولية',
'disclaimer_text' => 'منصة "إجازة" تعمل كوسيط بين المضيف والضيف. نحن لا نملك العقارات ولا نتحمل مسؤولية مباشرة عن جودة الإقامة، ولكننا نسعى جاهدين لحل النزاعات.',
'important_links' => 'روابط هامة',



'destination' => 'الوجهة',
'dates_placeholder' => 'وصول - مغادرة',
'featured_chalets' => 'شاليهات مميزة',





'basic_info' => 'البيانات الأساسية',
'chalet_name_label' => 'اسم الشاليه',
'chalet_name_placeholder' => 'مثال: شاليه النسيم الفاخر',
'detailed_desc_label' => 'الوصف التفصيلي',
'detailed_desc_placeholder' => '...اكتب وصفاً جذاباً للشاليه والمرافق المتوفرة',
'price_night_label' => 'السعر (لليلة)',
'area_label' => 'المساحة (م²)',
'location_url_label' => 'رابط الموقع (Google Maps)',



// --- صفحة إضافة شاليه (عربي) ---
'add_new_chalet_title' => 'إضافة شاليه جديد',
'add_new_chalet_subtitle' => 'أضف عقاراً جديداً وابدأ باستقبال الحجوزات',

'upload_hint' => 'اسحب الصور وأفلتها هنا أو اضغط للاختيار',
'facilities_amenities' => 'المرافق والخدمات',
'wifi' => 'واي فاي',
'bbq' => 'منطقة شواء',
'policies' => 'السياسات والشروط',
'checkin_time' => 'وقت الوصول',
'checkout_time' => 'وقت المغادرة',
'publish_chalet' => 'نشر الشاليه',
'save_draft' => 'حفظ كمسودة',



],
    
    'en' => [
        // --- General ---
        'dash_overview' => 'Overview',
        'sar' => 'SAR',
        'usd' => '$',
        'night' => '/ Night',
        'logout' => 'Logout',
        'welcome' => 'Welcome',
        'search' => 'Search',
        'back_home' => 'Back Home',
        'actions' => 'Actions',
        'status' => 'Status',

        // --- Sidebar (Admin) ---
        'admin_badge' => 'Admin',
        'menu_chalets' => 'Chalets',
        'menu_users' => 'Users',
        'menu_settings' => 'Settings',

        // --- Sidebar (Owner) ---
        'owner_badge' => 'Property Owner',
        'menu_my_chalets' => 'My Chalets',
        'menu_bookings' => 'Bookings',
        'menu_finance' => 'Finance',

        // --- Sidebar (User) ---
        'user_badge' => 'Guest Account',
        'menu_my_bookings' => 'My Bookings',
        'menu_favorites' => 'Favorites',
        'menu_profile' => 'Profile Settings',

        // --- Tables & Data ---
        'full_name' => 'Full Name',
        'role' => 'Role',
        'email' => 'Email',
        'register_date' => 'Join Date',
        'chalet_name' => 'Chalet Name',
        'location' => 'Location',
        'price' => 'Price',

        // --- Booking Status ---
        'status_active' => 'Active',
        'status_pending' => 'Pending',
        'status_rejected' => 'Rejected',
        'status_confirmed' => 'Confirmed',



        'menu_add_chalet' => 'Add Chalet',



        'chalet_description' => 'Description',
        'area' => 'Area (m²)',
        'upload_images' => 'Upload Images',
        'amenities' => 'Amenities',



        'bookings_subtitle' => 'You have 2 new requests requiring action',
        'all' => 'All',
        'booking_id' => 'Booking ID',
        'guest' => 'Guest',
        'date' => 'Date',
        'nights' => 'Nights',
        'night_single' => 'Night',




        'active_chalets' => 'Active Chalets',
        'monthly_bookings' => 'Monthly Bookings',
        'earnings' => 'Earnings',
        'latest_bookings' => 'Latest Bookings',



        'my_chalets_subtitle' => 'You have 3 registered chalets',
'add_new' => 'Add New',
'views' => 'Views',
'edit' => 'Edit',
'delete' => 'Delete',
'activate' => 'Activate',
'status_inactive' => 'Inactive',




'footer_desc' => 'Ejaza Platform is your first destination for booking chalets and resorts in the Kingdom, combining luxury and privacy.',
'quick_links' => 'Quick Links',
'nav_home' => 'Home',
'nav_about' => 'About Us',
'support' => 'Support',
'contact_us' => 'Contact Us',
'privacy_policy' => 'Privacy Policy',
'terms' => 'Terms & Conditions',
'follow_us' => 'Follow Us',
'copyright' => 'All Rights Reserved to Ejaza Platform',



'site_title' => 'Ejaza Platform - Book Your Chalet',
'nav_login' => 'Login',





'filter_title' => 'Filters',
'smart_search' => 'Smart Search',
'search_placeholder' => 'e.g. Pool, View...',
'price_range' => 'Price Range',
// 'amenities' => 'Amenities',
'pool' => 'Pool',
'parking' => 'Parking',
'cancellation_policy' => 'Cancellation Policy',
'free_cancellation' => 'Free Cancellation',




'booking_history_subtitle' => 'View and track all your past and upcoming bookings',
'status_completed' => 'Completed',
'rate_now' => 'Rate Now',



'favorites_subtitle' => 'List of chalets you liked',
'book_now' => 'Book Now',



'user_dash_subtitle' => 'Are you ready for your next vacation?',
'search_chalet' => 'Find a Chalet',
'past_bookings' => 'Past Bookings',
'upcoming_trip' => 'Upcoming Trip',
'favorite_chalets' => 'Favorites',
'upcoming_trip_title' => 'Your Upcoming Trip',
'view_details' => 'View Details',
'cancel_booking' => 'Cancel Booking',





'profile_subtitle' => 'Update your personal info and security settings',
'change_photo' => 'Change Photo',
'first_name' => 'First Name',
'last_name' => 'Last Name',
'phone' => 'Phone Number',
'security' => 'Security & Password',
'new_password' => 'New Password',
'password_placeholder' => 'Leave blank if you don\'t want to change',
'save_changes' => 'Save Changes',




'about_hero_title' => 'Creating Unforgettable Memories',
'about_hero_desc' => 'Ejaza Platform is your premier destination for booking chalets and resorts in the Kingdom. We combine luxury, privacy, and ease of booking in one place.',
'who_we_are' => 'Who We Are',
'our_story_title' => 'Redefining Short Vacations',
'our_story_p1' => 'Ejaza launched with a clear vision: to solve the complex search for leisure accommodation. We believed booking a weekend chalet should be as easy as booking a global hotel.',
'our_story_p2' => 'Today, we are proud to be the trusted link between thousands of owners and guests seeking comfort and privacy, ensuring a secure payment experience and 24/7 customer service.',
'why_choose_us' => 'Why Choose Ejaza?',
'why_choose_desc' => 'We offer a complete booking experience that guarantees your rights and comfort',
'feature_secure' => '100% Secure Payment',
'feature_secure_desc' => 'Fully protected payment system. We guarantee your rights, and funds are not released to the owner until you check in.',
'feature_verified' => 'Verified Properties',
'feature_verified_desc' => 'Our team verifies owner identities and chalet quality to ensure photos match reality.',
'feature_support' => 'Continuous Support',
'feature_support_desc' => 'Our customer service team is ready to assist you anytime, from booking until checkout.',
'stat_chalets' => 'Registered Chalets',
'stat_nights' => 'Booked Nights',
'stat_rating' => 'Customer Rating',
'cta_owner_title' => 'Do you own a chalet?',
'cta_owner_desc' => 'Join thousands of owners earning extra income via Ejaza Platform. Registration is free and easy!',
'btn_register_owner' => 'Register as Owner',





'booking_success_title' => 'Booking Successful!',
'booking_success_msg' => 'Thank you, your booking is confirmed. Details will be sent to your email.',
'booking_ref' => 'Booking Reference',



'city_riyadh' => 'Riyadh',
'reviews' => 'Reviews',
'superhost' => 'Superhost',
'about_place' => 'About this place',
// 'amenities' => 'Amenities',
'amenity_pool' => 'Private Pool',
'amenity_wifi' => 'WiFi',
'amenity_ac' => 'Air Conditioning',
'amenity_parking' => 'Free Parking',
'amenity_bbq' => 'BBQ Area',
'host' => 'Host',
'verified_identity' => 'Verified Identity',
'response_time' => 'Response Time',
'contact_host' => 'Contact Host',
'chalet_policies' => 'Chalet Policies',
'checkin_rules' => 'Check-in Rules',
'checkin' => 'Check-in',
'checkout' => 'Check-out',
'free_cancel_text' => 'Free cancellation up to 48 hours before arrival',
'read_full_policy' => 'Read full policy',
'cleanliness' => 'Cleanliness',
'accuracy' => 'Accuracy',
'communication' => 'Communication',
'show_all_reviews' => 'Show all reviews',
'booking_dates' => 'Booking Dates',
'guests' => 'Guests',
'no_charge_yet' => 'You won\'t be charged yet',
'cleaning_fee' => 'Cleaning Fee',
'service_fee' => 'Service Fee',
'total' => 'Total',
'report_chalet' => 'Report this chalet',




'checkout_title' => 'Checkout & Payment',
'personal_info' => 'Personal Information',
'secure_payment' => 'Secure Payment',
'card_number' => 'Card Number',
'expiry_date' => 'Expiry Date',
'cvc_code' => 'CVC Code',
'confirm_pay' => 'Confirm & Pay',
'agree_terms' => 'By clicking, you agree to the Terms & Conditions',
'booking_summary' => 'Booking Summary',
'dates' => 'Dates',
'adults' => 'Adults',
'child' => 'Child',





'contact_hero_title' => 'How can we help you?',
'contact_hero_desc' => 'Ejaza support team is here to serve you. Whether you have a booking inquiry, suggestion, or technical issue, we are here to listen.',
'call_us' => 'Call Us',
'working_hours' => 'Sun - Thu (9am - 5pm)',
'email_desc' => 'For complaints and suggestions',
'headquarters' => 'Headquarters',
'address_text' => 'Riyadh, King Fahd Road, Al Anoud Tower',
'our_location_map' => 'Our Location on Map',
'send_message_title' => 'Send us a message',
'send_message_desc' => 'We will reply to you as soon as possible',
'name_placeholder' => 'e.g. John Doe',
'inquiry_type' => 'Inquiry Type',
'inquiry_general' => 'General Inquiry',
'inquiry_booking' => 'Booking Issue',
'inquiry_complaint' => 'Host Complaint',
'inquiry_partnership' => 'Partnership Request',
'message_label' => 'Message',
'message_placeholder' => 'Write your message details here...',
'btn_send_message' => 'Send Message',
'msg_sent_alert' => 'Your message has been sent successfully!',
'faq_title' => 'Frequently Asked Questions',
'faq_q1' => 'How can I cancel a booking?',
'faq_a1' => 'You can cancel your booking via your dashboard under "My Bookings", subject to the host\'s cancellation policy.',
'faq_q2' => 'When will I be refunded?',
'faq_a2' => 'Refunds are processed automatically within 5-10 business days depending on your bank.',
'faq_q3' => 'How do I register my chalet?',
'faq_a3' => 'Simply click on the "Property Owner" button above, create a new account, and start adding your property details and photos.',







'welcome_back' => 'Welcome Back',
'login_subtitle' => 'Login to continue',
'password' => 'Password',
'remember_me' => 'Remember me',
'forgot_password' => 'Forgot Password?',
'login_btn' => 'Login',
'no_account' => 'Don\'t have an account?',
'create_account' => 'Create new account',



'hero_title' => 'Book Your Perfect Stay in Seconds',
'hero_subtitle' => 'Enjoy the best times with family and friends in the finest chalets and resorts',




'privacy_title' => 'Privacy Policy',
'last_updated' => 'Last Updated',
'privacy_intro_title' => 'General Introduction',
'privacy_intro_text' => 'At "Ejaza" platform, we recognize the importance of privacy to you and are committed to protecting your personal data with full transparency. This policy explains how we collect, use, and share your information. By using the platform, you agree to these practices.',
'privacy_collection_title' => 'Information We Collect',
'privacy_col_1_title' => 'Account Info',
'privacy_col_1_desc' => 'Name, email, phone number, and password.',
'privacy_col_2_title' => 'Payment Info',
'privacy_col_2_desc' => 'Processed via secure gateways; we do not store details directly.',
'privacy_col_3_title' => 'Booking Data',
'privacy_col_3_desc' => 'Check-in/out dates, guest count, and preferences.',
'privacy_col_4_title' => 'Shared Content',
'privacy_col_4_desc' => 'Reviews, ratings, and photos you upload.',
'privacy_usage_title' => 'How We Use Your Data',
'privacy_usage_intro' => 'We use the information collected for specific purposes including:',
'usage_booking_title' => 'Processing Bookings',
'usage_booking_desc' => 'To process requests and confirm bookings with hosts.',
'usage_service_title' => 'Service Improvement',
'usage_service_desc' => 'To understand usage and develop new features.',
'usage_security_title' => 'Security & Safety',
'usage_security_desc' => 'To detect and prevent fraudulent activity.',
'usage_comm_title' => 'Communication',
'usage_comm_desc' => 'To send booking confirmations and policy updates.',
'privacy_sharing_title' => 'Data Sharing',
'privacy_sharing_text' => 'We do not sell your personal data. We may share data only in the following cases:',
'share_hosts' => 'With <strong>Hosts</strong> to complete the booking.',
'share_providers' => 'With <strong>Service Providers</strong> (e.g., payment processing).',
'share_legal' => 'In compliance with <strong>Laws</strong> when requested by authorities.',
'privacy_contact_title' => 'Have a Question?',
'privacy_contact_text' => 'If you have any questions about our privacy policy, feel free to contact us.',
'contact_support_btn' => 'Contact Support',






'create_account_title' => 'Create New Account',
'create_account_subtitle' => 'Join us and enjoy the best offers',
'register_owner_title' => 'Register as Partner',
'register_owner_subtitle' => 'Start renting your property and maximize your income',
'agree_to' => 'I agree to',
'terms_and_conditions' => 'Terms & Conditions',
'register_btn' => 'Register',
'already_have_account' => 'Already have an account?',



'edit_search' => 'Edit Search',
'sort_by' => 'Sort by',
'sort_lowest_price' => 'Lowest Price',
'sort_top_rated' => 'Top Rated',
'sort_newest' => 'Newest',



'terms_title' => 'Terms & Conditions',
'terms_agreement_title' => 'Agreement to Terms',
'terms_agreement_text' => 'Welcome to "Ejaza". These Terms and Conditions govern your use of our website and services. By accessing or using the platform, you agree to be bound by these terms.',
'warning_label' => 'Notice',
'terms_warning_text' => 'If you do not agree with any part of these terms, please do not use our services.',
'terms_account_title' => 'Account & Registration',
'terms_account_1' => 'You must be at least 18 years old to create an account.',
'terms_account_2' => 'You are responsible for maintaining the confidentiality of your account info.',
'terms_account_3' => 'You must provide accurate information (Real name, Phone number).',
'terms_account_4' => 'We reserve the right to suspend any account violating these terms.',
'terms_booking_title' => 'Booking & Payment',
'payment_policy_title' => 'Payment Policy',
'payment_policy_desc' => 'Full payment is required via the platform to guarantee booking. We accept Credit Cards and Mada.',
'booking_confirm_title' => 'Booking Confirmation',
'booking_confirm_desc' => 'A booking is confirmed only after receiving the confirmation email and appearing in "My Bookings".',
'price_fees_title' => 'Prices & Fees',
'price_fees_desc' => 'Prices include service fees and taxes unless stated otherwise.',
'cancellation_refund_title' => 'Cancellation & Refund',
'cancellation_intro' => 'Cancellation policies vary by host and are clearly displayed on the chalet page. Generally:',
'cancel_flexible' => 'Flexible',
'cancel_flexible_desc' => 'Full refund if cancelled 48 hours before arrival.',
'cancel_moderate' => 'Moderate',
'cancel_moderate_desc' => '50% refund if cancelled 5 days before arrival.',
'cancel_strict' => 'Strict',
'cancel_strict_desc' => 'No refund except in force majeure cases.',
'disclaimer_title' => 'Disclaimer',
'disclaimer_text' => '"Ejaza" acts as an intermediary between host and guest. We do not own properties and are not directly responsible for stay quality, but strive to resolve disputes.',
'important_links' => 'Important Links',



'destination' => 'Destination',
'dates_placeholder' => 'Check-in - Check-out',
'featured_chalets' => 'Featured Chalets',


// Add Chalet Page Keys
'basic_info' => 'Basic Information',
'chalet_name_label' => 'Chalet Name',
'chalet_name_placeholder' => 'e.g. Al Naseem Luxury Chalet',
'detailed_desc_label' => 'Detailed Description',
'detailed_desc_placeholder' => '...Write an attractive description of the chalet and amenities',
'price_night_label' => 'Price (Per Night)',
'area_label' => 'Area (m²)',
'location_url_label' => 'Location URL (Google Maps)',



// --- Add Chalet Page (English) ---
'add_new_chalet_title' => 'Add New Chalet',
'add_new_chalet_subtitle' => 'Add a new property and start receiving bookings',
'media_photos' => 'Photos & Media',
'upload_hint' => 'Drag & drop images here or click to select',
'facilities_amenities' => 'Facilities & Amenities',
'wifi' => 'WiFi',
'bbq' => 'BBQ Area',
'policies' => 'Policies & Conditions',
'checkin_time' => 'Check-in Time',
'checkout_time' => 'Check-out Time',
'publish_chalet' => 'Publish Chalet',
'save_draft' => 'Save Draft',






    ]
];

// =========================================================
// 3. الدوال المساعدة (Helper Functions)
// =========================================================

/**
 * دالة الترجمة: تقوم بإرجاع النص المترجم بناءً على المفتاح
 */
function __($key) {
    global $trans, $lang;
    return isset($trans[$lang][$key]) ? $trans[$lang][$key] : $key;
}

// إعدادات العملة (Currency Settings)
if (isset($_GET['currency'])) {
    $_SESSION['currency'] = $_GET['currency'];
}
$currency = isset($_SESSION['currency']) ? $_SESSION['currency'] : 'SAR';

/**
 * دالة تنسيق السعر: تقوم بتحويل العملة وإضافة الرمز المناسب
 */
function formatPrice($amount) {
    global $currency, $trans, $lang;
    
    // التحقق من أن المبلغ رقم
    $amount = floatval($amount);

    if ($currency == 'USD') {
        // التحويل التقريبي: 1 دولار = 3.75 ريال سعودي
        $final_amount = $amount / 3.75;
        // تقريب الرقم لأقرب عدد صحيح
        return $trans[$lang]['usd'] . ' ' . number_format($final_amount);
    } else {
        // العملة الافتراضية: ريال سعودي
        return number_format($amount) . ' ' . $trans[$lang]['sar'];
    }
}
?>