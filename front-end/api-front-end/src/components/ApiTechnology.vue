<script>
import axios from 'axios';


export default {
    name: 'ApiTechnology',
    mounted() {
        axios.get('http://localhost:8000/v1/test')
            .then(res => {

                const data = res.data;
                console.log(data);
            })
    }
}



</script>

<template>
    <h1>Hello, World</h1>
</template>

<style scoped></style>
