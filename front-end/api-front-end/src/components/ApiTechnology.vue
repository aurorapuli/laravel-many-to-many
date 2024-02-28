<script>
import axios from 'axios';


export default {
    name: 'ApiTechnology',
    data() {
        return {

            technologies: [],

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
    <ul>
        <li v-for="thechnology in technologies" :key="thechnology.id">
            {{ thechnology.name }}
        </li>
    </ul>
</template>

<style scoped></style>
