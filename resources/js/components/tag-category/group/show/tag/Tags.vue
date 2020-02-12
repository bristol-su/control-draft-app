<template>
    <div>
        <b-container>
            <b-row>
                <b-col cols="2"><b-button size="md" variant="info" @click="createTag"><i class="fa fa-plus"/> New Tag</b-button></b-col>
            </b-row>
            <b-row>
                <b-col cols="12">
                    <b-table :fields="fields" :items="tags">
                        <template v-slot:cell(actions)="data">
                            <b-button size="sm" variant="outline-info" @click="editTag(data.item)">Edit</b-button>
                            <a :href="'/group-tag/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
                            <b-button size="sm" variant="outline-danger" @click="deleteTag(data.item)">Delete</b-button>
                        </template>
                    </b-table>
                </b-col>
            </b-row>
        </b-container>

        <b-modal id="edit-tag">
            <edit-tag :categoryId="category.id" :tag="editingTag" @input="updatedTag"></edit-tag>
        </b-modal>
    </div>
</template>

<script>
    import EditTag from './EditTag';

    export default {
        name: "Index",

        components: {
            EditTag
        },

        props: {
            category: {
                required: true,
                type: Object
            }
        },

        data() {
            return {
                tags: [],
                editingTag: null,
                fields: [
                    {key: 'id', label: 'Tag ID'},
                    {key: 'name', label: 'Name'},
                    {key: 'reference', label: 'Reference'},
                    {key: 'actions', label: 'Actions'}
                ]
            }
        },

        created() {
            this.$control.groupTagCategory().tags(this.category.id)
                .then(response => this.tags = response.data)
                .catch(error => this.$notify.alert('Could not load tags'))
        },

        methods: {
            deleteTag(tag) {
                this.$bvModal.msgBoxConfirm('Are you sure you want to delete this tag?', {
                    title: 'Please Confirm',
                    size: 'sm',
                    buttonSize: 'sm',
                    okVariant: 'danger',
                    okTitle: 'YES',
                    cancelTitle: 'NO',
                    footerClass: 'p-2',
                    hideHeaderClose: false,
                    centered: true
                })
                .then(confirmed => {
                    if(confirmed) {
                        this.$control.groupTag().delete(tag.id)
                            .then(response => {
                                this.$notify.success('Tag deleted!');
                                this.tags.splice(this.tags.indexOf(tag), 1);
                            })
                            .catch(error => this.$notify.alert('Tag could not be deleted.'))
                    }
                });
            },
            editTag(tag) {
                this.editingTag = tag;
                this.$bvModal.show('edit-tag');
            },
            createTag() {
                this.editingTag = null;
                this.$bvModal.show('edit-tag');
            },

            updatedTag(tag) {
                this.tags.splice(this.tags.indexOf(this.editingTag), 1, tag);
                this.$bvModal.hide('edit-tag');
                this.editingTag = null;
            }
        }
    }
</script>

<style scoped>

</style>
