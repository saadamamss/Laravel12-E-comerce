<script setup>
import AuthenticatedLayout from '@/layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>

    <Head title="Profile" />
    <AuthenticatedLayout>
        <div class="mx-auto max-w-7xl space-y-6">
            <div class="bg-white p-4 shadow-md sm:rounded-lg sm:p-8">
                <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status" class="max-w-xl" />
            </div>

            <div class="bg-white p-4 shadow-md sm:rounded-lg sm:p-8">
                <UpdatePasswordForm class="max-w-xl" />
            </div>

            <div class="bg-white p-4 shadow-md sm:rounded-lg sm:p-8">
                <DeleteUserForm class="max-w-xl" />
            </div>
        </div>

    </AuthenticatedLayout>
</template>
