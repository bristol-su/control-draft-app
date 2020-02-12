<template>
    <div>
        <b-form @submit.prevent="saveRoleTag">

            <b-form-group id="tag-name-group" label="Name:" label-for="tag-name">
                <b-form-input
                    id="tag-name"
                    v-model="form.name"
                    placeholder="Enter name"
                />
            </b-form-group>

            <b-form-group id="tag-description-group" label="Description:" label-for="tag-description">
                <b-form-input
                    id="tag-description"
                    v-model="form.description"
                    placeholder="Enter description"
                />
            </b-form-group>

            <b-form-group id="tag-reference-group" label="Reference:" label-for="tag-reference">
                <b-form-input
                    id="category-reference"
                    v-model="form.reference"
                    placeholder="Enter reference"
                />
            </b-form-group>

            <find-category :value="form.tag_category_id" @input="newCategoryId($event)"></find-category>

            <b-button type="submit" variant="primary">Submit</b-button>
        </b-form>
    </div>
</template>

<script>
    import FindCategory from './FindCategory';

    export default {
        name: "Edit",

        components: { FindCategory },

        props: {
            roleTag: {
                type: Object,
                required: false,
                default: null
            }
        },

        watch: {
            roleTag: {
                handler: function() {
                    this.syncRoleTagAttributes();
                },
                deep: true
            }
        },

        data() {
            return {
                form: {
                    name: null,
                    description: null,
                    reference: null,
                    tag_category_id: null
                }
            }
        },

        mounted() {
            this.syncRoleTagAttributes();
        },

        methods: {
            syncRoleTagAttributes() {
                if(this.roleTag !== null) {
                    this.form.name = this.roleTag.name;
                    this.form.description = this.roleTag.description;
                    this.form.reference = this.roleTag.reference;
                    this.form.tag_category_id = this.roleTag.tag_category_id;
                }
            },

            saveRoleTag() {
                if(this.roleTag !== null) {
                    this.updateRoleTag();
                } else {
                    this.createRoleTag();
                }
            },

            updateRoleTag() {
                this.$control.roleTag().update(this.roleTag.id, this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not update the tag.'));
            },

            createRoleTag() {
                this.$control.roleTag().create(this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not save the tag.'));
            },

            newCategoryId(event) {
                this.form.tag_category_id = event;
            }
        },

    }
</script>

<style scoped>

</style>
