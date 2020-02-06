<template>
    <div>
        <b-container>
            <b-row>
                <b-col cols="12">
                    <b-table :fields="fields" :items="groupTagCategories">
                        <template v-slot:cell(actions)="data">
                            <b-button size="sm" variant="outline-info" @click="editGroupTagCategory(data.item)">Edit</b-button>
                            <a :href="'/tag-category/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
                            <b-button size="sm" variant="outline-danger" @click="deleteGroupTagCategory(data.item)">Delete</b-button>
                        </template>
                    </b-table>
                </b-col>
            </b-row>
        </b-container>

        <b-modal id="edit-group-tag-category">
            <edit :tagCategory="editingGroupTagCategory" @input="updatedGroupTagCategory"></edit>
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
                groupTagCategories: [],
                editingGroupTagCategory: null,
                fields: [
                    {key: 'id', label: 'Category ID'},
                    {key: 'name', label: 'Name'},
                    {key: 'reference', label: 'Reference'},
                    {key: 'actions', label: 'Actions'}
                ]
            }
        },

        created() {
            this.$control.groupTagCategory().all()
                .then(response => this.groupTagCategories = response.data)
                .catch(error => this.$notify.alert('Could not load group tag categories'));
        },

        methods: {
            deleteGroupTagCategory(groupTagCategory) {
                this.$bvModal.msgBoxConfirm('Are you sure you want to delete this group tag category?', {
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
                        this.$control.groupTagCategory().delete(groupTagCategory.id)
                            .then(response => {
                                this.$notify.success('Group tag category deleted!');
                                this.groupTagCategories.splice(this.groupTagCategories.indexOf(groupTagCategory), 1);
                            })
                            .catch(error => this.$notify.alert('Group tag category could not be deleted.'))
                    }
                });
            },
            editGroupTagCategory(groupTagCategory) {
                this.editingGroupTagCategory = groupTagCategory;
                this.$bvModal.show('edit-group-tag-category');
            },
            createGroupTagCategory() {
                this.editingGroupTagCategory = null;
                this.$bvModal.show('edit-group-tag-category');
            },

            updatedGroupTagCategory(groupTagCategory) {
                this.groupTagCategories.splice(this.groupTagCategories.indexOf(this.editingGroupTagCategory), 1, groupTagCategory);
                this.$bvModal.hide('edit-group-tag-category');
                this.editingGroupTagCategory = null;
            }
        }
    }
</script>

<style scoped>

</style>
