<template>
    <div>
        <b-container>
            <b-button size="md" variant="info" @click="createUserTagCategory"><i class="fa fa-plus"/> New Category</b-button>
            <b-row>
                <b-col cols="12">
                    <b-table :fields="fields" :items="userTagCategories">
                        <template v-slot:cell(actions)="data">
                            <b-button size="sm" variant="outline-info" @click="editUserTagCategory(data.item)">Edit</b-button>
                            <a :href="'/tag-category/user/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
                            <b-button size="sm" variant="outline-danger" @click="deleteUserTagCategory(data.item)">Delete</b-button>
                        </template>
                    </b-table>
                </b-col>
            </b-row>
        </b-container>

        <b-modal id="edit-user-tag-category">
            <edit :userTagCategory="editingUserTagCategory" @input="updatedUserTagCategory"></edit>
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
                userTagCategories: [],
                editingUserTagCategory: null,
                fields: [
                    {key: 'id', label: 'Category ID'},
                    {key: 'name', label: 'Name'},
                    {key: 'reference', label: 'Reference'},
                    {key: 'actions', label: 'Actions'}
                ]
            }
        },

        created() {
            this.$control.userTagCategory().all()
                .then(response => this.userTagCategories = response.data)
                .catch(error => this.$notify.alert('Could not load user tag categories'));
        },

        methods: {
            deleteUserTagCategory(userTagCategory) {
                this.$bvModal.msgBoxConfirm('Are you sure you want to delete this user tag category?', {
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
                        this.$control.userTagCategory().delete(userTagCategory.id)
                            .then(response => {
                                this.$notify.success('User tag category deleted!');
                                this.userTagCategories.splice(this.userTagCategories.indexOf(userTagCategory), 1);
                            })
                            .catch(error => this.$notify.alert('User tag category could not be deleted.'))
                    }
                });
            },
            editUserTagCategory(userTagCategory) {
                this.editingUserTagCategory = userTagCategory;
                this.$bvModal.show('edit-user-tag-category');
            },
            createUserTagCategory() {
                this.editingUserTagCategory = null;
                this.$bvModal.show('edit-user-tag-category');
            },

            updatedUserTagCategory(userTagCategory) {
                this.userTagCategories.splice(this.userTagCategories.indexOf(this.editingUserTagCategory), 1, userTagCategory);
                this.$bvModal.hide('edit-user-tag-category');
                this.editingUserTagCategory = null;
            }
        }
    }
</script>

<style scoped>

</style>
