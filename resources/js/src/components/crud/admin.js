import { ref } from "@vue/composition-api";
import axios from "axios";

export default function useAdmin() {
    const admins = ref([])
    const admin = ref([])

    const getAdmins = async() => {
        let response = await axios.get('/api/admin')
        admins.value = response.data.data;
    }
    // const storeAdmin = async(data) => {
    //     console.log("here")
    //     console.log(data)
    //     await axios.post('/api/admin/'+data)  
    //     self.$router.push({ name: 'admin-view' });
    //  }

    const getAdmin = async() => {
        let response = await axios.get('/api/admin'+id)
        admin.value = response.data.data;
    }

    const destroyAdmin = async(id) => {
       await axios.delete('/api/admin/'+id)    
    }



    return {
        admins,
        admin,
        getAdmin,
        getAdmins,
        // storeAdmin,
        destroyAdmin,
    }
}