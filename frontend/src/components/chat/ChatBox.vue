<template>
  <div class="col-md-6 col-lg-7 col-xl-8">
    <message-reading-box />
    <message-input-box />
  </div>
</template>

<script>
import MessageReadingBox from "./chatBox/MessageReadingBox.vue";
import MessageInputBox   from "./chatBox/MessageInputBox.vue";
export default {
  name: "ChatBox",
  components: {MessageInputBox, MessageReadingBox}

}
</script>

<style scoped>

</style>