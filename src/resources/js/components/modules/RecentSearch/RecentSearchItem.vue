<template>
    <b-card :title="sSearchWord">
        <b-card-sub-title>
            Search time : {{ sCreatedTime }}
        </b-card-sub-title>
    </b-card>

</template>

<script>
    /**
     * Recent Search Item
     *
     * @author Simon Peter Calamno
     * @since 2022.06.10
     */
    export default {
        name  : 'RecentSearchItem',
        props : {
            sSearchWord : {
                type    : String,
                required : true
            },
            sCreatedTime : {
                type     : String,
                required : true
            }
        }
    }
</script>
