<template>
  <div class="auth-wrapper auth-v1">
    <div class="auth-inner">
      <v-card class="auth-card">
        <!-- logo -->
        <v-card-title class="d-flex align-center justify-center py-7">
          <router-link to="/" class="d-flex align-center">
            <v-img :src="require('@/assets/images/logos/logo.svg').default" max-height="30px" max-width="30px"
              alt="logo" contain class="me-3"></v-img>

            <h2 class="text-2xl font-weight-semibold">Testing</h2>
          </router-link>
        </v-card-title>

        <!-- title -->
        <v-card-text>
          <p class="text-2xl font-weight-semibold text--primary mb-2">Welcome to Testing! 馃憢馃徎</p>
          <p class="mb-2">Please sign-in to your account and start the adventure</p>
        </v-card-text>

        <!-- login form -->
        <v-card-text>
          <v-form>
            <v-text-field v-model="formdata.email" outlined label="Email" placeholder="john@example.com" hide-details
              class="mb-3"></v-text-field>
            <div v-if="formdata.errors.has('email')" v-html="formdata.errors.get('email')"></div>

            <v-text-field v-model="formdata.password" outlined :type="isPasswordVisible ? 'text' : 'password'"
              label="Password" placeholder="路路路路路路路路路路路路"
              :append-icon="isPasswordVisible ? icons.mdiEyeOffOutline : icons.mdiEyeOutline" hide-details
              @click:append="isPasswordVisible = !isPasswordVisible"></v-text-field>
            <div v-if="formdata.errors.has('password')" v-html="formdata.errors.get('password')"></div>

            <div class="d-flex align-center justify-space-between flex-wrap">
              <v-checkbox label="Remember Me" hide-details class="me-3 mt-1"> </v-checkbox>

              <!-- forgot link -->
              <a href="javascript:void(0)" class="mt-1"> Forgot Password? </a>
            </div>

            <v-btn block color="primary" class="mt-6" @click="handleLogin"> Login </v-btn>
          </v-form>
        </v-card-text>

        <!-- create new account  -->
        <v-card-text class="d-flex align-center justify-center flex-wrap mt-2">
          <span class="me-2"> New on our platform? </span>
          <router-link :to="{ name: 'pages-register' }"> Create an account </router-link>
        </v-card-text>

        <!-- divider -->
        <v-card-text class="d-flex align-center mt-2">
          <v-divider></v-divider>
          <span class="mx-5">or</span>
          <v-divider></v-divider>
        </v-card-text>

        <!-- social links -->
        <v-card-actions class="d-flex justify-center">
          <v-btn v-for="link in socialLink" :key="link.icon" icon class="ms-1">
            <v-icon :color="$vuetify.theme.dark ? link.colorInDark : link.color">
              {{ link.icon }}
            </v-icon>
          </v-btn>
        </v-card-actions>
      </v-card>
    </div>

    <!-- background triangle shape  -->
    <img class="auth-mask-bg" height="173"
      :src="require(`@/assets/images/misc/mask-${$vuetify.theme.dark ? 'dark' : 'light'}.png`).default" />

    <!-- tree -->
    <v-img class="auth-tree" width="247" height="185" :src="require('@/assets/images/misc/tree.png').default"></v-img>

    <!-- tree  -->
    <v-img class="auth-tree-3" width="377" height="289"
      :src="require('@/assets/images/misc/tree-3.png').default"></v-img>
  </div>
</template>
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/vuetify/dist/vuetify.js"></script>
<script>
// eslint-disable-next-line object-curly-newline
import { mdiFacebook, mdiTwitter, mdiGithub, mdiGoogle, mdiEyeOutline, mdiEyeOffOutline } from '@mdi/js'
import { ref } from '@vue/composition-api'
import axios from 'axios'
import Form from 'vform'

export default {
//   onBeforeMount() {
//   if(User.loggedIn()){
//     self.$router.push({name: 'dashboard'})
//   }
// },
// create(){
//   function guardMyroute(to, from, next)
// {
//  var isAuthenticated= false;
//  if(localStorage.getItem('LoggedUser'))
//   isAuthenticated = true;
//  else
//   isAuthenticated= false;
// if(isAuthenticated) {
//   next(); // allow to enter route
//  } else{
//   next('/login'); // go to '/login';
//  }
// }
// },

  setup() {
const isPasswordVisible = ref(false)

const socialLink = [
  {
    icon: mdiFacebook,
    color: '#4267b2',
    colorInDark: '#4267b2',
  },
  {
    icon: mdiTwitter,
    color: '#1da1f2',
    colorInDark: '#1da1f2',
  },
  {
    icon: mdiGithub,
    color: '#272727',
    colorInDark: '#fff',
  },
  {
    icon: mdiGoogle,
    color: '#db4437',
    colorInDark: '#db4437',
  },
]



return {
  isPasswordVisible,

  socialLink,

  icons: {
    mdiEyeOutline,
    mdiEyeOffOutline,
  },
}
},



  data() {
        return {
            // user: [],
            formdata: new Form( {
                email: '',
                password: '',
   
            }),
            isAuthenticated: false,
            errors: {}
        }
    },
  
  methods: {
    
    
    handleLogin() {
      let self = this;
      axios
        .post('/api/auth/login', this.formdata)

    // .then(function(response){
    //   if (response.status == 200) {
    //     console.log(response)
    //     localStorage.setItem('token', response.data)
    //     self.$router.push({name: 'dashboard'});
    //   } else {
    //     console.log("opps")
    //   }
    // })

    // .then(res=>User.responseAfterLogin(res))
    // .catch(error=>console.log(error.response))


    .then((response) => {
                localStorage.setItem('token', response.data.token)
                localStorage.setItem('role', response.data.user.role_id)
                console.log(response.data);
                self.$router.push({name: 'dashboard'})
            })

    .catch(error=>console.log(error.response))

    }
  },

}
</script>

<!-- <script>
// eslint-disable-next-line object-curly-newline
import { mdiFacebook, mdiTwitter, mdiGithub, mdiGoogle, mdiEyeOutline, mdiEyeOffOutline } from '@mdi/js'
import { ref } from '@vue/composition-api'

export default {
  setup() {
    const isPasswordVisible = ref(false)
    const email = ref('')
    const password = ref('')
    const socialLink = [
      {
        icon: mdiFacebook,
        color: '#4267b2',
        colorInDark: '#4267b2',
      },
      {
        icon: mdiTwitter,
        color: '#1da1f2',
        colorInDark: '#1da1f2',
      },
      {
        icon: mdiGithub,
        color: '#272727',
        colorInDark: '#fff',
      },
      {
        icon: mdiGoogle,
        color: '#db4437',
        colorInDark: '#db4437',
      },
    ]

    return {
      isPasswordVisible,
      email,
      password,
      socialLink,

      icons: {
        mdiEyeOutline,
        mdiEyeOffOutline,
      },
    }
  },
}
</script> -->

<style lang="scss">
@import '~@resources/sass/preset/pages/auth.scss';
</style>
