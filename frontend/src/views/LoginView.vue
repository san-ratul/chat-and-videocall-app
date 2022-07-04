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
          <form action="" class="form" @submit.prevent="login">
            <template v-for="(field, key) of fields">
              <string-field :field-info="field.fieldInfo" v-model="loginInfo[field.modelKey]" />
            </template>
            <div class="text-center pt-1 mb-5 pb-1">
              <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" :disabled="btnDisabled" :class="btnDisabled ? 'disabled' : ''">
                Log in
              </button>
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
<div class="d-flex justify-content-center mt-3">
  <div class="demo-users-list">
    <ul class="list-group">
      <li class="list-group-item" style="cursor: pointer" v-for="user in auth.demoUsers" @click.prevent="loginAsUser(user)">
        {{user.name}} : {{user.email}}
      </li>
    </ul>
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
}
</script>

<script setup>
import {onMounted, reactive, ref} from "vue";
import axios                      from '../axios'
import UseAuthStore  from "../stores/auth";
import router          from "../router";

  // Necessary objects
  const fields = reactive([
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
  ]);
  const loginInfo = reactive({
    email: '',
    password: ''
  })
  const auth = UseAuthStore();
  const btnDisabled = ref(false);
  //methods
  const login = async () => {
    btnDisabled.value = true;
    await axios.post('login', loginInfo)
        .then(data => {
          btnDisabled.value = false;
          let status = data.status;
          let loginDetails = data.data;
          if(status === 202){
            auth.setAuthenticatedUser(loginDetails);
            router.push('/');
          } else {
            console.log(data);
          }
        })
        .catch( err => {
          if(err.response){
            let status = err.response.status;
            let errors = err.response.data.errors;
            let message = err.message;
            if(status === 422 || status === 400){
              fields.forEach( field => {
                field.fieldInfo.error = errors[field.modelKey];
              })
            } else {
              console.log(message);
            }
          }
          btnDisabled.value = false;
        })
  }
  const loginAsUser = (user) => {
    loginInfo.email = user.email;
    loginInfo.password = 'password';
    login();
    return null;
  }
  onMounted(() => {
    axios.get('/demo-users')
        .then(data => {
          auth.demoUsers = data.data;
        })
        .catch( err => {
          console.log(err);
        })
  })
</script>

<style scoped>

</style>