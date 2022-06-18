<template>
  <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">
    <div class="p-3">

      <search-bar />

      <div data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px" class="overflow-y-scroll">
        <ul class="list-unstyled mb-0">
          <template v-for="index in 10">
            <user-list-item />
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

<style scoped>

</style>