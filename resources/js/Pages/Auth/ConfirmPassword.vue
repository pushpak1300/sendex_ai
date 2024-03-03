<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import {Input} from "@/Components/shadcn/ui/input/index.js";
import {Button} from "@/Components/shadcn/ui/button/index.js";

const form = useForm({
    password: '',
});

const passwordInput = ref(null);

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => {
            form.reset();

            passwordInput.value.focus();
        },
    });
};
</script>

<template>
    <Head title="Secure Area" />

    <AuthenticationCard>
        <template #title>
            Confirm Password
        </template>

        <template #subtiltle>
            This is a secure area of the application. Please confirm your password before continuing.
        </template>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="password" value="Password" />
                <Input
                    id="password"
                    ref="passwordInput"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="current-password"
                    autofocus
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex justify-end mt-4">
                <Button class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Confirm
                </Button>
            </div>
        </form>
    </AuthenticationCard>
</template>
