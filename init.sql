-- admin login
CREATE TABLE admin (
  id SERIAL PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password TEXT NOT NULL
);

-- produk topup
CREATE TABLE produk (
  id SERIAL PRIMARY KEY,
  nama_game VARCHAR(100) NOT NULL,
  nominal VARCHAR(50) NOT NULL,
  harga INT NOT NULL,
  diskon INT DEFAULT 0,
  aktif BOOLEAN DEFAULT TRUE
);

-- event promo
CREATE TABLE event (
  id SERIAL PRIMARY KEY,
  judul VARCHAR(100),
  deskripsi TEXT,
  banner_url TEXT,
  tanggal_mulai DATE,
  tanggal_akhir DATE
);

-- transaksi customer
CREATE TABLE transaksi (
  id SERIAL PRIMARY KEY,
  id_produk INT REFERENCES produk(id),
  user_id_game VARCHAR(100),
  kontak VARCHAR(100),
  status VARCHAR(20) DEFAULT 'pending',
  waktu TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
