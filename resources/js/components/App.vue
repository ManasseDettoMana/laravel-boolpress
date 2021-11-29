<template>
    <div class="container">
        <h1>Boolpress</h1>
            
        <PostList />
    </div>
</template>

<script>
import PostList from './Posts/PostList.vue'
    export default {
       name: 'App', 
       data(){
            return{
                variable: ''
          }
       },
       components: {
           PostList
       }
    }
</script>

<style scoped lang="scss">
    
</style>