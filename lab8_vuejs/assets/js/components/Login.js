const Login = {
    template: `
        <section class="login-container">
            <div class="login-box">
                <span class="eyebrow">Praktikum 13</span>
                <h2>Form Login Admin SPA</h2>
                <p class="login-hint">
                    Login ini memakai endpoint API CodeIgniter 4 <code>/api/login</code>.
                    Token dari server disimpan di localStorage untuk dipakai Axios Interceptors.
                </p>
                <form @submit.prevent="handleLogin">
                    <div class="form-group">
                        <label>Username / Email</label>
                        <input type="text" v-model="username" placeholder="admin@email.com" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" v-model="password" placeholder="admin123" required>
                    </div>
                    <button type="submit" class="btn-login" :disabled="isLoading">
                        {{ isLoading ? 'Memproses...' : 'Masuk Aplikasi' }}
                    </button>
                </form>
                <p v-if="errorMessage" class="error-msg">{{ errorMessage }}</p>
                <p class="default-login">Default: <strong>admin@email.com</strong> / <strong>admin123</strong></p>
            </div>
        </section>
    `,
    data() {
        return {
            username: '',
            password: '',
            errorMessage: '',
            isLoading: false,
        }
    },
    methods: {
        handleLogin() {
            this.errorMessage = ''
            this.isLoading = true

            axios.post(apiUrl + '/api/login', {
                username: this.username,
                password: this.password,
            })
                .then(response => {
                    if (response.data.status === 200 && response.data.data.token) {
                        localStorage.setItem('isLoggedIn', 'true')
                        localStorage.setItem('userToken', response.data.data.token)
                        localStorage.setItem('username', response.data.data.username || this.username)

                        window.dispatchEvent(new Event('auth-changed'))
                        this.$router.push('/artikel')
                    }
                })
                .catch(error => {
                    if (error.response && error.response.data && error.response.data.messages) {
                        this.errorMessage = typeof error.response.data.messages === 'string'
                            ? error.response.data.messages
                            : 'Username atau password salah.'
                    } else {
                        this.errorMessage = 'Terjadi kesalahan jaringan atau server.'
                    }
                })
                .finally(() => {
                    this.isLoading = false
                })
        },
    },
};
