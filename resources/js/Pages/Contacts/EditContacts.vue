<template>
    <AppLayout title="Contactos">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contactos
            </h2>
        </template>

        <h1>Aqui se editan los contactos</h1>

        <pre>
            {{ contact }}
        </pre>

    </AppLayout>
</template>

<script>

    import AppLayout from '@/Layouts/AppLayout.vue';

    export default {
        components: {
            AppLayout,
        },

        props: {
            contact: {
                type: Object,
                reuired: true,
            },
        }
    }
</script>

<style>

</style>
