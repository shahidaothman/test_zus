<template>
    <v-card>
        <v-card-title>Product List</v-card-title>
        <v-card-text>
       
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
                            <v-text-field id="mobile" v-model="form.price" type="number" outlined dense
                                placeholder="Number" hide-details></v-text-field>
                        </v-col>


                        <v-col cols="12" md="3">
                            <label for="email">Status</label>
                        </v-col>

                        <v-col cols="12" md="9">
                            <v-text-field id="status" v-model="form.status" outlined dense placeholder="Status"
                                hide-details></v-text-field>
                        </v-col>


                        <v-col cols="12" md="3">
                            <label for="email">Tags</label>
                        </v-col>

                        <v-col cols="12" md="9">
                            <multiselect v-model="value" :options="options" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Pick some" label="name" track-by="name" :preselect-first="true">
    <template slot="selection" slot-scope="{ values, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} options selected</span></template>
  </multiselect>
                        </v-col>




                        <v-col offset-md="3" cols="12">
                            <v-btn color="primary" @click="AddProduct">
                                Submit
                            </v-btn>

                        </v-col>
                    </v-row>
                </v-form>
       
          
        </v-card-text>
    </v-card>

</template>
  
<script>

import axios from 'axios'
import Multiselect from 'vue-multiselect'

export default {

    components: {
    Multiselect
  },
    data() {

        return {
            // user: [],
            form: {
                name: '',
                description: '',
                price: '',
                status: '',
            },

           
            value: [],
      options: [
        { name: 'sold_out', product: 'Sold Out' },
        { name: 'new', product: 'New' },
        { name: 'fast_selling', product: 'Fast Selling' },
        { name: 'limited', product: 'Limited' },
      
      ]
        }
    },

    methods: {
        AddProduct() {

         
            let self = this;
         
            axios
                .post('/api/addProduct',
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
    },

}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
