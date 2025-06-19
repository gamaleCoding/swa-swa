<template>
    <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-sm border border-red-50">
        <header class="mb-6">
            <h2 class="text-lg font-medium text-gray-900">
                Delete Account
            </h2>

            <p class="mt-2 text-sm text-gray-600">
                Once your account is deleted, all of its resources and data will
                be permanently deleted. Before deleting your account, please
                download any data or information that you wish to retain.
            </p>
        </header>

        <button 
            @click="confirmationModal = true"
            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition flex items-center gap-2"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            Delete Account
        </button>

        <Modal 
            v-model:open="confirmationModal" 
            :footer="false"
            :closable="false"
            centered
            class="[&>.ant-modal-content]:p-0"
        >
            <div class="p-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-full bg-red-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">
                            Delete your account?
                        </h3>
                        <div class="mt-2 text-sm text-gray-600">
                            <p>
                                This action cannot be undone. All your data will be permanently removed.
                                Please enter your credentials to confirm deletion.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                        <input 
                            v-model="form.username" 
                            type="text" 
                            placeholder="Enter your username"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500 focus:border-red-500 transition"
                        >
                        <p v-if="errors.username" class="mt-1 text-sm text-red-600">{{ errors.username }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input 
                            v-model="form.password" 
                            type="password" 
                            placeholder="Enter your password"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500 focus:border-red-500 transition"
                        >
                        <p v-if="errors.password" class="mt-1 text-sm text-red-600">{{ errors.password }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 rounded-b-lg">
                <button 
                    @click="confirmationModal = false"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition"
                >
                    Cancel
                </button>
                <button 
                    @click="submit"
                    :disabled="form.processing"
                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 disabled:opacity-75 transition"
                >
                    <span v-if="form.processing">Deleting...</span>
                    <span v-else>Confirm Deletion</span>
                </button>
            </div>
        </Modal>
    </div>
</template>

<script setup lang="ts">
import { useForm, usePage } from '@inertiajs/vue3';
import { Modal } from 'ant-design-vue';
import { computed, ref } from 'vue';

const pages = usePage();
const errors = computed(() => pages.props.errors);
const confirmationModal = ref<boolean>(false);

const form = useForm({
    username: '',
    password: ''
});

const submit = () => {
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => {
            confirmationModal.value = false;
        },
        onError: () => {
            // Errors will be automatically displayed in the form
        }
    });
};
</script>