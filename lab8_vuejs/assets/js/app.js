const { createApp } = Vue
const { createRouter, createWebHashHistory } = VueRouter

// Endpoint REST API CodeIgniter 4 lokal
const apiUrl = 'http://localhost:8080'

// Praktikum 14: Axios Interceptors menyuntikkan token otomatis ke setiap request.
axios.interceptors.request.use(
    (config) => {
        const token = localStorage.getItem('userToken')

        if (token) {
            config.headers['Authorization'] = 'Bearer ' + token
        }

        return config
    },
    (error) => Promise.reject(error)
)

// Praktikum 14: jika server menolak token pada endpoint terlindungi, user dikembalikan ke login.
axios.interceptors.response.use(
    (response) => response,
    (error) => {
        const requestUrl = error.config && error.config.url ? error.config.url : ''
        const isLoginRequest = requestUrl.includes('/api/login')

        if (!isLoginRequest && error.response && error.response.status === 401) {
            alert('Sesi Anda telah berakhir atau Token tidak sah. Silakan login kembali.')
            localStorage.clear()
            window.dispatchEvent(new Event('auth-changed'))
            router.push('/login')
        }

        return Promise.reject(error)
    }
)

const routes = [
    { path: '/', component: Home },
    { path: '/login', component: Login },
    {
        path: '/artikel',
        component: Artikel,
        meta: { requiresAuth: true },
    },
    {
        path: '/about',
        component: About,
        meta: { requiresAuth: true },
    },
]

const router = createRouter({
    history: createWebHashHistory(),
    routes,
})

// Praktikum 13: Navigation Guards untuk membatasi route SPA pada sisi klien.
router.beforeEach((to, from, next) => {
    const isAuthenticated = localStorage.getItem('isLoggedIn') === 'true'

    if (to.matched.some(record => record.meta.requiresAuth) && !isAuthenticated) {
        alert('Akses Ditolak! Anda harus login terlebih dahulu.')
        next('/login')
    } else {
        next()
    }
})

const app = createApp({
    data() {
        return {
            isLoggedIn: false,
        }
    },
    mounted() {
        this.syncAuthState()
        window.addEventListener('auth-changed', this.syncAuthState)
    },
    methods: {
        syncAuthState() {
            this.isLoggedIn = localStorage.getItem('isLoggedIn') === 'true'
        },
        logout() {
            if (confirm('Apakah Anda yakin ingin keluar aplikasi?')) {
                localStorage.removeItem('isLoggedIn')
                localStorage.removeItem('userToken')
                localStorage.removeItem('username')
                this.syncAuthState()
                this.$router.push('/')
            }
        },
    },
})

app.use(router)
app.mount('#app')
