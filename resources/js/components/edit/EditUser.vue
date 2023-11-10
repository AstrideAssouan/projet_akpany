<script>
import { getRole, getAdmin, editAdmin } from '../../services/authService';


export default {
    data() {
        return {
            data: {
                nom: '',
                prenom: '',
                email: '',
                role: null,
            },
            role: [],
            isLoading: false
        }
    },
    mounted() {
        this.fetchData()
        this.fetchRole()
    },
    methods: {

        handleErrorResponse(response) {
            this.isLoading = false;
            if (response.status === 400) {
                // Mauvaise requête (bad request), par exemple, des données invalides ont été envoyées.
                this.sweetAlert('error', 'Les données soumises sont invalides.');
            } else if (response.status === 401) {
                // Non autorisé (Unauthorized), par exemple, l'utilisateur n'est pas authentifié.
                this.sweetAlert('error', 'Vous n\'êtes pas autorisé à effectuer cette action.');
            } else if (response.status === 500) {
                // Erreur serveur (Internal Server Error), une erreur côté serveur s'est produite.
                this.sweetAlert('error', 'Une erreur interne du serveur s\'est produite. Veuillez réessayer plus tard.');
            } else {
                // Autres cas d'erreur non gérés.
                this.sweetAlert('error', 'Une erreur inattendue s\'est produite.');
            }
        },
        sweetAlert(icon, message) {
            this.$swal.fire({
                icon: icon,
                text: message,
            })
        },
        async fetchData() {
            const id = this.$route.params.id
            const response = await getAdmin(id)
            this.data = {
                nom: response.nom,
                prenom: response.prenom,
                email: response.email,
                role: response.roles[0].nom_role,
            }
        },
        async fetchRole() {
            const response = await getRole()
            this.role = response
        },
        async editData() {
            this.isLoading = true;
            try {
                const id = this.$route.params.id;
                const response = await editAdmin(this.data, id);
                if (response.status === 200) {
                    this.isLoading = false;
                    this.sweetAlert('success', response.message);
                    this.$router.push('/back-office/user');
                } else {
                    this.handleErrorResponse(response);
                }
            } catch (error) {
                this.handleErrorResponse(error);
            }
        },

    }
}
</script>

<template>
    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Administration</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Modification d'un admin</h6>
            </div>
            <div class="card-body">

                <form @submit.prevent="editData">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" v-model="data.nom" id="nom" required>
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prenom</label>
                        <input type="text" class="form-control" v-model="data.prenom" id="prenom" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Tarif</label>
                        <input type="email" class="form-control" v-model="data.email" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" required id="role" v-model="data.role">
                            <option v-for="(row, index) in role" :key="index" :value="row.nom_role">{{
                                row.nom_role }}</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" :disabled="isLoading">Enregistrer</button>
                </form>
            </div>
        </div>

    </div>
</template>