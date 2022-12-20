<template>
    <h1>Helooo</h1>
</template>

<script>
import { response } from 'express';

export default {
    mounted(){
        let token = localStorage.getItem('token');
        console.log(token);
        axios.post("/api/auth/board"+token)
        .then(response => {
            console.log(response);

        })
    
    }
}

</script>