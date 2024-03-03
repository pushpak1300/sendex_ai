<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {useForm,Link, usePage} from "@inertiajs/vue3";
import {Button, buttonVariants} from "@/Components/shadcn/ui/button/index.js";
import {Form, FormDescription, FormField, FormItem, FormLabel} from "@/Components/shadcn/ui/form/index.js";
import {Textarea} from "@/Components/shadcn/ui/textarea/index.js";
import {Card, CardContent, CardDescription, CardHeader, CardTitle} from "@/Components/shadcn/ui/card/index.js";
import InputError from "@/Components/InputError.vue";
import {Input} from "@/Components/shadcn/ui/input/index.js";
import {XCircleIcon} from '@heroicons/vue/16/solid'
import {BuildingStorefrontIcon, UserIcon} from '@heroicons/vue/24/solid'
import {cn} from "@/lib/utils.js";
import {RadioGroup, RadioGroupItem} from "@/Components/shadcn/ui/radio-group/index.js";
import {
    TableBody,
    TableCaption,
    TableCell,
    TableHead,
    TableHeader,
    TableRow
} from "@/Components/shadcn/ui/table/index.js";

const page = usePage()
</script>

<template>
    <AppLayout title="Sendex">
        <div>
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="flex-1 space-y-4 p-8 pt-6">
                        <div class="grid gap-6 md:grid-cols-1 lg:grid-cols-1">
                            <Card class="w-full">
                                <CardHeader>
                                    <CardTitle>Contacts</CardTitle>
                                </CardHeader>
                                <CardContent>
                                    <Table>
                                        <TableHeader>
                                            <TableRow>
                                                <TableHead class="w-[200px]">
                                                    Name
                                                </TableHead>
                                                <TableHead>Email</TableHead>
                                                <TableHead>Phone</TableHead>
                                                <TableHead class="text-right">
                                                    About
                                                </TableHead>
                                                <TableHead class="text-right">
                                                    Action
                                                </TableHead>
                                            </TableRow>
                                        </TableHeader>
                                        <TableBody>
                                            <TableRow v-for="contact in page.props.contacts">
                                                <TableCell class="font-medium">
                                                    {{ contact.name }}
                                                </TableCell>
                                                <TableCell>{{ contact.email }}</TableCell>
                                                <TableCell>{{ contact.phone }}</TableCell>
                                                <TableCell class="text-right">
                                                    {{ contact.about }}
                                                </TableCell>
                                                <TableCell class="text-right">
                                                    <Link :href="route('contact.show', [contact.id])" :class="cn(buttonVariants({variant: 'outline'}))" variant="outline" size="sm">View</Link>
                                                </TableCell>
                                            </TableRow>
                                        </TableBody>
                                    </Table>
                                </CardContent>

                            </Card>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
