import { createI18n } from 'vue-i18n';

const messages = {
    ar: {
        home: 'الرئيسية',
        products: 'المنتجات',
        new: 'جديد',
        used: 'مستعمل',
        cart: 'السلة',
        login: 'تسجيل الدخول',
        register: 'حساب جديد',
        search: 'بحث...',
        add_to_cart: 'أضف للسلة',
        buy_now: 'اشتري الآن',
        price: 'السعر',
        omr: 'ر.ع.',
    },
    en: {
        home: 'Home',
        products: 'Products',
        new: 'New',
        used: 'Used',
        cart: 'Cart',
        login: 'Login',
        register: 'Register',
        search: 'Search...',
        add_to_cart: 'Add to Cart',
        buy_now: 'Buy Now',
        price: 'Price',
        omr: 'OMR',
    },
};

export function createI18n() {
    return createI18n({
        legacy: false,
        locale: 'ar',
        fallbackLocale: 'en',
        messages,
    });
}
