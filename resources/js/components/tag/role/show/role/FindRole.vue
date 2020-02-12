<template>
    <div>
        <b-form-group id="role-group" label="Role:" label-for="role">
            <b-form-select
                id="role"
                v-model="role_selected"
                @change="onChange($event)"
            >
                <option v-for="item in roles" :value="item.id" >
                    {{ item.data.role_name }}
                </option>
            </b-form-select>
        </b-form-group>
    </div>
</template>

<script>
    export default {
        name: "FindRole",

        props: {
            value: {
                type: Number,
                required: false,
                default: 0
            }
        },

        watch: {
            value: {
                handler: function() {
                    this.syncValue();
                },
                deep: true
            }
        },

        data() {
            return {
                role_selected: null,
                roles: []
            }
        },

        mounted() {
            this.syncValue();
        },

        created() {
            this.$control.role().all()
                .then(response => this.roles = response.data)
                .catch(error => this.$notify.alert('Could not load roles'))
        },

        methods: {
            syncValue() {
                if (this.value !== 0) {
                    this.role_selected = this.value;
                }
            },


            onChange(event) {
                this.$emit('input', event);
            }
        }
    }
</script>