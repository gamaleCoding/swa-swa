<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="p-6">
            <!-- Welcome Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Dashboard Overview</h1>
                <p class="text-gray-600">Stock Withdrawal Advice Monitoring</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Active SWAs Card -->
                <div class="p-6 bg-white rounded-lg shadow-sm border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-50 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Active SWAs</p>
                            <p class="text-2xl font-semibold text-gray-800">24</p>
                        </div>
                    </div>
                </div>

                <!-- Pending Approvals Card -->
                <div class="p-6 bg-white rounded-lg shadow-sm border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-50 text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Pending Approvals</p>
                            <p class="text-2xl font-semibold text-gray-800">8</p>
                        </div>
                    </div>
                </div>

                <!-- Near Expiry Card -->
                <div class="p-6 bg-white rounded-lg shadow-sm border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-orange-50 text-orange-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Near Expiry Items</p>
                            <p class="text-2xl font-semibold text-gray-800">15</p>
                        </div>
                    </div>
                </div>

                <!-- Completed Card -->
                <div class="p-6 bg-white rounded-lg shadow-sm border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-50 text-purple-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Completed This Week</p>
                            <p class="text-2xl font-semibold text-gray-800">32</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 gap-6 mb-8 lg:grid-cols-2">
                <!-- Activity Chart -->
                <div class="p-6 bg-white rounded-lg shadow-sm border border-gray-100">
                    <h2 class="mb-4 text-lg font-semibold text-gray-800">SWA Activity</h2>
                    <div class="h-64 bg-gray-50 rounded-md flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400">
                            <line x1="18" y1="20" x2="18" y2="10"></line>
                            <line x1="12" y1="20" x2="12" y2="4"></line>
                            <line x1="6" y1="20" x2="6" y2="14"></line>
                        </svg>
                        <span class="ml-2 text-gray-500">Activity Chart</span>
                    </div>
                </div>

                <!-- Status Chart -->
                <div class="p-6 bg-white rounded-lg shadow-sm border border-gray-100">
                    <h2 class="mb-4 text-lg font-semibold text-gray-800">Status Distribution</h2>
                    <div class="h-64 bg-gray-50 rounded-md flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400">
                            <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                            <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                        </svg>
                        <span class="ml-2 text-gray-500">Status Chart</span>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Table -->
            <div class="p-6 bg-white rounded-lg shadow-sm border border-gray-100">
                <h2 class="mb-4 text-lg font-semibold text-gray-800">Recent SWA Activity</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SWA ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="i in 5" :key="i">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">SWA-2023-00{{i}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Product {{i}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span :class="{
                                        'bg-green-100 text-green-800': i % 3 === 0,
                                        'bg-yellow-100 text-yellow-800': i % 3 === 1,
                                        'bg-blue-100 text-blue-800': i % 3 === 2
                                    }" class="px-2 py-1 text-xs font-semibold rounded-full">
                                        {{ i % 3 === 0 ? 'Completed' : i % 3 === 1 ? 'Pending' : 'In Progress' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-06-{{10+i}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900">View</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>