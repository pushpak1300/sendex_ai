<script setup>
import { computed } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import {Button, buttonVariants} from "@/Components/shadcn/ui/button/index.js";
import {cn} from "@/lib/utils.js";

const props = defineProps({
    status: String,
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <Head title="Email Verification" />

    <AuthenticationCard>
        <template #title>
            Verify Email
        </template>

        <template #subtiltle>
            <span>
                Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
            </span>

            <span v-if="verificationLinkSent">
                A new verification link has been sent to the email address you provided in your profile settings.
            </span>
        </template>



        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">
                <Button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Resend Verification Email
                </Button>

                <div>
                    <Link
                        :href="route('profile.show')"
                        :class="cn(buttonVariants({ variant: 'secondary', size: 'sm' }))"
                    >
                        Edit Profile</Link>

                    <Link
                        :href="route('logout')"
                        method="post"
                        :class="cn(buttonVariants({ variant: 'secondary', size: 'sm' }))"
                        as="button"
                    >
                        Log Out
                    </Link>
                </div>
            </div>
        </form>
    </AuthenticationCard>
</template>
