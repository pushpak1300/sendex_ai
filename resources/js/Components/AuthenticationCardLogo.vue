<script setup>
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

</script>

<template>
    <Link href="/" class="hidden items-center space-x-2 md:flex">
        <ApplicationLogo/>
        <span class="hidden text-3xl font-bold sm:inline-block">
                SENDEX
        </span>
    </Link>
</template>
