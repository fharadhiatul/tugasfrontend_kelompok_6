<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Produk - Toko Buku Gramedia</title>
    <style>
        :root { --primary: #0b356e; --primary-mid: #1652a3; --primary-bright: #2563eb; --bg-body: #eef2f7; --bg-card: #ffffff; --text-main: #0f172a; --text-muted: #64748b; --border: #dce4ef; }
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: "Segoe UI", Roboto, Arial, sans-serif; }
        body { background: linear-gradient(180deg, #eef2f7 0%, #e4ebf5 100%); color: var(--text-main); min-height: 100vh; display: flex; flex-direction: column; }
        .navbar { background: linear-gradient(120deg, #071e40 0%, #0f3d7a 52%, #1d5bb0 100%); color: #fff; padding: 15px 28px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 4px 16px rgba(7, 30, 64, 0.22); }
        .brand { display: flex; align-items: center; gap: 12px; }
        .brand-logo { background: linear-gradient(145deg, #ffffff 0%, #dbeafe 100%); color: var(--primary); font-weight: 800; font-size: 18px; width: 36px; height: 36px; border-radius: 8px; display: flex; align-items: center; justify-content: center; box-shadow: 0 3px 8px rgba(0,0,0,0.2); }
        .brand-title { font-size: 15px; font-weight: 700; letter-spacing: 0.6px; }
        .brand-sub { font-size: 11px; color: #cbd5e1; }
        .badge-role { background: linear-gradient(135deg, rgba(255,255,255,0.18), rgba(255,255,255,0.06)); border: 1px solid rgba(255,255,255,0.25); padding: 6px 14px; border-radius: 6px; font-size: 12px; font-weight: 600; }
        .wrapper { display: flex; flex: 1; }
        .sidebar { width: 240px; background: linear-gradient(180deg, #ffffff 0%, #f8fafd 100%); border-right: 1px solid var(--border); padding: 20px 12px; flex-shrink: 0; }
        .menu-label { font-size: 11px; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.6px; padding: 0 12px 10px; }
        .nav-list { display: flex; flex-direction: column; gap: 5px; }
        .nav-item { text-decoration: none; color: #334155; font-size: 13.5px; font-weight: 500; padding: 10px 14px; border-radius: 7px; transition: all 0.22s ease; }
        .nav-item:hover { background: #eff6ff; color: var(--primary); transform: translateX(4px); }
        .nav-item.active { background: linear-gradient(90deg, #dbeafe 0%, #eff6ff 70%, #ffffff 100%); color: var(--primary); font-weight: 700; border-left: 4px solid var(--primary-bright); box-shadow: 0 2px 6px rgba(37, 99, 235, 0.08); }
        .main-content { flex: 1; padding: 28px 32px; max-width: 1140px; animation: fadeInPage 0.45s ease-out; }
        @keyframes fadeInPage { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
        .page-header { margin-bottom: 20px; }
        .tag-us { display: inline-block; font-size: 11px; font-weight: 700; color: #1e40af; background: linear-gradient(90deg, #dbeafe 0%, #e0e7ff 100%); border: 1px solid #bfdbfe; padding: 3px 10px; border-radius: 5px; margin-bottom: 6px; }
        .page-title { font-size: 22px; font-weight: 800; color: #0f172a; }
        .page-desc { font-size: 13px; color: var(--text-muted); margin-top: 3px; }
        .search-card { background: linear-gradient(180deg, #ffffff 0%, #fbfdff 100%); border: 1px solid var(--border); border-radius: 10px; padding: 18px 20px; margin-bottom: 22px; box-shadow: 0 4px 14px rgba(15, 23, 42, 0.04); }
        .search-form { display: grid; grid-template-columns: 2.2fr 1.2fr 0.7fr; gap: 14px; align-items: end; }
        .form-group label { display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 6px; }
        .form-control { width: 100%; padding: 9.5px 12px; border: 1px solid #cbd5e1; border-radius: 7px; font-size: 13.5px; background: #fff; transition: all 0.2s ease; }
        .form-control:focus { outline: none; border-color: var(--primary-bright); box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.16); }
        .btn-search { width: 100%; padding: 10px 16px; background: linear-gradient(135deg, #0b356e 0%, #1d5bb0 55%, #2563eb 100%); color: #fff; border: none; border-radius: 7px; font-size: 13.5px; font-weight: 600; cursor: pointer; transition: all 0.22s ease; box-shadow: 0 3px 10px rgba(29, 91, 176, 0.28); }
        .btn-search:hover { transform: translateY(-1.5px); box-shadow: 0 6px 16px rgba(29, 91, 176, 0.36); }
        .content-grid { display: grid; grid-template-columns: 1.35fr 1fr; gap: 20px; align-items: start; }
        .panel { background: linear-gradient(180deg, #ffffff 0%, #fcfdff 100%); border: 1px solid var(--border); border-radius: 10px; padding: 20px; box-shadow: 0 4px 14px rgba(15, 23, 42, 0.04); }
        .panel-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px; }
        .panel-title { font-size: 15px; font-weight: 700; color: #0f172a; }
        .count-pill { font-size: 11.5px; font-weight: 700; background: linear-gradient(90deg, #e2e8f0, #f1f5f9); color: #334155; padding: 3px 10px; border-radius: 12px; }
        .panel-sub { font-size: 12px; color: var(--text-muted); margin-bottom: 16px; }
        .product-list { display: flex; flex-direction: column; gap: 10px; }
        .product-card { border: 1px solid var(--border); border-radius: 8px; padding: 14px 16px; cursor: pointer; display: flex; justify-content: space-between; align-items: center; background: #fff; transition: all 0.22s cubic-bezier(0.25, 0.8, 0.25, 1); }
        .product-card:hover { border-color: #93c5fd; background: linear-gradient(90deg, #f8fafc 0%, #eff6ff 100%); transform: translateY(-2px); box-shadow: 0 5px 12px rgba(15, 61, 122, 0.08); }
        .product-card.selected { background: linear-gradient(105deg, #dbeafe 0%, #eff6ff 60%, #ffffff 100%); border-color: var(--primary-bright); border-left: 4.5px solid var(--primary); box-shadow: 0 4px 12px rgba(37, 99, 235, 0.12); }
        .prod-name { font-size: 14.5px; font-weight: 700; color: #0f172a; }
        .prod-meta { font-size: 12px; color: var(--text-muted); margin-top: 4px; }
        .prod-code { font-family: monospace; background: #e2e8f0; color: #334155; padding: 2px 6px; border-radius: 4px; font-size: 11px; font-weight: 600; }
        .status-badge { display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 5px; }
        .status-ok { background: linear-gradient(90deg, #dcfce7, #ecfdf5); color: #15803d; border: 1px solid #bbf7d0; }
        .status-ok::before { content: ""; width: 6px; height: 6px; border-radius: 50%; background: #16a34a; animation: pulseDot 2s infinite; }
        @keyframes pulseDot { 0%, 100% { opacity: 1; } 50% { opacity: 0.35; } }
        .status-empty { background: linear-gradient(90deg, #fee2e2, #fef2f2); color: #b91c1c; border: 1px solid #fecaca; }
        .detail-divider { border-bottom: 1px solid var(--border); padding-bottom: 12px; margin-bottom: 16px; display: flex; justify-content: space-between; align-items: center; }
        .detail-animate { transition: opacity 0.2s ease, transform 0.2s ease; }
        .detail-updating { opacity: 0.35; transform: translateY(4px); }
        .detail-title { font-size: 17px; font-weight: 700; margin-bottom: 14px; }
        .price-box { background: linear-gradient(125deg, #0b356e 0%, #1652a3 65%, #2563eb 100%); color: #fff; padding: 15px 18px; border-radius: 8px; margin-bottom: 14px; box-shadow: 0 4px 12px rgba(15, 61, 122, 0.2); }
        .price-label { font-size: 11.5px; color: #dbeafe; margin-bottom: 2px; }
        .price-value { font-size: 24px; font-weight: 800; color: #ffffff; letter-spacing: 0.3px; }
        .spec-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 14px; }
        .spec-box { background: linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%); border: 1px solid var(--border); padding: 12px 14px; border-radius: 7px; }
        .spec-label { font-size: 11.5px; color: var(--text-muted); margin-bottom: 3px; }
        .spec-val { font-size: 16px; font-weight: 700; }
        .text-green { color: #15803d; }
        .text-red { color: #b91c1c; }
        .location-bar { background: linear-gradient(90deg, #fef3c7 0%, #fffbeb 100%); border: 1px solid #fde68a; color: #92400e; padding: 10px 14px; border-radius: 7px; font-size: 12.5px; font-weight: 600; margin-bottom: 12px; }
        .note-small { font-size: 11.5px; color: var(--text-muted); }
        .empty-state { text-align: center; padding: 32px 16px; background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 8px; color: var(--text-muted); font-size: 13px; }
    </style>
</head>
<body>
    @php
        $first = count($produk) > 0 ? reset($produk) : null;
    @endphp

    <header class="navbar">
        <div class="brand">
            <div class="brand-logo">G</div>
            <div>
                <div class="brand-title">TOKO BUKU GRAMEDIA</div>
                <div class="brand-sub">Sistem Informasi Katalog &amp; Stok Toko</div>
            </div>
        </div>
        <div><span class="badge-role">Petugas Toko &bull; Desktop</span></div>
    </header>

    <div class="wrapper">
        <aside class="sidebar">
            <div class="menu-label">Menu Ruang Kerja</div>
            <nav class="nav-list">
                <a href="{{ route('katalog.index') }}" class="nav-item">Katalog produk</a>
                <a href="#" class="nav-item">Rak &amp; lorong</a>
                <a href="{{ route('katalog.index') }}" class="nav-item active">Pencarian produk</a>
                <a href="#" class="nav-item">Validasi stok</a>
                <a href="#" class="nav-item">Kontrol rilis PM</a>
            </nav>
        </aside>

        <main class="main-content">
            <div class="page-header">
                <span class="tag-us">US-05 &bull; PENCARIAN PRODUK</span>
                <h1 class="page-title">Cari Berdasarkan Judul</h1>
                <p class="page-desc">Mempercepat pengecekan ketersediaan buku, harga dasar, dan posisi rak.</p>
            </div>

            <div class="search-card">
                <form id="formPencarian" method="GET" action="{{ route('katalog.index') }}" class="search-form">
                    <div class="form-group">
                        <label for="q">Judul buku / nama produk</label>
                        <input id="q" name="q" type="text" class="form-control" value="{{ $q ?? '' }}" placeholder="Contoh: Laskar Pelangi...">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select id="kategori" name="kategori" class="form-control" onchange="filterKategoriLangsung()">
                            <option value="">Semua kategori</option>
                            <option value="Buku" {{ request('kategori') == 'Buku' ? 'selected' : '' }}>Buku</option>
                            <option value="Alat tulis" {{ request('kategori') == 'Alat tulis' ? 'selected' : '' }}>Alat tulis</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-search">Cari Produk</button>
                    </div>
                </form>
            </div>

            <div class="content-grid">
                <div class="panel">
                    <div class="panel-header">
                        <h2 class="panel-title">Hasil Pencarian</h2>
                        <span id="jumlah-produk" class="count-pill">{{ count($produk) }} produk aktif</span>
                    </div>
                    <p class="panel-sub">Pilih salah satu produk untuk melihat harga, stok, dan lokasi rak.</p>
                    <div id="daftar-produk" class="product-list">
                        @forelse ($produk as $index => $item)
                            <div onclick="pilihProduk(this)"
                                 data-nama="{{ $item['nama'] }}"
                                 data-kode="{{ $item['kode'] ?? 'BK-00' . ($index + 1) }}"
                                 data-harga="Rp{{ number_format($item['harga'], 0, ',', '.') }}"
                                 data-stok="{{ $item['stok'] > 0 ? $item['stok'] . ' unit' : 'Stok habis' }}"
                                 data-rak="{{ $item['rak'] ?? 'A-03' }}"
                                 data-lorong="{{ $item['lorong'] ?? 'Lorong A' }}"
                                 data-kategori="{{ $item['kategori'] ?? 'Buku' }}"
                                 class="product-card {{ $index === 0 ? 'selected' : '' }}">
                                <div>
                                    <div class="prod-name">{{ $item['nama'] }}</div>
                                    <div class="prod-meta"><span class="prod-code">{{ $item['kode'] ?? 'BK-00' . ($index + 1) }}</span> &nbsp;/&nbsp; {{ $item['kategori'] ?? 'Buku' }}</div>
                                </div>
                                @if ($item['stok'] > 0)
                                    <span class="status-badge status-ok">Tersedia</span>
                                @else
                                    <span class="status-badge status-empty">Stok habis</span>
                                @endif
                            </div>
                        @empty
                            <div class="empty-state"><strong>“Produk tidak ditemukan.”</strong><br>Periksa kembali judul buku atau ubah filter kategori.</div>
                        @endforelse
                        <div id="empty-filter-msg" class="empty-state" style="display: none;"><strong>“Produk tidak ditemukan pada kategori ini.”</strong><br>Ubah pilihan kategori di atas untuk melihat produk lain.</div>
                    </div>
                </div>

                <div class="panel">
                    <div class="detail-divider">
                        <h2 class="panel-title">Informasi Produk</h2>
                        <span id="detail-kode" class="prod-code">{{ $first ? ($first['kode'] ?? 'BK-001') : '-' }}</span>
                    </div>
                    @if($first)
                        <div id="detail-body" class="detail-animate">
                            <div id="detail-nama" class="detail-title">{{ $first['nama'] }}</div>
                            <div class="price-box">
                                <div class="price-label">Harga dasar</div>
                                <div id="detail-harga" class="price-value">Rp{{ number_format($first['harga'], 0, ',', '.') }}</div>
                            </div>
                            <div class="spec-grid">
                                <div class="spec-box">
                                    <div class="spec-label">Stok tersisa</div>
                                    <div id="detail-stok" class="spec-val {{ $first['stok'] > 0 ? 'text-green' : 'text-red' }}">{{ $first['stok'] > 0 ? $first['stok'] . ' unit' : 'Stok habis' }}</div>
                                </div>
                                <div class="spec-box">
                                    <div class="spec-label">Nomor rak</div>
                                    <div id="detail-rak" class="spec-val">{{ $first['rak'] ?? 'A-03' }}</div>
                                </div>
                            </div>
                            <div id="detail-lokasi" class="location-bar">Lokasi: {{ $first['lorong'] ?? 'Lorong A' }} &bull; Kategori {{ $first['kategori'] ?? 'Buku' }}</div>
                            <p class="note-small">Data dibaca langsung dari katalog dan stok dasar. Tidak ada transaksi pada tahap ini.</p>
                        </div>
                    @else
                        <div class="empty-state">Belum ada produk yang dipilih.</div>
                    @endif
                </div>
            </div>
        </main>
    </div>

    <script>
        function pilihProduk(el) {
            document.querySelectorAll('.product-card').forEach(c => c.classList.remove('selected'));
            el.classList.add('selected');

            const detailBody = document.getElementById('detail-body');
            if (detailBody) {
                detailBody.classList.add('detail-updating');
                setTimeout(() => {
                    document.getElementById('detail-nama').textContent = el.dataset.nama;
                    document.getElementById('detail-kode').textContent = el.dataset.kode;
                    document.getElementById('detail-harga').textContent = el.dataset.harga;
                    const stokEl = document.getElementById('detail-stok');
                    stokEl.textContent = el.dataset.stok;
                    stokEl.className = 'spec-val ' + (el.dataset.stok === 'Stok habis' ? 'text-red' : 'text-green');
                    document.getElementById('detail-rak').textContent = el.dataset.rak;
                    document.getElementById('detail-lokasi').innerHTML = `Lokasi: ${el.dataset.lorong} &bull; Kategori ${el.dataset.kategori}`;
                    detailBody.classList.remove('detail-updating');
                }, 140);
            }
        }

        function filterKategoriLangsung() {
            const kategoriDipilih = document.getElementById('kategori').value.toLowerCase();
            const cards = document.querySelectorAll('.product-card');
            let jumlahTampil = 0;
            let kartuPertama = null;

            cards.forEach(card => {
                const katCard = (card.dataset.kategori || '').toLowerCase();
                if (kategoriDipilih === '' || katCard === kategoriDipilih) {
                    card.style.display = 'flex';
                    jumlahTampil++;
                    if (!kartuPertama) kartuPertama = card;
                } else {
                    card.style.display = 'none';
                }
            });

            document.getElementById('jumlah-produk').textContent = jumlahTampil + ' produk aktif';
            const emptyMsg = document.getElementById('empty-filter-msg');
            if (emptyMsg) emptyMsg.style.display = jumlahTampil === 0 ? 'block' : 'none';
            if (kartuPertama) pilihProduk(kartuPertama);
        }
    </script>
</body>
</html>
