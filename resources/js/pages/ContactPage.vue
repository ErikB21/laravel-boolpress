<template>
    <div class="container">
        <h1>Contact us for Information</h1>

        <div v-if="success" class="alert alert-success">
            <i class="fa-solid  fa-circle-check"></i> Grazie di averci contattato!
        </div>
        <form @submit.prevent="sendMails">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" :class="errors.name?'is-invalid':''" class="form-control" id="name" v-model="name">
                <div v-for="(error, index) in errors.name" :key="index" class="invalid-feedback">
                    {{error}}
                </div>
            </div>

            <div class="form-group">
                <label for="mail">Email address</label>
                <input type="email" :class="errors.mail?'is-invalid':''" class="form-control" id="mail" aria-describedby="emailHelp" v-model="mail">
                <div v-for="(error, index) in errors.mail" :key="index" class="invalid-feedback">
                    {{error}}
                </div>
            </div>
            
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" :class="errors.message?'is-invalid':''" rows="4" id="message" v-model="message"></textarea>
                <div v-for="(error, index) in errors.message" :key="index" class="invalid-feedback">
                    {{error}}
                </div>
            </div>
            <button type="submit" :disabled="sending" class="btn btn-secondary">Send</button>
        </form>
    </div>
</template>

<script>
export default {
    name: 'ContactPage',
    data(){
        return{
            name: '',
            mail: '',
            message: '',
            errors: {},
            success: false,
            sending: false
        }
    },
    methods:{
        sendMails(){
            this.sending = true;
            axios.post('/api/contacts', 
                {
                    name: this.name,
                    mail: this.mail,
                    message: this.message

                }
            ).then((response) =>{
                this.success = response.data.success;
                this.sending = false;

                if(this.success){
                    this.errors = {};
                    this.name = '';
                    this.mail = '';
                    this.message = '';
                }else{
                    this.errors = response.data.errors;
                }
            })
        }
    }
}
</script>

<style scoped lang="scss">

</style>