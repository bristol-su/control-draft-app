<template>
    <div>
        <b-form @submit.prevent="saveUserTagCategory">

            <b-form-group id="user-category-name-group" label="Name:" label-for="user-category-name">
                <b-form-input id="user-category-name" v-model="form.name" type="text" />
            </b-form-group>

            <b-form-group id="user-category-description-group" label="Description:" label-for="user-category-description">
                <b-form-input id="user-category-description" v-model="form.description" type="text" />
            </b-form-group>

            <b-form-group id="user-category-reference-group" label="Reference:" label-for="user-category-reference">
                <b-form-input id="user-category-reference" v-model="form.reference" type="text" />
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
            role: {
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
                    type: null,
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
                    this.form.type = this.userTagCategory.type;
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
                    .catch(error => this.$notify.alert('Could not update the user tag category.'));
            },

            createUserTagCategory() {
                this.$control.userTagCategory().create(this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not save the user tag category.'));
            }
        },

    }
</script>

<style scoped>

</style>
