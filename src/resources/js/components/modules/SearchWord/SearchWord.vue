<template>
    <Fragment>
        <b-row>
            <SearchWordForm></SearchWordForm>
        </b-row>
        <b-row>
            <SearchWordDefinition></SearchWordDefinition>
        </b-row>
    </Fragment>
</template>

<script>
    import SearchWordForm from "./SearchWordForm";
    import SearchWordDefinition from "./SearchWordDefinition";
    export default {
        name: "SearchWord",
        components: {SearchWordDefinition, SearchWordForm}
    }
</script>

<style scoped>

</style>
