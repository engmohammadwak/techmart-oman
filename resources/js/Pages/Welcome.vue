<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    featuredProducts: Array,
    categories: Array,
});
</script>

<template>
    <div class="min-h-screen bg-gray-50">
        <!-- Header -->
        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
                <Link href="/" class="text-2xl font-bold text-blue-600">TechMart Oman</Link>
                <nav class="flex gap-6">
                    <Link href="/products/new" class="text-gray-700 hover:text-blue-600">جديد</Link>
                    <Link href="/products/used" class="text-gray-700 hover:text-blue-600">مستعمل</Link>
                    <Link href="/cart" class="text-gray-700 hover:text-blue-600">السلة</Link>
                    <Link href="/login" class="text-gray-700 hover:text-blue-600">دخول</Link>
                </nav>
            </div>
        </header>

        <!-- Hero -->
        <section class="bg-blue-600 text-white py-20">
            <div class="max-w-7xl mx-auto px-4 text-center">
                <h1 class="text-5xl font-bold mb-4">أهلاً بك في TechMart Oman</h1>
                <p class="text-xl mb-8">أفضل وجهة للأجهزة الإلكترونية الجديدة والمستعملة في عُمان</p>
                <div class="flex gap-4 justify-center">
                    <Link href="/products/new" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100">تسوق الجديد</Link>
                    <Link href="/products/used" class="bg-transparent border-2 border-white px-8 py-3 rounded-lg font-semibold hover:bg-white/10">تسوق المستعمل</Link>
                </div>
            </div>
        </section>

        <!-- Categories -->
        <section class="py-16">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-3xl font-bold mb-8 text-center">التصنيفات</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                    <Link v-for="cat in categories" :key="cat.id" :href="`/categories/${cat.slug}`"
                        class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition text-center">
                        <div class="text-4xl mb-2">📱</div>
                        <div class="font-semibold">{{ cat.name_ar }}</div>
                    </Link>
                </div>
            </div>
        </section>

        <!-- Featured Products -->
        <section class="py-16 bg-gray-100">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-3xl font-bold mb-8 text-center">الأكثر مبيعاً</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <Link v-for="product in featuredProducts" :key="product.id" :href="`/products/${product.slug}`"
                        class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
                        <div class="h-48 bg-gray-200 flex items-center justify-center text-6xl">📱</div>
                        <div class="p-4">
                            <h3 class="font-semibold mb-2">{{ product.name_ar }}</h3>
                            <div class="text-blue-600 font-bold">{{ product.price }} ر.ع.</div>
                        </div>
                    </Link>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-8">
            <div class="max-w-7xl mx-auto px-4 text-center">
                <p>&copy; 2026 TechMart Oman. جميع الحقوق محفوظة.</p>
            </div>
        </footer>
    </div>
</template>
