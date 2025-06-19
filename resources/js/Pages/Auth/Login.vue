<template>

    <Head title="Log in" />

    <div class="min-h-screen flex items-center justify-center bg-gray-50"
        style="background-image:url('https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2400&q=80')">

        <div class="max-w-md w-full mx-4 bg-white/90 backdrop-blur-sm p-8 rounded-xl shadow-lg border border-white/20">
            <div class="flex justify-center mb-6">
                <div class="text-center">
                    <div class="flex justify-center text-center">
                        <img src="/storage/images/stock-market.png" alt="Swa logo" class="w-20 h-20">
                        <span class="text-3xl font-bold text-indigo-700 mt-5 ml-3">SWA</span>
                    </div>
                    <p class="mt-1 text-gray-600">Stock Withdrawal Advice Monitoring</p>
                    <p class="mt-3 text-sm text-gray-500">Log in to continue</p>
                </div>
            </div>

            <div v-if="status" class="mb-6 p-3 rounded-md bg-green-50 text-green-700 text-sm text-center">
                {{ status }}
            </div>

            <form @submit.prevent="submit" class="space-y-5 rounded">
                <div>
                    <label class="text-gray-700">Username</label>
                    <TextInput type="text" class="w-full mt-1" placeholder="your.username" v-model="form.username" required
                        autofocus />
                    <InputError class="mt-1" :message="form.errors.username" />
                </div>

                <div>
                    <label class="text-gray-700">Password</label>
                    <TextInput id="password" type="password" class="w-full mt-1" placeholder="password"
                        v-model="form.password" required autocomplete="current-password" />
                    <InputError class="mt-1" :message="form.errors.password" />
                </div>

                <div class="flex items-center">
                    <input id="remember" type="checkbox"
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                        v-model="form.remember" />
                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                        Remember me
                    </label>
                </div>

                <button type="submit"
                    class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200"
                    :disabled="form.processing" :class="{ 'opacity-70 cursor-not-allowed': form.processing }">
                    <span v-if="!form.processing">Log in</span>
                    <span v-else class="flex items-center">
                        <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Logging in...
                    </span>
                </button>
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    username: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>