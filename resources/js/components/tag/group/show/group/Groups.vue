<template>
    <div>
        <b-container>
            <b-row>
                <b-col cols="2"><b-button size="md" variant="info" @click="addGroup"><i class="fa fa-plus"/> Add Group</b-button></b-col>
            </b-row>
            <b-row>
                <b-col cols="12">
                    <b-table :fields="fields" :items="groups">
                        <template v-slot:cell(actions)="data">
                            <a :href="'/group/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
                            <b-button size="sm" variant="outline-danger" @click="untagGroup(data.item)">Untag</b-button>
                        </template>
                    </b-table>
                </b-col>
            </b-row>
        </b-container>

        <b-modal id="add-group">
            <add-group :tag="tag" @input="addedGroup"></add-group>
        </b-modal>
    </div>
</template>

<script>
    import AddGroup from './AddGroup';

    export default {
        name: "Index",

        components: {
            AddGroup
        },

        props: {
            tag: {
                required: true,
                type: Object
            }
        },

        data() {
            return {
                groups: [],
                fields: [
                    {key: 'id', label: 'Group ID'},
                    {key: 'data.name', label: 'Name'},
                    {key: 'data.email', label: 'Email'},
                    {key: 'actions', label: 'Actions'}
                ]
            }
        },

        created() {
            this.$control.groupTag().groups(this.tag.id)
                .then(response => this.groups = response.data)
                .catch(error => this.$notify.alert('Could not load groups'))
        },

        methods: {
            untagGroup(group) {
                this.$bvModal.msgBoxConfirm('Are you sure you want to untag this group?', {
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
                        this.$control.groupTag().untagGroup(this.tag.id, group.id)
                            .then(response => {
                                this.$notify.success('Tag removed!');
                                this.groups.splice(this.groups.indexOf(group), 1);
                            })
                            .catch(error => this.$notify.alert('Tag could not be removed.'))
                    }
                });
            },
            addGroup() {
                this.$bvModal.show('add-group');
            },
            addedGroup(group) {
                this.$notify.success('Group added!');
                this.$bvModal.hide('add-group');
                this.groups.push(group);
            }
        }
    }
</script>

<style scoped>

</style>
