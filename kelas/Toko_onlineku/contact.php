<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - Toko Online</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .info-kontak, .form-kontak {
            margin-bottom: 30px;
        }
        .info-kontak h3, .form-kontak h3 {
            margin-bottom: 10px;
            color: #333;
        }
        .info-kontak p, .form-kontak p {
            font-size: 16px;
            color: #666;
        }
        .form-kontak input, .form-kontak textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .form-kontak button {
            padding: 12px 20px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-kontak button:hover {
            background-color: #555;
        }
        .kontak-detail {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .kontak-detail div {
            width: 48%;
        }
        .kontak-detail div h4 {
            margin-bottom: 10px;
        }
        .kontak-detail div p {
            margin-bottom: 5px;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <h2>Kontak Kami</h2>

    <div class="container">
        <!-- Informasi Kontak -->
        <div class="info-kontak">
            <h3>Hubungi Kami</h3>
            <div class="kontak-detail">
                <div>
                    <h4>Alamat</h4>
                    <p>Jl. Raya Toko Online No. 123, Jakarta, Indonesia</p>
                </div>
                <div>
                    <h4>Telepon</h4>
                    <p>(021) 1234 5678</p>
                </div>
                <div>
                    <h4>Email</h4>
                    <p>support@tokoonline.com</p>
                </div>
            </div>
        </div>

        <!-- Form Kontak -->
        <div class="form-kontak">
            <h3>Kirim Pesan</h3>
            <p>Silakan isi form di bawah ini untuk menghubungi kami. Kami akan segera merespon pesan Anda.</p>
            <form action="proses_kontak.php" method="POST">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" placeholder="Nama Anda" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Email Anda" required>

                <label for="subjek">Subjek:</label>
                <input type="text" id="subjek" name="subjek" placeholder="Subjek Pesan" required>

                <label for="pesan">Pesan:</label>
                <textarea id="pesan" name="pesan" placeholder="Tulis pesan Anda" rows="6" required></textarea>

                <button type="submit">Kirim Pesan</button>
            </form>
        </div>
    </div>

</body>
</html>
