<template>
    <main class="container-fluid px-0 d-flex flex-column align-items-center">
       <router-view></router-view>
    </main>
</template>
  
<script>
    export default {
        name: 'MyMain',

    }
</script>

<style lang="scss" scoped>
    main{
        height: 80vh;
        padding-top: 70px;
        width: 100%;
    }
</style>