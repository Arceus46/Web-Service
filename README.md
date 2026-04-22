# API Manajemen Buku

## Struktur Database

Tabel: books

- id — bigint, primary key, auto increment
- title — string, judul buku
- author — string, nama pengarang
- year — integer, tahun terbit
- stock — integer, stok buku tersedia
- created_at — timestamp
- updated_at — timestamp

---

## Endpoint API

Base URL: http://127.0.0.1:8000/api

### GET /books
Mengambil seluruh data buku.

### GET /books/{id}
Mengambil data satu buku berdasarkan ID.

### POST /books
Menambahkan data buku baru.
```
{
    "title": "Detective Conan",
    "author": "Gosho Aoyama",
    "year": 1994,
    "stock": 100
}
```

### PUT /books/{id}
Memperbarui data buku berdasarkan ID.
```
{
    "title": "Detective Conan",
    "author": "Gosho Aoyama",
    "year": 1994,
    "stock": 10
}
```

### DELETE /books/{id}
Menghapus data buku berdasarkan ID.

---

## Validasi

- title — wajib diisi
- author — wajib diisi
- year — wajib diisi, harus angka, minimal 1900
- stock — wajib diisi, harus angka, minimal 0

---

## Format Response

**Sukses:**
```
{
    "status": true,
    "message": "Pesan sukses",
    "data": { ... }
}
```

**Data tidak ditemukan:**
```
{
    "status": false,
    "message": "Data tidak ditemukan",
    "data": null
}
```

**Validasi gagal (422):**
```
{
    "status": false,
    "message": "The title field is required.",
    "data": null
}
```