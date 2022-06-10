<template>
    <div class="recent-searches">
        <b-row>
            <h3>Recent Searches:</h3>
        </b-row>
        <b-row>
            <b-col cols="3" class="mb-2">
                <RecentSearchItem></RecentSearchItem>
            </b-col>
            <b-col cols="3" class="mb-2">
                <RecentSearchItem></RecentSearchItem>
            </b-col>
            <b-col cols="3" class="mb-2">
                <RecentSearchItem></RecentSearchItem>
            </b-col>
            <b-col cols="3" class="mb-2">
                <RecentSearchItem></RecentSearchItem>
            </b-col>
            <b-col cols="3" class="mb-2">
                <RecentSearchItem></RecentSearchItem>
            </b-col>
            <b-col cols="3" class="mb-2">
                <RecentSearchItem></RecentSearchItem>
            </b-col>
            <b-col cols="3" class="mb-2">
                <RecentSearchItem></RecentSearchItem>
            </b-col>
            <b-col cols="3" class="mb-2">
                <RecentSearchItem></RecentSearchItem>
            </b-col>

        </b-row>
    </div>
</template>

<script>
    import RecentSearchItem from './RecentSearchItem';

    /**
     * Recent Search
     *
     * @author Simon Peter Calamno
     * @since 2022.06.10
     */
    export default {
        name       : 'RecentSearch',
        components : {RecentSearchItem}
    }
</script>
