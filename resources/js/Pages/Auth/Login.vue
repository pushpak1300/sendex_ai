<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import {Input} from "@/Components/shadcn/ui/input/index.js";
import {Label} from "@/Components/shadcn/ui/label/index.js";
import {Button} from "@/Components/shadcn/ui/button/index.js";
import InputError from "@/Components/InputError.vue";
import {Checkbox} from "@/Components/shadcn/ui/checkbox/index.js";
defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />
    <AuthenticationCard>
        <template #title>
            Log in to your account
            </template>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ status }}
        </div>
        <form @submit.prevent="submit">
            <div class="grid gap-2">
                <Label for="email">Email</Label>
                <Input
                    id="email"
                    v-model="form.email"
                    placeholder="example@example.com"
                    type="email"
                    required
                    autofocus
                    autocomplete="email"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="grid gap-2 mt-4">
                <Label for="password">Password</Label>
                <Input
                    id="password"
                    v-model="form.password"
                    type="password"
                    required
                    autocomplete="current-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                    <Checkbox v-model:checked="form.remember" name="remember" />
                    <label for="remember" class="ms-2 text-sm text-gray-600 dark:text-gray-400">Remember me</label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline underline-offset-4 hover:text-primary mx-2">
                    Forgot your password?
                </Link>

                <Button class=" " :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </Button>
            </div>
        </form>
    </AuthenticationCard>
</template>
