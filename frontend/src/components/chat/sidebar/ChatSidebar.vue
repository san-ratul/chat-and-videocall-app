<template>
  <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">
    <div class="p-3">
      <search-bar />
      <div
        style="position: relative; height: 400px"
        class="overflow-y-scroll"
        :class="(userListLoading) ? 'd-flex justify-content-center align-items-center' : ''">
        <div v-if="userListLoading" class="spinner-border text-secondary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>

        <ul v-else class="list-unstyled mb-0">
          <template v-for="user in chat.userList">
            <user-list-item
                :user="user"
                :is-selected="user.email === chat.selectedUser.email"
                @updateSelectedUser="updateSelectedUser"
            />
          </template>
        </ul>
      </div>

    </div>

  </div>
</template>

<script>
import SearchBar    from "./SearchBar.vue";
import UserListItem from "./UserListItem.vue";
export default {
  name: "ChatSidebar",
  components: {SearchBar, UserListItem},
}
</script>
<script setup>
import {computed, onMounted} from "vue";
import UseChatStore               from "../../../stores/chat";

const userListLoading = computed(() => chat.userList.length === 0);
const chat = UseChatStore();

onMounted(() => {
  setUserList();
})

const setUserList = () => {
  chat.setUserList();
}

const updateSelectedUser = (user) => {
  chat.setSelectedUser(user);
}

</script>

<style scoped>

</style>