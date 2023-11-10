<script>
import { getTypeService, editTypeService } from '../../services/gestionServices';


export default {
    data() {
        return {
            data: {
                libelle_type_ser: '',
                tarif:null
            },
            isLoading: false,
        }
    },
    mounted() {
        this.fetchData()
    },
    methods: {
        sweetAlert(icon, message) {
            this.$swal.fire({
                icon: icon,
                text: message,
            })
        },
        async fetchData() {
            const id = this.$route.params.id
            const response = await getTypeService(id)
            this.data = {
                libelle_type_ser: response.libelle_type_ser,
                tarif: response.tarif
            }
        },
        async editData() {
            this.isLoading = true
            try {
                const id = this.$route.params.id
                const response = await editTypeService(this.data, id)
                if (response.status === 200) {
                    this.isLoading = false
                    this.sweetAlert('success', response.message)
                    this.$router.push('/back-office/type-service')
                } else {
                    this.isLoading = false
                    this.sweetAlert('error', response.message)
                }
            } catch (error) {
                this.isLoading = false
                this.sweetAlert('error', error.message)
            }
        },
    }
}
</script>

<template>
    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Type de service</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Modification du type de service</h6>
            </div>
            <div class="card-body">

                <form @submit.prevent="editData">
                    <div class="mb-3">
                        <label for="intitule_type_ser" class="form-label">Intitulé type service</label>
                        <input type="text" class="form-control" id="intitule_type_ser" v-model="data.libelle_type_ser"
                            required>
                    </div>
                    <div class="mb-3">
                            <label for="tarif" class="form-label">Tarif</label>
                            <input type="number" class="form-control" id="tarif" v-model="data.tarif" required>
                        </div>
                    <button type="submit" class="btn btn-primary" :disabled="isLoading">Enregistrer</button>
                </form>
            </div>
        </div>

    </div>
</template>