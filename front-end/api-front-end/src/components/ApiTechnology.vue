<script>
import axios from 'axios';


export default {
    name: 'ApiTechnology',
    data() {
        return {

            technologies: [],
            formActive: false,
            createTechnology: {
                name: ''
            }


        }

    },
    methods: {

        newTechnology() {

            this.formActive = true

        },

        submitNewTechnology() {
            axios.post('http://localhost:8000/api/v1/index', this.createTechnology)
                .then(res => {

                    const data = res.data;

                    this.technologies.push(data.technology)
                    this.formActive = false




                })
                .catch(err => {

                    console.log(err);
                })



        }


    },
    mounted() {
        axios.get('http://localhost:8000/api/v1/index')
            .then(res => {

                const data = res.data;
                if (data.status == 'success') {

                    this.technologies = data.technologies;

                    console.log(this.technologies);

                }

            })
            .catch(err => {

                console.log(err);
            })
    }
}



</script>

<template>
    <h1>My technologies:</h1>
    <form v-if="formActive" @submit.prevent="submitNewTechnology">
        <label for="name" id="name">Name</label>
        <input type="text" v-model="createTechnology.name">
        <input type="submit" value="CREATE">
    </form>
    <ul v-else>
        <button @click="newTechnology">New thechnologys</button>
        <li v-for="thechnology in technologies" :key="thechnology.id">
            {{ thechnology.name }}
        </li>
    </ul>
</template>

<style scoped>
ul {
    list-style-type: none;
}
</style>
