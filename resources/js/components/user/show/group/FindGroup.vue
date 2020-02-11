<template>
    <div>
        <b-form-select :options="groupOptions" @input="groupSelected"></b-form-select>
    </div>
</template>

<script>
    export default {
        name: "FindGroup",

        props: {},

        data() {
            return {
                groups: []
            }
        },

        created() {
            this.$control.group().all()
                .then(response => this.groups = response.data)
                .catch(error => this.$notify.alert('Could not load groups'));

        },

        methods: {
            groupSelected(groupId) {
                let groups = this.groups.filter(group => group.id === groupId)
                if(groups.length === 1) {
                    this.$emit('input', groups[0]);
                } else {
                    this.$notify.alert('Could not select group');
                }
            }
        },

        computed: {
            groupOptions() {
                return this.groups.map(group => {
                    return {
                        value: group.id,
                        text: group.data.name
                    };
                })
            }
        }
    }
</script>

<style scoped>

</style>
