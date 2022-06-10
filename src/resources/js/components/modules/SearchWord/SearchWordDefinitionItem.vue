<template>
    <b-row>
        <b-card>
            <b-card-text>
                <strong>Part of  Speech:</strong> {{ sPartOfSpeech }}
                <br><br>
                <strong>Definition:</strong> {{ sDefinition }}
            </b-card-text>
            <b-card-sub-title>
            </b-card-sub-title>
        </b-card>
    </b-row>
</template>

<script>
    /**
     * Search Word Definition Item
     *
     * @author Simon Peter Calamno
     * @since 2022.06.10
     */
    export default {
        name : 'SearchWordDefinitionItem',
        props : {
            sPartOfSpeech : {
                type     : String,
                required : true
            },
            sDefinition : {
                type     : String,
                required : true
            }
        }
    }
</script>
