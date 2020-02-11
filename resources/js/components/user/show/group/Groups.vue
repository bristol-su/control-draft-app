<template>
    <div>
        <b-container>
            <b-row>
                <b-col style="text-align: right;">
                    <b-button size="md" variant="info" @click="showAddGroup"><i class="fa fa-plus"/> Add Group</b-button>
                </b-col>
            </b-row>
        </b-container>

        <b-table :fields="fields" :items="groups">

            <template v-slot:cell(actions)="data">
                <a :href="'/group/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
                <b-button size="sm" variant="outline-danger" @click="removeGroup(data.item)">Delete</b-button>
            </template>
        </b-table>

        <b-modal id="add-group">
            <group-adder :user="user" @input="addGroup"></group-adder>
        </b-modal>
    </div>
</template>

<script>
    import GroupAdder from './GroupAdder';
    export default {
        name: "Groups",
        components: {GroupAdder},
        props: {
            user: {
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
                ],
            }
        },

        created() {
            this.$control.user().groups(this.user.id)
                .then(response => this.groups = response.data)
                .catch(error => this.$notify.alert('Could not load groups'));
        },

        methods: {
            removeGroup(group) {
                this.$bvModal.msgBoxConfirm('Are you sure you want to remove the group from the user?', {
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
                            this.$control.user().removeGroup(this.user.id, group.id)
                                .then(response => {
                                    this.$notify.success('Group removed!');
                                    this.groups.splice(this.groups.indexOf(group), 1);
                                })
                                .catch(error => this.$notify.alert('Group could not be removed.'))
                        }
                    });
            },

            showAddGroup() {
                this.$bvModal.show('add-group');
            },

            addGroup(group) {
                this.$bvModal.hide('add-group');
                this.groups.push(group);
            }
        },
    }
</script>

<style scoped>

</style>
