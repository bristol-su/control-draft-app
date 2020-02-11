<template>
    <div>
        <b-form @submit.prevent="saveRoleTagCategory">

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
            roleTagCategory: {
                type: Object,
                required: false,
                default: null
            }
        },

        watch: {
            roleTagCategory: {
                handler: function() {
                    this.syncRoleTagCategoryAttributes();
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
            this.syncRoleTagCategoryAttributes();
        },

        methods: {
            syncRoleTagCategoryAttributes() {
                if(this.roleTagCategory !== null) {
                    this.form.name = this.roleTagCategory.name;
                    this.form.description = this.roleTagCategory.description;
                    this.form.reference = this.roleTagCategory.reference;
                }
            },

            saveRoleTagCategory() {
                if(this.roleTagCategory !== null) {
                    this.updateRoleTagCategory();
                } else {
                    this.createRoleTagCategory();
                }
            },

            updateRoleTagCategory() {
                this.$control.roleTagCategory().update(this.roleTagCategory.id, this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not update the tag category.'));
            },

            createRoleTagCategory() {
                this.$control.roleTagCategory().create(this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not save the tag category.'));
            }
        },

    }
</script>

<style scoped>

</style>
