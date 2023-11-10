<script>
import AddUserModal from '../components/modal/AddUserModal.vue';
import { getAllService, deleteAdmin } from '../services/authService';

export default {
    components: {
        AddUserModal,
    },
    data() {
        return {
            data: [],
            message: '',
            search: '',
            currentPage: 1,
            perPage: 0,
            total: 0,
            filteredData: [],
            isLoading: false,
        }
    },
    computed: {
        filtered() {
            if (!this.data || this.data.length <= 0) {
                return []
            }
            return this.data.filter(data => {
                // Filtrer les utilisateurs en fonction de la recherche
                const search = this.search.toLowerCase()
                const nom = data.nom.toLowerCase().includes(search)
                const prenom = data.prenom.toLowerCase().includes(search)
                const email = data.email.toLowerCase().includes(search)

                return (
                    nom ||
                    prenom ||
                    email
                )
            })
        },
        paginated() {
            const startIndex = (this.currentPage - 1) * this.perPage
            const endIndex = startIndex + this.perPage
            return this.filteredData.slice(startIndex, endIndex)
        },
        totalPages() {
            return Math.ceil(this.total / this.perPage) // Calculer le nombre total de pages
        },
        displayedPages() {
            const range = 2 // Nombre de pages à afficher de chaque côté de la page actuelle
            const start = Math.max(1, this.currentPage - range) // Page de départ
            const end = Math.min(this.totalPages, this.currentPage + range) // Page de fin
            return Array.from({ length: end - start + 1 }, (_, i) => start + i) // Générer un tableau avec les pages à afficher
        },
    },
    watch: {
        data: {
            handler() {
                // Mettre à jour filteredData lorsque data change
                this.filteredData = this.filtered
            },
            immediate: true, // Pour déclencher le watch dès le montage initial
        },
        search() {
            this.currentPage = 1 // Réinitialiser la page actuelle à la première page lors de la recherche
            this.index(this.currentPage) // Appeler la méthode index() pour récupérer les utilisateurs correspondant à la recherche
        },
    },
    mounted() {
        this.index(this.currentPage)
    },
    methods: {
        async index(currentPage) {
            const response = await getAllService(this.search, currentPage)
            this.data = [...response.data]
            this.total = response.total
            this.perPage = response.per_page
        },
        
        nouvelleEntreeAjoutee() {
            this.index(this.currentPage)
        },
        async deleteData(id) {
            this.isLoading = true
            try {
                const response = await deleteAdmin(id)
                if (response.status === 200) {
                    this.isLoading = false
                    this.index(this.currentPage)
                }
            } catch (error) {
                console.log(error);
                this.isLoading = false
            }
        },
        goToPage(page) {
            if (page !== this.currentPage) {
                this.currentPage = page
                this.index(this.currentPage)
            }
        },
        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.currentPage++
                this.index(this.currentPage)
            }
        },
        prevPage() {
            if (this.currentPage > 1) {
                this.currentPage--
                this.index(this.currentPage)
            }
        },
    }
}
</script>

<template>
    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Utilisateurs</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Liste des utilisateurs</h6>
            </div>
            <div class="card-body">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#publicModal">Ajouter</button>
                    <div class="row">
                        <label for="search" class="col-sm-4 col-form-label">Recherche : </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="search" v-model="search">
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(row, index) in filteredData" :key="index">
                                <td>{{ row.nom }}</td>
                                <td>{{ row.prenom }}</td>
                                <td>{{ row.email }}</td>
                                <td v-for="role in row.roles">{{ role.nom_role }}</td>
                                <td class="d-flex align-items-center">
                                    <button class="btn btn-secondary mx-1" type="button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Permissions"
                                        @click="$router.push(`/back-office/user/permission/edit/${row.id}`)"><i
                                            class="bx bx-lock"></i></button>
                                    <button class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Modifier" @click="$router.push(`/back-office/user/edit/${row.id}`)"><i
                                            class="bx bx-edit"></i></button>
                                    <button class="btn btn-danger mx-1" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Supprimer" :disabled="isLoading" @click="deleteData(row.id)"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>

</div>

<AddUserModal @nouvelleEntreeAjoutee="nouvelleEntreeAjoutee" /></template>