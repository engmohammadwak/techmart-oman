# 🚀 TechMart Oman

منصة تجارة إلكترونية متكاملة لبيع الأجهزة الإلكترونية الجديدة والمستعملة في سلطنة عُمان.

## المميزات

- ✅ Laravel 11 + Vue 3 + Inertia.js + Tailwind CSS
- ✅ دعم كامل للغة العربية (RTL) والإنجليزية (LTR)
- ✅ نظام صلاحيات متكامل (RBAC)
- ✅ إدارة المنتجات والمخزون والفروع
- ✅ سلة تسوق وطلبات ودفع إلكتروني
- ✅ لوحات تحكم للعملاء والإدارة
- ✅ تكامل مع بوابات الدفع العُمانية (Thawani, OmanNet)
- ✅ نظام ولاء ونقاط ومحفظة إلكترونية

## المتطلبات

- PHP 8.3+
- Composer
- Node.js 18+
- MySQL 8.0+
- Redis (اختياري)

## التثبيت

```bash
# استنساخ المشروع
git clone https://github.com/engmohammadwak/techmart-oman.git
cd techmart-oman

# تثبيت حزم PHP
composer install

# تثبيت حزم Node.js
npm install

# نسخ ملف البيئة
cp .env.example .env

# توليد مفتاح التطبيق
php artisan key:generate

# إعداد قاعدة البيانات في ملف .env
# DB_DATABASE=techmart_oman
# DB_USERNAME=root
# DB_PASSWORD=

# تشغيل الترحيلات والبذور
php artisan migrate --seed

# بناء الـ Frontend
npm run build

# تشغيل الخادم المحلي
php artisan serve
```

## البنية التقنية

### Backend
- Laravel 11
- Laravel Sanctum (للمصادقة)
- Laravel Spatie Permission (للصلاحيات)
- MySQL 8
- Redis (للكاش والطابور)

### Frontend
- Vue 3
- Inertia.js
- Tailwind CSS
- RTL/LTR Support

### التكاملات
- Thawani API (للدفع)
- OmanNet
- WhatsApp Business API
- OmanPost / Aramex (للشحن)

## الهيكل

```
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Models/
│   ├── Policies/
│   └── Providers/
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
├── resources/
│   ├── js/
│   │   ├── Pages/
│   │   ├── Components/
│   │   └── app.js
│   └── views/
├── routes/
│   ├── web.php
│   ├── api.php
│   └── admin.php
└── tests/
```

## الترخيص

MIT License

## المطور

Mohammad Waleed - [@engmohammadwak](https://github.com/engmohammadwak)
