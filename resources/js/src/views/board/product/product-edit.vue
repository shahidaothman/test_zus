<template>
  <v-card>
    <v-card-title>Product List</v-card-title>
    <v-card-text>
      <v-text-field id="email" v-model="form.id" outlined dense placeholder="Email"
              hide-details></v-text-field>
      <v-form>
        <v-row>
          <v-col cols="12" md="3">
            <label for="firstname"> Name</label>
          </v-col>

          <v-col cols="12" md="9">
            <v-text-field id="firstname" v-model="form.name" outlined dense placeholder="First Name"
              hide-details></v-text-field>
          </v-col>

          <v-col cols="12" md="3">
            <label for="email">Description</label>
          </v-col>

          <v-col cols="12" md="9">
            <v-text-field id="email" v-model="form.description" outlined dense placeholder="Email"
              hide-details></v-text-field>
          </v-col>

          <v-col cols="12" md="3">
            <label for="mobile">Price</label>
          </v-col>

          <v-col cols="12" md="9">
            <v-text-field id="mobile" v-model="form.price" type="number" outlined dense placeholder="Number"
              hide-details></v-text-field>
          </v-col>
          <v-col cols="12" md="3">
            <label for="email">Status</label>
          </v-col>

          <v-col cols="12" md="9">
            <v-text-field id="status" v-model="form.status" outlined dense placeholder="Status"
              hide-details></v-text-field>
          </v-col>
          <v-col offset-md="3" cols="12">
            <v-btn color="primary" @click="productUpdate">
              Submit
            </v-btn>

          </v-col>
        </v-row>
      </v-form>


    </v-card-text>
  </v-card>

</template>

<script>
import { onMounted } from '@vue/composition-api'
import useProducts from '../../../components/crud/product'
import axios from 'axios'



export default {

  // data(){
  //         return {
  //            id: this.$route.params.id //this is the id from the browser

  //         }
  //     },

  data() {  
    
    return {
      form: {
        name: '',
        price: '',
        description: '',
        status: '',
        id: '',

      },
      errors: {}
    }
  },




  created() {
    // GET request using axios with error handling
    let id = this.$route.params.id
    axios.get('/api/editProduct/'+id)


      .then(({ data }) => (this.form = data))
      .catch(error => {
        this.errorMessage = error.message;
        console.error("There was an error!", error);
      });


  },
  methods: {
    // productUpdate() {
    //   let id = this.$route.params.id
    //   console.log(id);
    //   axios.put('/api/updateProduct')
    //   .then(({ data }) => (this.form = data))
    //   .catch(error => {
    //     this.errorMessage = error.message;
    //     console.error("There was an error!", error);
    //   });

    // }


    productUpdate(){    
      let self = this;
     
         
         axios
             .put('/api/updateProduct',
                 this.form
             )

             .then(function (response) {
                 if (response.status == 200) {
                     // console.log("haree")
                     self.$router.push({ name: 'product-view' });

                 } else {
                     error=>console.log(error.response)
                     alert("check your error");
                 }
             })

  }
}


  // props: {
  //     id: {
  //         required: true,
  //         type: [String, Number]
  //     }

  // },

  // setup(){
  //     console.log(id)
  //     const {product, getProduct} = useProducts()
  //     onMounted(getProduct(id));
  //      console.log("here");
  //     return{

  //         product,
  //     }
  // }
}

</script>