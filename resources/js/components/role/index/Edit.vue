<template>
    <div>
        <b-form @submit.prevent="saveRole">

            <group-id-selector :value="form.group_id" @input="newGroupId($event)"></group-id-selector>

            <b-form-group
                id="group-id-group"
                label="Group ID:"
                label-for="groupid"
            >
                <b-form-input
                    id="groupid"
                    v-model="form.group_id"
                    type="number"
                    disabled="disabled"
                />
            </b-form-group>

            <b-form-group id="position-id-group" label="Position ID:" label-for="positionid">
                <b-form-input
                    id="positionid"
                    v-model="form.position_id"
                    placeholder="Enter position id"
                />
            </b-form-group>


            <b-button type="submit" variant="primary">Submit</b-button>
        </b-form>
    </div>
</template>

<script>
    import GroupIdSelector from './GroupIdSelector';

    export default {
        name: "Edit",

        components: {
            GroupIdSelector
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
                    position_name: null,
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
                //this.form.
            }
        },

    }
</script>

<style scoped>

</style>
