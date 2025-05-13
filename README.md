**Dokumentasi API** tiga endpoint: **User (Mentor)**, **Kelas**, dan **Lesson (Soal)**.

---

## 📘 Dokumentasi API

### 🔗 Base URL

```
http://127.0.0.1:8000/api
```

---

## 1. 🧑‍🏫 Menambahkan User (Mentor)

### Endpoint

```
POST /users
```

### Request Body

```json
{
  "name": "John Doe",
  "email": "john.doe@example.com",
  "password": "password123",
  "role": "mentor" default -> siswa
}
```

### Response (Berhasil)

```json
{
  "message": "User created successfully",
  "user": {
    "id": 1,
    "name": "John Doe",
    "email": "john.doe@example.com",
    "role": "mentor",
    ...
  }
}
```

---

## 2. 🎓 Menambahkan Kelas

### Endpoint

```
POST /kelas
```

### Request Body

```json
{
  "judul_kelas": "Belajar Laravel Dasar",
  "rating": 4.8,
  "deskripsi": "Kelas untuk pemula yang ingin belajar Laravel dari awal.",
  "mentor_id": 1,
  "gambar": "https://example.com/images/laravel.png",
  "categories": "Web Development",
  "link_youtube": "https://youtube.com/embed/abc123xyz"
}
```

### Response (Berhasil)

```json
{
  "message": "Kelas berhasil dibuat",
  "kelas": {
    "id_kelas": 1,
    "judul_kelas": "Belajar Laravel Dasar",
    ...
  }
}
```

---

## 3. 📚 Menambahkan Lesson (Soal / Pertanyaan)

### Endpoint

```
POST /lessons
```

### Request Body

```json
{
  "id_kelas": 1,
  "judul": "Latihan Soal Laravel Dasar",
  "pertanyaan": "Apa fungsi dari artisan migrate?",
  "pilihan": [
    "Menjalankan seeder",
    "Membuat controller",
    "Menjalankan migrasi database",
    "Menjalankan aplikasi"
  ],
  "jawaban": "Menjalankan migrasi database"
}
```

### Response (Berhasil)

```json
{
  "message": "Lesson berhasil ditambahkan",
  "lesson": {
    "id": 1,
    "id_kelas": 1,
    ...
  }
}
```
