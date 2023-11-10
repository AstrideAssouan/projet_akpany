<script>
import { addEmploi, getCategories } from '../../services/gestionServices';

export default {
    data() {
        return {
            data: {
                intitule_poste: '',
                date_publication: '',
                date_limite: '',
                niveau_etude: '',
                lieu: '',
                type_offre: '',
                description_poste: '',
                missions: '',
                remuneration: '',
                categorie_id: null,
            },
            isLoading: false,
            category: [],
        }
    },
    mounted() {
        this.fetchCategory()
    },
    methods: {
        sweetAlert(icon, message) {
            this.$swal.fire({
                icon: icon,
                text: message,
            })
        },
        async fetchCategory() {
            const response = await getCategories()
            this.category = response
        },
        async addData() {
            this.isLoading = true
            try {
                const response = await addEmploi(this.data)
                if (response.status === 200) {
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
        }
    }
}
</script>

<template>
    <form @submit.prevent="addData">
        <div class="modal fade" id="publicModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un emploi</h5>
                        <button type="button" class="text-primary" data-bs-dismiss="modal" aria-label="Close"><i
                                class="bx bx-x"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="intitule_poste" class="form-label">Intitulé du poste</label>
                            <input type="text" v-model="data.intitule_poste" class="form-control" id="intitule_poste"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="description_poste" class="form-label">Description du poste</label>
                            <textarea class="form-control" v-model="data.description_poste" id="description_poste" required
                                cols="30" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="type_ser" class="form-label">Categorie</label>
                            <select class="form-select" v-model="data.categorie_id" required id="typer_ser">
                                <option v-for="(row, index) in category" :key="index" :value="row.id">{{ row.libelle_cat }}
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="niveau_etude" class="form-label">Niveau d'étude</label>
                            <input type="text" v-model="data.niveau_etude" class="form-control" id="niveau_etude" required>
                        </div>
                        <div class="mb-3">
                            <label for="type_offre" class="form-label">Type de l'offre</label>
                            <select class="form-select" v-model="data.type_offre" id="type_offre" required>
                                <option value="stage">Stage</option>
                                <option value="cdd">CDD</option>
                                <option value="cdi">CDI</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="missions" class="form-label">Missions</label>
                            <textarea class="form-control" v-model="data.missions" id="missions" cols="30"
                                rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="lieu" class="form-label">Lieu</label>
                            <select class="form-select" v-model="data.lieu" id="lieu" required>
                                <option value="sur_site">Sur site</option>
                                <option value="a_distance">À distance</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="remunération" class="form-label">Remunération</label>
                            <input type="text" v-model="data.remuneration" class="form-control" id="remunération" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_publication" class="form-label">Date de publication</label>
                            <input type="date" v-model="data.date_publication" class="form-control" id="date_publication"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="date_limite" class="form-label">Date limite</label>
                            <input type="date" v-model="data.date_limite" class="form-control" id="date_limite" required>
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
