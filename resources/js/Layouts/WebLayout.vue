<script setup>
import {Head, Link, usePage} from '@inertiajs/vue3';
import SiteFooter from "@/Components/Web/SiteFooter.vue";
import {cn} from "@/lib/utils.js";
import {buttonVariants} from "@/Components/shadcn/ui/button/index.js";
import Nav from "@/Components/Web/Nav.vue";
import {computed} from "vue";

const page = usePage()
const user = computed(() => page.props.auth.user)
defineProps({
    title: String,
});

</script>

<template>
    <div>
        <Head :title="title" />

        <div class="flex min-h-screen flex-col">
            <header class="container z-40 bg-background">
                <div class="flex h-20 items-center justify-between py-6">
                    <Nav />
                    <nav>
                        <Link
                            v-if="!user"
                            href="/login"
                            :class="cn(buttonVariants({ variant: 'secondary', size: 'sm' }))"
                        >
                        Login
                        </Link>
                        <Link
                            v-else
                            href="/dashboard"
                            :class="cn(buttonVariants({ variant: 'secondary', size: 'sm' }))"
                        >
                            Dashboard
                        </Link>
                    </nav>
                </div>
            </header>
            <main class="flex-1"><slot /></main>
            <SiteFooter />
        </div>
    </div>
</template>
