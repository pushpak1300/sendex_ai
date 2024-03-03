<script setup>
import {Label} from "@/Components/shadcn/ui/label/index.js";

defineProps({
    value: String,
});
</script>

<template>
    <Label><span v-if="value">{{ value }}</span>
        <span v-else><slot /></span></Label>
</template>
