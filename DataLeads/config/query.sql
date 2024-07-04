CREATE DATABASE lead_management;

USE lead_management;

CREATE TABLE produk (
    id_produk INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100) NOT NULL
);

CREATE TABLE sales (
    id_sales INT AUTO_INCREMENT PRIMARY KEY,
    nama_sales VARCHAR(100) NOT NULL
);

CREATE TABLE leads (
    id_leads INT AUTO_INCREMENT PRIMARY KEY,
    tanggal DATE NOT NULL,
    id_sales INT NOT NULL,
    id_produk INT NOT NULL,
    no_wa VARCHAR(20) NOT NULL,
    nama_lead VARCHAR(100) NOT NULL,
    kota VARCHAR(50) NOT NULL,
    FOREIGN KEY (id_sales) REFERENCES sales(id_sales),
    FOREIGN KEY (id_produk) REFERENCES produk(id_produk)
);

INSERT INTO produk (nama_produk) VALUES 
('Cipta Residence 2'), 
('The Rich'), 
('Namorambe City'), 
('Grand Banten'), 
('Turi Mansion'), 
('Cipta Residence 1');

INSERT INTO sales (nama_sales) VALUES 
('Sales 1'), 
('Sales 2'), 
('Sales 3');