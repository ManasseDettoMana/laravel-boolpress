<template>
    <div class="card">
        <!-- <div class="card-header"> <router-link :to="'/posts/' + post.id" > {{ post.title }} </router-link>  </div> -->
        <div class="card-header">{{post.title}}</div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p> {{ post.post_content }} </p>
                
                <footer class="blockquote-footer">
                    Scritto da <cite title="Source Title">{{ post.user.name }}</cite>
                </footer>
            </blockquote>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PostCard',
    props: ['post']
}
</script>

<style>
</style>