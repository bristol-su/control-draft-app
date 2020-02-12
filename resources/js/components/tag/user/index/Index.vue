<template>
    <div>
        <b-container>
            <b-row>
                <b-col cols="2"></b-col>
                <b-col cols="8"><h2 style="text-align: center">User Tags</h2></b-col>
                <b-col cols="2"><b-button size="md" variant="info" @click="createUserTag"><i class="fa fa-plus"/> New Tag</b-button></b-col>
            </b-row>
            <b-row>
                <b-col cols="12">
                    <b-table :fields="fields" :items="userTags">
                        <template v-slot:cell(actions)="data">
                            <b-button size="sm" variant="outline-info" @click="editUserTag(data.item)">Edit</b-button>
                            <a :href="'/user-tag/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
                            <b-button size="sm" variant="outline-danger" @click="deleteUserTag(data.item)">Delete</b-button>
                        </template>
                    </b-table>
                </b-col>
            </b-row>
        </b-container>

        <b-modal id="edit-user-tag">
            <edit :userTag="editingUserTag" @input="updatedUserTag"></edit>
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
                userTags: [],
                editingUserTag: null,
                fields: [
                    {key: 'id', label: 'Tag ID'},
                    {key: 'name', label: 'Name'},
                    {key: 'reference', label: 'Reference'},
                    {key: 'actions', label: 'Actions'}
                ]
            }
        },

        created() {
            this.$control.userTag().all()
                .then(response => this.userTags = response.data)
                .catch(error => this.$notify.alert('Could not load tags'))
        },

        methods: {
            deleteUserTag(userTag) {
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
                        this.$control.userTag().delete(userTag.id)
                            .then(response => {
                                this.$notify.success('Tag deleted!');
                                this.userTags.splice(this.userTags.indexOf(userTag), 1);
                            })
                            .catch(error => this.$notify.alert('Tag could not be deleted.'))
                    }
                });
            },
            editUserTag(userTag) {
                this.editingUserTag = userTag;
                this.$bvModal.show('edit-user-tag');
            },
            createUserTag() {
                this.editingUserTag = null;
                this.$bvModal.show('edit-user-tag');
            },

            updatedUserTag(userTag) {
                this.userTags.splice(this.userTags.indexOf(this.editingUserTag), 1, userTag);
                this.$bvModal.hide('edit-user-tag');
                this.editingUserTag = null;
            }
        }
    }
</script>

<style scoped>

</style>
