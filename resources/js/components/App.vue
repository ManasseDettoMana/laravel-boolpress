<template>
    <div class="container">
        <h1>Boolpress</h1>
        <nav>
            <ul></ul>
        </nav>
    </div>
</template>

<script>
    export default {
       name: 'App', 
       data(){
            return{
                variable: ''
          }
       },
       components: {}
    }
</script>

<style scoped lang="scss">
    .container{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
</style>