<template>
    <div>
        <b-container>
            <b-row>
                <b-col cols="2"></b-col>
                <b-col cols="8"><h2 style="text-align: center">Group Tags</h2></b-col>
                <b-col cols="2"><b-button size="md" variant="info" @click="createGroupTag"><i class="fa fa-plus"/> New Tag</b-button></b-col>
            </b-row>
            <b-row>
                <b-col cols="12">
                    <b-table :fields="fields" :items="groupTags">
                        <template v-slot:cell(actions)="data">
                            <b-button size="sm" variant="outline-info" @click="editGroupTag(data.item)">Edit</b-button>
                            <a :href="'/group-tag/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
                            <b-button size="sm" variant="outline-danger" @click="deleteGroupTag(data.item)">Delete</b-button>
                        </template>
                    </b-table>
                </b-col>
            </b-row>
        </b-container>

        <b-modal id="edit-group-tag">
            <edit :groupTag="editingGroupTag" @input="updatedGroupTag"></edit>
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
                groupTags: [],
                editingGroupTag: null,
                fields: [
                    {key: 'id', label: 'Tag ID'},
                    {key: 'name', label: 'Name'},
                    {key: 'reference', label: 'Reference'},
                    {key: 'actions', label: 'Actions'}
                ]
            }
        },

        created() {
            this.$control.groupTag().all()
                .then(response => this.groupTags = response.data)
                .catch(error => this.$notify.alert('Could not load tags'))
        },

        methods: {
            deleteGroupTag(groupTag) {
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
                        this.$control.groupTag().delete(groupTag.id)
                            .then(response => {
                                this.$notify.success('Tag deleted!');
                                this.groupTags.splice(this.groupTags.indexOf(groupTag), 1);
                            })
                            .catch(error => this.$notify.alert('Tag could not be deleted.'))
                    }
                });
            },
            editGroupTag(groupTag) {
                this.editingGroupTag = groupTag;
                this.$bvModal.show('edit-group-tag');
            },
            createGroupTag() {
                this.editingGroupTag = null;
                this.$bvModal.show('edit-group-tag');
            },

            updatedGroupTag(groupTag) {
                this.groupTags.splice(this.groupTags.indexOf(this.editingGroupTag), 1, groupTag);
                this.$bvModal.hide('edit-group-tag');
                this.editingGroupTag = null;
            }
        }
    }
</script>

<style scoped>

</style>
