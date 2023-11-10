<script>
import { getEmploi } from '../../services/gestionServices';


export default {
    data(){
        return{
            data:[],
        }
    },
    mounted(){
        this.fetchData()
    },
    methods:{
        async fetchData(){
            const id = this.$route.params.id
            const response = await getEmploi(id)
            this.data = response
        }
    }
}
</script>

<template>
    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Emploi</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informations détaillées sur l'emploi</h6>
            </div>
            <div class="card-body">
                
                <div class="d-flex align-items-center">
                        <ul>
                            <li>Intitulé du poste : {{ data.intitule_poste }}</li>
                            <li>Niveau d'étude : {{ data.niveau_etude }}</li>
                            <li>Secteur d'activité : {{ data.secteur_activite }}</li>
                            <li>Missions : {{ data.missions }}</li>
                            <li>Remunération : {{ data.remuneration }}</li>
                            <li>Description du poste : {{ data.description_poste }}</li>
                            <li>Date de publication : {{ data.date_publication }}</li>
                            <li>Date limite : {{ data.date_limite }}</li>
                            <li>Catégorie : </li>
                        </ul>
                </div>
            </div>
        </div>

    </div>
</template>