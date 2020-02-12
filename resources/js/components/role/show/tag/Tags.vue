<template>
    <div>
        <b-container>
            <b-row>
                <b-col style="text-align: right;">
                    <b-button size="md" variant="info" @click="showAddTag"><i class="fa fa-plus"/> Add Tag</b-button>
                </b-col>
            </b-row>
        </b-container>

        <b-table :fields="fields" :items="tags">

            <template v-slot:cell(actions)="data">
                <a :href="'/role-tag/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
                <b-button size="sm" variant="outline-danger" @click="removeTag(data.item)">Delete</b-button>
            </template>
        </b-table>

        <b-modal id="add-tag">
            <tag-adder :role="role" @input="addTag"></tag-adder>
        </b-modal>
    </div>
</template>

<script>
    import TagAdder from './TagAdder';
    export default {
        name: "Tags",
        components: {TagAdder},
        props: {
            role: {
                required: true,
                type: Object
            }
        },

        data() {
            return {
                tags: [],
                fields: [
                    {key: 'id', label: 'Tag ID'},
                    {key: 'name', label: 'Name'},
                    {key: 'reference', label: 'Reference'},
                    {key: 'actions', label: 'Actions'}
                ],
            }
        },

        created() {
            this.$control.role().tags(this.role.id)
                .then(response => this.tags = response.data)
                .catch(error => this.$notify.alert('Could not load tags'));
        },

        methods: {
            removeTag(tag) {
                this.$bvModal.msgBoxConfirm('Are you sure you want to remove the tag from the role?', {
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
                            this.$control.role().untag(this.role.id, tag.id)
                                .then(response => {
                                    this.$notify.success('Tag removed!');
                                    this.tags.splice(this.tags.indexOf(tag), 1);
                                })
                                .catch(error => this.$notify.alert('Tag could not be removed.'))
                        }
                    });
            },

            showAddTag() {
                this.$bvModal.show('add-tag');
            },

            addTag(tag) {
                this.$bvModal.hide('add-tag');
                this.tags.push(tag);
            }
        },
    }
</script>

<style scoped>

</style>
