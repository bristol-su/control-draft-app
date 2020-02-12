<template>
    <div>
        <b-form @submit.prevent="addPosition">

            <find-position @input="addPositionId($event)"></find-position>

            <b-button v-if="position!==null" type="submit" variant="primary">Submit</b-button>
        </b-form>
    </div>
</template>

<script>
    import FindPosition from './FindPosition';

    export default {
        name: "Edit",

        components: { FindPosition },

        props: {
            positionId: {
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
                position: null
            }
        },

        methods: {
            addPosition() {
                this.$control.positionTag().tagPosition(this.tag.id, this.position.id)
                    .then(response => this.$emit('input', this.position))
                    .catch(error => this.$notify.alert('Could not tag the position.'));
            },

            addPositionId(event) {
                this.$control.position().get(event)
                    .then(response => this.position = response.data)
                    .catch(error => this.$notify.alert('Could not fetch the position.'));
            }
        },

    }
</script>

<style scoped>

</style>
