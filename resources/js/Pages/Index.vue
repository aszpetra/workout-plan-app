<template>
    <div>
        <h1>Generate your own workout plan</h1>
    </div>
    
    <div class="form-group">
    <form @submit.prevent="onFormSubmit">
        <label>Age</label>
        <input type="number" v-model="form.age" />
        <label>Gender</label>
        <input type="text" v-model="form.gender" />
        <label>Weight (kg)</label>
        <input type="number" v-model="form.weight" />
        <label>Where do you want to workout?</label>
        <input type="text" placeholder="for example at home, in the gym" v-model="form.place" />
        <label>How frequently do you want to workout?</label>
        <input type="text" placeholder="for example three times a week" v-model="form.frequency" />
        <label>What do you want to focus on?</label>
        <input type="text" placeholder="for example abs, upper body" v-model="form.focus" />
        <label>What is your goal with working out?</label>
        <input type="text" placeholder="for example gaining musle, losing weight" v-model="form.goal" />
        <label>Any additional information</label>
        <input type="text" placeholder="for example prefer pilates, hate squats" v-model="form.extra" />
        <button type="submit">Make me a plan!</button>
    </form>
    </div>
        <p class="plan"> Your workout plan goes here: </p>
    <div>
       <!-- TODO -->
    </div>
</template>

<script setup>
    import { useForm } from '@inertiajs/vue3'

    let form = useForm({
        age: '',
        gender: '',
        weight: '',
        place: '',
        frequency: '',
        focus: '',
        goal: '',
        extra: '',
    });

    const onFormSubmit = () => {
        form.post('/ai');
    };
</script>