<script setup>

import {Form, FormDescription, FormField, FormItem} from "@/Components/shadcn/ui/form/index.js";
import {Textarea} from "@/Components/shadcn/ui/textarea/index.js";
import {Card, CardContent, CardHeader, CardTitle} from "@/Components/shadcn/ui/card/index.js";
import InputError from "@/Components/InputError.vue";
import {Button} from "@/Components/shadcn/ui/button/index.js";
import {useForm, usePage} from "@inertiajs/vue3";

const page = usePage()

const infoForm = useForm({
    info: page.props?.info,
})


const resetForm = () => {
    infoForm.info = null;
    infoForm.clearErrors();
}
</script>

<template>
    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-2">
        <Card>
            <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                <CardTitle class="text-sm font-medium">
                    Revenue (Monthly)
                </CardTitle>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    strokeWidth="2"
                    class="h-4 w-4 text-muted-foreground"
                >
                    <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                </svg>
            </CardHeader>
            <CardContent>
                <div class="text-2xl font-bold">
                    $0
                </div>

            </CardContent>
        </Card>
        <Card>
            <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                <CardTitle class="text-sm font-medium">
                    Contacts
                </CardTitle>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    strokeWidth="2"
                    class="h-4 w-4 text-muted-foreground"
                >
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </CardHeader>
            <CardContent>
                <div class="text-2xl font-bold">
                    +22
                </div>
                <p class="text-xs text-muted-foreground">
                    +180.1% from last month
                </p>
            </CardContent>
        </Card>
    </div>
    <div class="grid gap-4 md:grid-cols-1 lg:grid-cols-1">
        <Card>
            <CardHeader>
                <CardTitle>Company Info</CardTitle>
            </CardHeader>
            <CardContent>
                <form class=""
                      @submit.prevent="infoForm.put('/info',{preserveScroll: true})">
                    <FormField name="info">
                        <FormItem class="space-y-3">
                                <Textarea
                                    v-model="infoForm.info"
                                    class="h-[450px]"
                                    placeholder="Tell us a little bit about yourself"/>
                            <FormDescription>
                                Please feel free to make any edits to this information as
                                you see fit. We welcome any changes that will improve the
                                clarity and effectiveness of the message. Our goal is to
                                provide accurate and up-to-date information, and we
                                appreciate your help in achieving that goal. Thank you for
                                considering Sendex. We look forward to helping you take your
                                sales to the next level!
                            </FormDescription>
                            <InputError class="mt-2" :message="infoForm.errors?.info"/>
                        </FormItem>
                    </FormField>

                    <div class="flex gap-2 justify-end">
                        <Button type="submit" v-if="infoForm.isDirty" :disabled="infoForm.processing">
                            Update
                        </Button>

                        <Button
                            type="button"
                            variant="outline"
                            @click="resetForm()"
                        >
                            Reset
                        </Button>
                    </div>
                </form>

            </CardContent>
        </Card>
    </div>
</template>

<style scoped>

</style>
