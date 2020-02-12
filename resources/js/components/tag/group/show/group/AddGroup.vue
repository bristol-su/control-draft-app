<template>
    <div>
        <b-form @submit.prevent="addGroup">

            <find-group @input="addGroupId($event)"></find-group>

            <b-button v-if="group!==null" type="submit" variant="primary">Submit</b-button>
        </b-form>
    </div>
</template>

<script>
    import FindGroup from './FindGroup';

    export default {
        name: "Edit",

        components: { FindGroup },

        props: {
            groupId: {
                type: Number,
                required: false,
                default: 0
            },

            tag: {
                type: Object,
                required: false,
                default: null
            }
        },

        data() {
            return {
                group: null
            }
        },

        methods: {
            addGroup() {
                this.$control.groupTag().tagGroup(this.tag.id, this.group.id)
                    .then(response => this.$emit('input', this.group))
                    .catch(error => this.$notify.alert('Could not tag the group.'));
            },

            addGroupId(event) {
                this.$control.group().get(event)
                    .then(response => this.group = response.data)
                    .catch(error => this.$notify.alert('Could not fetch the group.'));
            }
        },

    }
</script>

<style scoped>

</style>
