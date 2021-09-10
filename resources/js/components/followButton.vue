<template>
   <button @click="followByUser();" v-text="buttonText" class="btn btn-primary">Follow</button>
</template>

<script>
    export default {
        props: ['userId', 'follows'],
        mounted() {
            console.log('Component mounted.')
        },
        data: function() {
            return {
                status: this.follows
            }
        },
        methods: {
            async followByUser() {
                try {
                    const response = await axios.post(`/follow/${ this.userId }`);
                    console.log("response", response);
                    this.status = !this.status;
                } catch(errors){
                    window.location.href = '/login';
                }
            }
        },
        computed: {
            buttonText() {
                return (this.status) ? 'UnFollow' : 'Follow';
            }
        }
    }
</script>
