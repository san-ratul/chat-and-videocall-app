<template>
  <div class="d-flex flex-row justify-content-start">
    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
         alt="avatar 1" style="width: 45px; height: 100%;">
    <div>
      <p class="small p-2 ms-3 mb-1 rounded-3 bg-send">Sed ut
        perspiciatis
        unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam
        rem
        aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
        dicta
        sunt explicabo.</p>
      <p class="small ms-3 mb-3 rounded-3 text-muted float-end">12:00 PM | Aug 13</p>
    </div>
<!--    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
         alt="avatar 1" style="width: 45px; height: 100%;">-->
  </div>

<!--  <div class="d-flex flex-row justify-content-end">
    <div>
      <p class="small p-2 me-3 mb-1 rounded-3 bg-primary text-white">Nemo enim ipsam
        voluptatem quia
        voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos
        qui
        ratione voluptatem sequi nesciunt.</p>
      <p class="small me-3 mb-3 rounded-3 text-muted">12:00 PM | Aug 13</p>
    </div>

  </div>-->
</template>

<script>
export default {
  name: "MessageItem"
}
</script>

<style scoped>
.bg-send {
  background-color: #f5f6f7;
}
</style>