<?php  
	require_once('database.php');
        require_once('controller/mail.php');
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
        email         Varchar (40) ,
        password      varbinary (33) ,
        address       Varchar (30) ,
        phone         Varchar (25) ,
        city          Varchar (25) ,
        zipcode       Varchar (25) ,
        lastname      Varchar (25) ,
        firstname     Varchar (25) ,
        password_salt varbinary (33) ,
        role          Varchar (25) ,
        hash          Varchar(33),
        PRIMARY KEY (id )
)");
	exec_cmd("CREATE TABLE Product(
        id          int (11) Auto_increment  NOT NULL ,
        name        Varchar (25) ,
        description Longtext ,
        price       decimal(19,2) ,
        image       VARCHAR(2083) ,
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
        shipping_address        Varchar(50),
        dateDelivery Date ,
        dateOrder    Date ,
        id_User      Int ,
        totalPrice   decimal(19,4),
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
        insert_user('lp.denisthy@gmail.com', 'azerty', '', '012345678', 'Paris', '75013', 'Thy', 'Denis', 'user');
        insert_category('Keyboard');
        insert_category('Mice');
        insert_brand('Razer');
        insert_brand('SteelSeries');
        insert_product('BlackWidow', 'Great keyboard from Razer', 139.95, 'http://i.imgur.com/fzLpEDJ.jpg', 1,1);
        insert_product('DeathAdder', 'Great mouse from Razer', 59.99, 'https://d1urewwzb2qwii.cloudfront.net/sys-master/images/h14/hbc/8823344791582', 2,1);
        insert_product('Apex M500', 'Great keyboard from SteelSeries', 149.99, 'https://media.steelseriescdn.com/thumbs/catalogue/products/00710-apex-m500/fc02865fcd854eac8914f7ce55e693e0.png.1000x575_q85_crop-smart.png', 1,2);
        insert_product('Rival 100', 'Great mouse from SteelSeries', 59.99, 'https://media.steelseriescdn.com/filer_public/e0/05/e005554b-b4bb-40c7-b01c-f26406098e34/purchase-gallery-template-100__hero.png', 2,2);        
?>