

<template>
    <v-col cols="12">
      <v-card>
        <v-card-title>Add Customer Support</v-card-title>
        <v-card-text>
          <v-form>
            <v-text-field v-model="form.name" :prepend-inner-icon="icons.mdiAccountOutline" label="First Name" outlined
              dense placeholder=" Name"></v-text-field>
  
            <v-text-field v-model="form.email" :prepend-inner-icon="icons.mdiEmailOutline" label="Email" type="email"
              outlined dense placeholder="Email"></v-text-field>
  
            <v-text-field class="d-none" v-model="form.role_id" :prepend-inner-icon="icons.mdiCellphone" label="Role" outlined dense
              type="number" placeholder="Role" value="1"></v-text-field>
  
            <v-text-field v-model="form.password" :prepend-inner-icon="icons.mdiLockOutline" label="Password" outlined
              dense type="password" placeholder="password"></v-text-field>
  
  
  
            <!-- <v-btn color="primary" type="submit"> -->
            <v-btn color="primary" @click="addSupport">
              Add
            </v-btn>
          </v-form>
        </v-card-text>
      </v-card>
    </v-col>
  </template>
  
  
  <!-- <script>
  // eslint-disable-next-line object-curly-newline
  import { mdiAccountOutline, mdiEmailOutline, mdiCellphone, mdiLockOutline } from '@mdi/js'
  import { ref } from '@vue/composition-api'
  
  export default {
    setup() {
      const firstname = ref('')
      const email = ref('')
      const mobile = ref()
      const password = ref()
      const checkbox = ref(false)
  
      return {
        firstname,
        email,
        mobile,
        password,
        checkbox,
  
        // icons
        icons: {
          mdiAccountOutline,
          mdiEmailOutline,
          mdiCellphone,
          mdiLockOutline,
        },
      }
    },
  }
  </script> -->
  
  <script>
  
  import { mdiAccountOutline, mdiEmailOutline, mdiCellphone, mdiLockOutline } from '@mdi/js'
  import axios from 'axios'
  
  export default {
  
    data() {
      return {
  
        form: {
          'name': '',
          'email': '',
          'password': '',
          'role_id': '2',
        }
  
      }
    },
  
  
  
  
    methods: {
  
  
      addSupport() {
        let self = this;
  
  
        axios
          .post('/api/support',this.form)
  
          .then(function (response) {
            if (response.status == 200) {
              // console.log("haree")
              self.$router.push({ name: 'support-view' });
  
            } else {
              error => console.log(error.response)
              alert("check your error");
            }
          })
  
      }
    },
  
    setup() {
      return {
        icons: {
          mdiAccountOutline,
          mdiEmailOutline,
          mdiCellphone,
          mdiLockOutline,
        },
      }
    },
  
  
  
  }
  
  </script> 
  