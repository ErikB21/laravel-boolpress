<template>
    <article>
        <div v-if="load" class="spinner-border text-info" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div v-else class="d-flex flex-column justify-content-center">
            <h1 class="text-center font-weight-bold ">{{post.title}}</h1>
            <div>
                <div class="logo">
                    <img :src="post.cover" :alt="post.title"></img>
                </div>
                <span class="font-weight-bold text-danger h5">Category:</span> 
                <ul>
                    <li>{{post.category?post.category.name:'-'}}</li>
                </ul>
                <span class="font-weight-bold text-danger h5" >Tags: </span>
                <ul>
                    <li v-for="(tag, index) in post.tags" :key="index">{{tag.name}}</li>
                </ul>
                <p>{{post.description}}</p>
                <router-link class="btn btn-primary" :to="{name: 'blog'}">Back</router-link>
            </div>
        </div>
        
    </article>
    <!-- spinner, i tag con foreach -->
    
</template>

<script>

export default {
    name: 'DetailsPostPages',
    data(){
        return{
            post: null,
            load: true
        }
    },
    mounted(){
        this.getDetailsPost();
    },
    methods: {
        getDetailsPost(){
            const slug = this.$route.params.slug;

            axios.get('/api/posts/' + slug)
            .then((response) =>{
                console.log(response);
                this.post = response.data.result;
                this.load = false;
            })
            .catch((err) =>{
                this.$router.push({name: 'error'});
            });
        }
    }
}
</script>

<style scoped lang="scss">

.logo{
    width: 300px;
    img{
        width: 100%;
    }
}

</style>