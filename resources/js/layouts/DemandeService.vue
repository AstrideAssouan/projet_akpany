<script>
import { API_LINK } from '../constant'
import { getAllClient, getAllSer } from '../services/gestionServices'

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
            service: []
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
                const contact = data.contact.toLowerCase().includes(search)

                return (
                    nom ||
                    prenom ||
                    email ||
                    contact
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
        this.index(this.currentPage);
        this.services();
    },


    methods: {
        // async index(currentPage) {
        //     try {
        //         const response = await getAllClient(this.search, currentPage);
        //         this.data = [...response.data];
        //         this.total = response.total;
        //         this.perPage = response.per_page;
        //     } catch (error) {
        //         console.error(error);
        //     }
        // },
        // // ...

        getLibelleService(id_ser) {
    if (!Array.isArray(this.service) || this.service.length <= 0) {
        return '';
    }

    const matchingItem = this.service.find(item => item.id === id_ser);
    return matchingItem ? matchingItem.intitule_ser : '';
},

        // ...
        // async fetchService() {
        //     const response = await getAllSer()
        //     this.service = response
        //     console.log(this.service);
        // },
        async index(currentPage) {
            const response = await getAllClient(this.search, currentPage) // Passer le terme de recherche à l'appel à l'API
            this.data = [...response.data] // Mettre à jour les données
            this.total = response.total
            this.perPage = response.per_page
        },

        async services() {
            const response = await getAllSer()
            this.service = response
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
        }
    }
}

</script>

<template>
    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Demande de services</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Liste des demandes de services</h6>
            </div>
            <div class="card-body">
                <div class="mb-3 d-flex justify-content-end align-items-center">
                    <div class="row">
                        <label for="search" class="col-sm-4 col-form-label">Recherche : </label>
                        <div class="col-sm-8">
                            <input type="text" v-model="search" class="form-control" id="search">
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
                                <th>Contact</th>
                                <th>Besoins</th>
                                <th>Service</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(row, index) in filteredData" :key="index">
                                <td>{{ row.nom }}</td>
                                <td>{{ row.prenom }}</td>
                                <td>{{ row.email }}</td>
                                <td>{{ row.contact }}</td>
                                <td>{{ row.besoin }}</td>
                                <td>{{ getLibelleService(row.service_id) }}</td>
                                <!-- <td v-for="(type, index) in typeService" :key="index"><i
                                        v-if="row.service_id === type.id">{{ type.service }}</i></td> -->
                                <td class="d-flex align-items-center">
                                    <button class="btn btn-danger mx-3"><i class="bx bx-trash"></i></button>
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