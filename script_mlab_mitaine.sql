drop database mlab;
drop table mlab_product;
create database mlab;

create table mlab_client (
client_id int not null auto_increment primary key,
client_name varchar(45) not null,
client_contact varchar(60),
client_address varchar(100),
client_postal_code varchar(7),
client_email varchar(50) not null unique,
client_phone varchar(20)
);

create table mlab_product (
product_id int not null auto_increment primary key,
product_name varchar(45) not null,
product_description varchar(200),
product_cost double,
product_price double not null
);

create table mlab_sale (
sale_id int not null auto_increment primary key,
date datetime not null,
sale_client_id int,
constraint fk_sale_client_id foreign key (sale_client_id) 
references mlab_client (client_id)
);	



create table mlab_product_sale (
ps_sale_id int not null,
ps_product_id int not null,
ps_quantity int not null,
ps_price double not null,
constraint primary key (ps_sale_id, ps_product_id),
constraint fk_ps_sale_id foreign key (ps_sale_id) 
references mlab_sale (sale_id),
constraint fk_ps_product_id foreign key (ps_product_id) 
references mlab_product (product_id)
);	

create table librairie.facture (
factureId int auto_increment not null primary key,
factureDate date not null,
facturePaiementId int,
factureLivraisonId int, 
factureClientId int,
constraint fk_facturePaiementId foreign key (facturePaiementId) references paiement (paiementId),
constraint fk_factureLivraisonId foreign key (factureLivraisonId) references livraison (livraisonId),
constraint fk_factureClientId foreign key (factureClientId) references client (clientId)
);