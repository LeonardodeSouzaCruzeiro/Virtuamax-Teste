<template>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
      <div class="container">
        <div class="navbar-header">
          <router-link class="navbar-brand" to="/">Laravel Sanctum</router-link>
        </div>
        <ul class="nav navbar-nav">
          <router-link
            v-if="!isLoggedIn"
            class="nav-item nav-link"
            :to="{ name: 'home' }"
          >
            Login
          </router-link>
          <router-link
            v-if="!isLoggedIn"
            class="nav-item nav-link"
            :to="{ name: 'register' }"
          >
            Register
          </router-link>
          <router-link
            v-if="isLoggedIn"
            class="nav-item nav-link"
            :to="{ name: 'Contatos' }"
          >
            Dashboard
          </router-link>
          <a
            class="nav-item nav-link"
            v-if="isLoggedIn"
            @click.prevent="logout"
            href="#"
            >Logout</a
          >
        </ul>
      </div>
    </nav>
  </template>
  
  <script>
  import User from "../apis/User";
  export default {
    data() {
      return {
        isLoggedIn: false
      };
    },
    
    methods: {
      logout() {
        User.logout().then(() => {
          localStorage.removeItem("token");
          this.isLoggedIn = false;
          this.$router.push({ name: "Home" });
        });
      }
    }
  };
  </script>
  
  <style>
  .router-link-exact-active {
    color: #ffffff !important;
    transition: all 0.25s;
  }
  </style>