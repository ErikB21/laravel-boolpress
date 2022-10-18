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
                      <a class="nav-link" :href="link.link">{{link.label}}</a>
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
                link: '#'
               },
               {
                label: 'Blog',
                link: '#'
               },
               {
                label: 'About Us',
                link: '#'
               },
               {
                label: 'Contact',
                link: '#'
               },
               {
                label: 'Administration Area',
                link: '#'
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