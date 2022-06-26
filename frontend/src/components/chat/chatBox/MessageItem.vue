<template>
  <div class="d-flex flex-row"
       :class="message.sender ? 'justify-content-end' : 'justify-content-start'">
    <img class="me-3" v-if="!message.sender" :src="message.senderImage"
         :alt="message.senderImage" style="width: 45px; height: 100%;">
    <div>
      <p class="small p-2 me-3 mb-1 rounded-3"
         :class="message.sender ? 'bg-primary text-white' : 'bg-send'"
      >{{message.message}}</p>
      <p class="small mb-3 rounded-3 text-muted">{{ message.time }}</p>
    </div>
    <img class="ms-1" v-if="message.sender" :src="message.senderImage"
         :alt="message.senderName" style="width: 45px; height: 100%;">
  </div>
</template>

<script>
export default {
  name: "MessageItem",
  props: {
    message: {
      type: Object,
      required: true
    }
  },
}
</script>

<style scoped>
.bg-send {
  background-color: #f5f6f7;
}
</style>