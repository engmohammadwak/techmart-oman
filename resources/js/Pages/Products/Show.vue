<script setup>
import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

defineProps({
    product: Object,
    relatedProducts: Array,
});

const form = useForm({
    product_variant_id: '',
    quantity: 1,
});

function addToCart() {
    form.post('/cart/add');
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
                    <Link href="/cart" class="text-gray-700 hover:text-blue-600">السلة</Link>
                </nav>
            </div>
        </header>

        <!-- Product Details -->
        <main class="py-8">
            <div class="max-w-7xl mx-auto px-4">
                <div class="bg-white rounded-lg shadow p-8 grid md:grid-cols-2 gap-8">
                    <div class="h-96 bg-gray-200 flex items-center justify-center text-9xl">📱</div>
                    <div>
                        <h1 class="text-3xl font-bold mb-4">{{ product.name_ar }}</h1>
                        <p class="text-gray-600 mb-4">{{ product.description_ar }}</p>
                        <div class="text-3xl text-blue-600 font-bold mb-6">{{ product.price }} ر.ع.</div>

                        <form @submit.prevent="addToCart" class="flex gap-4">
                            <input type="number" v-model="form.quantity" min="1" class="border px-4 py-2 rounded w-24" />
                            <button type="submit" class="bg-blue-600 text-white px-8 py-2 rounded hover:bg-blue-700">
                                أضف للسلة
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Related Products -->
                <section class="mt-16">
                    <h2 class="text-2xl font-bold mb-6">منتجات ذات صلة</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <Link v-for="p in relatedProducts" :key="p.id" :href="`/products/${p.slug}`"
                            class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
                            <div class="h-48 bg-gray-200 flex items-center justify-center text-6xl">📱</div>
                            <div class="p-4">
                                <h3 class="font-semibold mb-2">{{ p.name_ar }}</h3>
                                <div class="text-blue-600 font-bold">{{ p.price }} ر.ع.</div>
                            </div>
                        </Link>
                    </div>
                </section>
            </div>
        </main>
    </div>
</template>
