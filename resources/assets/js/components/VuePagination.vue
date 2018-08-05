<template>
	<vue-pagination
			v-model="currentPage"
			:total="total"
			:each-side="eachSide">
	</vue-pagination>
</template>

<script>
    import VuePagination from '@/components/VuePagination'
    export default {
        name: 'TheDemo',
        components: {
            VuePagination,
        },
        data () {
            return {
                total: 10,
                currentPage: 1,
                eachSide: 3,
            }
        },
    }
</script>
