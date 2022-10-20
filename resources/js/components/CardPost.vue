<template>
    <div class="card m-2 flex-row align-items-center">
        <div class="cover p-2">
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
            <p class="card-text">
                <span class="font-weight-bold text-danger h5">Tags: </span>
                <ul>
                    <li v-for="(tag, index) in post.tags" :key="index">{{tag.name}}</li>
                </ul>
            </p>
            <router-link class="btn btn-primary" :to="{name: 'details-post', params:{slug: post.slug}}">Details</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: 'CardPost',
    props: {
        post: Object
    },
    methods:{
        truncContent(text, textLength) {
            if (text.length < textLength) {
                return text;
            }
            else {
                return text.substring(0, textLength) + "...";
            }
        }
    }
}
</script>

<style scoped lang="scss">
    .card{
        width: 400px;
        margin-inline: auto!important;
        .cover{
            width: 200px;
            img{
                width: 100%;
            }
        }
        .card-body{
            width: 200px;
        }
    }
</style>