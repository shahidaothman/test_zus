<template>
    <div>
        <v-row  class="pa-8">
             <router-link :to="{ name: 'login' }" click>  <v-btn color="primary">Log In Here </v-btn></router-link> 
        </v-row>
      <v-row>
        <!-- Influencing The Influencer -->
        <v-col md="4" sm="6" cols="12" class="pa-5" v-for="item in products" :key="item.id">
          <v-card>
            <v-img :src="require('@/assets/images/pages/card-basic-person.png').default" height="250"></v-img>
            <v-card-title>  <h2>{{ item.name }} </h2> 
             
               
                </v-card-title>
              <v-card-text>
                <span>Price :</span> <span class="font-weight-bold">{{ item.price }}</span>
            </v-card-text>
                <v-card-text>
                    <h2>   {{ item.status }}</h2>
            </v-card-text>
        
            <v-card-text>
            
                {{ item.description }}
            </v-card-text>
            <v-card-subtitle>
                <span class="primary--text pt-5">here</span>
            </v-card-subtitle>
          </v-card>
        </v-col>
      </v-row>
    </div>
  </template>
  
  <script>
  import { onMounted } from "@vue/composition-api";
import useProducts from '../../components/crud/product';

  export default {
      setup() {
          const { products, getProducts , destroyProduct} = useProducts()
          onMounted(getProducts)
  
          const deleteCompany = async (id) => {
  
              if(!window.confirm('Are you sure')) {
                  return 
              }
              await destroyProduct(id);
              await getProducts();
          }
       
          return {
              products,
              deleteCompany,
              
          }
      }
  }
  </script>
  
  <style lang="scss" scoped>
  @import '@resources/sass//preset/mixins.scss';
  
  .avatar-center {
    top: -2rem;
    left: 1rem;
    border: 3px solid white;
    position: absolute;
  }
  
  // membership pricing
  @include theme--child(memberpricing-bg) using ($material) {
    background-color: rgba(map-deep-get($material, 'primary-shade'), map-deep-get($material, 'states', 'hover'));
  }
  
  .memberpricing-bg {
    position: relative;
  }
  .membership-pricing {
    text-align: center;
    sup {
      font-size: 3.75rem;
      top: 9px;
    }
  }
  </style>
  