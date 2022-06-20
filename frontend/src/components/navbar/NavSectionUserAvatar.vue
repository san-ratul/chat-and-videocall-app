<template>
  <!-- Avatar -->
  <div class="dropdown">
    <a
        class="dropdown-toggle d-flex align-items-center hidden-arrow"
        href="#"
        id="navbarDropdownMenuAvatar"
        role="button"
        data-mdb-toggle="dropdown"
        aria-expanded="false"
    >
      <img
          :src="auth.getImage"
          class="rounded-circle"
          height="25"
          alt="Black and White Portrait of a Man"
          loading="lazy"
      />
    </a>
    <ul
        class="dropdown-menu dropdown-menu-end"
        aria-labelledby="navbarDropdownMenuAvatar"
    >
      <li>
        <a class="dropdown-item" href="#">My profile</a>
      </li>
      <li>
        <a class="dropdown-item" href="#">Settings</a>
      </li>
      <li>
        <a class="dropdown-item" href="#" @click.prevent="logout">Logout</a>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "NavSectionUserAvatar"
}
</script>

<script setup>
import UseAuthStore from "../../stores/auth";
import axios        from "../../axios";
import router       from "../../router";

const auth = UseAuthStore()
const logout = async () => {
  await axios.post('/logout')
      .then( data => {
        auth.logoutAuthenticatedUser()
        router.push({name: 'login'})
      })
      .catch(err => console.log(err))
}
</script>

<style scoped>

</style>