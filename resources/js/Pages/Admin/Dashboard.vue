<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    stats: Object,
    recentOrders: Array,
});
</script>

<template>
    <div class="min-h-screen bg-gray-50">
        <!-- Header -->
        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
                <Link href="/admin/dashboard" class="text-2xl font-bold text-blue-600">لوحة الإدارة</Link>
                <nav class="flex gap-6">
                    <Link href="/" class="text-gray-700 hover:text-blue-600">الموقع</Link>
                    <form method="POST" action="/logout">
                        <button type="submit" class="text-red-600 hover:underline">خروج</button>
                    </form>
                </nav>
            </div>
        </header>

        <!-- Stats -->
        <main class="py-8">
            <div class="max-w-7xl mx-auto px-4">
                <h1 class="text-3xl font-bold mb-8">نظرة عامة</h1>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="text-gray-600 mb-2">إجمالي الطلبات</div>
                        <div class="text-3xl font-bold text-blue-600">{{ stats.totalOrders }}</div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="text-gray-600 mb-2">طلبات قيد الانتظار</div>
                        <div class="text-3xl font-bold text-orange-600">{{ stats.pendingOrders }}</div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="text-gray-600 mb-2">إجمالي المنتجات</div>
                        <div class="text-3xl font-bold text-green-600">{{ stats.totalProducts }}</div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="text-gray-600 mb-2">إجمالي العملاء</div>
                        <div class="text-3xl font-bold text-purple-600">{{ stats.totalCustomers }}</div>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6 border-b">
                        <h2 class="text-xl font-bold">آخر الطلبات</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-right font-semibold">رقم الطلب</th>
                                    <th class="px-6 py-3 text-right font-semibold">العميل</th>
                                    <th class="px-6 py-3 text-right font-semibold">الحالة</th>
                                    <th class="px-6 py-3 text-right font-semibold">الإجمالي</th>
                                    <th class="px-6 py-3 text-right font-semibold">التاريخ</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                <tr v-for="order in recentOrders" :key="order.id">
                                    <td class="px-6 py-4">{{ order.order_number }}</td>
                                    <td class="px-6 py-4">{{ order.user?.name || 'زائر' }}</td>
                                    <td class="px-6 py-4">
                                        <span :class="{
                                            'bg-yellow-100 text-yellow-800': order.status === 'pending',
                                            'bg-blue-100 text-blue-800': order.status === 'processing',
                                            'bg-green-100 text-green-800': order.status === 'delivered',
                                        }" class="px-3 py-1 rounded-full text-sm">
                                            {{ order.status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 font-semibold">{{ order.total }} ر.ع.</td>
                                    <td class="px-6 py-4 text-gray-600">{{ new Date(order.created_at).toLocaleDateString('ar-OM') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
