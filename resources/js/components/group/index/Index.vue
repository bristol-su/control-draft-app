<template>
    <div>
        <h2 style="text-align: center">Groups</h2>
        <b-table :fields="fields" :items="groups">
            <template v-slot:cell(actions)="data">
                <b-button size="sm" variant="danger" @click="deleteGroup(data.item)">Delete</b-button>
            </template>
        </b-table>
    </div>
</template>

<script>
    export default {
        name: "Index",

        
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
            this.$api.group().all()
                .then(response => this.groups = response.data)
                .catch(error => this.$notify.alert('Could not load groups'))
        },

        methods: {
            deleteGroup(group) {
                this.$bvModal.msgBoxConfirm('Are you sure you want to delete this group?', {
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
                        this.$api.group().delete(group.id)
                            .then(response => {
                                this.$notify.success('Group deleted!');
                                this.groups.splice(this.groups.indexOf(group), 1);
                            })
                            .catch(error => this.$notify.alert('Group could not be deleted.'))
                    }
                });
            }
        }
    }
</script>

<style scoped>

</style>
