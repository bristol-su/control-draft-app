<template>
    <div>
        <b-form @submit.prevent="savePositionTagCategory">

            <b-form-group id="category-name-group" label="Name:" label-for="category-name">
                <b-form-input
                    id="category-name"
                    v-model="form.name"
                    placeholder="Enter name"
                />
            </b-form-group>

            <b-form-group id="category-description-group" label="Description:" label-for="category-description">
                <b-form-input
                    id="category-description"
                    v-model="form.description"
                    placeholder="Enter description"
                />
            </b-form-group>

            <b-form-group id="category-reference-group" label="Reference:" label-for="category-reference">
                <b-form-input
                    id="category-reference"
                    v-model="form.reference"
                    placeholder="Enter reference"
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
            positionTagCategory: {
                type: Object,
                required: false,
                default: null
            }
        },

        watch: {
            positionTagCategory: {
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
                    .catch(error => this.$notify.alert('Could not update the tag category.'));
            },

            createPositionTagCategory() {
                this.$control.positionTagCategory().create(this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not save the tag category.'));
            }
        },

    }
</script>

<style scoped>

</style>
