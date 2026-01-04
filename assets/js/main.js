/**
 * main.js - المنطق التفاعلي لمنصة إجازة
 * يشمل: الوضع الليلي، القوائم المنسدلة، عداد الضيوف، والتقويم
 */

/* =========================================
   1. إعدادات المظهر (Dark/Light Theme)
   ========================================= */
function toggleTheme() {
    const html = document.documentElement;
    const newTheme = html.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
    html.setAttribute('data-theme', newTheme);
    localStorage.setItem('ejaza_theme', newTheme);
}

// استعادة الثيم المحفوظ عند تحميل الصفحة
document.addEventListener('DOMContentLoaded', () => {
    const savedTheme = localStorage.getItem('ejaza_theme') || 'light';
    document.documentElement.setAttribute('data-theme', savedTheme);
});


/* =========================================
   2. نظام القوائم المنسدلة (Dropdown System)
   يتحكم في قائمة الضيوف، العملة، واللغة
   ========================================= */

// دالة لفتح/إغلاق أي قائمة بناءً على الـ ID
function toggleDropdown(id) {
    const dropdown = document.getElementById(id);
    
    // إغلاق أي قائمة أخرى مفتوحة حالياً لمنع التداخل
    const allDropdowns = document.querySelectorAll('.guest-dropdown, .dropdown-menu');
    allDropdowns.forEach(d => {
        if (d.id !== id) d.classList.remove('show');
    });

    // عكس حالة القائمة الحالية (فتح/إغلاق)
    if(dropdown) {
        dropdown.classList.toggle('show');
    }
}

// إغلاق القوائم عند النقر في أي مكان خارجها (Click Outside)
window.onclick = function(event) {
    // نتحقق أن النقر لم يتم على زر القائمة أو داخل حقل البحث
    if (!event.target.matches('.nav-link-btn') && 
        !event.target.matches('.search-field') && 
        !event.target.closest('.search-field') && 
        !event.target.closest('.dropdown-wrapper')) {
        
        const dropdowns = document.querySelectorAll('.guest-dropdown, .dropdown-menu');
        dropdowns.forEach(openDropdown => {
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        });
    }
}


/* =========================================
   3. منطق عداد الضيوف (Guest Counter)
   ========================================= */
let guestCounts = { adults: 1, children: 0 };

function updateGuest(type, change, event) {
    if(event) {
        event.stopPropagation(); // منع إغلاق القائمة عند النقر على + أو -
        event.preventDefault();
    }
    
    // تحديث القيم
    guestCounts[type] += change;

    // منع القيم السالبة
    if (type === 'adults' && guestCounts.adults < 1) guestCounts.adults = 1;
    if (type === 'children' && guestCounts.children < 0) guestCounts.children = 0;

    // تحديث الأرقام في القائمة
    const countElement = document.getElementById(type + '-count');
    if(countElement) countElement.innerText = guestCounts[type];

    // تحديث الحقول المخفية (Hidden Inputs)
    const inputElement = document.getElementById('input-' + type);
    if(inputElement) inputElement.value = guestCounts[type];
    
    // تحديث النص الظاهر في شريط البحث
    updateGuestLabel();
}

function updateGuestLabel() {
    const total = guestCounts.adults + guestCounts.children;
    const lang = document.documentElement.lang || 'ar';
    const labelElement = document.getElementById('guest-label');
    
    if(labelElement) {
        let label = "";
        if (lang === 'ar') {
            label = total + " ضيوف"; 
            if(total === 1) label = "ضيف واحد";
        } else {
            label = total + (total === 1 ? " Guest" : " Guests");
        }
        labelElement.innerText = label;
    }
}


/* =========================================
   4. تهيئة التقويم (Flatpickr)
   ========================================= */
document.addEventListener('DOMContentLoaded', () => {
    
    // 1. تحديد لغة الموقع الحالية
    const currentLang = document.documentElement.lang || 'ar';
    
    // 2. تهيئة التقويم على الحقل الذي يحمل id="dates"
    const dateInput = document.getElementById("dates");
    
    if (dateInput) {
        flatpickr(dateInput, {
            mode: "range",             // تفعيل وضع النطاق (وصول - مغادرة)
            minDate: "today",          // منع اختيار تواريخ في الماضي
            dateFormat: "Y-m-d",       // صيغة التاريخ (سنة-شهر-يوم)
            
            // تحديد اللغة (يجب التأكد من تحميل ملف ar.js في الهيدر)
            locale: currentLang === 'ar' ? 'ar' : 'default', 
            
            // خيارات إضافية لتحسين التجربة
            showMonths: 1,             
            disableMobile: "true",     // استخدام التقويم المخصص حتى على الجوال
            
            // تخصيص النصوص في حال لم تعمل الترجمة التلقائية
            onReady: function(selectedDates, dateStr, instance) {
                if (currentLang === 'ar') {
                    instance.l10n.rangeSeparator = " إلى ";
                }
            },

            onOpen: function(selectedDates, dateStr, instance) {
                if(dateStr === "") instance.clear();
            }
        });
    }
});