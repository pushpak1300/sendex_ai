<script setup>
import {Card, CardContent} from "@/Components/shadcn/ui/card/index.js";
import {
    Form,
    FormDescription,
    FormField,
    FormItem,
} from "@/Components/shadcn/ui/form/index.js";
import {Textarea} from "@/Components/shadcn/ui/textarea/index.js";
import {Button} from "@/Components/shadcn/ui/button/index.js";
import {useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";

const infoForm = useForm({
    info: null,
})

const resetForm = () => {
    infoForm.reset();
    infoForm.clearErrors();
}

</script>

<template>
    <div>
        <div
            class="py-12">
            <h1 class="text-2xl font-medium text-gray-900 dark:text-white">
                Welcome to Sendex !
            </h1>

            <p class="mt-6 text-muted-foreground">
                Use Sendex customizable cold call scripts to ensure that your sales team is well-prepared and
                confident when making calls and sending emails. Customize these scripts for different campaigns and
                audiences to ensure
                that your messages are always relevant and engaging. By integrating Sendex with your CRM system and
                other tools, you can track the success of your
                campaigns and make data-driven decisions that drive results for your business.

            </p>
        </div>


        <Card>
            <CardContent class="py-8">
                <div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6 stroke-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z"/>
                        </svg>

                        <h2 class="ms-3 text-xl font-semibold">
                            <a href="https://laravel.com/docs">Your Organisation Info</a>
                        </h2>
                    </div>

                    <p class="mt-4 text-muted-foreground text-sm leading-relaxed">
                        To get started with Sendex, we require some information about your organization. This will
                        enable us to customize our campaigns and outreach initiatives, thereby enhancing your chances of
                        securing
                        deals.

                    </p>
                    <form class="space-y-8" @submit.prevent="infoForm.post('/info',{preserveScroll: true})">
                        <FormField name="info">
                            <FormItem class="space-y-3 mt-4">
                                <Textarea
                                    v-model="infoForm.info"
                                    class="h-[450px]"
                                    placeholder="Tell us a little bit about yourself"/>
                                <FormDescription>
                                    Don't forget to share your features, results, and success stories with us as well!
                                </FormDescription>
                                <InputError class="mt-2" :message="infoForm.errors?.info" />
                            </FormItem>
                        </FormField>

                        <div class="flex gap-2 justify-end">
                            <Button type="submit" :disabled="infoForm.processing">
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
                </div>
            </CardContent>
        </Card>
    </div>
</template>
