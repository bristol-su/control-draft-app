<template>
    <div>
        <b-form @submit.prevent="saveGroupTagCategory">

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
            groupTagCategory: {
                type: Object,
                required: false,
                default: null
            }
        },

        watch: {
            groupTagCategory: {
                handler: function() {
                    this.syncGroupTagCategoryAttributes();
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
            this.syncGroupTagCategoryAttributes();
        },

        methods: {
            syncGroupTagCategoryAttributes() {
                if(this.groupTagCategory !== null) {
                    this.form.name = this.groupTagCategory.name;
                    this.form.description = this.groupTagCategory.description;
                    this.form.reference = this.groupTagCategory.reference;
                }
            },

            saveGroupTagCategory() {
                if(this.groupTagCategory !== null) {
                    this.updateGroupTagCategory();
                } else {
                    this.createGroupTagCategory();
                }
            },

            updateGroupTagCategory() {
                this.$control.groupTagCategory().update(this.groupTagCategory.id, this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not update the tag category.'));
            },

            createGroupTagCategory() {
                this.$control.groupTagCategory().create(this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not save the tag category.'));
            }
        },

    }
</script>

<style scoped>

</style>
