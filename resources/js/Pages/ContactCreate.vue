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
import {faker} from "@faker-js/faker";

const page = usePage()

const contactForm = useForm({
    type: null,
    name: faker.person.fullName(),
    email: faker.internet.email(),
    phone: faker.phone.number(),
    about: faker.person.bio(),
    urls: [],
})

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
                                    <form class="space-y-8" @submit.prevent="contactForm.post('/contact')">
                                        <FormField v-model="contactForm.type" type="radio" name="theme">
                                            <FormItem class="space-y-1">
                                                <FormLabel>Contact Type</FormLabel>
                                                <FormDescription>
                                                    Select the contact type.
                                                </FormDescription>
                                                <InputError :message="contactForm.errors.type"/>

                                                <RadioGroup
                                                    required
                                                    v-model="contactForm.type"
                                                    class="grid grid-cols-2 gap-8 pt-2"
                                                >
                                                    <FormItem @click="contactForm.type = 'company'">
                                                        <FormLabel
                                                            class="[&:has([data-state=checked])>div]:border-primary">
                                                            <RadioGroupItem value="company" class="sr-only"/>
                                                            <div
                                                                class="items-center rounded-md border-2 border-muted p-1 hover:border-accent hover:bg-accent">
                                                                <div
                                                                    class="space-y-2 rounded-sm p-2 flex justify-center items-center">
                                                                    <BuildingStorefrontIcon class="h-24 w-24"/>
                                                                </div>
                                                            </div>
                                                            <span class="block w-full p-2 text-center font-normal">
                Company
              </span>
                                                        </FormLabel>
                                                    </FormItem>
                                                    <FormItem @click="contactForm.type = 'individual'">
                                                        <FormLabel
                                                            class="[&:has([data-state=checked])>div]:border-primary">
                                                            <RadioGroupItem value="individual" class="sr-only"/>
                                                            <div
                                                                class="items-center rounded-md border-2 border-muted bg-popover p-1 hover:bg-accent hover:text-accent-foreground">
                                                                <div
                                                                    class="space-y-2 rounded-sm p-2 flex justify-center items-center">
                                                                    <UserIcon class="h-24 w-24"/>
                                                                </div>
                                                            </div>
                                                            <span class="block w-full p-2 text-center font-normal">
                Individual
              </span>
                                                        </FormLabel>
                                                    </FormItem>
                                                </RadioGroup>
                                            </FormItem>
                                        </FormField>
                                        <FormField name="name">
                                            <FormItem>
                                                <FormLabel>Name</FormLabel>
                                                <Input type="text" required v-model="contactForm.name" placeholder="Apple INC"/>
                                                <FormDescription>
                                                    This is your contact name. It can be your individual name or a
                                                    company name.
                                                </FormDescription>
                                                <InputError :message="contactForm.errors.name"/>
                                            </FormItem>
                                        </FormField>

                                        <FormField name="email">
                                            <FormItem>
                                                <FormLabel>Email</FormLabel>
                                                <Input type="email" required v-model="contactForm.email"
                                                       placeholder="example@example.com"/>
                                                <FormDescription>
                                                    This is the email which you gonna use to contact with this company
                                                    or individual.
                                                </FormDescription>
                                                <InputError :message="contactForm.errors.email"/>
                                            </FormItem>
                                        </FormField>

                                        <FormField name="phone">
                                            <FormItem>
                                                <FormLabel>Phone</FormLabel>
                                                <Input type="tel" v-model="contactForm.phone"
                                                       placeholder="+9199999999"/>
                                                <FormDescription>
                                                    Please add telephone numbers with country code if applicable.
                                                </FormDescription>
                                                <InputError :message="contactForm.errors.phone"/>
                                            </FormItem>
                                        </FormField>

                                        <FormField name="about">
                                            <FormItem>
                                                <FormLabel>Bio</FormLabel>
                                                <Textarea v-model="contactForm.about"
                                                          placeholder="Tell us a little bit about this contact."
                                                />
                                                <FormDescription>
                                                    One line description about the contact.
                                                </FormDescription>
                                                <InputError :message="contactForm.errors.about"/>
                                            </FormItem>
                                        </FormField>

                                        <div>
                                                <FormField :name="`urls[${index}].value`">
                                                    <FormItem>
                                                        <FormLabel >
                                                            URLs
                                                        </FormLabel>
                                                        <FormDescription >
                                                            Add links to your contact website, blog, or social media
                                                            profiles.
                                                        </FormDescription>
                                                        <div v-for="(url, index) in contactForm.urls" :key="`urls-${url.key}`">

                                                        <div class="relative flex items-center">
                                                            <Input type="url" required v-model="contactForm.urls[index]"/>
                                                            <Button variant="outline" type="button"
                                                                    @click="contactForm.urls.splice(index,1)">
                                                                <XCircleIcon class="w-3"/>
                                                            </Button>
                                                        </div>
                                                            <InputError :message="contactForm.errors.urls"/>
                                                        </div>
                                                    </FormItem>
                                                </FormField>

                                            <Button
                                                type="button"
                                                variant="outline"
                                                size="sm"
                                                class="text-xs w-20 mt-2"
                                                @click.prevent="contactForm.urls.push('')"
                                            >
                                                Add URL
                                            </Button>
                                        </div>

                                        <div class="flex gap-2 justify-start">
                                            <Button type="submit">
                                                Add Contact
                                            </Button>

                                            <Button
                                                type="button"
                                                variant="outline"
                                                @click.prevent="contactForm.reset()"
                                            >
                                                Reset form
                                            </Button>
                                        </div>
                                    </form>
                                </CardContent>

                            </Card>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
