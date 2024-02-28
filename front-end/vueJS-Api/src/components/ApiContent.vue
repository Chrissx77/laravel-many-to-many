<template>
    <h1>TECNOLOGIE!</h1>

    <form v-if="createFlag" @submit.prevent="submitTech">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" v-model="nameTech" />
        <br />
        <input type="submit" value="Create" />
    </form>

    <div v-else>
        <button @click="toggleCreate">CREA NUOVA TECNOLOGIA</button>
        <ul>
            <li v-for="technology in technologies" :key="technology.id">
                <p>
                    {{ technology.name }}
                </p>
            </li>
        </ul>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "ApiContent",

    data() {
        return {
            technologies: [],
            createFlag: false,
            nameTech: "",
        };
    },

    methods: {
        toggleCreate() {
            this.createFlag = true;
        },

        submitTech() {
            axios
            .post("http://127.0.0.1:8000/api/v1/technologies")
            .then(res => {
                const data = res.data;
                if (data.status == "success") {
                    this.technologies = data.technology;
                }
            })
            .catch(err => {
                console.err(err);
            });
        },
    },

    mounted() {
        axios
            .get("http://127.0.0.1:8000/api/v1/technologies")
            .then(res => {
                const data = res.data;
                if (data.status == "success") {
                    this.technologies = data.technologies;
                }
            })
            .catch(err => {
                console.err(err);
            });
    },
};
</script>
