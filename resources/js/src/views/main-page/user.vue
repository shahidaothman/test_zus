<template>
    <div>
        <v-row class="pa-8">
            <router-link :to="{ name: 'login' }" click> <v-btn color="primary">Log In Here </v-btn></router-link>
        </v-row>
        <v-row>
            <!-- Influencing The Influencer -->
            <v-col md="4" sm="6" cols="12" class="pa-5" v-for="item in products" :key="item.id">
                <v-card>
                    <v-img :src="require('@/assets/images/pages/card-basic-person.png').default" height="250"></v-img>
                    <v-card-title>
                        <h2>{{ item.name }} </h2>


                    </v-card-title>
                    <v-card-text>
                        <span>Price :</span> <span class="font-weight-bold">RM {{ item.price }}</span>
                    </v-card-text>
                    <v-card-text>
                        <h2> {{ item.status }}</h2>
                    </v-card-text>

                    <v-card-text>

                        {{ item.description }}
                    </v-card-text>
                    <v-row>
                        <v-card-subtitle>
                            <!-- <span class="primary--text pt-5">Tags</span> -->

                            <div v-if="item.new == '1'">
                                <v-chip class="ma-2" color="success" text-color="white">
                                    New Item
                                </v-chip>
                            </div>


                           
                                <div v-if="item.sold_out == '1'">
                                    <v-chip class="ma-2" color="error" text-color="white">
                                        Sold Out
                                    </v-chip>
                                </div>
                            
                          
                                <div v-if="item.limited == '1'">
                                    <v-chip class="ma-2" color="warning" text-color="white">
                                        Limited
                                    </v-chip>
                                </div>
                        
                                <div v-if="item.fast_selling == '1'">
                                    <v-chip class="ma-2" color="primary" text-color="white">
                                        Fast Selling
                                    </v-chip>
                                </div>
                          


                        </v-card-subtitle>
                    </v-row>

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
        const { products, getProducts, destroyProduct } = useProducts()
        onMounted(getProducts)

        const deleteCompany = async (id) => {

            if (!window.confirm('Are you sure')) {
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
  