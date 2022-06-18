<template>
  <div class="pt-3 pe-3 overflow-y-scroll" data-mdb-perfect-scrollbar="true"
       style="position: relative; height: 400px">
      <message-item />
  </div>
</template>

<script>
import MessageItem from "./MessageItem.vue";
export default {
  name: "MessageReadingBox",
  components: {MessageItem}
}
</script>

<style scoped>

</style>