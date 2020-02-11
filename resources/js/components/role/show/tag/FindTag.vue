<template>
    <div>
        <b-form-select :options="tagOptions" @input="tagSelected"></b-form-select>
    </div>
</template>

<script>
    export default {
        name: "FindTag",

        props: {},

        data() {
            return {
                tags: []
            }
        },

        created() {
            this.$control.roleTag().all()
                .then(response => this.tags = response.data)
                .catch(error => this.$notify.alert('Could not load tags'));

            console.log(this.tags);
        },

        methods: {
            tagSelected(tagId) {
                let tags = this.tags.filter(tag => tag.id === tagId)
                if(tags.length === 1) {
                    this.$emit('input', tags[0]);
                } else {
                    this.$notify.alert('Could not select tag');
                }
            }
        },

        computed: {
            tagOptions() {
                return this.tags.map(tag => {
                    return {
                        value: tag.id,
                        text: tag.name
                    };
                })
            }
        }
    }
</script>

<style scoped>

</style>
