<script setup>
import { Link, router } from '@inertiajs/vue3';

defineProps({
    items: Array,
    total: Number,
});

function updateQuantity(item, qty) {
    router.put(`/cart/${item.id}`, { quantity: qty });
}

function removeItem(item) {
    router.delete(`/cart/${item.id}`);
}
</script>

<template>
    <div class="min-h-screen bg-gray-50">
        <!-- Header -->
        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
                <Link href="/" class="text-2xl font-bold text-blue-600">TechMart Oman</Link>
                <nav class="flex gap-6">
                    <Link href="/products/new" class="text-gray-700 hover:text-blue-600">تسوق</Link>
                </nav>
            </div>
        </header>

        <!-- Cart -->
        <main class="py-8">
            <div class="max-w-4xl mx-auto px-4">
                <h1 class="text-3xl font-bold mb-8">سلة التسوق</h1>

                <div v-if="items.length === 0" class="bg-white rounded-lg shadow p-8 text-center">
                    <p class="text-gray-600 mb-4">السلة فارغة</p>
                    <Link href="/products/new" class="text-blue-600 hover:underline">تسوق الآن</Link>
                </div>

                <div v-else class="bg-white rounded-lg shadow divide-y">
                    <div v-for="item in items" :key="item.id" class="p-6 flex items-center gap-4">
                        <div class="w-24 h-24 bg-gray-200 flex items-center justify-center text-4xl">📱</div>
                        <div class="flex-1">
                            <h3 class="font-semibold">{{ item.product.name_ar }}</h3>
                            <p class="text-gray-600">{{ item.variant.color }} - {{ item.variant.storage }}</p>
                            <div class="text-blue-600 font-bold mt-2">{{ item.subtotal }} ر.ع.</div>
                        </div>
                        <div class="flex items-center gap-2">
                            <input type="number" :value="item.quantity" @change="updateQuantity(item, $event.target.value)"
                                class="border px-2 py-1 rounded w-16" min="1" />
                            <button @click="removeItem(item)" class="text-red-600 hover:underline">حذف</button>
                        </div>
                    </div>

                    <div class="p-6 border-t">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-xl font-semibold">الإجمالي:</span>
                            <span class="text-2xl font-bold text-blue-600">{{ total }} ر.ع.</span>
                        </div>
                        <button class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">
                            إتمام الشراء
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
