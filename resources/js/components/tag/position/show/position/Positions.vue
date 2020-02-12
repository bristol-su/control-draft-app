<template>
    <div>
        <b-container>
            <b-row>
                <b-col cols="2"><b-button size="md" variant="info" @click="addPosition"><i class="fa fa-plus"/> Add Position</b-button></b-col>
            </b-row>
            <b-row>
                <b-col cols="12">
                    <b-table :fields="fields" :items="positions">
                        <template v-slot:cell(actions)="data">
                            <a :href="'/position/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
                            <b-button size="sm" variant="outline-danger" @click="untagPosition(data.item)">Untag</b-button>
                        </template>
                    </b-table>
                </b-col>
            </b-row>
        </b-container>

        <b-modal id="add-position">
            <add-position :tag="tag" @input="addedPosition"></add-position>
        </b-modal>
    </div>
</template>

<script>
    import AddPosition from './AddPosition';

    export default {
        name: "Index",

        components: {
            AddPosition
        },

        props: {
            tag: {
                required: true,
                type: Object
            }
        },

        data() {
            return {
                positions: [],
                fields: [
                    {key: 'id', label: 'Position ID'},
                    {key: 'data.name', label: 'Name'},
                    {key: 'data.description', label: 'Description'},
                    {key: 'actions', label: 'Actions'}
                ]
            }
        },

        created() {
            this.$control.positionTag().positions(this.tag.id)
                .then(response => this.positions = response.data)
                .catch(error => this.$notify.alert('Could not load positions'));
        },

        methods: {
            untagPosition(position) {
                this.$bvModal.msgBoxConfirm('Are you sure you want to untag this position?', {
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
                        this.$control.positionTag().untagPosition(this.tag.id, position.id)
                            .then(response => {
                                this.$notify.success('Tag removed!');
                                this.positions.splice(this.positions.indexOf(position), 1);
                            })
                            .catch(error => this.$notify.alert('Tag could not be removed.'))
                    }
                });
            },
            addPosition() {
                this.$bvModal.show('add-position');
            },
            addedPosition(position) {
                this.$notify.success('Position added!');
                this.$bvModal.hide('add-position');
                this.positions.push(position);
            }
        }
    }
</script>

<style scoped>

</style>
