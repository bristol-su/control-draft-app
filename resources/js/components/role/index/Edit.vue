<template>
    <div>
        <b-form @submit.prevent="saveRole">

            <b-form-group
                id="role-name-group"
                label="Name:"
                label-for="rolename">
                <b-form-input
                    id="rolename"
                    v-model="form.role_name"
                    type="text" />
            </b-form-group>

            <group-id-selector :value="form.group_id" @input="newGroupId($event)"></group-id-selector>

            <position-id-selector :value="form.position_id" @input="newPositionId($event)"></position-id-selector>

            <b-form-group
                id="role-email-group"
                label="Email:"
                label-for="roleemail">
                <b-form-input
                    id="roleemail"
                    v-model="form.email"
                    type="text" />
            </b-form-group>

            <b-button type="submit" variant="primary">Submit</b-button>
        </b-form>
    </div>
</template>

<script>
    import GroupIdSelector from './GroupIdSelector';
    import PositionIdSelector from './PositionIdSelector';

    export default {
        name: "Edit",

        components: {
            GroupIdSelector,
            PositionIdSelector
        },

        props: {
            role: {
                type: Object,
                required: false,
                default: null
            }
        },

        watch: {
            role: {
                handler: function() {
                    this.syncRoleAttributes();
                },
                deep: true
            }
        },

        data() {
            return {
                form: {
                    position_id: null,
                    role_name: null,
                    group_id: null,
                    email: null
                }
            }
        },

        mounted() {
            this.syncRoleAttributes();
        },

        methods: {
            syncRoleAttributes() {
                if(this.role !== null) {
                    this.form.position_id = this.role.position_id;
                    this.form.group_id = this.role.group_id;
                    this.form.email = this.role.data.email;
                    this.form.role_name = this.role.data.role_name;
                }
            },

            saveRole() {
                if(this.role !== null) {
                    this.updateRole();
                } else {
                    this.createRole();
                }
            },

            updateRole() {
                this.$control.role().update(this.role.id, this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not update the role.'));
            },

            createRole() {
                this.$control.role().create(this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not save the role.'));
            },

            newGroupId(event) {
                this.form.group_id = event;
            },

            newPositionId(event) {
                this.form.position_id = event;
            }
        },

    }
</script>

<style scoped>

</style>
