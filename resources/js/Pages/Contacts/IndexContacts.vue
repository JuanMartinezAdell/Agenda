<template>
    <AppLayout title="Contactos">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contactos
            </h2>
        </template>

        <h1>Aqui van los contactos</h1>

        <pre>
            {{ contacts }}
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
            contacts: {
                type: Array,
                reuired: true,
            },
        }
    }
</script>

<style>

</style>
