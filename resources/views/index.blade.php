<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/index.css">
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css"
    />
</head>
<body>
    <header>
        <nav>
            <div class="">
                <img src="img/logo.png" alt="logo">
            </div>
            <div id="menu-icon" class="menu-icon">
            <i class="ph ph-list"></i>
            </div>
            <ul id="menu-list" class="hidden"> 
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="/menu">Menu</a>
                </li>
                <li>
                    <a href="/about">About Us</a>
                </li>
                <li>
                    <a href="/contact">Contact</a>
                </li>
                <li>
                    <a href="/store">Find My Store</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="hero">
        <video autoplay muted loop playsinline class="background-video">
            <source src="img/home.mp4" type="video/mp4">
        </video>
        <div class="hero-text">
            <h1>Discover Your Perfect Coffee</h1>
            <p>Inspired by the red coffee cherry, uniquely brewed for you.</p>
        </div>
    </div>
    <main>
        <div class="Judul" >
            <h2>Jam Operasional</h2>
            <p> SETIAP HARI</p>
            <p> 08.00-23.00</p>


        </div>
    </main>
    <h2>Tinggalkan Komentar</h2>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('komentar.store') }}" method="POST">
        @csrf
        <input type="text" name="nama" placeholder="Nama" required><br>
        <textarea name="isi" placeholder="Isi komentar..." required></textarea><br>
        <button type="submit">Kirim Komentar</button>
    </form>

    <hr>

    <h3>Daftar Komentar</h3>
        @foreach($komentars as $komentar)
        <div style="margin-bottom: 10px;">
            <strong>{{ $komentar->nama }}</strong><br>
            <p>{{ $komentar->isi }}</>

            <form action="{{ route('komentar.destroy', $komentar->id) }}" method="POST" onsubmit="return confirm('Hapus komentar ini?')">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </div>
    @endforeach

    <footer>
        <p>&copy; 2025 Kedai Kopi DERS.KOPI. All rights reserved.</p>
        <p>
           | <a href="https://instagram.com/ders.kopi" target="_blank">Instagram</a> |
        </p>
    </footer>
    <script src="js/script.js" ></script>
</body>

</html>