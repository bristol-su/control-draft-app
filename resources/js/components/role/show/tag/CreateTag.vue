<template>
    <div>
        <b-form @submit.prevent="createTag">

            <b-form-group id="tag-name-group" label="Name:" label-for="tag-name">
                <b-form-input
                    id="tag-name"
                    v-model="form.name"
                    placeholder="Enter tag name"
                />
            </b-form-group>

            <b-form-group id="tag-description-group" label="Description:" label-for="tag-description">
                <b-form-input
                    id="tag-description"
                    v-model="form.description"
                    placeholder="Enter tag description"
                />
            </b-form-group>

            <b-form-group id="tag-reference-group" label="Reference:" label-for="tag-reference">
                <b-form-input
                    id="tag-reference"
                    v-model="form.reference"
                    placeholder="Enter tag reference"
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
            categoryId: {
                type: Number,
                required: false,
                default: 0
            },

            tag: {
                type: Object,
                required: false,
                default: null
            }
        },

        watch: {
            tag: {
                handler: function() {
                    this.syncTagAttributes();
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
            this.syncTagAttributes();
        },

        methods: {
            syncTagAttributes() {
                if(this.tag !== null) {
                    this.form.name = this.tag.name;
                    this.form.description = this.tag.description;
                    this.form.reference = this.tag.reference;
                    this.form.tag_category_id = this.tag.tag_category_id;
                } else {
                    this.form.tag_category_id = this.categoryId;
                }
            },

            createTag() {
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
