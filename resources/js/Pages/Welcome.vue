<script setup>
import {Head, Link} from '@inertiajs/vue3';
import {cn} from "@/lib/utils"
import WebLayout from "@/Layouts/WebLayout.vue";
import {buttonVariants} from "@/Components/shadcn/ui/button/index.js";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <WebLayout>
        <Head title="Welcome"/>

        <section class="space-y-6 pb-8 pt-6 md:pb-12 md:pt-10 lg:py-32">
            <div class="container flex max-w-[64rem] flex-col items-center gap-4 text-center">
                <h1 class="font-heading text-3xl sm:text-5xl md:text-6xl lg:text-7xl">
                    Elevate Your Sales Outreach with Sendex
                </h1>
                <p class="max-w-[42rem] leading-normal text-muted-foreground sm:text-xl sm:leading-8">
                    Transform the way your sales team communicates with customizable cold call scripts, and Boost Your
                    Sales Team's Confidence with Sendex's Personalized Script
                </p>
                <div class="space-x-4">
                    <Link :class="cn(buttonVariants({ variant: 'default', size: 'lg' }), 'px-4')"
                          :href="route('register')">
                        Get Started
                    </Link>
                    <Link
                        :class="cn(buttonVariants({ variant: 'secondary', size: 'lg' }))"
                        target="_blank"
                        rel="noreferrer"
                    >
                        GitHub
                    </Link>
                </div>
            </div>
        </section>
        <section
            id="features"
            class="container space-y-4 bg-slate-50 py-4 dark:bg-transparent md:py-6 lg:py-12"
        >
            <div class="mx-auto flex max-w-[58rem] flex-col items-center space-y-4 text-center">
                <h2 class="font-heading text-3xl leading-[1.1] sm:text-3xl md:text-6xl">
                    Features
                </h2>
                <p class="max-w-[85%] leading-normal text-muted-foreground sm:text-lg sm:leading-7">
                    Custom scripts, integrations, data-driven decisions, team support, and API access empower sales
                    teams with tailored messaging, real-time analytics, and seamless system compatibility. Benefit from
                    dedicated support, collaborative tools, and scalable solutions for improved sales outreach.
                </p>
            </div>
            <div class="mx-auto grid justify-center gap-4 sm:grid-cols-2 md:max-w-[64rem] md:grid-cols-3">
                <div class="relative overflow-hidden rounded-lg border bg-background p-2">
                    <div class="flex h-[180px] flex-col justify-between rounded-md p-6">
                        <div class="space-y-2">
                            <h3 class="font-bold">Tailored Messaging</h3>
                            <p class="text-sm text-muted-foreground">
                                Customize cold call scripts for different campaigns and audiences to ensure that your
                                messages are relevant and engaging.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-lg border bg-background p-2">
                    <div class="flex h-[180px] flex-col justify-between rounded-md p-6">
                        <div class="space-y-2">
                            <h3 class="font-bold">Confidence Boost</h3>
                            <p class="text-sm">
                                Equip your sales team with personalized scripts, enabling them to approach calls with
                                confidence.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-lg border bg-background p-2">
                    <div class="flex h-[180px] flex-col justify-between rounded-md p-6">
                        <div class="space-y-2">
                            <h3 class="font-bold"> CRM System Integration</h3>
                            <p class="text-sm text-muted-foreground">
                                Utilize Sendex with various tools and platforms for a cohesive outreach strategy.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-lg border bg-background p-2">
                    <div class="flex h-[180px] flex-col justify-between rounded-md p-6">
                        <div class="space-y-2">
                            <h3 class="font-bold"> Data-Driven Optimization</h3>
                            <p class="text-sm text-muted-foreground">
                                UI components built using Radix UI and styled with Tailwind
                                CSS.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-lg border bg-background p-2">
                    <div class="flex h-[180px] flex-col justify-between rounded-md p-6">
                        <div class="space-y-2">
                            <h3 class="font-bold">Collaborative Script Development</h3>
                            <p class="text-sm text-muted-foreground">
                                Work together with your team to create, edit, and share customized cold call scripts.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-lg border bg-background p-2">
                    <div class="flex h-[180px] flex-col justify-between rounded-md p-6">

                        <div class="space-y-2">
                            <h3 class="font-bold">Seamless API Integration</h3>
                            <p class="text-sm text-muted-foreground">
                                Easily integrate Sendex with your existing systems using our flexible and
                                well-documented API.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="open-source" class="container py-8 md:py-12 lg:py-24">
            <div class="mx-auto flex max-w-[58rem] flex-col items-center justify-center gap-4 text-center">
                <h2 class="font-heading text-3xl leading-[1.1] sm:text-3xl md:text-6xl">
                    Proudly Open Source
                </h2>
                <p class="max-w-[85%] leading-normal text-muted-foreground sm:text-lg sm:leading-7">
                    Sendex is open source and powered by open source software. <br/>
                    The code is available on
                    <Link
                        target="_blank"
                        rel="noreferrer"
                        class="underline underline-offset-4"
                    >
                        GitHub
                    </Link>
                </p>
            </div>
        </section>
    </WebLayout>
</template>
