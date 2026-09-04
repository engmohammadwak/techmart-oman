<script setup>
import { Link, router } from '@inertiajs/vue3';

defineProps({
    products: Object,
    categories: Array,
    brands: Array,
    filters: Object,
});

function filter(condition) {
    router.get(`/products/${condition}`);
}
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
                </nav>
            </div>
        </header>

        <!-- Filters -->
        <section class="bg-white border-b">
            <div class="max-w-7xl mx-auto px-4 py-4 flex gap-4">
                <button @click="filter('new')" :class="filters.condition === 'new' ? 'bg-blue-600 text-white' : 'bg-gray-200'"
                    class="px-4 py-2 rounded">جديد</button>
                <button @click="filter('used')" :class="filters.condition === 'used' ? 'bg-blue-600 text-white' : 'bg-gray-200'"
                    class="px-4 py-2 rounded">مستعمل</button>
            </div>
        </section>

        <!-- Products Grid -->
        <main class="py-8">
            <div class="max-w-7xl mx-auto px-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <Link v-for="product in products.data" :key="product.id" :href="`/products/${product.slug}`"
                        class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
                        <div class="h-48 bg-gray-200 flex items-center justify-center text-6xl">📱</div>
                        <div class="p-4">
                            <h3 class="font-semibold mb-2">{{ product.name_ar }}</h3>
                            <div class="text-blue-600 font-bold">{{ product.price }} ر.ع.</div>
                        </div>
                    </Link>
                </div>

                <!-- Pagination -->
                <div class="mt-8 flex justify-center gap-2">
                    <Link v-for="(link, i) in products.links" :key="i" :href="link.url || '#'"
                        :class="link.active ? 'bg-blue-600 text-white' : 'bg-white'"
                        class="px-4 py-2 rounded border" v-html="link.label"></Link>
                </div>
            </div>
        </main>
    </div>
</template>
