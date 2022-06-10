<template>
    <b-container id="recent-search">
        <RecentSearch/>
    </b-container>
</template>

<script>
    import RecentSearch from '../modules/RecentSearch/RecentSearch';

    /**
     * Recent Searches
     *
     * @author Simon Peter Calamno
     * @since 2022.06.10
     */
    export default {
        name       : 'RecentSearches',
        components : {RecentSearch},
    }
</script>
