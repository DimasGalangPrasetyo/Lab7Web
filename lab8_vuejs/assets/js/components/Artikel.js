const Artikel = {
    template: `
        <section>
            <div class="section-heading">
                <div>
                    <span class="eyebrow">Manajemen Data</span>
                    <h2>Kelola Artikel MU Forum</h2>
                    <p>Tambah, ubah, dan hapus artikel melalui REST API CodeIgniter 4.</p>
                </div>
                <button id="btn-tambah" @click="tambah">Tambah Data</button>
            </div>

            <div class="modal" v-if="showForm">
                <div class="modal-content">
                    <span class="close" @click="showForm = false">&times;</span>
                    <form id="form-data" @submit.prevent="saveData">
                        <h3 id="form-title">{{ formTitle }}</h3>

                        <label for="judul">Judul Artikel</label>
                        <input type="text" name="judul" id="judul" v-model="formData.judul" placeholder="Judul artikel" required>

                        <label for="isi">Isi Artikel</label>
                        <textarea name="isi" id="isi" rows="8" v-model="formData.isi" placeholder="Isi artikel" required></textarea>

                        <label for="id_kategori">Kategori</label>
                        <select name="id_kategori" id="id_kategori" v-model="formData.id_kategori">
                            <option value="1">Sejarah</option>
                            <option value="2">Manajer</option>
                            <option value="3">Pemain</option>
                            <option value="4">Trofi</option>
                            <option value="5">Berita Lapangan</option>
                            <option value="6">Berita Luar Lapangan</option>
                            <option value="7">Transfer</option>
                            <option value="8">Akademi</option>
                            <option value="9">United Women</option>
                        </select>

                        <label for="status">Status</label>
                        <select name="status" id="status" v-model="formData.status">
                            <option v-for="option in statusOptions" :key="option.value" :value="option.value">
                                {{ option.text }}
                            </option>
                        </select>

                        <label class="checkbox-label">
                            <input type="checkbox" v-model="formData.is_terbaru" :true-value="1" :false-value="0">
                            Tampilkan di Artikel Terbaru
                        </label>

                        <input type="hidden" id="id" v-model="formData.id">
                        <div class="form-actions">
                            <button type="submit" id="btnSimpan">Simpan</button>
                            <button type="button" class="secondary" @click="showForm = false">Batal</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Terbaru</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(row, index) in artikel" :key="row.id">
                            <td class="center-text">{{ row.id }}</td>
                            <td>{{ row.judul }}</td>
                            <td>{{ row.nama_kategori || '-' }}</td>
                            <td><span class="badge">{{ statusText(row.status) }}</span></td>
                            <td><span class="badge">{{ terbaruText(row.is_terbaru) }}</span></td>
                            <td class="center-text actions">
                                <a href="#" @click.prevent="edit(row)">Edit</a>
                                <a href="#" @click.prevent="hapus(index, row.id)">Hapus</a>
                            </td>
                        </tr>
                        <tr v-if="artikel.length === 0">
                            <td colspan="6" class="center-text">Belum ada data atau API belum berjalan.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    `,
    data() {
        return {
            artikel: [],
            formData: {
                id: null,
                judul: '',
                isi: '',
                status: 1,
                is_terbaru: 0,
                id_kategori: 7
            },
            showForm: false,
            formTitle: 'Tambah Data',
            statusOptions: [
                { text: 'Draft', value: 0 },
                { text: 'Publish', value: 1 },
            ],
        }
    },
    mounted() {
        this.loadData()
    },
    methods: {
        loadData() {
            axios.get(apiUrl + '/post')
                .then(response => {
                    this.artikel = response.data.artikel || []
                })
                .catch(error => console.log(error))
        },
        statusText(status) {
            if (status === null || status === undefined) return ''
            return Number(status) === 1 ? 'Publish' : 'Draft'
        },
        terbaruText(isTerbaru) {
            return Number(isTerbaru) === 1 ? 'Tampil' : 'Tidak'
        },
        tambah() {
            this.showForm = true
            this.formTitle = 'Tambah Data'
            this.formData = {
                id: null,
                judul: '',
                isi: '',
                status: 1,
                is_terbaru: 0,
                id_kategori: 7
            }
        },
        hapus(index, id) {
            if (confirm('Yakin menghapus data?')) {
                axios.delete(apiUrl + '/post/' + id)
                    .then(() => {
                        this.artikel.splice(index, 1)
                    })
                    .catch(error => console.log(error))
            }
        },
        edit(data) {
            this.showForm = true
            this.formTitle = 'Ubah Data'
            this.formData = {
                id: data.id,
                judul: data.judul,
                isi: data.isi,
                status: Number(data.status),
                is_terbaru: Number(data.is_terbaru || 0),
                id_kategori: data.id_kategori || 7
            }
        },
        saveData() {
            if (this.formData.id) {
                axios.put(apiUrl + '/post/' + this.formData.id, this.formData)
                    .then(() => {
                        this.loadData()
                        this.showForm = false
                    })
                    .catch(error => console.log(error))
            } else {
                axios.post(apiUrl + '/post', this.formData)
                    .then(() => {
                        this.loadData()
                        this.showForm = false
                    })
                    .catch(error => console.log(error))
            }
        }
    },
};
