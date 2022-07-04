<template>
  <section style="background-color: #CDC4F9;">
    <div class="container py-5">

      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-danger mt-1 text-center position-relative" v-if="!is_empty(chat.sendMessageError)">
            <button
                type="button"
                class="btn-close position-absolute"
                style="top:10px; right: 10px" aria-label="Close"
                @click="chat.sendMessageError = ''"
            >
            </button>
            <p v-for="error in chat.sendMessageError">
              <strong>Error!</strong> <span>{{error}}</span>
            </p>
          </div>
          <div class="card" id="chat3" style="border-radius: 15px;">
            <div class="card-body">
              <div class="row">
                <chat-sidebar />
                <chat-box />
              </div>

            </div>
          </div>

        </div>
      </div>

    </div>
  </section>
</template>

<script>
import ChatSidebar from "../components/chat/sidebar/ChatSidebar.vue";
import ChatBox     from "../components/chat/ChatBox.vue";
export default {
  name: "HomeView",
  components: {ChatSidebar, ChatBox},
}
</script>
<script setup>
  import UseChatStore from "../stores/chat";
  import is_empty     from "../is_empty";

  const chat = UseChatStore();
</script>

<style>
#chat3 .form-control {
  border-color: transparent;
}

#chat3 .form-control:focus {
  border-color: transparent;
  box-shadow: inset 0px 0px 0px 1px transparent;
}

.badge-dot {
  border-radius: 50%;
  height: 10px;
  width: 10px;
  margin-left: 2.9rem;
  margin-top: -.75rem;
}
</style>
