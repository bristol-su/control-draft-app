<template>
    <div>
        <b-form @submit.prevent="savePositionTag">

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
            positionTag: {
                type: Object,
                required: false,
                default: null
            }
        },

        watch: {
            positionTag: {
                handler: function() {
                    this.syncPositionTagAttributes();
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
            this.syncPositionTagAttributes();
        },

        methods: {
            syncPositionTagAttributes() {
                if(this.positionTag !== null) {
                    this.form.name = this.positionTag.name;
                    this.form.description = this.positionTag.description;
                    this.form.reference = this.positionTag.reference;
                    this.form.tag_category_id = this.positionTag.tag_category_id;
                }
            },

            savePositionTag() {
                if(this.positionTag !== null) {
                    this.updatePositionTag();
                } else {
                    this.createPositionTag();
                }
            },

            updatePositionTag() {
                this.$control.positionTag().update(this.positionTag.id, this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not update the tag.'));
            },

            createPositionTag() {
                this.$control.positionTag().create(this.form)
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
