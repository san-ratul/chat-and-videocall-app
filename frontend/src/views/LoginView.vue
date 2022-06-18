<template>
<div class="d-flex justify-content-center">
  <div class="card mb-3" style="max-width: 600px;">
    <div class="row g-0">
      <div class="col-md-4 bg-secondary d-flex justify-content-center align-items-center py-5 px-2">
        <div class="text-white text-center">
          <font-awesome-icon style="font-size: xxx-large" icon="fa-solid fa-users-cog"/>
          <div class="mt-2">
            <h4>
              User Login
            </h4>
            <p>Please login using your credentials</p>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <form action="" class="form">
            <template v-for="(field, key) of fields">
              <string-field :field-info="field.fieldInfo" v-model="loginInfo[field.modelKey]" />
            </template>
            <div class="text-center pt-1 mb-5 pb-1">
              <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">Log
                in</button>
              <a class="text-muted" href="!#">Forgot password?</a>
            </div>
            <div class="d-flex align-items-center justify-content-center pb-4">
              <p class="mb-0 me-2">Don't have an account?</p>
              <router-link :to="{name: 'register'}" class="btn btn-outline-secondary">Create new</router-link>
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
export default {
  name: "LoginView",
  components: {
    StringField
  },
  data : () => {
    return {
      fields : [
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
        }
      ],
      loginInfo : {
        email: '',
        password: ''
      }
    }
  }
}
</script>

<style scoped>

</style>