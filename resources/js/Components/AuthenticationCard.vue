<script setup>
import {Card, CardContent, CardDescription, CardHeader, CardTitle} from "@/Components/shadcn/ui/card/index.js";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import { useDark } from '@vueuse/core'

useDark()
</script>

<template>
    <div class="w-screen h-screen flex items-center justify-center">
        <Card class="w-[500px]">
            <CardHeader class="space-y-1">
                <AuthenticationCardLogo  />
                <CardTitle class="text-xl">
                    <slot name="title"></slot>
                </CardTitle>
                <CardDescription>
                    <slot name="subtiltle"></slot>
                </CardDescription>
            </CardHeader>
            <CardContent class="grid">
                <slot></slot>
            </CardContent>
        </Card>
    </div>
</template>

