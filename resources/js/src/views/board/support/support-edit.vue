

<template>
    <v-col cols="12">
        <v-card>
            <v-text-field iv-model="form.id" outlined dense placeholder=""
              hide-details></v-text-field>
            <v-card-title>Edit Customer Support</v-card-title>
            <v-card-text>
                <v-form>
                    <v-text-field v-model="form.name" :prepend-inner-icon="icons.mdiAccountOutline" label="First Name"
                        outlined dense placeholder=" Name"></v-text-field>

                    <v-text-field v-model="form.email" :prepend-inner-icon="icons.mdiEmailOutline" label="Email"
                        type="email" outlined dense placeholder="Email"></v-text-field>

                    <v-text-field  v-model="form.role_id" :prepend-inner-icon="icons.mdiCellphone"
                        label="Role" outlined dense type="number" placeholder="Role" value="1"></v-text-field>

                    <v-text-field v-model="form.password" :prepend-inner-icon="icons.mdiLockOutline" label="Password"
                        outlined dense type="password" placeholder="password"></v-text-field>



                    <!-- <v-btn color="primary" type="submit"> -->
                    <v-btn color="primary" @click="editSupport">
                        Submit
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
import useAdmin from '../../../components/crud/admin'
import { onMounted } from '@vue/composition-api'

import axios from 'axios'
export default {

    setup(){
        return {
            icons: {
                mdiAccountOutline,
                mdiEmailOutline,
                mdiCellphone,
                mdiLockOutline,
            },
            
        }
    },
    data() {  
    
    return {
      form: {
        name: '',
        email: '',
        role_id: '',
        password: '',
      

      },
      errors: {}
    }
  },

    created() {
    // GET request using axios with error handling
    let support = this.$route.params.id
    axios.get('/api/support/'+support)


      .then(({ data }) => (this.form = data))
      .catch(error => {
        this.errorMessage = error.message;
        console.error("There was an error!", error);
      });


  },
  methods: {
    editSupport() {
      let self = this;
      axios
        .put('/api/updateSupport',this.form)

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
  }





}

</script> 
  