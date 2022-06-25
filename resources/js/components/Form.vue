<template lang="">
    <div class="px-6 py-12 h-full">
        <div @submit.prevent="handleSubmit" class=" items-center justify-center">
            <form class="flex items-center">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <input name="link" v-model="link" type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Paste your link here.." required>
                </div>
                <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Generate!</button>
            </form>
            <br>
            <a v-if="_msg != null" :href="_msg">{{ _msg }}</a>
            <br>
            <p v-if="_err != null" class="text-red">{{ _err }}</p>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            link: null,
            _msg: null,
            _err: null,
        };
    },
    methods: {
        handleSubmit() {
            this._msg = null
            //console.log(this.link)
            axios.post('/api/create-short-link', {
                link: this.link
            }).then(response => {
                console.log(response.status)
                if (response.status == 201){
                    window.location.href = response.data.link;
                }else {
                    this._msg = "This link is already exists";
                }
            }).catch(error => {
                console.log(error);
            })
        }
    },
};
</script>

