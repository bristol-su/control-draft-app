<template>
    <div>

        <b-table :fields="fields" :items="roles">

            <template v-slot:cell(actions)="data">
                <a :href="'/role/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
            </template>
        </b-table>
    </div>
</template>

<script>
    export default {
        name: "Roles",
        props: {
            group: {
                required: true,
                type: Object
            }
        },

        data() {
            return {
                roles: [],
                fields: [
                    {key: 'id', label: 'Role ID'},
                    {key: 'data.role_name', label: 'Name'},
                    {key: 'data.email', label: 'Email'},
                    {key: 'actions', label: 'Actions'}
                ],
            }
        },

        created() {
            this.$control.group().roles(this.group.id)
                .then(response => this.roles = response.data)
                .catch(error => this.$notify.alert('Could not load roles'));
        }

    }
</script>

<style scoped>

</style>
