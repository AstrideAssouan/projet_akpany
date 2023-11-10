<script>
import { API_LINK } from '../constant'
import { getAllCandidat } from '../services/gestionServices'

export default {

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
                const numero = data.numero.toString().includes(search)
                const lieu_residence = data.lieu_residence.toLowerCase().includes(search)
                const niveau = data.niveau.toLowerCase().includes(search)

                return (
                    nom ||
                    prenom ||
                    email ||
                    numero ||
                    lieu_residence ||
                    niveau
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
            const response = await getAllCandidat(this.search, currentPage) // Passer le terme de recherche à l'appel à l'API
            this.data = [...response.data] // Mettre à jour les données
            this.total = response.total

            this.perPage = response.per_page
        },

        getScreenUrl(screen) {
            if (screen) {
                window.open(`${API_LINK}/public/${screen}`, '_blank');
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

        <h1 class="h3 mb-2 text-gray-800">Candidatures</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Liste des candidats</h6>
            </div>
            <div class="card-body">
                <div class="mb-3 d-flex justify-content-end align-items-center">
                    <div class="row">
                        <label for="search" class="col-sm-4 col-form-label">Recherche : </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="search">
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénoms</th>
                                <th>Email</th>
                                <th>Numéro</th>
                                <th>Lieu de résidence</th>
                                <th>Niveau</th>
                                <th>Lettre de motivation</th>
                                <th>CV</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(row, index) in filteredData" :key="index">
                                <td>{{ row.nom }}</td>
                                <td>{{ row.prenom }}</td>
                                <td>{{ row.email }}</td>
                                <td>{{ row.numero }}</td>
                                <td>{{ row.lieu_residence }}</td>
                                <td>{{ row.niveau }}</td>
                                <td>{{ row.lettre }}</td>
                                <td><button class="btn btn-danger" @click="getScreenUrl(row.cv_pdf)">Cliquez ici</button>
                                </td>
                                <td class="d-flex align-items-center">
                                    <button class="btn btn-primary mx-3"
                                    @click="$router.push(`/back-office/candidats/show/${row.id}`)"><i
                                            class="bx bx-show"></i></button>
                                    <button class="btn btn-danger" :disabled="isLoading" @click="deleteData(row.id)"><i
                                            class="bx bx-trash"></i></button>
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
</template>