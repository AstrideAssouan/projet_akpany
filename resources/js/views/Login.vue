<script>
import { login } from '../services/authService';

export default {
    data() {
        return {
            user: {
                email: '',
                password: ''
            },
            isLoading: false
        }
    },
    methods: {
        sweetAlert(icon, message) {
            this.$swal.fire({
                icon: icon,
                text: message,
            })
        },
        submitData() {
            this.isLoading = true
            try {
                const response = login(this.user)
                response.then((res) => {
                    if (res.status === 200) {
                        this.isLoading = false
                        localStorage.setItem('admin', JSON.stringify(res.data))
                        localStorage.setItem('auth_token', res.token)
                        this.sweetAlert('success', res.message)
                        this.$router.push('/back-office/dashboard')
                    } else {
                        this.isLoading = false
                        this.sweetAlert('error', res.message)
                    }
                }).catch((error) => {
                    this.sweetAlert('error', error.message)
                })
            } catch (error) {
                this.isLoading = false
                this.sweetAlert('error', error.message)
            }
        }
    }
}
</script>

<template>
    <div class="" style="min-height: 100vh;">
        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden  my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                    
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Content de te revoir !</h1>
                                        </div>
                                        <form class="user" @submit.prevent="submitData">
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user"
                                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                                    placeholder="Entrer votre adresse email ..." v-model="user.email">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" placeholder="Mot de passe"
                                                    v-model="user.password">
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block"
                                                :disabled="isLoading">
                                                Connexion
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</template>