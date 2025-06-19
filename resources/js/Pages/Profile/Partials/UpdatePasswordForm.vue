<template>
    <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-sm">
        <div class="mb-8">
            <h1 class="text-2xl font-semibold text-gray-800"> Update Credentials</h1>
            <p class="text-gray-500 mt-1">Ensure your account is using a long, random password to stay
                secure.</p>
        </div>

        <div class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="username">Username</label>
                <input v-model="form.username" type="text" placeholder="username"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                <p v-if="errors.username" class="text-sm text-red-600 mt-1">{{ errors.username[0] }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="password">Old Password</label>
                <input v-model="form.old_password" type="password" placeholder="••••••••"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                <p v-if="errors.old_password" class="text-sm text-red-600 mt-1">{{ errors.old_password[0] }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="new password">New Password</label>
                <input v-model="form.new_password" type="password" placeholder="••••••••"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                <p v-if="errors.new_password" class="text-sm text-red-600 mt-1">{{ errors.new_password[0] }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="confirm password">Confirm
                    Password</label>
                <input v-model="form.confirm_password" type="password" placeholder="••••••••"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                <p v-if="errors.confirm_password" class="text-sm text-red-600 mt-1">{{ errors.confirm_password[0] }}</p>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <button @click="submit" :disabled="form.processing"
                    class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-75 transition">
                    <span v-if="form.processing">Saving...</span>
                    <span v-else>Save Changes</span>
                </button>
            </div>
        </div>
    </div>
</template>
<script setup lang="ts">
import { useForm, usePage } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';

const errors = ref<[] | any>([]);
const page = usePage().props as unknown as PageProps;
interface PageProps {
    auth: {
        user: User;
    }
};
interface User {
    username: string;
    id: number;
}

const form = useForm({
    username: page.auth.user.username,
    old_password: '',
    new_password: '',
    confirm_password: ''
});

const submit = async () => {
    try {
        const response = await axios.post(route('profile.updateCredentials'), {
            username: form.username,
            old_password: form.old_password,
            new_password: form.new_password,
            confirm_password: form.confirm_password,
            id: page.auth.user.id
        });
        errors.value = {}
    } catch (error) {
        if (error.response && error.response.data && error.response.data.errors) {
            errors.value = error.response.data.errors;
        } else {
            console.error('Unexpected error:', error);
        }
    }
}
</script>