<script>
import { getAllTypeService, getService, editService } from '../../services/gestionServices';


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
        this.fetchData()
        this.fetchTypeService()
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
            const response = await getService(id)
            this.data = {
                intitule_ser: response.intitule_ser,
                description_ser: response.description_ser,
                id_type_ser: response.id_type_ser
            }
        },
        async fetchTypeService() {
            const response = await getAllTypeService()
            this.type_ser = response
        },
        async editData() {
            this.isLoading = true
            try {
                const id = this.$route.params.id
                const response = await editService(this.data, id)
                if (response.status === 200) {
                    this.isLoading = false
                    this.sweetAlert('success', response.message)
                    this.$router.push('/back-office/services')
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

        <h1 class="h3 mb-2 text-gray-800">Service</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Modification du service</h6>
            </div>
            <div class="card-body">

                <form @submit.prevent="editData">
                    <div class="mb-3">
                        <label for="intitule_ser" class="form-label">Intitulé du service</label>
                        <input type="text" class="form-control" v-model="data.intitule_ser" id="intitule_ser" required>
                    </div>
                    <div class="mb-3">
                        <label for="description_ser" class="form-label">Description du service</label>
                        <input type="text" class="form-control" v-model="data.description_ser" id="description_ser"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="type_ser" class="form-label">Type de service</label>
                        <select class="form-select" required id="typer_ser" v-model="data.id_type_ser">
                            <option v-for="(row, index) in type_ser" :key="index" :value="row.id">{{
                                row.libelle_type_ser }}</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" :disabled="isLoading">Enregistrer</button>
                </form>
            </div>
        </div>

    </div>
</template>