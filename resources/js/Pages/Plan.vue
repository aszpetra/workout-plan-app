<template>
    <h3> Your workout plan goes here: </h3>

    <div class="plan">
        <div v-for="(line, index) in plan" :key="index">
            <p class="lines">{{ line }}</p>
        </div>
    </div>

    <div class="back">
        <button @click="goBack">Go Back</button>
    </div>
</template>

<script setup>
    import { useForm } from '@inertiajs/vue3'

    defineProps({ plan: String });

    const goBack = () => {
      history.back();
    }

</script>