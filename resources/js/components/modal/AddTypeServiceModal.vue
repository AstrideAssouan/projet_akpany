<script>
import { addTypeService } from '../../services/gestionServices';

export default {
    data() {
        return {
            data: {
                libelle_type_ser: '',
                tarif: null
            },
            isLoading: false
        }
    },
    methods: {
        sweetAlert(icon, message) {
            this.$swal.fire({
                icon: icon,
                text: message,
            })
        },
        async handleSubmit() {
            this.isLoading = true
            try {
                const response = await addTypeService(this.data)
                if (response.status == 200) {
                    this.sweetAlert('success', response.message)
                    this.isLoading = false
                    this.$emit('nouvelleEntreeAjoutee');
                    this.closeModal()
                    this.resetForm()
                } else {
                    this.sweetAlert('error', response.message)
                    this.isLoading = false
                }
            } catch (error) {
                this.sweetAlert('error', error.message)
                this.isLoading = false
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
        }
    }
}
</script>

<template>
    <form @submit.prevent="handleSubmit">
        <div class="modal fade" id="publicModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un type de service</h5>
                        <button type="button" class="text-primary" data-bs-dismiss="modal" aria-label="Close"><i
                                class="bx bx-x"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="intitule_type_ser" class="form-label">Intitulé type service</label>
                            <input type="text" class="form-control" id="intitule_type_ser" v-model="data.libelle_type_ser"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="tarif" class="form-label">Tarif</label>
                            <input type="number" class="form-control" id="tarif" v-model="data.tarif" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" :disabled="isLoading">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>