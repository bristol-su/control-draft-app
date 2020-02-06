<template>
    <div>
        <b-form @submit.prevent="saveRoleTagCategory">
            
            <b-form-group id="role-category-name-group" label="Name:" label-for="role-category-name">
                <b-form-input id="role-category-name" v-model="form.name" type="text" />
            </b-form-group>

            <b-form-group id="role-category-description-group" label="Description:" label-for="role-category-description">
                <b-form-input id="role-category-description" v-model="form.description" type="text" />
            </b-form-group>

            <b-form-group id="role-category-reference-group" label="Reference:" label-for="role-category-reference">
                <b-form-input id="role-category-reference" v-model="form.reference" type="text" />
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
            role: {
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
                    type: null,
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
                    this.form.type = this.roleTagCategory.type;
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
                    .catch(error => this.$notify.alert('Could not update the role tag category.'));
            },

            createRoleTagCategory() {
                this.$control.roleTagCategory().create(this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not save the role tag category.'));
            }
        },

    }
</script>

<style scoped>

</style>
