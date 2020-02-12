<template>
    <div>
        <b-container>
            <b-row>
                <b-col cols="2"></b-col>
                <b-col cols="8"><h2 style="text-align: center">Position Tags</h2></b-col>
                <b-col cols="2"><b-button size="md" variant="info" @click="createPositionTag"><i class="fa fa-plus"/> New Tag</b-button></b-col>
            </b-row>
            <b-row>
                <b-col cols="12">
                    <b-table :fields="fields" :items="positionTags">
                        <template v-slot:cell(actions)="data">
                            <b-button size="sm" variant="outline-info" @click="editPositionTag(data.item)">Edit</b-button>
                            <a :href="'/position-tag/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
                            <b-button size="sm" variant="outline-danger" @click="deletePositionTag(data.item)">Delete</b-button>
                        </template>
                    </b-table>
                </b-col>
            </b-row>
        </b-container>

        <b-modal id="edit-position-tag">
            <edit :positionTag="editingPositionTag" @input="updatedPositionTag"></edit>
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
                positionTags: [],
                editingPositionTag: null,
                fields: [
                    {key: 'id', label: 'Tag ID'},
                    {key: 'name', label: 'Name'},
                    {key: 'reference', label: 'Reference'},
                    {key: 'actions', label: 'Actions'}
                ]
            }
        },

        created() {
            this.$control.positionTag().all()
                .then(response => this.positionTags = response.data)
                .catch(error => this.$notify.alert('Could not load tags'))
        },

        methods: {
            deletePositionTag(positionTag) {
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
                        this.$control.positionTag().delete(positionTag.id)
                            .then(response => {
                                this.$notify.success('Tag deleted!');
                                this.positionTags.splice(this.positionTags.indexOf(positionTag), 1);
                            })
                            .catch(error => this.$notify.alert('Tag could not be deleted.'))
                    }
                });
            },
            editPositionTag(positionTag) {
                this.editingPositionTag = positionTag;
                this.$bvModal.show('edit-position-tag');
            },
            createPositionTag() {
                this.editingPositionTag = null;
                this.$bvModal.show('edit-position-tag');
            },

            updatedPositionTag(positionTag) {
                this.positionTags.splice(this.positionTags.indexOf(this.editingPositionTag), 1, positionTag);
                this.$bvModal.hide('edit-position-tag');
                this.editingPositionTag = null;
            }
        }
    }
</script>

<style scoped>

</style>
