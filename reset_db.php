<?php  
	require_once('database.php');
	// We have to make sure to drop the TABLE IF EXISTSs which contains foreign key, etc before everything else
	exec_cmd("DROP TABLE IF EXISTS contains");
	exec_cmd("DROP TABLE IF EXISTS Product");
	exec_cmd("DROP TABLE IF EXISTS Orders");
	exec_cmd("DROP TABLE IF EXISTS Category");
	exec_cmd("DROP TABLE IF EXISTS Brand");
	exec_cmd("DROP TABLE IF EXISTS User");

	// Creating all the tables
	
	exec_cmd("CREATE TABLE User(
        id_User   int (11) Auto_increment  NOT NULL ,
        email     Varchar (25) ,
        password  Varchar (25) ,
        address   Varchar (25) ,
        phone     Varchar (25) ,
        city      Varchar (25) ,
        zipcode   Varchar (25) ,
        lastname  Varchar (25) ,
        firstname Varchar (25) ,
        PRIMARY KEY (id_User )
)");
	exec_cmd("CREATE TABLE Product(
        id_Product  int (11) Auto_increment  NOT NULL ,
        name        Varchar (25) ,
        description Longtext ,
        price       Double ,
        image       Varchar (25) ,
        id_Category Int ,
        id_Brand    Int ,
        PRIMARY KEY (id_Product )
)");
	exec_cmd("CREATE TABLE Brand(
        id_Brand int (11) Auto_increment  NOT NULL ,
        name     Varchar (25) ,
        PRIMARY KEY (id_Brand )
)");
	exec_cmd("CREATE TABLE Category(
        id_Category int (11) Auto_increment  NOT NULL ,
        name        Varchar (25) ,
        PRIMARY KEY (id_Category )
)");
	exec_cmd("CREATE TABLE Orders(
        id_Order         int (11) Auto_increment  NOT NULL ,
        shipping_address Varchar (25) ,
        status           Varchar (25) ,
        dateDelivery     Date ,
        dateOrder        Date ,
        totalPrice       Double ,
        id_User          Int ,
        PRIMARY KEY (id_Order )
)");
	exec_cmd("CREATE TABLE contains(
        id_Order   Int NOT NULL ,
        id_Product Int NOT NULL ,
        PRIMARY KEY (id_Order ,id_Product )
)");


	// Modifying the foreign keys
	exec_cmd("ALTER TABLE Product ADD CONSTRAINT FK_Product_id_Category FOREIGN KEY (id_Category) REFERENCES Category(id_Category)");
	exec_cmd("ALTER TABLE Product ADD CONSTRAINT FK_Product_id_Brand FOREIGN KEY (id_Brand) REFERENCES Brand(id_Brand)");
	exec_cmd("ALTER TABLE Orders ADD CONSTRAINT FK_Order_id_User FOREIGN KEY (id_User) REFERENCES User(id_User)");
	exec_cmd("ALTER TABLE contains ADD CONSTRAINT FK_contains_id_Orders FOREIGN KEY (id_Order) REFERENCES Orders(id_Order)");
	exec_cmd("ALTER TABLE contains ADD CONSTRAINT FK_contains_id_Product FOREIGN KEY (id_Product) REFERENCES Product(id_Product)");



?>