<template>
    <div>
        <b-form @submit.prevent="savePosition">

            <b-form-group id="position-name-group" label="Position Name:" label-for="position-name">
                <b-form-input
                    id="position-name"
                    v-model="form.name"
                    placeholder="Enter position name"
                />
            </b-form-group>

            <b-form-group
                id="position-description-group"
                label="Description:"
                label-for="position-description"
            >
                <b-form-input
                    id="position-description"
                    v-model="form.description"
                    placeholder="Enter a description"
                />
            </b-form-group>

            <b-button type="submit" variant="primary">Submit</b-button>
        </b-form>
    </div>
</template>


<script>
    export default {
        name: "Edit",

        props: {
            position: {
                type: Object,
                required: false,
                default: null
            }
        },

        watch: {
            position: {
                handler: function() {
                    this.syncPositionAttributes();
                },
                deep: true
            }
        },

        data() {
            return {
                form: {
                    description: null,
                    name: null
                }
            }
        },

        mounted() {
            this.syncPositionAttributes();
        },

        methods: {
            syncPositionAttributes() {
                if(this.position !== null) {
                    this.form.description = this.position.data.description;
                    this.form.name = this.position.data.name;
                }
            },

            savePosition() {
                if(this.position !== null) {
                    this.updatePosition();
                } else {
                    this.createPosition();
                }
            },

            updatePosition() {
                this.$control.position().update(this.position.id, this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not update the position.'));
            },

            createPosition() {
                this.$control.position().create(this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not save the position.'));
            }
        },

    }
</script>

<style scoped>

</style>
