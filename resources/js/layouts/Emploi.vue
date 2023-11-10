<script>
import AddEmploiModal from '../components/modal/AddEmploiModal.vue';
import { getAllEmploi, deleteEmploi } from '../services/gestionServices';

export default {
    components: {
        AddEmploiModal
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
                const intitule_poste = data.intitule_poste.toLowerCase().includes(search)
                const date_publication = data.date_publication.toLowerCase().includes(search)
                const date_limite = data.date_limite.toLowerCase().includes(search)
                const niveau_etude = data.niveau_etude.toString().includes(search)
                const remuneration = data.remuneration.toLowerCase().includes(search)
                const type_offre = data.type_offre.toLowerCase().includes(search)

                return (
                    intitule_poste ||
                    date_publication ||
                    date_limite ||
                    niveau_etude ||
                    remuneration ||
                    type_offre 
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
            const response = await getAllEmploi(this.search, currentPage) // Passer le terme de recherche à l'appel à l'API
            this.data = [...response.data] // Mettre à jour les données
            this.total = response.total

            this.perPage = response.per_page
        },
        async deleteData(id) {
            this.isLoading = true
            try {
                const response = await deleteEmploi(id)
                if (response.status === 200) {
                    this.isLoading = false
                    this.index(this.currentPage)
                }
            } catch (error) {
                console.log(error);
                this.isLoading = false
            }
        },
        nouvelleEntreeAjoutee() {
            this.index(this.currentPage)
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

        <h1 class="h3 mb-2 text-gray-800">Emploi</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Liste des emplois disponibles</h6>
            </div>
            <div class="card-body">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#publicModal">Ajouter un emploi</button>
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
                                <th>Poste</th>
                                <th>Niveau d'étude</th>
                                <th>Secteur d'activité</th>
                                <th>Remunération</th>
                                <th>Date de publication</th>
                                <th>Date limite</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(row, index) in filteredData" :key="index">
                                <td>{{ row.intitule_poste }}</td>
                                <td>{{ row.niveau_etude }}</td>
                                <td>{{ row.secteur_activite }}</td>
                                <td>{{ row.remuneration }}</td>
                                <td>{{ row.date_publication }}</td>
                                <td>{{ row.date_limite }}</td>
                                <td class="d-flex align-items-center">
                                    <button class="btn btn-primary" @click="$router.push(`/back-office/emploi/show/${row.id}`)"><i class="bx bx-show"></i></button>
                                    <button class="btn btn-warning mx-3" @click="$router.push(`/back-office/emploi/edit/${row.id}`)"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-danger" :disabled="isLoading" @click="deleteData(row.id)"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <nav aria-label="Page navigation example" style="cursor: pointer;">
                        <ul class="pagination">
                            <li class="page-item" :class="{ 'cursor-pointer disabled': currentPage <= 1 }">
                                <a class="page-link" @click="prevPage">Previous</a>
                            </li>
                            <li class="page-item" v-for="page in displayedPages" :key="page"
                                :class="{ 'active': currentPage === page }">
                                <a class="page-link" @click="goToPage(page)">{{ page }}</a>
                            </li>
                            <li class="page-item" :class="{ 'cursor-pointer disabled': currentPage >= totalPages }">
                                <a class="page-link" @click="nextPage">Next</a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>

    </div>

    <AddEmploiModal @nouvelleEntreeAjoutee="nouvelleEntreeAjoutee" />
</template>