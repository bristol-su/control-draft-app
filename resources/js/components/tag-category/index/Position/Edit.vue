<template>
    <div>
        <b-form @submit.prevent="savePositionTagCategory">

            <b-form-group id="position-category-name-group" label="Name:" label-for="position-category-name">
                <b-form-input id="position-category-name" v-model="form.name" type="text" />
            </b-form-group>

            <b-form-group id="position-category-description-group" label="Description:" label-for="position-category-description">
                <b-form-input id="position-category-description" v-model="form.description" type="text" />
            </b-form-group>

            <b-form-group id="position-category-reference-group" label="Reference:" label-for="position-category-reference">
                <b-form-input id="position-category-reference" v-model="form.reference" type="text" />
            </b-form-group>

            <b-button type="submit" variant="primary">Submit</b-button>
        </b-form>
    </div>
</template>

<script>
    export default {
        name: "Edit",

        props: {
            positionTagCategory: {
                type: Object,
                required: false,
                default: null
            }
        },

        watch: {
            role: {
                handler: function() {
                    this.syncPositionTagCategoryAttributes();
                },
                deep: true
            }
        },

        data() {
            return {
                form: {
                    name: null,
                    description: null,
                    type: null,
                    reference: null
                }
            }
        },

        mounted() {
            this.syncPositionTagCategoryAttributes();
        },

        methods: {
            syncPositionTagCategoryAttributes() {
                if(this.positionTagCategory !== null) {
                    this.form.name = this.positionTagCategory.name;
                    this.form.description = this.positionTagCategory.description;
                    this.form.type = this.positionTagCategory.type;
                    this.form.reference = this.positionTagCategory.reference;
                }
            },

            savePositionTagCategory() {
                if(this.positionTagCategory !== null) {
                    this.updatePositionTagCategory();
                } else {
                    this.createPositionTagCategory();
                }
            },

            updatePositionTagCategory() {
                this.$control.positionTagCategory().update(this.positionTagCategory.id, this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not update the position tag category.'));
            },

            createPositionTagCategory() {
                this.$control.positionTagCategory().create(this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not save the position tag category.'));
            }
        },

    }
</script>

<style scoped>

</style>
