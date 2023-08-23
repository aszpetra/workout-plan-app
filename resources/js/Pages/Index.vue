<template>
    <h1>Hello</h1>

    <form @submit.prevent="onFormSubmit">
        <input type="text" v-model="form.prompt" />
        <button type="submit">Send request</button>
    </form>
</template>

<script setup>
    import { useForm } from '@inertiajs/vue3'
    let form = useForm({
        prompt: ''
    })

    const onFormSubmit = () => {
        form.post('/ai');
    };
</script>