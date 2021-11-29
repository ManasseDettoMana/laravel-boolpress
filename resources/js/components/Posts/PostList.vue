<template>
    <section>
        <h2>I miei post: </h2>
         <PostCard v-for="post in posts" :key="post.id" :post="post" class="p-2 my-4" />
    </section>
</template>

<script>
import PostCard from './PostCard.vue';

export default {
    name: 'PostList',
    components:{
        PostCard
    },
    data(){
        return{
            posts: [],
            // baseURI: 'http://127.0.0.1:8000',

        }
    },
    methods: {
        getPostlist(){
            axios.get(`/api/posts`)
            .then((res) =>{
                this.posts = res.data.posts;
                console.log(res.data.posts);
            })
        }
    },
    created(){
        this.getPostlist();
    }

}
</script>

<style>

</style>