<template>
  <li class="p-2 border-bottom" :class="isSelected ? 'active' : ''">
    <a href="#!" class="d-flex justify-content-between">
      <div class="d-flex flex-row">
        <div>
          <img
              src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
              alt="avatar" class="d-flex align-self-center me-3" width="60">
          <span class="badge bg-success badge-dot"></span>
        </div>
        <div class="pt-1">
          <p class="fw-bold mb-0">Marie Horwitz</p>
          <p class="small text-muted">Hello, Are you there?</p>
        </div>
      </div>
      <div class="pt-1">
        <p class="small text-muted mb-1">Just now</p>
        <span class="badge bg-danger rounded-pill float-end">3</span>
      </div>
    </a>
  </li>
</template>

<script>
export default {
  name: "UserListItem",
  data: () => {
    return {
      isSelected : false
    }
  }
}
</script>

<style scoped>
.active {
  border-left: 5px solid #CDC4F9;
  background: #cdc4f945;
}
</style>