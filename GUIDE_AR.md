# 🚀 دليل البدء السريع - TechMart Oman

## ✅ ما تم إنجازه حتى الآن

تم إنشاء المشروع بالكامل على GitHub مع:

### 1. قاعدة البيانات (33 جدول)
- ✅ جداول المستخدمين والصلاحيات
- ✅ جداول المنتجات والتصنيفات والماركات
- ✅ جداول الفروع والمخازن والمخزون
- ✅ جداول الطلبات والدفع والشحن
- ✅ جداول المحفظة والولاء والكوبونات
- ✅ جداول الفواتير والمصروفات والضريبة
- ✅ جداول الدعم والمحتوى والإشعارات

### 2. الموديلات (33 Model)
كل الجداول لها Models كاملة مع:
- ✅ العلاقات (Relationships)
- ✅ الخصائص المحسوبة (Accessors)
- ✅ الدوال المساعدة

### 3. الملفات الأساسية
- ✅ composer.json
- ✅ package.json
- ✅ vite.config.js
- ✅ tailwind.config.js
- ✅ ملفات البيئة (.env.example)
- ✅ ملفات التوجيه (routes)

---

## 📋 الخطوات التالية - ابدأ من هنا

### الخطوة 1: تنزيل المشروع

```bash
# على جهازك
mkdir techmart
cd techmart

# تنزيل المشروع من GitHub
git clone https://github.com/engmohammadwak/techmart-oman.git
cd techmart-oman
```

### الخطوة 2: تثبيت الحزم

```bash
# تثبيت حزم PHP
composer install

# تثبيت حزم Node.js
npm install
```

### الخطوة 3: إعداد البيئة

```bash
# نسخ ملف البيئة
cp .env.example .env

# توليد مفتاح التطبيق
php artisan key:generate
```

### الخطوة 4: إعداد قاعدة البيانات

1. افتح ملف `.env`
2. عدّل الإعدادات التالية:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=techmart_oman
DB_USERNAME=root
DB_PASSWORD=كلمة_السر_الخاصة_بك
```

3. أنشئ قاعدة البيانات:

```bash
# من MySQL CLI أو phpMyAdmin
CREATE DATABASE techmart_oman CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### الخطوة 5: تشغيل الترحيلات

```bash
php artisan migrate
```

### الخطوة 6: بناء الـ Frontend

```bash
npm run build
```

### الخطوة 7: تشغيل المشروع

```bash
php artisan serve
```

افتح المتصفح على: `http://127.0.0.1:8000`

---

## 🎯 المرحلة الأولى - ما سنبنيه الآن

بعد تشغيل المشروع، سنبني بالترتيب:

### 1. لوحة الإدارة الأساسية
- تسجيل دخول الإدارة
- لوحة التحكم الرئيسية (Dashboard)
- إدارة المنتجات (CRUD)
- إدارة التصنيفات
- إدارة الماركات

### 2. واجهة الموقع العامة
- الصفحة الرئيسية
- صفحة المنتجات الجديدة
- صفحة المنتجات المستعملة
- صفحة تفاصيل المنتج
- سلة التسوق

### 3. نظام المصادقة
- تسجيل الدخول للعملاء
- إنشاء حساب جديد
- استعادة كلمة المرور

### 4. نظام الطلبات
- إتمام الطلب (Checkout)
- تأكيد الطلب
- تتبع الطلب

---

## 📁 هيكل المشروع

```
techmart-oman/
├── app/
│   ├── Http/
│   │   ├── Controllers/       # Controllers (سننشئها)
│   │   ├── Middleware/        # Middleware
│   │   └── Requests/          # Form Validation
│   ├── Models/                # ✅ Models (جاهزة)
│   └── Providers/
├── database/
│   ├── migrations/            # ✅ Migrations (جاهزة)
│   ├── seeders/               # Seeders (سننشئها)
│   └── factories/             # Factories (سننشئها)
├── resources/
│   ├── js/
│   │   ├── Pages/             # Vue 3 Pages (سننشئها)
│   │   ├── Components/        # Vue Components (سننشئها)
│   │   └── app.js
│   └── views/
│       └── app.blade.php
├── routes/
│   ├── web.php                # ✅ Web Routes (جاهزة)
│   ├── api.php                # ✅ API Routes (جاهزة)
│   └── admin.php              # ✅ Admin Routes (جاهزة)
└── public/
    └── index.php
```

---

## 🛠️ الأدوات المطلوبة

تأكد من تثبيت:

- ✅ PHP 8.3+
- ✅ Composer
- ✅ Node.js 18+
- ✅ MySQL 8.0+
- ✅ Git

للتحقق من الإصدارات:

```bash
php -v
composer --version
node -v
npm -v
mysql --version
```

---

## 🔧 حل المشاكل الشائعة

### خطأ: Class not found

```bash
composer dump-autoload
```

### خطأ: Permission denied

```bash
chmod -R 775 storage bootstrap/cache
```

### خطأ: SQLSTATE

تأكد من:
1. قاعدة البيانات موجودة
2. اسم المستخدم وكلمة المرور صحيحين في `.env`
3. خادم MySQL يعمل

```bash
# اختبار الاتصال
php artisan tinker
>>> DB::connection()->getPdo();
```

### خطأ: Vite manifest not found

```bash
npm run build
```

---

## 📞 الدعم

المشروع مفتوح المصدر على GitHub:
https://github.com/engmohammadwak/techmart-oman

للمساهمة أو الإبلاغ عن مشاكل، افتح Issue جديد.

---

## ✅ قائمة المهام - المرحلة الأولى

- [ ] إنشاء DatabaseSeeder
- [ ] إنشاء Factories للموديلات الأساسية
- [ ] إنشاء Controllers للإدارة
- [ ] إنشاء Controllers للموقع العام
- [ ] إنشاء Vue Pages للوحة الإدارة
- [ ] إنشاء Vue Pages للموقع العام
- [ ] إضافة Tailwind CSS للـ RTL
- [ ] إضافة Vue Components مشتركة
- [ ] اختبار كل صفحة

---

**جاهز نبدأ؟** 🚀
