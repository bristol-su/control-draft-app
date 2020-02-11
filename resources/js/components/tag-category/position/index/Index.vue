<template>
    <div>
        <b-container>
            <b-row>
                <b-col cols="2"></b-col>
                <b-col cols="8"><h2 style="text-align: center">Position Tag Categories</h2></b-col>
                <b-col cols="2"><b-button size="md" variant="info" @click="createPositionTagCategory"><i class="fa fa-plus"/> New Category</b-button></b-col>
            </b-row>
            <b-row>
                <b-col cols="12">
                    <b-table :fields="fields" :items="positionTagCategories">
                        <template v-slot:cell(actions)="data">
                            <b-button size="sm" variant="outline-info" @click="editPositionTagCategory(data.item)">Edit</b-button>
                            <a :href="'/position-tag-category/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
                            <b-button size="sm" variant="outline-danger" @click="deletePositionTagCategory(data.item)">Delete</b-button>
                        </template>
                    </b-table>
                </b-col>
            </b-row>
        </b-container>

        <b-modal id="edit-position-tag-category">
            <edit :positionTagCategory="editingPositionTagCategory" @input="updatedPositionTagCategory"></edit>
        </b-modal>
    </div>
</template>

<script>
    import Edit from './Edit';

    export default {
        name: "Index",

        components: {
            Edit
        },

        data() {
            return {
                positionTagCategories: [],
                editingPositionTagCategory: null,
                fields: [
                    {key: 'id', label: 'Category ID'},
                    {key: 'name', label: 'Name'},
                    {key: 'reference', label: 'Reference'},
                    {key: 'actions', label: 'Actions'}
                ]
            }
        },

        created() {
            this.$control.positionTagCategory().all()
                .then(response => this.positionTagCategories = response.data)
                .catch(error => this.$notify.alert('Could not load tag categories'))
        },

        methods: {
            deletePositionTagCategory(positionTagCategory) {
                this.$bvModal.msgBoxConfirm('Are you sure you want to delete this tag category?', {
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
                        this.$control.positionTagCategory().delete(positionTagCategory.id)
                            .then(response => {
                                this.$notify.success('Tag category deleted!');
                                this.positionTagCategories.splice(this.positionTagCategories.indexOf(positionTagCategory), 1);
                            })
                            .catch(error => this.$notify.alert('Tag category could not be deleted.'))
                    }
                });
            },
            editPositionTagCategory(positionTagCategory) {
                this.editingPositionTagCategory = positionTagCategory;
                this.$bvModal.show('edit-position-tag-category');
            },
            createPositionTagCategory() {
                this.editingPositionTagCategory = null;
                this.$bvModal.show('edit-position-tag-category');
            },

            updatedPositionTagCategory(positionTagCategory) {
                this.positionTagCategories.splice(this.positionTagCategories.indexOf(this.editingPositionTagCategory), 1, positionTagCategory);
                this.$bvModal.hide('edit-position-tag-category');
                this.editingPositionTagCategory = null;
            }
        }
    }
</script>

<style scoped>

</style>
