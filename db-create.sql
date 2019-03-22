CREATE DATABASE inventory;

use inventory;

CREATE TABLE works (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    item VARCHAR(30) NOT NULL,
    room VARCHAR(50) NOT NULL,
    makebrand VARCHAR(20) NOT NULL,
    model VARCHAR(20) NOT NULL,
    serialnumber VARCHAR(20) NOT NULL,
    purchaseprice VARCHAR(8) NOT NULL,
    purchasedate VARCHAR(20) NOT NULL,
    purchaseplace VARCHAR (30) NOT NULL,
    receipt VARCHAR(10) NOT NULL,
    heirloomantique VARCHAR(10) NOT NULL,
    picture BLOB NOT NULL,
    description VARCHAR(500) NOT NULL,
    date TIMESTAMP
);