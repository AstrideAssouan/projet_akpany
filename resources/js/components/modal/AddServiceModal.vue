<script>
import { addService, getAllTypeService } from '../../services/gestionServices'


export default {
    data() {
        return {
            data: {
                intitule_ser: '',
                description_ser: '',
                id_type_ser: null
            },
            type_ser: [],
            isLoading: false
        }
    },
    mounted() {
        this.fetchTypeService()
    },
    methods: {
        sweetAlert(icon, message) {
            this.$swal.fire({
                icon: icon,
                text: message,
            })
        },
        async fetchTypeService() {
            const response = await getAllTypeService()
            this.type_ser = response
        },

        async addData() {
            this.isLoading = true
            try {
                const response = await addService(this.data)
                if (response.status == 200) {
                    this.isLoading = false
                    this.sweetAlert('success', response.message)
                    this.$emit('nouvelleEntreeAjoutee');
                    this.closeModal()
                    this.resetForm()
                } else {
                    this.isLoading = false
                    this.sweetAlert('error', response.message)
                }

            } catch (error) {
                this.isLoading = false
                this.sweetAlert('error', error.message)
            }
        },
        closeModal() {
            const modal = document.getElementById('publicModal');
            modal.classList.remove('show');
            modal.style.display = 'none';
            const backdrop = document.getElementsByClassName('modal-backdrop')[0];
            backdrop.remove();
        },
        resetForm() {
            var self = this; 
            Object.keys(this.data).forEach(function (key, index) {
                self.data[key] = '';
            });
        },
    }
}
</script>

<template>
    <div class="modal fade" id="publicModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <form @submit.prevent="addData">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un service</h5>
                        <button type="button" class="text-primary" data-bs-dismiss="modal" aria-label="Close"><i
                                class="bx bx-x"></i></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="intitule_ser" class="form-label">Intitulé du service</label>
                            <input type="text" class="form-control" v-model="data.intitule_ser" id="intitule_ser" required>
                        </div>
                        <div class="mb-3">
                            <label for="description_ser" class="form-label">Description du service</label>
                            <!-- <input type="text" class="form-control" v-model="data.description_ser" id="description_ser"
                                required> -->
                            <textarea type="text" class="form-control" v-model="data.description_ser" id="description_ser"
                            required cols="30" rows="10" ></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="type_ser" class="form-label">Type de service</label>
                            <select class="form-select" required id="type_ser" v-model="data.id_type_ser">
                                <option v-for="(row, index) in type_ser" :key="index" :value="row.id">{{
                                    row.libelle_type_ser }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" :disabled="isLoading">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>