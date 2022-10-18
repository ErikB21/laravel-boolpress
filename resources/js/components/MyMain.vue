<template>
    <main class="container-fluid px-0 d-flex flex-column align-items-center">
        <div v-if="load" class="spinner-border text-info" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div v-else v-for="(post, index) in posts" :key="index" class="card m-2 flex-row">
            <div class="cover">
                <img :src="post.cover" class="">
            </div>
            <div class="card-body">
                <h2 class="card-title font-weight-bold text-success">{{post.title}}</h2>
                <p class="card-text"><span class="font-weight-bold text-danger h5">Slug:</span> {{post.slug}}</p>
                <p class="card-text"><span class="font-weight-bold text-danger h5">Description:</span> {{truncContent(post.description, 75)}}</p>
                <p class="card-text">
                    <span class="font-weight-bold text-danger h5">Category:</span> 
                    <ul>
                        <li>{{post.category?post.category.name:'-'}}</li>
                    </ul>
                </p>
            </div>
        </div>
        <nav class="pt-3">
            <ul class="pagination">
                <li class="page-item" :class="(currentPage==1?'disabled':'')" ><a class="page-link" href="#" @click.prevent="getPost(currentPage - 1)">Previous</a></li>
                <li class="page-item disabled"><span class="page-link" href="#">{{currentPage}}/{{lastPage}}</span></li>
                <li class="page-item" :class="(currentPage==lastPage)?'disabled':''"><a class="page-link" href="#" @click.prevent="getPost(currentPage + 1)">Next</a></li>
            </ul>
        </nav>
    </main>
</template>
  
<script>
    export default {
        name: 'MyMain',

        data(){
            return{
                posts: [],
                load: true,
                currentPage : 1,
                lastPage: null
            }
        },

        mounted(){
            this.getPost(1);
        },

        methods:{
            getPost(page){
                this.load = true;

                axios.get('/api/posts', {
                    params:{
                        page:page
                    }
                })
                .then((response) =>{
                    this.posts = response.data.results.data;
                    this.load = false;
                    this.currentPage = response.data.results.current_page;
                    this.lastPage = response.data.results.last_page;

                }).catch((err) =>{
                    console.log(err);
                });
            },

            truncContent(text, textLength){
                if(text.length < textLength){
                    return text;
                }else{
                    return text.substring(0, textLength) + '...';
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    main{
        height: 80vh;
        padding-top: 70px;
        width: 100%;
        .card{
            width: 60%;
            margin-inline: auto!important;
            .cover{
                width: 30%;
                img{
                    width: 100%;
                }
            }
        }
        
    }
</style>