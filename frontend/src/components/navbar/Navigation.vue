<template>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
          class="navbar-toggler"
          type="button"
          data-mdb-toggle="collapse"
          data-mdb-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
          <img
              src="../../assets/logo.png"
              height="40"
              alt="Chat Box"
              loading="lazy"
          />
        </a>
        <!-- Left links -->
<!--        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Projects</a>
          </li>
        </ul>-->
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->

      <!-- Right elements -->
      <div v-if="auth.isAuthenticated" class="d-flex align-items-center">
        <nav-section-user-avatar />
      </div>
      <div v-else >
        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <router-link class="nav-link" :to="{name : 'register'}">Registration</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{name : 'login'}">Login</router-link>
          </li>
        </ul>
      </div>
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</template>
<script>
import NavSectionUserAvatar from "./NavSectionUserAvatar.vue";

export default {
  name: "Navigation",
  components: {NavSectionUserAvatar}
}
</script>
<script setup>
import UseAuthStore from "../../stores/auth";

const auth = UseAuthStore()
</script>

<style scoped>

</style>