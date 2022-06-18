<template>
  <div class="d-flex justify-content-center">
    <div class="card mb-3" style="max-width: 600px;">
      <div class="row g-0">
        <div class="col-md-4 bg-secondary d-flex justify-content-center align-items-center py-5 px-2">
          <div class="text-white text-center">
            <font-awesome-icon style="font-size: xxx-large" icon="fa-solid fa-user-plus"/>
            <div class="mt-2">
              <h4>
                User Registration
              </h4>
              <p>Please fill out the form and <b>submit to register!</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <form action="" class="form">
              <div class="d-flex justify-content-center position-relative">
                <div class="profile-image overflow-hidden">
                  <img class="img-fluid"
                       :src="(preview !== '') ? preview : registerInfo.profilePicture"
                       alt="profile image"
                  />
                </div>
                <file-upload ref="profilePicture" v-model="uploadFile" check-type="image" @previewImage="updatePreview"/>
                <font-awesome-icon icon="fa-solid fa-plus" class="text-white position-absolute bg-secondary profile-plus-icon" @click="$refs.profilePicture.clickInput()"/>
              </div>
              <template v-for="(field, key) of fields">
                <string-field :field-info="field.fieldInfo" v-model="registerInfo[field.modelKey]" />
              </template>
              <div class="text-center pt-1 mb-2 pb-1">
                <button class="btn btn-secondary btn-block fa-lg gradient-custom-2 mb-3" type="button">Register</button>
              </div>
              <div class="d-flex align-items-center justify-content-center pb-4">
                <p class="mb-0 me-2">Already have an account?</p>
                <router-link :to="{name: 'login'}" class="btn btn-outline-secondary">Login</router-link>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import StringField from "../components/form/StringField.vue";
import FileUpload  from "../components/form/FileUpload.vue";
export default {
  name: "RegisterView",
  components : {
    StringField,
    FileUpload
  },
  data: () => {
    return {
      fields : [
        {
          fieldInfo : {
            class : 'mb-3',
            addOnID : 'name-add-on',
            icon : 'fa-solid fa-user',
            type : 'text',
            placeholder : 'Please enter your name',
          },
          modelKey : 'name',
        },
        {
          fieldInfo : {
            class : 'mb-3',
            addOnID : 'email-add-on',
            icon : 'fa-solid fa-envelope-open',
            type : 'email',
            placeholder : 'Please enter e-mail address',
          },
          modelKey : 'email',
        },
        {
          fieldInfo : {
            class : 'mb-3',
            addOnID : 'password-add-on',
            icon : 'fa-solid fa-key',
            type : 'password',
            placeholder : 'Please enter password'
          },
          modelKey : 'password',
        },
        {
          fieldInfo : {
            class : 'mb-3',
            addOnID : 'confirm-password-add-on',
            icon : 'fa-solid fa-key',
            type : 'password',
            placeholder : 'Please confirm your password'
          },
          modelKey : 'password-confirmation',
        }
      ],
      registerInfo : {
        'name': '',
        'email': '',
        'password': '',
        'password-confirmation': '',
        'profilePicture': '/src/assets/profile-pic-placeholder.png'
      },
      uploadFile: {},
      preview: ''
    }
  },
  methods: {
    updatePreview(src) {
      this.preview = src;
    }
  }
}
</script>

<style scoped>

</style>