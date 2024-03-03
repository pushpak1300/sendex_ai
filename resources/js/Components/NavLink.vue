<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'inline-flex items-center text-sm font-medium transition-colors hover:text-primary'
        : 'inline-flex items-center text-sm font-medium text-muted-foreground transition-colors hover:text-primary';
});
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
