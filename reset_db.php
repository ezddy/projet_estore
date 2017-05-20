<?php  
	require_once('database.php');
	// We have to make sure to drop the TABLE IF EXISTS which contains foreign key, etc before everything else
	exec_cmd("DROP TABLE IF EXISTS contains");
	exec_cmd("DROP TABLE IF EXISTS Product");
	exec_cmd("DROP TABLE IF EXISTS Orders");
	exec_cmd("DROP TABLE IF EXISTS Category");
	exec_cmd("DROP TABLE IF EXISTS Brand");
	exec_cmd("DROP TABLE IF EXISTS User");

	// Creating all the tables
	
	exec_cmd("CREATE TABLE User(
        id            int (11) Auto_increment  NOT NULL ,
        email         Varchar (25) ,
        password      varbinary (33) ,
        address       Varchar (25) ,
        phone         Varchar (25) ,
        city          Varchar (25) ,
        zipcode       Varchar (25) ,
        lastname      Varchar (25) ,
        firstname     Varchar (25) ,
        password_salt varbinary (33) ,
        role          Varchar (25) ,
        PRIMARY KEY (id )
)");
	exec_cmd("CREATE TABLE Product(
        id          int (11) Auto_increment  NOT NULL ,
        name        Varchar (25) ,
        description Longtext ,
        price       Double ,
        image       Varchar (25) ,
        id_Category Int ,
        id_Brand    Int ,
        PRIMARY KEY (id )
)");
	exec_cmd("CREATE TABLE Brand(
        id   int (11) Auto_increment  NOT NULL ,
        name Varchar (25) ,
        PRIMARY KEY (id )
)");
	exec_cmd("CREATE TABLE Category(
        id   int (11) Auto_increment  NOT NULL ,
        name Varchar (25) ,
        PRIMARY KEY (id )
)");
	exec_cmd("CREATE TABLE Orders(
        id           int (11) Auto_increment  NOT NULL ,
        status       Varchar (25) ,
        dateDelivery Date ,
        dateOrder    Date ,
        id_User      Int ,
        PRIMARY KEY (id )
)");
	exec_cmd("CREATE TABLE contains(
        quantity  Int ,
        id        Int NOT NULL ,
        id_Orders Int NOT NULL ,
        PRIMARY KEY (id ,id_Orders )
)");


	// Modifying the foreign keys
	
        exec_cmd("ALTER TABLE Product ADD CONSTRAINT FK_Product_id_Category FOREIGN KEY (id_Category) REFERENCES Category(id)");
        exec_cmd("ALTER TABLE Product ADD CONSTRAINT FK_Product_id_Brand FOREIGN KEY (id_Brand) REFERENCES Brand(id)");
        exec_cmd("ALTER TABLE Orders ADD CONSTRAINT FK_Orders_id_User FOREIGN KEY (id_User) REFERENCES User(id)");
        exec_cmd("ALTER TABLE contains ADD CONSTRAINT FK_contains_id FOREIGN KEY (id) REFERENCES Product(id)");
        exec_cmd("ALTER TABLE contains ADD CONSTRAINT FK_contains_id_Orders FOREIGN KEY (id_Orders) REFERENCES Orders(id)");
	
        // Inserting admin
        insert_user('david@gmail.com', 'azerty', '84 bd massena', '0673367797', 'Paris', '75013', 'Ha', 'David', 'admin');


?>