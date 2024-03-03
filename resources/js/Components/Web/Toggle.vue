<script setup>
import {useDark, useToggle} from '@vueuse/core'
import {MoonIcon, SunIcon} from '@heroicons/vue/16/solid'
import {Button} from "@/Components/shadcn/ui/button/index.js";

const isDark = useDark({
    selector: 'html',
    attribute: 'class',
    valueDark: 'dark',
    valueLight: 'light',
})
const toggleDark = useToggle(isDark)
</script>

<template>
    <Button variant="ghost" size="sm" class="h-8 w-8 px-0" @click="toggleDark()">
        <SunIcon class="h-6 w-6 rotate-0 scale-100 transition-all dark:-rotate-90 dark:scale-0"/>
        <MoonIcon class="h-6 w-6 absolute rotate-90 scale-0 transition-all dark:rotate-0 dark:scale-100"/>
        <span class="sr-only">Toggle theme</span>
    </Button>
</template>

<style scoped>

</style>
