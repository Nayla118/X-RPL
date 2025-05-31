<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - Restoran Enak</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #FF6B6B;
            --secondary: #4ECDC4;
            --dark: #292F36;
            --light: #F7FFF7;
            --accent: #FFE66D;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: var(--dark);
        }
        
        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
        }
        
        .nav-links {
            display: flex;
            gap: 2rem;
        }
        
        .nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .nav-links a:hover {
            color: var(--primary);
        }
        
        .auth-buttons {
            display: flex;
            gap: 1rem;
        }
        
        .btn {
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
        }
        
        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }
        
        .btn-outline:hover {
            background: var(--primary);
            color: white;
        }
        
        .btn-primary {
            background: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background: #e05555;
        }
        
        .hero {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4');
            background-size: cover;
            background-position: center;
            height: 70vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
        }
        
        .hero p {
            font-size: 1.2rem;
            max-width: 600px;
            margin-bottom: 2rem;
        }
        
        .categories {
            padding: 4rem 2rem;
            text-align: center;
        }
        
        .section-title {
            font-size: 2rem;
            margin-bottom: 3rem;
            position: relative;
            display: inline-block;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            width: 50%;
            height: 4px;
            background: var(--primary);
            bottom: -10px;
            left: 25%;
        }
        
        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .category-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        
        .category-card:hover {
            transform: translateY(-10px);
        }
        
        .category-img {
            height: 200px;
            background-size: cover;
            background-position: center;
        }
        
        .category-info {
            padding: 1.5rem;
        }
        
        .category-info h3 {
            margin-top: 0;
            margin-bottom: 0.5rem;
        }
        
        .menu-items {
            padding: 4rem 2rem;
            background: #f1f1f1;
        }
        
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .menu-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .menu-img {
            height: 200px;
            background-size: cover;
            background-position: center;
        }
        
        .menu-details {
            padding: 1.5rem;
        }
        
        .menu-title {
            font-size: 1.3rem;
            margin-top: 0;
            margin-bottom: 0.5rem;
        }
        
        .menu-desc {
            color: #666;
            margin-bottom: 1rem;
        }
        
        .menu-price {
            font-weight: 700;
            color: var(--primary);
            font-size: 1.2rem;
            margin-bottom: 1rem;
            display: block;
        }
        
        footer {
            background: var(--dark);
            color: white;
            padding: 3rem 2rem;
            text-align: center;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            text-align: left;
        }
        
        .footer-column h3 {
            margin-top: 0;
            color: var(--accent);
        }
        
        .footer-column ul {
            list-style: none;
            padding: 0;
        }
        
        .footer-column ul li {
            margin-bottom: 0.5rem;
        }
        
        .footer-column ul li a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-column ul li a:hover {
            color: white;
        }
        
        .copyright {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #444;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">AIS Resto</div>
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="#menu">Menu</a>
            <a href="#categories">Kategori</a>
            <a href="#about">Tentang Kami</a>
            <a href="#contact">Kontak</a>
        </div>
        <div class="auth-buttons">
            <button class="btn btn-outline">Login</button>
            <button class="btn btn-primary">Register</button>
        </div>
    </nav>
    
    <section class="hero">
        <h1>Selamat Datang di AIS Restoran</h1>
        <p>Nikmati hidangan lezat dengan bahan-bahan berkualitas tinggi dan pelayanan terbaik</p>
        <button class="btn btn-primary">Lihat Menu</button>
    </section>
    
    <section class="categories" id="categories">
        <h2 class="section-title">Kategori Menu</h2>
        <div class="category-grid">
            <div class="category-card">
                <div class="category-img" style="background-image: url('https://images.unsplash.com/photo-1544025162-d76694265947');"></div>
                <div class="category-info">
                    <h3>Makanan</h3>
                    <p>Berbagai hidangan utama yang lezat</p>
                </div>
            </div>
            <div class="category-card">
                <div class="category-img" style="background-image: url('https://images.unsplash.com/photo-1551029506-0807df4e2031');"></div>
                <div class="category-info">
                    <h3>Minuman</h3>
                    <p>Minuman segar untuk menemani makanan Anda</p>
                </div>
            </div>
            <div class="category-card">
                <div class="category-img" style="background-image: url('https://images.unsplash.com/photo-1624726175512-19b9baf9fbd1');"></div>
                <div class="category-info">
                    <h3>Gorengan</h3>
                    <p>Gorengan renyah dan enak</p>
                </div>
            </div>
            <div class="category-card">
                <div class="category-img" style="background-image: url('https://images.unsplash.com/photo-1568702846914-96b305d2aaeb');"></div>
                <div class="category-info">
                    <h3>Buah-buahan</h3>
                    <p>Buah segar dan manis</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="menu-items" id="menu">
        <h2 class="section-title">Menu Populer</h2>
        <div class="menu-grid">
            <div class="menu-card">
                <div class="menu-img" style="background-image: url('https://images.unsplash.com/photo-1559847844-5315695dadae');"></div>
                <div class="menu-details">
                    <h3 class="menu-title">Bakso Sapi</h3>
                    <p class="menu-desc">Bakso enak dengan daging sapi pilihan dan kuah kaldu yang gurih.</p>
                    <span class="menu-price">Rp 50.000</span>
                    <button class="btn btn-primary">Tambah ke Keranjang</button>
                </div>
            </div>
            <!-- Tambahkan item menu lainnya di sini -->
        </div>
    </section>
    
    <footer>
        <div class="footer-content">
            <div class="footer-column">
                <h3>Tentang Kami</h3>
                <p>AIS Resto menyajikan makanan berkualitas dengan cita rasa tinggi sejak 2020.</p>
            </div>
            <div class="footer-column">
                <h3>Jam Buka</h3>
                <ul>
                    <li>Senin-Jumat: 10.00-22.00</li>
                    <li>Sabtu-Minggu: 09.00-23.00</li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Kontak</h3>
                <ul>
                    <li>Jl. Restoran Enak No. 123</li>
                    <li>0812-3456-7890</li>
                    <li>info@aisresto.com</li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            &copy; 2025 AIS Restoran. All Rights Reserved.
        </div>
    </footer>
</body>
</html>