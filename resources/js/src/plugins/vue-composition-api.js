import VueCompositionAPI from '@vue/composition-api'
import Vue from 'vue'
import axios from 'axios'

const axiosIns = axios.create({
    // You can add your headers here
    // ================================
    baseURL: 'https://127.0.0.1:8000/',
    // timeout: 1000,
    // headers: {'X-Custom-Header': 'foobar'}
  })
  
  Vue.prototype.$http = axiosIns
  
  export default axiosIns

Vue.use(VueCompositionAPI)
