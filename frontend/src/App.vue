<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Navigation                 from "./components/navbar/Navigation.vue";
</script>

<template>
  <div class="body-bg-color">
    <navigation />
    <section>
      <div class="container py-4">
        <RouterView />
      </div>
    </section>
  </div>
</template>

<style>
  @import 'mdb-ui-kit/css/mdb.min.css';

  .body-bg-color {
    background-color: #CDC4F9;
    min-height: 100vh;
  }
  .profile-image {
    position: relative;
    width: 150px;
    height: 150px;
    border: 5px solid #CDC4F9;
    border-radius: 50%;
    margin: 15px 0px;
  }
  .profile-plus-icon {
    font-weight: bold;
    padding: 2px;
    border-radius: 50%;
    bottom: 10%;
    right: 35%;
    cursor: pointer;
  }
</style>