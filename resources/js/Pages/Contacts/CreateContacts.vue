<template>
    <AppLayout title="Contactos">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <span class="text-indigo-600">Crear / </span>Contactos
            </h2>
        </template>

        <div class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- component -->
            <body class="antialiased font-sans bg-gray-200 shadow-lg">
                <div class="container mx-auto px-4 sm:px-8">
                    <div class="py-8">
                        <div>
                            <h2 class="text-2xl font-semibold leading-tight">Nuevo Contacto</h2>
                        </div>

                    <div class="bg-white px-6 py-8 reounded-lg shadow">
                     {{ this.$page.props.errors }}
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="">
                                    Nombre
                                    <TextInput v-model="contact.first_name" type="text" class="w-full" />
                                </label>
                            </div>
                            <div>
                                <label for="">
                                    Apellidos
                                    <TextInput v-model="contact.last_name" type="text" class="w-full" />
                                </label>
                            </div>
                            <div>
                                <label for="">
                                    Empresa
                                    <!-- TextInput v-model="contact.organization_id" type="text" class="w-full" / -->
                                    <select v-model="contact.organization_id" class="w-full  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                        <option value="" selected disabled>
                                            Selecciona una Empresa
                                        </option>
                                        <option v-for="organization in organizations" :value="organization.id" :key="'organization-' + organization.id">
                                            {{ organization.name }}
                                        </option>
                                    </select>
                                </label>
                            </div>
                            <div>
                                <label for="">
                                    Cargo
                                <!-- TextInput v-model="contact.position_id" type="text" class="w-full" /-->
                                <select v-model="contact.position_id" class="w-full form-control">
                                    <option value="" selected disabled>
                                        Selecciona un Cargo
                                    </option>
                                    <option v-for="position in positions" :value="position.id" :key="'position-' + position.id">
                                        {{ position.name }}
                                    </option>
                                </select>
                            </label>
                        </div>
                        <div>
                            <label for="">
                                Servicio
                                <!-- TextInput v-model="contact.service_id" type="text" class="w-full" / -->
                                <select v-model="contact.service_id" class="w-full form-control">
                                    <option value="" selected disabled>
                                        Selecciona un Servicio
                                    </option>
                                    <option v-for="service in services" :value="service.id" :key="'service-' + service.id">
                                        {{ service.name }}
                                    </option>
                                </select>
                            </label>
                        </div>
                        <div>
                            <label for="">
                                Ubicacion
                                <!-- TextInput v-model="contact.location_id"  type="text" class="w-full" / -->
                                <select v-model="contact.location_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                                    <option value="" selected disabled>
                                        Selecciona una Ubicacion
                                    </option>
                                    <option v-for="location in locations" :value="location.id" :key="'location-' + location.id">
                                        {{ location.name }}
                                    </option>
                                </select>
                            </label>
                        </div>
                        <div>
                            <label for="">
                                Telefono
                                <TextInput v-model="contact.phone" type="text" class="w-full" />
                            </label>
                        </div>
                        <div>
                            <label for="">
                                Telefono Corto
                                <TextInput v-model="contact.short_phone" type="text" class="w-full" />
                            </label>
                        </div>
                        <div>
                            <label for="">
                                Código telefono
                                <TextInput v-model="contact.phone_code"  type="text" class="w-full" />
                            </label>
                        </div>
                        <div>
                            <label for="">
                                Email
                                <TextInput v-model="contact.email" type="text" class="w-full" />
                            </label>
                        </div>
                        <div>
                            <label for="">
                                 Notas
                                <TextInput v-model="contact.alias" type="text" class="w-full" />
                            </label>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <Button class="h-full  pl-8 pr-6 py-2" @click="store">Crear Nuevo Contacto</Button>
                    </div>
                </div>
            </div>
        </div>
        </body>
    </div>

    </AppLayout>
</template>

<script>

    import AppLayout from '@/Layouts/AppLayout.vue';
    import TextInput from '@/Components/TextInput.vue';
    import { Method } from '@inertiajs/inertia';
    //import InputError from '@/Componets/InputError.vue';
    import Button from '@/Components/ButtonVue.vue';


    export default {
        components: {
        AppLayout,
        TextInput,
        Button,
        },

        data() {
            return {
                contact: {
                    'first_name': '',
                    'last_name': '',
                    'organization_id': '',
                    'position_id': '',
                    'service_id': '',
                    'location_id': '',
                    'phone': '',
                    'short_phone': '',
                    'phone_code': '',
                    'email': '',
                    'alias': '',
                }
            }
        },

        props: {
            organizations: Array,
            positions: Array,
            services: Array,
            locations: Array,


        },

        methods: {
            store() {
                this.$inertia.post(this.route('contacts.store'), this.contact );
            }
        }


    }
</script>

<style>

</style>
