<template>
  <div class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2">
    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
         alt="avatar 3" style="width: 40px; height: 100%;">
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

<style scoped>

</style>