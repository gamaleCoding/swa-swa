<template>
    <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-sm">
        <div class="mb-8">
            <h1 class="text-2xl font-semibold text-gray-800">Update Profile</h1>
            <p class="text-gray-500 mt-1">Update your account's profile information.</p>
        </div>

        <div class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="firstname">Firstname</label>
                <input v-model="form.firstname" type="text" placeholder="firstname"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                <p v-if="errors.firstname" class="text-sm text-red-600 mt-1">{{ errors.firstname }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="middlename">Middlename</label>
                <input v-model="form.middlename" type="text" placeholder="middlename"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                <p v-if="errors.middlename" class="text-sm text-red-600 mt-1">{{ errors.middlename }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="lastname">Lastname</label>
                <input v-model="form.lastname" type="lastname" placeholder="lastname"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                <p v-if="errors.lastname" class="text-sm text-red-600 mt-1">{{ errors.lastname }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="name_extention">Name Extention</label>
                <input v-model="form.name_extention" type="name_extention" placeholder="name_extention"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                <p v-if="errors.name_extention" class="text-sm text-red-600 mt-1">{{ errors.name_extention }}</p>
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
import { router, useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import { notification } from 'ant-design-vue';

const pages = usePage();
const errors = computed(() => pages.props.errors)
const page = usePage().props as unknown as PageProps;

interface PageProps {
    auth: {
        user: User;
    }
};
interface User {
    id: number;
    firstname: string;
    middlename: string;
    lastname: string;
    name_extention: string;
}

const form = useForm({
    firstname: page.auth.user.firstname,
    middlename: page.auth.user.middlename,
    lastname: page.auth.user.lastname,
    name_extention: page.auth.user.name_extention

});

const submit = () => {
    router.post(route('profile.updateProfile'), {
        firstname: form.firstname,
        middlename: form.middlename,
        lastname: form.lastname,
        name_extention: form.name_extention,
        id: page.auth.user.id
    }, {
        onSuccess: (page: any) => {
            if (page?.props?.flash?.success) {
                notification.success({
                    message: 'Success',
                    description: page.props.flash.success
                });
            } else if (page?.props?.flash?.error) {
                notification.warning({
                    message: 'Oops',
                    description: page.props.flash.error
                });
            }
        },
        onError: (page: any) => {
            if (page.props.flash?.error) {
                notification.error({
                    message: 'Error',
                    description: 'Failed to update Credentials'
                });
            }
        }
    });
}
</script>