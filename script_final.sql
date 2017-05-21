#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        id            int (11) Auto_increment  NOT NULL ,
        email         Varchar (25) ,
        password      Varbinary (25) ,
        address       Varchar (25) ,
        phone         Varchar (25) ,
        city          Varchar (25) ,
        zipcode       Varchar (25) ,
        lastname      Varchar (25) ,
        firstname     Varchar (25) ,
        password_salt Varbinary (25) ,
        role          Varchar (25) ,
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
# Table: Orders
#------------------------------------------------------------

CREATE TABLE Orders(
        id           int (11) Auto_increment  NOT NULL ,
        status       Varchar (25) ,
        dateDelivery Date ,
        dateOrder    Date ,
        id_User      Int ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: contains
#------------------------------------------------------------

CREATE TABLE contains(
        quantity  Int ,
        id        Int NOT NULL ,
        id_Orders Int NOT NULL ,
        PRIMARY KEY (id ,id_Orders )
)ENGINE=InnoDB;

ALTER TABLE Product ADD CONSTRAINT FK_Product_id_Category FOREIGN KEY (id_Category) REFERENCES Category(id);
ALTER TABLE Product ADD CONSTRAINT FK_Product_id_Brand FOREIGN KEY (id_Brand) REFERENCES Brand(id);
ALTER TABLE Orders ADD CONSTRAINT FK_Orders_id_User FOREIGN KEY (id_User) REFERENCES User(id);
ALTER TABLE contains ADD CONSTRAINT FK_contains_id FOREIGN KEY (id) REFERENCES Product(id);
ALTER TABLE contains ADD CONSTRAINT FK_contains_id_Orders FOREIGN KEY (id_Orders) REFERENCES Orders(id);
