@extends('layouts.app')

@section('content')
<div class="p-4 bg-light rounded shadow-sm">
    <h1 class="mb-3">
        <i class="bi bi-envelope-fill text-danger"></i> Kontak Kami
    </h1>
    <p>Jika ada pertanyaan atau pesanan, silakan hubungi kami melalui:</p>
    <ul class="list-unstyled mb-4">
        <li><i class="bi bi-geo-alt-fill text-danger me-2"></i><strong>Alamat:</strong> Jalan Raya Ayam Geprek No. 123, Kota Laravel</li>
        <li><i class="bi bi-telephone-fill text-success me-2"></i><strong>Telepon:</strong> 0812-3456-7890</li>
        <li><i class="bi bi-envelope-at-fill text-primary me-2"></i><strong>Email:</strong> info@ayamgepreklaravel.com</li>
    </ul>

    <div class="bg-white p-4 rounded shadow-sm">
        <h5 class="mb-3"><i class="bi bi-chat-dots-fill text-secondary"></i> Kirim Pesan</h5>
        <form action="{{ route('contact.send') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" id="name" name="name" class="form-control" required />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required />
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Pesan</label>
                <textarea id="message" name="message" rows="4" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-send-fill me-1"></i> Kirim Pesan
            </button>
        </form>
    </div>
</div>
@endsection
