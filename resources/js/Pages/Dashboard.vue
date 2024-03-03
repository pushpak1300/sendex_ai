<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import {usePage,Link} from "@inertiajs/vue3";
import { buttonVariants} from "@/Components/shadcn/ui/button/index.js";
import {Tabs, TabsContent, TabsList, TabsTrigger} from "@/Components/shadcn/ui/tabs/index.js";
import {PlusCircleIcon} from '@heroicons/vue/16/solid'

import Overview from "@/Components/Overview.vue";
import ComingSoon from "@/Components/ComingSoon.vue";
import {cn} from "@/lib/utils.js";

const page = usePage()


</script>

<template>
    <AppLayout title="Sendex">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <Welcome v-if="!page.props.info"/>
                    <div v-else class="flex-1 space-y-4 p-8 pt-6">
                        <div class="flex items-center justify-between space-y-2">
                            <h2 class="text-3xl font-bold tracking-tight">
                                Dashboard
                            </h2>
                            <div class="flex items-center space-x-2">
                                <Link :href="route('contact.create')" :class="cn(buttonVariants({variant: primary }))">
                                    <PlusCircleIcon class="h-4 mr-2 w-4"/>
                                    Create New Contact
                                </Link>
                            </div>
                        </div>
                        <Tabs default-value="overview" class="space-y-4">
                            <TabsList>
                                <TabsTrigger value="overview">
                                    Overview
                                </TabsTrigger>
                                <TabsTrigger value="analytics" >
                                    Analytics
                                </TabsTrigger>
                                <TabsTrigger value="notifications" >
                                    Notifications
                                </TabsTrigger>
                            </TabsList>
                            <TabsContent value="overview" class="space-y-4">
                                <Overview/>
                            </TabsContent>
                            <TabsContent value="analytics" class="space-y-4">
                                <ComingSoon/>
                            </TabsContent>
                            <TabsContent value="notifications" class="space-y-4">
                                <ComingSoon/>
                            </TabsContent>
                        </Tabs>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
