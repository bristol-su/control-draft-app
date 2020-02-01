<template>
	<div>
		<b-container>
            <b-row>
                <b-col cols="2"></b-col>
                <b-col cols="8"><h2 style="text-align: center">Positions</h2></b-col>
                <b-col cols="2"><b-button size="md" variant="info" @click="createPosition"><i class="fa fa-plus"/> New Position</b-button></b-col>
            </b-row>
            <b-row>
                <b-col cols="12">
                    <b-table :fields="fields" :items="positions">
                        <template v-slot:cell(actions)="data">
                            <b-button size="sm" variant="outline-info" @click="editPosition(data.item)">Edit</b-button>
                            <a :href="'/position/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
                            <b-button size="sm" variant="outline-danger" @click="deletePosition(data.item)">Delete</b-button>
                        </template>
                    </b-table>
                </b-col>
            </b-row>
        </b-container>

        <b-modal id="edit-position">
            <edit :position="editingPosition" @input="updatedPosition"></edit>
        </b-modal>
    </div>
</template>

<script>
	import Edit from './Edit';

	export default {
		name: "Index",

		components: {
            Edit
        },

        data() {
            return {
                positions: [],
                editingPosition: null,
                fields: [
                    {key: 'id', label: 'Position ID'},
                    {key: 'data.name', label: 'Name'},
                    {key: 'data.description', label: 'Description'},
                    {key: 'actions', label: 'Actions'}
                ]
            }
        },

        created() {
        	this.$control.position().all()
        		.then(response => this.positions = response.data)
                .catch(error => this.$notify.alert('Could not load positions'))
        },

        methods: {
        	deletePosition(position) {
                this.$bvModal.msgBoxConfirm('Are you sure you want to delete this position?', {
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
                        this.$control.position().delete(position.id)
                            .then(response => {
                                this.$notify.success('Position deleted!');
                                this.positions.splice(this.positions.indexOf(position), 1);
                            })
                            .catch(error => this.$notify.alert('Position could not be deleted.'))
                    }
                });
            },
            editPosition(position) {
                this.editingPosition = position;
                this.$bvModal.show('edit-position');
            },
            createPosition() {
                this.editingPosition = null;
                this.$bvModal.show('edit-position');
            },

            updatedPosition(position) {
                this.positions.splice(this.positions.indexOf(this.editingPosition), 1, position);
                this.$bvModal.hide('edit-position');
                this.editingPosition = null;
            }
        }
	}
</script>