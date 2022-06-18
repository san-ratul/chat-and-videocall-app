<template>
  <div :class="fieldInfo.class">
    <div class="input-group flex-wrap">
      <span class="input-group-text" :id="fieldInfo.addOnID">
        <font-awesome-icon :icon="fieldInfo.icon"/>
      </span>
      <input
          :type="fieldInfo.type"
          class="form-control"
          :placeholder="fieldInfo.placeholder"
          :aria-label="fieldInfo.placeholder"
          :value="modelValue"
          @input="$emit('update:modelValue', $event.target.value); fieldInfo.error=false"
          aria-describedby="addon-wrapping" />
    </div>
    <div class="invalid-feedback mt-1 position-static" :class="fieldInfo.error ? 'd-block' : ''">
      {{ fieldInfo.error ? fieldInfo.error[0] : '' }}
    </div>
  </div>
</template>

<script>
export default {
  name: "StringField",
  props: ['fieldInfo', 'modelValue'],
  emits: ['update:modelValue'],
}
</script>

<style scoped>

</style>