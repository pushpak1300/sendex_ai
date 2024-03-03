<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import {cn} from "@/lib/utils.js";
</script>

<template>
    <div class="flex gap-6 md:gap-10">
        <Link href="/" class="hidden items-center space-x-2 md:flex">
            <ApplicationLogo/>
            <span class="hidden font-bold sm:inline-block">
                SENDEX
        </span>
        </Link>
            <nav class="hidden gap-6 md:flex">
                <Link
                    :class='cn("flex items-center text-lg font-medium transition-colors hover:text-foreground/80 sm:text-sm text-foreground")'>
                    Home
                </Link>
            </nav>
    </div>
</template>
