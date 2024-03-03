<script setup>
import Toggle from "@/Components/Web/Toggle.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>

<template>
    <footer class={cn(class)}>
        <div class="container flex flex-col items-center justify-between gap-4 py-10 md:h-24 md:flex-row md:py-0">
            <div class="flex flex-col items-center gap-4 px-8 md:flex-row md:gap-2 md:px-0">
                <ApplicationLogo />
                <p class="text-center text-sm leading-loose md:text-left">
                    Built by ❤️
                    <a
                        target="_blank"
                        rel="noreferrer"
                        class="font-medium underline underline-offset-4"
                    >
                        pushpak1300
                    </a>
                    . Illustrations by
                    <a
                        href="https://popsy.co"
                        target="_blank"
                        rel="noreferrer"
                        class="font-medium underline underline-offset-4"
                    >
                        Popsy
                    </a>
                    . The source code is available on
                    <a
                        target="_blank"
                        rel="noreferrer"
                        class="font-medium underline underline-offset-4"
                    >
                        GitHub
                    </a>
                    .
                </p>
            </div>
            <Toggle />
        </div>
    </footer>
</template>
