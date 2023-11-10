<script>
import AddServiceModal from '../components/modal/AddServiceModal.vue';
import { getAllService, getAllTypeService, deleteService } from '../services/gestionServices';

export default {
    components: {
        AddServiceModal,
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
            typeService: [],
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
                const intitule_ser = data.intitule_ser.toLowerCase().includes(search)
                const description_ser = data.description_ser.toLowerCase().includes(search)

                return (
                    intitule_ser ||
                    description_ser
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
        this.fetchTypeService()
    },
    methods: {
    async confirmUpdateService(id) {
        const confirmed = await this.$swal.fire({
            title: 'Confirmation',
            text: 'Voulez-vous vraiment effectuer cette modification ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, modifier!',
            cancelButtonText: 'Annuler'
        });

        if (confirmed.isConfirmed) {
            // Effectuer la modification ici
            // ...
            this.$swal.fire('Modifié!', 'Le service a été modifié avec succès.', 'success');
        } else {
            this.$swal.fire('Annulé', 'La modification a été annulée.', 'info');
        }
    },
    async confirmDeleteService(id) {
        const confirmed = await this.$swal.fire({
            title: 'Confirmation',
            text: 'Voulez-vous vraiment supprimer ce service ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, supprimer!',
            cancelButtonText: 'Annuler'
        });

        if (confirmed.isConfirmed) {
            // Effectuer la suppression ici
            // ...
            this.$swal.fire('Supprimé!', 'Le service a été supprimé avec succès.', 'success');
        } else {
            this.$swal.fire('Annulé', 'La suppression a été annulée.', 'info');
        }
    },

        async index(currentPage) {
            const response = await getAllService(this.search, currentPage) // Passer le terme de recherche à l'appel à l'API
            this.data = [...response.data] // Mettre à jour les données
            this.total = response.total
            this.perPage = response.per_page
        },
        getLibelleTypeService(id_type_ser) {
            if (this.typeService.length <= 0) {
                return false
            }

            const dataArray = this.typeService;
            const matchingItem = dataArray.find(item => item.id === id_type_ser);
            return matchingItem ? matchingItem.libelle_type_ser : '';
        },
        async fetchTypeService() {
            const response = await getAllTypeService()
            this.typeService = response
        },
        async deleteData(id) {
            this.isLoading = true
            try {
                const response = await deleteService(id)
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

        <h1 class="h3 mb-2 text-gray-800">Services</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Liste des services</h6>
            </div>
            <div class="card-body">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#publicModal">Ajouter un service</button>
                    <div class="row">
                        <label for="search" class="col-sm-4 col-form-label">Recherche : </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" v-model="search" id="search">
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Intitulé du service</th>
                                <th>Description du service</th>
                                <th>Type de service</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(row, index) in filteredData" :key="index">
                                <td>{{ row.intitule_ser }}</td>
                                <td>{{ row.description_ser }}</td>
                                <td>{{ getLibelleTypeService(row.id_type_ser) }}</td>

                                <td class="d-flex align-items-center">
                                    <button class="btn btn-warning" @click="$router.push(`/back-office/services/edit/${row.id}`)"><i
                                            class="bx bx-edit"></i></button>
                                    <button class="btn btn-danger mx-3" :disabled="isLoading" @click="deleteData(row.id)"><i
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

    <AddServiceModal @nouvelleEntreeAjoutee="nouvelleEntreeAjoutee" />
</template>