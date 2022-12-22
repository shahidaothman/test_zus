<!-- Vue component -->
<template>
 <div>
  <label class="typo__label">Tags</label>
  <multiselect v-model="value" :options="options" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Pick some" label="name" track-by="name" :preselect-first="true">
    <!-- <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} options selected</span></template> -->
  </multiselect>
  <!-- <pre class="language-json"><code>{{ value  }}</code></pre> -->
</div>

</template>

<script>
import Multiselect from 'vue-multiselect'

export default {
  components: {
    Multiselect
  },
  data () {
    return {
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
