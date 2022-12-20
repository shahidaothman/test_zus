import { ref } from "@vue/composition-api";
import axios from "axios";

// import 'https://unpkg.com/vue@3/dist/vue.global.js';

export default function useProducts() {
    const products = ref([])
    const product = ref([])
  


    const getProducts = async () => {
        let response = await axios.get('/api/products')
        products.value = response.data.data;
        console.log( products.value);
    }

    // const getProduct = async (id) => {
    //     let response = await axios.get('/api/product/' + id)
    //     product.value = response.data.data;
    // }




    return {
        products,
        product,
        
        getProducts,
        // getProduct,
     
    }
}