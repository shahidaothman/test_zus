<template>
  <v-card>
    <v-card-title>
      <v-text-field
        v-model="search"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
    <v-data-table
      :headers="headers"
      :items="products"
      :search="search"
    ></v-data-table>
  </v-card>
</template>

<script>
import axios from "axios";



export default ({
  data() {
    return {
      search: '',
      headers:[
      { text: 'ID', value: 'id' },
      { text: 'name', value: 'name' },
      { text: 'status', value: 'status' },
      { text: 'description', value: 'description' },
      { text: 'price', value: 'price' },
      ],
products:[
// {
//             name: 'Frozen Yogurt',
//             id: 159,
//             status: 6.0,
//             description: 24,
          
//           },
]
    }
  },

  created() {
    axios.get('/api/product').then(response=>{
      this.products=response.data.data;
      console.log(response.data.data)
    })

   
  },
})
</script>
