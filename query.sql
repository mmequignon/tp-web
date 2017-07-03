CREATE TABLE basket (
    id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    amount FLOAT
);

CREATE TABLE users (
    id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    login varchar(50) NOT NULL,
    password varchar(255) NOT NULL,
    email varchar(100) NOT NULL,
    firstname varchar(50) NOT NULL,
    lastname varchar(50) NOT NULL,
    street VARCHAR(50),
    city VARCHAR(50),
    postcode VARCHAR(10), 
    logged TINYINT DEFAULT 0,
    admin TINYINT DEFAULT 0,
    basket_id int(10) NOT NULL,
    CONSTRAINT fk_user_basket FOREIGN KEY (basket_id) REFERENCES basket(id),
    active TINYINT DEFAULT 1
);

INSERT INTO basket (id, amount) VALUES (1, 0.0);
INSERT INTO basket (id, amount) VALUES (2, 0.0);
INSERT INTO users (id, login, password, email, firstname, lastname, admin, basket_id, street, city, postcode) VALUES (1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'admin@toto.com', 'admin', 'admin', 1, 1, '221B Baker Street', 'London', 'NW1 6XE'); 
INSERT INTO users (id, login, password, email, firstname, lastname, admin, basket_id, street, city, postcode) VALUES (2, 'user', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 'user@toto.com', 'user', 'user', 0, 2, '42 Wallaby Way', 'Syndey', '2055'); 


CREATE TABLE product_category (
    id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20),
    active TINYINT DEFAULT 1,
    stockable TINYINT DEFAULT 0
);

CREATE TABLE product (
    id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    price FLOAT,
    description VARCHAR(50),
    detail VARCHAR(256),
    stock INT,
    pic VARCHAR(50),
    active TINYINT DEFAULT 1,
    product_category_id INT(10) NOT NULL,
    CONSTRAINT fk_product_product_category FOREIGN KEY (product_category_id) REFERENCES product_category(id)
);

INSERT INTO product_category (id, name) VALUES (1, 'service');
INSERT INTO product_category (id, name, stockable) VALUES (2, 'produit', 1);
INSERT INTO product_category (id, name) VALUES (3, 'livraison');
INSERT INTO product (name, price, stock, product_category_id, pic, description, detail) VALUES ('vidange', 100.0, 0, 1, 'vidange.jpg', 'Hodor hodor HODOR -hodor', 'Hodor hodor - HODOR hodor, hodor hodor; hodor hodor - hodor; hodor hodor. Hodor. Hodor. Hodor HODOR hodor, hodor HODOR hodor, hodor hodor hodor, hodor, hodor hodor. Hodor hodor - hodor hodor? Hodor. Hodor hodor hodor.');
INSERT INTO product (name, price, stock, product_category_id, pic, description, detail) VALUES ('équilibrage', 50.0, 0, 1, 'equilibrage.jpg', 'Hodor hodor HODOR -hodor', 'Hodor hodor - HODOR hodor, hodor hodor; hodor hodor - hodor; hodor hodor. Hodor. Hodor. Hodor HODOR hodor, hodor HODOR hodor, hodor hodor hodor, hodor, hodor hodor. Hodor hodor - hodor hodor? Hodor. Hodor hodor hodor.');
INSERT INTO product (name, price, stock, product_category_id, pic, description, detail) VALUES ('autoradio', 100.0, 20, 2, 'autoradio.jpg', 'Hodor hodor HODOR -hodor', 'Hodor hodor - HODOR hodor, hodor hodor; hodor hodor - hodor; hodor hodor. Hodor. Hodor. Hodor HODOR hodor, hodor HODOR hodor, hodor hodor hodor, hodor, hodor hodor. Hodor hodor - hodor hodor? Hodor. Hodor hodor hodor.');
INSERT INTO product (name, price, stock, product_category_id, pic, description, detail) VALUES ('kit mains-libres', 50.0, 20, 2, 'kml.jpg', 'Hodor hodor HODOR -hodor', 'Hodor hodor - HODOR hodor, hodor hodor; hodor hodor - hodor; hodor hodor. Hodor. Hodor. Hodor HODOR hodor, hodor HODOR hodor, hodor hodor hodor, hodor, hodor hodor. Hodor hodor - hodor hodor? Hodor. Hodor hodor hodor.');
INSERT INTO product (name, price, stock, product_category_id, pic, description, detail) VALUES ('En point relai', '0', '0', 3, 'relai_colis.jpg', 'Hodor hodor HODOR -hodor', 'Hodor hodor - HODOR hodor, hodor hodor; hodor hodor - hodor; hodor hodor. Hodor. Hodor. Hodor HODOR hodor, hodor HODOR hodor, hodor hodor hodor, hodor, hodor hodor. Hodor hodor - hodor hodor? Hodor. Hodor hodor hodor.');
INSERT INTO product (name, price, stock, product_category_id, pic, description, detail) VALUES ('Chronopost', 11.90, 0, 3, 'chronopost.jpg', 'Hodor hodor HODOR -hodor', 'Hodor hodor - HODOR hodor, hodor hodor; hodor hodor - hodor; hodor hodor. Hodor. Hodor. Hodor HODOR hodor, hodor HODOR hodor, hodor hodor hodor, hodor, hodor hodor. Hodor hodor - hodor hodor? Hodor. Hodor hodor hodor.');
INSERT INTO product (name, price, stock, product_category_id, pic, description, detail) VALUES ('Colissimo', '5.90', '0', 3, 'colissimo.jpg', 'Hodor hodor HODOR -hodor', 'Hodor hodor - HODOR hodor, hodor hodor; hodor hodor - hodor; hodor hodor. Hodor. Hodor. Hodor HODOR hodor, hodor HODOR hodor, hodor hodor hodor, hodor, hodor hodor. Hodor hodor - hodor hodor? Hodor. Hodor hodor hodor.');

CREATE TABLE basket_line (
    id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    basket_id int(10) NOT NULL,
    product_id int(10) NOT NULL,
    product_qty INT,
    amount FLOAT,
    active TINYINT NOT NULL default 1,
    CONSTRAINT fk_basket_line_basket FOREIGN KEY (basket_id) REFERENCES basket(id),
    CONSTRAINT fk_basket_line_product FOREIGN KEY (product_id) REFERENCES product(id)
);
  
CREATE TABLE payment_mode (
    id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50)
);

INSERT INTO payment_mode (id, name) VALUES (1, 'paypal');
INSERT INTO payment_mode (id, name) VALUES (2, 'chèque');
INSERT INTO payment_mode (id, name) VALUES (3, 'virement');

CREATE TABLE invoice (
    id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT(10) NOT NULL,
    payment_mode_id INT(10) NOT NULL,
    amount FLOAT,
    create_date DATE,
    CONSTRAINT fk_invoice_user FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT fk_invoice_payment_mode FOREIGN KEY (payment_mode_id) REFERENCES payment_mode(id)
);

CREATE TABLE invoice_line (
    id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    product_id INT(10) NOT NULL,
    invoice_id INT(10) NOT NULL,
    product_qty INT,
    amount FLOAT,
    CONSTRAINT fk_il_i FOREIGN KEY (invoice_id) REFERENCES invoice(id),
    CONSTRAINT fk_il_product FOREIGN KEY (product_id) REFERENCES product(id)
);
