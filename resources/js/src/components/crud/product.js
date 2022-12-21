import { ref } from "@vue/composition-api";
import axios from "axios";
// import router from "src/router";


export default function useProducts() {
    const products = ref([])
    const product = ref([])
    const errors = ref([])
  


    const getProducts = async () => {
        let response = await axios.get('/api/product')
        products.value = response.data.data;
        console.log( products.value);
    }

    // const getProduct = async (id) => {
    //     let response = await axios.get('/api/product/' + id)
    //     product.value = response.data.data;
    // }

const destroyProduct = async(id) => {
    await axios.delete(('/api/product/' + id))
}

const storeProduct = async(data) => {
    await axios.post(('/api/product/',data))
    await route.push({name :'product-view'})
}


    return {
        products,
        product,
        errors,
        getProducts,
        destroyProduct,
        storeProduct,
     
    }
}