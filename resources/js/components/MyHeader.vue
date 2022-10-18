<template>
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#">Boolpress</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
  
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <li v-for="(link, index) in links" :key="index" class="nav-item active">
                      <router-link class="nav-link" :to="{name: link.routeLink}">{{link.label}}</router-link>
                  </li>
              </ul>
          </div>
      </nav>
    </header>
  </template>
  
  <script>
  export default {
      name: 'MyHeader',
      data(){
        return{
            links:[
               {
                label: 'Home',
                routeLink: 'home'
               },
               {
                label: 'Blog',
                routeLink: 'blog'
               },
               {
                label: 'About Us',
                routeLink: 'about'
               },
               {
                label: 'Contact',
                routeLink: 'contact'
               },
            ]
        }
      }
  }
  </script>
  
  <style scoped lang="scss">
    header{
        height: 10vh;
    }
  </style>