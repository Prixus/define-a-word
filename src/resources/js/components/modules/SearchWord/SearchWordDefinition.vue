<template>
    <fragment v-if="!bLoading">
        <b-col cols="2" v-if="bIsDefinitionsEmpty" class="mt-5">
            <p>No Results</p>
        </b-col>
        <b-row v-else>
            <b-col class="ml-1 mr-1" cols="12" v-for="(oDefinition, iIndex) in aDefinitions" :key="iIndex">
                <SearchWordDefinitionItem
                    :sDefinition="oDefinition.definition"
                    :sPartOfSpeech="oDefinition.part_of_speech"
                />
            </b-col>
        </b-row>
    </fragment>
    <b-spinner class="search-spinner center-search-card mt-5" v-else/>
</template>

<script>
    import SearchWordDefinitionItem from './SearchWordDefinitionItem';

    /**
     * Search Word Definition
     *
     * @author Simon Peter Calamno
     * @since 2022.06.10
     */
    export default {
        name       : 'SearchWordDefinition',
        components : {SearchWordDefinitionItem},
        props : {
            aDefinitions : {
                type    : Array,
                default : () => []
            },
            bLoading : {
                type : Boolean,
                default : false
            }
        },
        computed : {
            bIsDefinitionsEmpty() {
                return this.aDefinitions.length === 0;
            }
        }
    }
</script>

