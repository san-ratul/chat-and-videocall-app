<template>
  <div
      :class="(messageListLoading) ? 'd-flex justify-content-center align-items-center' : ''"
      class="pt-3 pe-3 overflow-y-scroll"
      style="position: relative;
      height: 400px"
      id="chat-box"
      ref="chatBox"
    >
    <div v-if="messageListLoading" class="spinner-border text-secondary" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
    <template v-else v-for="message in chat.messages">
      <message-item :message="message" />
    </template>
  </div>
</template>

<script>
import MessageItem from "./MessageItem.vue";
export default {
  name: "MessageReadingBox",
  components: {MessageItem}
}
</script>
<script setup>
  import UseChatStore                                 from "../../../stores/chat";
  import {computed, onMounted, onUpdated, ref, watch} from "vue";
  const chat = UseChatStore();
  const messageListLoading = computed(() => chat.messages.length === 0);
  const chatBox = ref(null);
  const intervalCount = ref(0);
  const scrollCheck = () => {
    //set interval to check scrollHeight of chatBox
    const interval = setInterval(() => {
      intervalCount.value++;
      if (chatBox.value.scrollHeight > chatBox.value.clientHeight) {
        scrollToBottom();
        intervalCount.value = 0;
        clearInterval(interval);
      }
      if(intervalCount.value === 10) {
        clearInterval(interval);
        intervalCount.value = 0;
      }
    }, 1000);
  };
  const scrollToBottom = () => {
    if (chatBox.value.scrollHeight > chatBox.value.clientHeight) {
      chatBox.value.scrollTop = chatBox.value.scrollHeight;
    }
  };
  onMounted(() => {
    scrollCheck();
  });
  onUpdated(() => {
    if (chat.messages.length > 0) {
      scrollToBottom();
    }
  });

</script>

<style scoped>

</style>