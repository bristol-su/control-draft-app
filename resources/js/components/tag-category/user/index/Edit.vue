<template>
    <div>
        <b-form @submit.prevent="saveUserTagCategory">

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
            userTagCategory: {
                type: Object,
                required: false,
                default: null
            }
        },

        watch: {
            userTagCategory: {
                handler: function() {
                    this.syncUserTagCategoryAttributes();
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
            this.syncUserTagCategoryAttributes();
        },

        methods: {
            syncUserTagCategoryAttributes() {
                if(this.userTagCategory !== null) {
                    this.form.name = this.userTagCategory.name;
                    this.form.description = this.userTagCategory.description;
                    this.form.reference = this.userTagCategory.reference;
                }
            },

            saveUserTagCategory() {
                if(this.userTagCategory !== null) {
                    this.updateUserTagCategory();
                } else {
                    this.createUserTagCategory();
                }
            },

            updateUserTagCategory() {
                this.$control.userTagCategory().update(this.userTagCategory.id, this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not update the tag category.'));
            },

            createUserTagCategory() {
                this.$control.userTagCategory().create(this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not save the tag category.'));
            }
        },

    }
</script>

<style scoped>

</style>
