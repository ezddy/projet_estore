#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        id        int (11) Auto_increment  NOT NULL ,
        email     Varchar (25) ,
        password  Varchar (25) ,
        address   Varchar (25) ,
        phone     Varchar (25) ,
        city      Varchar (25) ,
        zipcode   Varchar (25) ,
        lastname  Varchar (25) ,
        firstname Varchar (25) ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Product
#------------------------------------------------------------

CREATE TABLE Product(
        id          int (11) Auto_increment  NOT NULL ,
        name        Varchar (25) ,
        description Longtext ,
        price       Double ,
        image       Varchar (25) ,
        id_Category Int ,
        id_Brand    Int ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Brand
#------------------------------------------------------------

CREATE TABLE Brand(
        id   int (11) Auto_increment  NOT NULL ,
        name Varchar (25) ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Category
#------------------------------------------------------------

CREATE TABLE Category(
        id   int (11) Auto_increment  NOT NULL ,
        name Varchar (25) ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: order
#------------------------------------------------------------

CREATE TABLE order(
        id           int (11) Auto_increment  ,
        dateOrder    Date ,
        status       Varchar (25) ,
        dateDelivery Date ,
        datePayment  Date ,
        totalPrice   Double ,
        id_User      Int NOT NULL ,
        id_Product   Int NOT NULL ,
        PRIMARY KEY (id_User ,id_Product )
)ENGINE=InnoDB;

ALTER TABLE Product ADD CONSTRAINT FK_Product_id_Category FOREIGN KEY (id_Category) REFERENCES Category(id);
ALTER TABLE Product ADD CONSTRAINT FK_Product_id_Brand FOREIGN KEY (id_Brand) REFERENCES Brand(id);
ALTER TABLE order ADD CONSTRAINT FK_order_id_User FOREIGN KEY (id_User) REFERENCES User(id);
ALTER TABLE order ADD CONSTRAINT FK_order_id_Product FOREIGN KEY (id_Product) REFERENCES Product(id);
