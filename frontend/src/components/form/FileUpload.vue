<template>
  <input type="file" class="d-none" ref="fileInput" @change="setProfilePic"/>
</template>

<script>
export default {
  name: "FileUpload",
  props: ['modelValue', 'checkType'],
  emits: ['update:modelValue', 'previewImage'],
  data : () =>{
      return {
        preview: ''
      }
  },
  methods: {
    setProfilePic() {
      let fileInput = this.$refs.fileInput;
      let file = fileInput.files;
      let $result = false;
      if(file && file[0]){
        this.getPreviewURL(file[0]);
        $result = {
          file : true,
          fileType : this.getFileType(file[0]),
          checkInputType: this.checkInputType(file[0]),
          size: this.getFileSize(file[0]),
          value: file[0]
        }
      } else {
        $result = false;
      }
      this.$emit('update:modelValue', $result);
    },
    clickInput() {
      this.$refs.fileInput.click();
    },
    getFileType(file) {
      let type = file.type;
      let result = '';
      if(type.split('/')[0] === 'image')
        result = "Image";
      else if(type === 'application/pdf')
        result = "pdf"
      else
        result = type
      return result;
    },
    checkInputType(file){
      let currentFileType = this.getFileType(file);
      return this.$props.checkType.toLowerCase() === currentFileType.toLowerCase();
    },
    getFileSize(file){
      let size = file.size;
      if(size > 0 && size < 1024*1024){
        return {
          key: 'KB',
          value: (size/1024).toFixed(2)
        }
      } else {
        return {
          key: 'MB',
          value: (size/(1024*1024)).toFixed(2)
        }
      }
    },
    getPreviewURL(file) {
      if (this.getFileType(file) === 'Image') {
        let reader    = new FileReader;
        reader.onload = (e) => {
          this.$emit('previewImage', e.target.result)
        }
        reader.readAsDataURL(file)
      } else {
        return '';
      }
    }
  },
}
</script>

<style scoped>

</style>