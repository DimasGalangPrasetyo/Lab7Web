const Home = {
    template: `
        <section class="home-container">
            <span class="eyebrow">Praktikum 13 & 14</span>
            <h2>Selamat Datang di Panel SPA MU Forum</h2>
            <p>
                Frontend VueJS sekarang sudah dilengkapi autentikasi API, Navigation Guards,
                Token-Based Authentication, dan Axios Interceptors. Route Kelola Artikel dan About
                hanya dapat dibuka setelah login.
            </p>
            <div class="feature-grid">
                <article>
                    <h3>Navigation Guards</h3>
                    <p>Vue Router mengecek status login di localStorage sebelum membuka route terlindungi.</p>
                </article>
                <article>
                    <h3>Token API</h3>
                    <p>Endpoint <code>/api/login</code> mengembalikan token jika username/email dan password valid.</p>
                </article>
                <article>
                    <h3>Axios Interceptors</h3>
                    <p>Request POST, PUT, dan DELETE otomatis membawa header <code>Authorization: Bearer token</code>.</p>
                </article>
            </div>
        </section>
    `
};
