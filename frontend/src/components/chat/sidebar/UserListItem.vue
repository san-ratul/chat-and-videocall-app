<template>
  <li class="p-2 border-bottom" :class="isSelected ? 'active' : ''">
    <a href="#!" @click="$emit('updateSelectedUser', user)" class="d-flex justify-content-between">
      <div class="d-flex flex-row">
        <div>
          <img
              :src="user.image"
              :alt="user.name"
              class="d-flex align-self-center img-thumbnail me-3"
              width="60"
          >
          <span class="badge bg-success badge-dot"></span>
        </div>
        <div class="pt-1 mx-1">
          <p class="fw-bold mb-0">{{ user.name }}</p>
          <p class="small text-muted">{{ user.last_message }}</p>
        </div>
      </div>
      <div class="pt-1" v-if="!empty(user.time)">
        <p class="small text-muted mb-1">{{ user.time }}</p>
<!--        <span class="badge bg-danger rounded-pill float-end">3</span>-->
      </div>
    </a>
  </li>
</template>

<script>
import is_empty from "../../../is_empty";

export default {
  name: "UserListItem",
  props: {
    user: {
      type: Object,
      required: true
    },
    isSelected: {
      type: Boolean,
      default: false
    }
  },
  methods: {
    empty(value) {
      return is_empty(value)
    },
  }
}
</script>

<style scoped>
.active {
  border-left: 5px solid #CDC4F9;
  background: #cdc4f945;
}
</style>