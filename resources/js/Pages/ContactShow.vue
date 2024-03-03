<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {useForm, usePage} from "@inertiajs/vue3";
import {Button} from "@/Components/shadcn/ui/button/index.js";
import {Form, FormDescription, FormField, FormItem, FormLabel} from "@/Components/shadcn/ui/form/index.js";
import {Textarea} from "@/Components/shadcn/ui/textarea/index.js";
import {Card, CardContent, CardDescription, CardHeader, CardTitle} from "@/Components/shadcn/ui/card/index.js";
import InputError from "@/Components/InputError.vue";
import {Input} from "@/Components/shadcn/ui/input/index.js";
import {XCircleIcon} from '@heroicons/vue/16/solid'
import {BuildingStorefrontIcon, UserIcon} from '@heroicons/vue/24/solid'
import {cn} from "@/lib/utils.js";
import {RadioGroup, RadioGroupItem} from "@/Components/shadcn/ui/radio-group/index.js";

const page = usePage()


</script>

<template>
    <AppLayout title="Sendex">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="flex-1 space-y-4 p-8 pt-6">
                        <div class="grid gap-6 md:grid-cols-1 lg:grid-cols-1">
                            <Card>
                                <CardHeader>
                                    <CardTitle>Contact Info</CardTitle>
                                    <CardDescription>
                                        Add details of your contact
                                    </CardDescription>
                                </CardHeader>
                                <CardContent>
                                    {{page.props.contact}}
                                </CardContent>

                            </Card>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
