<template>
    <div class="min-h-screen bg-gray-50">
        <!-- Desktop Navigation -->
        <nav class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-100">
            <div class="mx-auto max-w-7xl px-6">
                <div class="flex h-16 items-center justify-between">
                    <!-- Left side - Logo -->
                    <div class="flex items-center">
                        <a :href="route('dashboard')" class="flex items-center space-x-2">
                            <img class="w-10 h-10" src="/storage/images/stock-market.png" alt="Nesa Logo">
                            <span class="text-xl font-bold text-indigo-600">SWA</span>
                        </a>
                    </div>

                    <!-- Centered Navigation -->
                    <div class="flex flex-1 justify-center">
                        <div class="flex space-x-1">
                            <!-- Home Link -->
                            <Link :href="route('dashboard')"
                                class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 rounded-md transition-colors">
                            <HomeOutlined class="mr-2" />
                            Dashboard
                            </Link>

                            <!-- File Maintenance Dropdown -->
                            <div class="relative">
                                <button @click="toggleDropdown('file')"
                                    class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 rounded-md transition-colors">
                                    <FileOutlined class="mr-2" />
                                    File Maintenance
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="ml-1 h-4 w-4 transition-transform duration-200"
                                        :class="{ 'rotate-180': activeDropdown === 'file' }" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <div v-show="activeDropdown === 'file'"
                                    class="absolute left-0 mt-2 w-56 origin-top-left rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                                    <div class="py-1">
                                        <DropdownLink href="#">
                                            Near Expiry Stock Advice
                                        </DropdownLink>
                                        <DropdownLink href="#">
                                            Consolidated List
                                        </DropdownLink>
                                        <DropdownLink href="#">
                                            NESA History
                                        </DropdownLink>
                                    </div>
                                </div>
                            </div>

                            <!-- Stock Withdrawal Advice Dropdown -->
                            <div class="relative">
                                <button @click="toggleDropdown('swa')"
                                    class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 rounded-md transition-colors">
                                    <StockOutlined class="mr-2" />
                                    Stock Withdrawal Advice
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="ml-1 h-4 w-4 transition-transform duration-200"
                                        :class="{ 'rotate-180': activeDropdown === 'swa' }" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <div v-show="activeDropdown === 'swa'"
                                    class="absolute left-0 mt-2 w-56 origin-top-left rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                                    <div class="py-1">
                                        <DropdownLink href="#">
                                            SWA Form
                                        </DropdownLink>
                                        <DropdownLink href="#">
                                            SWA - View Only
                                        </DropdownLink>
                                        <DropdownLink href="#">
                                            SWA Confirmation - MIS
                                        </DropdownLink>
                                        <DropdownLink href="#">
                                            Promo Execution Report
                                        </DropdownLink>
                                        <DropdownLink href="#">
                                            Promo Execution Report - View Only
                                        </DropdownLink>
                                        <DropdownLink href="#">
                                            SWA Confirmation - Accounting
                                        </DropdownLink>
                                    </div>
                                </div>
                            </div>

                            <!-- System Utilities Dropdown -->
                            <div class="relative">
                                <button @click="toggleDropdown('utils')"
                                    class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 rounded-md transition-colors">
                                    <ToolOutlined class="mr-2" />
                                    System Utilities
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="ml-1 h-4 w-4 transition-transform duration-200"
                                        :class="{ 'rotate-180': activeDropdown === 'utils' }" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <div v-show="activeDropdown === 'utils'"
                                    class="absolute left-0 mt-2 w-56 origin-top-left rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                                    <div class="py-1">
                                        <DropdownLink href="#">
                                            User Management
                                        </DropdownLink>
                                        <DropdownLink href="#">
                                            System Settings
                                        </DropdownLink>
                                        <DropdownLink href="#">
                                            Audit Logs
                                        </DropdownLink>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right side - User dropdown -->
                    <div class="flex items-center">
                        <div class="relative">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <button class="flex items-center text-sm focus:outline-none">
                                        <div
                                            class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-medium">
                                            {{ $page.props.auth.user.firstname.charAt(0).toUpperCase() }}
                                        </div>
                                        <!-- <span class="ml-2 text-gray-700">{{ $page.props.auth.user.name }}</span> -->
                                        <svg class="ml-1 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </template>

                                <template #content>
                                    <DropdownLink :href="route('profile.edit')">
                                        Profile
                                    </DropdownLink>
                                    <DropdownLink :href="route('logout')" method="post" as="button">
                                        Log Out
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="max-w-7xl mx-auto px-6 py-6">
            <slot />
        </main>
    </div>
</template>
<script setup lang="ts">
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'
import Dropdown from '@/Components/Dropdown.vue'
import DropdownLink from '@/Components/DropdownLink.vue'

const activeDropdown = ref(null)

const toggleDropdown = (menu) => {
    activeDropdown.value = activeDropdown.value === menu ? null : menu
}
</script>