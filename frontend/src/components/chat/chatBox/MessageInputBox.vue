<template>
  <div class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2">
    <img :src="user.image" alt="user.name" style="width: 40px; height: 100%; border-radius: 50%">
    <input type="text" class="form-control form-control-lg" id="exampleFormControlInput2"
           placeholder="Type message">
    <a class="ms-1 text-muted" href="#!">
      <font-awesome-icon icon="fa-solid fa-paperclip"/>
    </a>
    <a class="ms-3 text-muted" href="#!">
      <font-awesome-icon icon="fa-solid fa-video"/>
    </a>
    <a class="ms-3" href="#!">
      <font-awesome-icon icon="fa-solid fa-paper-plane"/>
    </a>
  </div>
</template>

<script>
export default {
  name: "MessageInputBox"
}
</script>

<script setup>
  import UseAuthStore from "../../../stores/auth";
  import isEmpty      from "../../../is_empty";

  const auth = UseAuthStore();
  const user = !isEmpty(auth.user) ? auth.user : {};

</script>

<style scoped>

</style>