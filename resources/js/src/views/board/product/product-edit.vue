<template>
    <div>
        Coming soon
    </div>
</template>

<script>
import useProducts from 'src/components/crud/product';


export default {

    setup() {
        const { product, getProduct } = useProducts

        return {
            product,

        }
    }



}
</script>