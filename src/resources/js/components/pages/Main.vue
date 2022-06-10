<template>
    <b-container id="main">
        <SearchWord/>
    </b-container>
</template>

<script>
    import SearchForm from '../modules/SearchWord/SearchWordForm';
    import SearchWord from '../modules/SearchWord/SearchWord';

    /**
     * Main Page
     *
     * @author Simon Peter Calamno
     * @since 2022.06.10
     */
    export default {
        name       : 'Main',
        components : {
            SearchWord,
            SearchForm
        }
    }
</script>
