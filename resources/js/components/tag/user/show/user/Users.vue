<template>
    <div>
        <b-container>
            <b-row>
                <b-col cols="2"><b-button size="md" variant="info" @click="addUser"><i class="fa fa-plus"/> Add User</b-button></b-col>
            </b-row>
            <b-row>
                <b-col cols="12">
                    <b-table :fields="fields" :items="users">
                        <template v-slot:cell(actions)="data">
                            <a :href="'/user/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
                            <b-button size="sm" variant="outline-danger" @click="untagUser(data.item)">Untag</b-button>
                        </template>
                    </b-table>
                </b-col>
            </b-row>
        </b-container>

        <b-modal id="add-user">
            <add-user :tag="tag" @input="addedUser"></add-user>
        </b-modal>
    </div>
</template>

<script>
    import AddUser from './AddUser';

    export default {
        name: "Index",

        components: {
            AddUser
        },

        props: {
            tag: {
                required: true,
                type: Object
            }
        },

        data() {
            return {
                users: [],
                fields: [
                    {key: 'id', label: 'User ID'},
                    {key: 'data.preferred_name', label: 'Preferred Name'},
                    {key: 'data.email', label: 'Email'},
                    {key: 'actions', label: 'Actions'}
                ]
            }
        },

        created() {
            this.$control.userTag().users(this.tag.id)
                .then(response => this.users = response.data)
                .catch(error => this.$notify.alert('Could not load users'))
        },

        methods: {
            untagUser(user) {
                this.$bvModal.msgBoxConfirm('Are you sure you want to untag this user?', {
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
                        this.$control.userTag().untagUser(this.tag.id, user.id)
                            .then(response => {
                                this.$notify.success('Tag removed!');
                                this.users.splice(this.users.indexOf(user), 1);
                            })
                            .catch(error => this.$notify.alert('Tag could not be removed.'))
                    }
                });
            },
            addUser() {
                this.$bvModal.show('add-user');
            },
            addedUser(user) {
                this.$notify.success('User added!');
                this.$bvModal.hide('add-user');
                this.users.push(user);
            }
        }
    }
</script>

<style scoped>

</style>
