<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    featuredProducts: Array,
    categories: Array,
});
</script>

<template>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <!-- Navbar -->
        <nav class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <div class="flex items-center gap-2">
                        <span class="text-3xl">🛒</span>
                        <Link href="/" class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                            TechMart Oman
                        </Link>
                    </div>
                    <div class="hidden md:flex items-center gap-8">
                        <Link href="/products/new" class="text-gray-700 hover:text-blue-600 font-medium transition">جديد</Link>
                        <Link href="/products/used" class="text-gray-700 hover:text-blue-600 font-medium transition">مستعمل</Link>
                        <Link href="/cart" class="text-gray-700 hover:text-blue-600 font-medium transition">السلة</Link>
                        <Link href="/login" class="bg-blue-600 text-white px-6 py-2.5 rounded-full font-semibold hover:bg-blue-700 transition shadow-lg shadow-blue-600/30">دخول</Link>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="relative overflow-hidden bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white">
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.05\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
            <div class="max-w-7xl mx-auto px-4 py-32 relative z-10">
                <div class="text-center">
                    <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                        أهلاً بك في
                        <span class="block bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">TechMart Oman</span>
                    </h1>
                    <p class="text-xl md:text-2xl mb-12 text-white/90 max-w-3xl mx-auto">
                        وجهتك الأولى للأجهزة الإلكترونية الجديدة والمستعملة في سلطنة عُمان
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <Link href="/products/new" class="bg-white text-blue-600 px-10 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition shadow-2xl shadow-white/20 transform hover:scale-105">
                            🛍️ تسوق الجديد
                        </Link>
                        <Link href="/products/used" class="bg-transparent border-2 border-white text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-white/10 transition transform hover:scale-105">
                            📱 تسوق المستعمل
                        </Link>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-gray-50 to-transparent"></div>
        </section>

        <!-- Features -->
        <section class="py-16">
            <div class="max-w-7xl mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition transform hover:-translate-y-2">
                        <div class="text-5xl mb-4">✅</div>
                        <h3 class="text-xl font-bold mb-2">ضمان حقيقي</h3>
                        <p class="text-gray-600">جميع المنتجات الجديدة لها ضمان الوكيل الرسمي، والمستعملة ضمان 90 يوم</p>
                    </div>
                    <div class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition transform hover:-translate-y-2">
                        <div class="text-5xl mb-4">🚚</div>
                        <h3 class="text-xl font-bold mb-2">توصيل سريع</h3>
                        <p class="text-gray-600">توصيل لجميع محافظات السلطنة خلال 24-48 ساعة</p>
                    </div>
                    <div class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition transform hover:-translate-y-2">
                        <div class="text-5xl mb-4">💳</div>
                        <h3 class="text-xl font-bold mb-2">دفع آمن</h3>
                        <p class="text-gray-600">ادفع بثوانيا، أمان نت، أو عند الاستلام</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Categories -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-4xl font-bold text-center mb-12 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">التصنيفات</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                    <Link v-for="cat in categories" :key="cat.id" :href="`/categories/${cat.slug}`"
                        class="group bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-6 text-center hover:shadow-xl transition transform hover:-translate-y-2 hover:from-blue-50 hover:to-purple-50">
                        <div class="text-6xl mb-4 group-hover:scale-110 transition">📱</div>
                        <div class="font-bold text-gray-800 group-hover:text-blue-600 transition">{{ cat.name_ar }}</div>
                        <div class="text-sm text-gray-500 mt-1">{{ cat.products_count }} منتج</div>
                    </Link>
                </div>
            </div>
        </section>

        <!-- Featured Products -->
        <section class="py-16">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-4xl font-bold text-center mb-4 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">الأكثر مبيعاً</h2>
                <p class="text-center text-gray-600 mb-12">اختيارات عملائنا الأفضل هذا الأسبوع</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <Link v-for="product in featuredProducts" :key="product.id" :href="`/products/${product.slug}`"
                        class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
                        <div class="h-64 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center text-8xl group-hover:scale-105 transition">
                            📱
                        </div>
                        <div class="p-6">
                            <div class="text-sm text-blue-600 font-semibold mb-2">{{ product.brand?.name || 'منتج مميز' }}</div>
                            <h3 class="font-bold text-lg mb-3 group-hover:text-blue-600 transition">{{ product.name_ar }}</h3>
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="text-2xl font-bold text-blue-600">{{ product.price }} ر.ع.</div>
                                    <div v-if="product.compare_at_price" class="text-sm text-gray-400 line-through">{{ product.compare_at_price }} ر.ع.</div>
                                </div>
                                <div class="bg-blue-600 text-white px-4 py-2 rounded-full font-semibold group-hover:bg-blue-700 transition">
                                    عرض
                                </div>
                            </div>
                        </div>
                    </Link>
                </div>
                <div class="text-center mt-12">
                    <Link href="/products/new" class="inline-block bg-gradient-to-r from-blue-600 to-purple-600 text-white px-10 py-4 rounded-full font-bold text-lg hover:shadow-2xl transition transform hover:scale-105">
                        عرض كل المنتجات ✨
                    </Link>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
            <div class="max-w-4xl mx-auto px-4 text-center">
                <h2 class="text-4xl font-bold mb-6">جاهز تشتري؟</h2>
                <p class="text-xl mb-8 text-white/90">سجل الآن واحصل على خصم 10% على أول طلب</p>
                <Link href="/register" class="inline-block bg-white text-blue-600 px-10 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition shadow-2xl transform hover:scale-105">
                    إنشاء حساب جديد 🎉
                </Link>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-12">
            <div class="max-w-7xl mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">TechMart Oman</h3>
                        <p class="text-gray-400">وجهتك الأولى للأجهزة الإلكترونية في سلطنة عُمان</p>
                    </div>
                    <div>
                        <h4 class="font-bold mb-4">روابط سريعة</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li><Link href="/products/new" class="hover:text-white transition">المنتجات الجديدة</Link></li>
                            <li><Link href="/products/used" class="hover:text-white transition">المنتجات المستعملة</Link></li>
                            <li><Link href="/about" class="hover:text-white transition">من نحن</Link></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold mb-4">الدعم</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li><Link href="/faq" class="hover:text-white transition">الأسئلة الشائعة</Link></li>
                            <li><Link href="/terms" class="hover:text-white transition">الشروط والأحكام</Link></li>
                            <li><Link href="/privacy" class="hover:text-white transition">الخصوصية</Link></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold mb-4">تواصل معنا</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li>📧 support@techmart.om</li>
                            <li>📱 +968 9999 9999</li>
                            <li>📍 مسقط، سلطنة عُمان</li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                    <p>&copy; 2026 TechMart Oman. جميع الحقوق محفوظة.</p>
                </div>
            </div>
        </footer>
    </div>
</template>
