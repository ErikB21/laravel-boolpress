<template>
    <section class="container-fluid px-0 d-flex flex-column align-items-center">
        <div v-if="load" class="spinner-border text-info" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="d-flex flex-column align-items-center" v-else>
            <h1 class="text-center pb-2">Page of Posts</h1>
            <CardPost v-for="(post, index) in posts" :key="index" :post="post"/>
        </div>
        <nav class="pt-3">
            <ul class="pagination">
                <li class="page-item" :class="(currentPage==1?'disabled':'')" ><a class="page-link" href="#" @click.prevent="getPost(currentPage - 1)">Previous</a></li>
                <li class="page-item disabled"><span class="page-link" href="#">{{currentPage}}/{{lastPage}}</span></li>
                <li class="page-item" :class="(currentPage==lastPage)?'disabled':''"><a class="page-link" href="#" @click.prevent="getPost(currentPage + 1)">Next</a></li>
            </ul>
        </nav>
    </section>
</template>
  
<script>
import CardPost from '../components/CardPost.vue';
    export default {
    name: "BlogPages",
    data() {
        return {
            posts: [],
            load: true,
            currentPage: 1,
            lastPage: null
        };
    },
    mounted() {
        this.getPost(1);
    },
    methods: {
        getPost(page) {
            this.load = true;
            axios.get("/api/posts", {
                params: {
                    page: page
                }
            })
                .then((response) => {
                this.posts = response.data.results.data;
                this.load = false;
                this.currentPage = response.data.results.current_page;
                this.lastPage = response.data.results.last_page;
            }).catch((err) => {
                this.$router.push({name: 'error'});
            });
        },
    },
    components: { CardPost }
}
</script>

<style lang="scss" scoped>
    section{
        height: 80vh;
        padding-top: 70px;
        width: 100%;
    }
</style>