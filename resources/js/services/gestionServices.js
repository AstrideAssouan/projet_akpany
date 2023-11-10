import { api } from "../api";

export async function addTypeService(formdata) {
    try {
        const response = await api.post('/add-type-service', formdata)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function editTypeService(formdata, id) {
    try {
        const response = await api.post(`/edit-type-service?id=${id}`, formdata)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function getAllTypeService() {
    try {
        const response = await api.get('/get-type-service')
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function getTypeService(id) {
    try {
        const response = await api.get(`/get-one-type-service?id=${id}`)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function deleteTypeService(id){
    try {
        const response = await api.delete(`/delete-type-service?id=${id}`)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
        console.log(error);
    }
}

export async function addService(formdata) {
    try {
        const response = await api.post('/add-service', formdata)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function editService(formdata, id) {
    try {
        const response = await api.post(`/edit-service?id=${id}`, formdata)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function getAllService(search='', currentPage){
    try {
        const response = await api.get(`/get-service?page=${currentPage}&search=${search}`)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function getAllSer(){
    try {
        const response = await api.get(`/get-all-service`)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function getAllClient(search='',currentPage){
    try {
        const response = await api.get(`/get-demande?page=${currentPage}&search=${search}`)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function getService(id){
    try {
        const response = await api.get(`/get-one-service?id=${id}`)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function deleteService(id){
    try {
        const response = await api.delete(`/delete-service?id=${id}`)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function addCategorie(formdata) {
    try {
        const response = await api.post('/add-categorie', formdata)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function editCategorie(formdata, id) {
    try {
        const response = await api.post(`/edit-categorie?id=${id}`, formdata)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function getCategories() {
    try {
        const response = await api.get('/get-categorie')
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function getCategorie(id) {
    try {
        const response = await api.get(`/get-one-categorie?id=${id}`)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function deleteCategorie(id){
    try {
        const response = await api.delete(`/delete-categorie?id=${id}`)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function addEmploi(formdata) {
    try {
        const response = await api.post('/add-emploi', formdata)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function editEmploi(formdata, id) {
    try {
        const response = await api.post(`/edit-emploi?emploi_id=${id}`, formdata)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function getAllEmploi(search='', currentPage){
    try {
        const response = await api.get(`/get-emploi?page=${currentPage}&search=${search}`)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function getEmploi(id){
    try {
        const response = await api.get(`/get-one-emploi?emploi_id=${id}`)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function deleteEmploi(id){
    try {
        const response = await api.delete(`/delete-emploi?emploi_id=${id}`)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

export async function getCandidat(id){
    try {
        const response = await api.get(`/get-one-candidat?client_id=${id}`)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

// export async function getCandidat(id){
//     try {
//         const response = await api.get(`/get-one-candidat?id=${id}`)
//         return response.data
//     } catch (error) {
//         throw Error("Une erreur est survenue !")
//     }

// }

export async function getAllCandidat(search='', currentPage){
    try {
        const response = await api.get(`/get-candidat?page=${currentPage}&search=${search}`)
        return response.data
    } catch (error) {
        throw Error("Une erreur est survenue !")
    }
}

