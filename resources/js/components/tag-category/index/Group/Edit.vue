<template>
    <div>
        <b-form @submit.prevent="saveGroupTagCategory">

            <b-form-group id="group-category-name-group" label="Name:" label-for="group-category-name">
                <b-form-input id="group-category-name" v-model="form.name" type="text" />
            </b-form-group>

            <b-form-group id="group-category-description-group" label="Description:" label-for="group-category-description">
                <b-form-input id="group-category-description" v-model="form.description" type="text" />
            </b-form-group>

            <b-form-group id="group-category-reference-group" label="Reference:" label-for="group-category-reference">
                <b-form-input id="group-category-reference" v-model="form.reference" type="text" />
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
            role: {
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
                    type: null,
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
                    this.form.type = this.groupTagCategory.type;
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
                    .catch(error => this.$notify.alert('Could not update the group tag category.'));
            },

            createGroupTagCategory() {
                this.$control.groupTagCategory().create(this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not save the group tag category.'));
            }
        },

    }
</script>

<style scoped>

</style>
