<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import { faker } from '@faker-js/faker';
import {Input} from "@/Components/shadcn/ui/input/index.js";
import {Button} from "@/Components/shadcn/ui/button/index.js";


const form = useForm({
    name: faker.person.fullName(),
    organization: faker.company.name(),
    email: faker.internet.email(),
    password: 'password',
    password_confirmation: 'password',
    terms: true,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <AuthenticationCard>
        <template #title>
            Sign Up
        </template>

        <template #subtiltle>
            Register your account
        </template>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />
                <Input
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="name"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="organization" value="Organization Name" />
                <Input
                    id="organization"
                    v-model="form.organization"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="organization"
                />
                <InputError class="mt-2" :message="form.errors.organization" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />
                <Input
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <Input
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />
                <Input
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm ">
                    Already registered?
                </Link>

                <Button class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </Button>
            </div>
        </form>
    </AuthenticationCard>
</template>
