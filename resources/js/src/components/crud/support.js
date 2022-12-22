import { ref } from "@vue/composition-api";
import axios from "axios";

export default function useSupport() {
    const supports = ref([])
    const support = ref([])

    const getSupports = async() => {
        let response = await axios.get('/api/support')
        supports.value = response.data.data;
    }

    const getSupport = async() => {
        let response = await axios.get('/api/support'+id)
        support.value = response.data.data;
    }

    const destroySupport = async(id) => {
       await axios.delete('/api/support/'+id)    
    }

  



    return {
        support,
        supports,
        getSupport,
        getSupports,
        // storeAdmin,
        destroySupport,
    }
}