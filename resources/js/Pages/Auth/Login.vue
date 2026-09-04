<script setup>
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    email: '',
    password: '',
});

function submit() {
    form.post('/login');
}
</script>

<template>
    <div class="min-h-screen bg-gray-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow p-8 w-full max-w-md">
            <h1 class="text-2xl font-bold mb-6 text-center">تسجيل الدخول</h1>

            <form @submit.prevent="submit">
                <div class="mb-4">
                    <label class="block mb-2 font-semibold">البريد أو الهاتف</label>
                    <input v-model="form.email" type="text" class="w-full border px-4 py-2 rounded" required />
                    <div v-if="form.errors.email" class="text-red-600 text-sm mt-1">{{ form.errors.email }}</div>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 font-semibold">كلمة المرور</label>
                    <input v-model="form.password" type="password" class="w-full border px-4 py-2 rounded" required />
                    <div v-if="form.errors.password" class="text-red-600 text-sm mt-1">{{ form.errors.password }}</div>
                </div>

                <button type="submit" :disabled="form.processing"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">
                    دخول
                </button>
            </form>

            <div class="mt-6 text-center">
                <Link href="/register" class="text-blue-600 hover:underline">ليس لديك حساب؟ سجل الآن</Link>
            </div>
        </div>
    </div>
</template>
