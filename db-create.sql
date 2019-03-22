CREATE DATABASE inventory;

use inventory;

CREATE TABLE works (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    item VARCHAR(30) NOT NULL,
    room VARCHAR(50) NOT NULL,
    make_brand VARCHAR(20) NOT NULL,
    model VARCHAR(20) NOT NULL,
    serial_number VARCHAR(20) NOT NULL,
    purchase_price VARCHAR(8) NOT NULL,
    purchase_date VARCHAR(20) NOT NULL,
    receipt VARCHAR(10) NOT NULL,
    heirloom_antique VARCHAR(10) NOT NULL,
    picture BLOB NOT NULL,
    description VARCHAR(500) NOT NULL,
    date TIMESTAMP
);