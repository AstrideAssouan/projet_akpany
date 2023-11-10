<script>
import { getCandidat, getEmploi } from '../../services/gestionServices';

export default {
    data(){
        return{
            candidatData: [],
            emploiData: [],
        }
    },
    mounted(){
        this.fetchCandidatData()
        this.fetchEmploiData()
    },
    methods:{
        async fetchCandidatData(){
            const id = this.$route.params.id
            const response = await getCandidat(id)
            this.candidatData = response
            console.log(this.candidatData);
        },
        async fetchEmploiData(){
            const id = this.$route.params.id
            const response = await getEmploi(id)
            this.emploiData = response
            console.log(this.emploiData);
        },
    }
}
</script>



<template>
    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Candidats</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Information du candidat</h6>
            </div>
            <div class="card-body">
                
                <div class="d-flex align-items-center">
                        <ul>
                            <li>Nom : {{ candidatData.nom }}</li>
                            <li>Prénom : {{ candidatData.prenom }}</li>
                            <li>Email : {{ candidatData.email }}</li>
                            <li>Numéro de téléphone : {{ candidatData.numero_telephone }}</li>
                            <li>Lieu de résidence : {{ candidatData.lieu_residence }}</li>
                            <li>Niveau : {{ candidatData.niveau }}</li>
                            <!-- <li class="list-unstyled mt-4"><a href="#" class="btn btn-danger" @click="getScreenUrl(row.cv_pdf)">Télécharger son cv</a></li> -->
                        </ul>
                        <ul class="mx-5">
                            <li>Intitulé du poste : {{ emploiData.intitule_poste }}</li>
                            <li>Niveau d'étude : {{ emploiData.niveau_etude }}</li>
                            <li>Secteur d'activité : {{ emploiData.secteur_activite }}</li>
                            <li>Missions : {{ emploiData.missions }}</li>
                            <li>Remunération : {{ emploiData.remuneration }}</li>
                            <li>Description du poste : {{ emploiData.description_poste }}</li>
                            <li>Date de publication : {{ emploiData.date_publication }}</li>
                            <li>Date limite : {{ emploiData.date_limite }}</li>
                            <li>Catégorie : {{ emploiData.categorie_id }}</li>
                        </ul>
                </div>
            </div>
        </div>

    </div>
</template>