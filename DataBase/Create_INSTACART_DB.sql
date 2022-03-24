DROP DATABASE IF EXISTS INSTACART;
CREATE DATABASE INSTACART; 
USE INSTACART;

SET NAMES utf8 ;
SET character_set_client = utf8mb4 ;
CREATE TABLE CUSTOMER
( Customer_ID	  INT 			  NOT NULL,
  Fname           VARCHAR(25)     NOT NULL,
  Lname           VARCHAR(25)     NOT NULL,
  Email           VARCHAR(50)     NOT NULL,
  passwords        INT 			  NOT NULL,
  PhoneNumber     INT,
  Bdate           DATE,	 		  
  Address         VARCHAR(100),    
  Reward_points       INT	     NOT NULL, 

PRIMARY KEY   (Customer_ID),
UNIQUE (Email,  phoneNumber));
INSERT INTO Customer VALUES (111111,'John','Smith','halsowadi1@gmail.com',1234, 313,'1965-01-09','731 Fondren, Houston TX',5);

CREATE TABLE PRODUCT
( Product_ID	 	 INT 			  	NOT NULL,
  Product_type	  	 varchar(30),
  weight           	 int		     	NOT NULL,
  product_name       VARCHAR(30)        NOT NULL,
  Product_materials  VARCHAR(50)     	NOT NULL,
  stock_Count        INT 	      		NOT NULL,
  serialnumber       INT(50)  			NOT NULL,
  Age_req            INT,	 		  
  Tax         	     INT 				NOT NULL,   
  Reviews		      DOUBLE, 
  
PRIMARY KEY   (Product_ID),
UNIQUE (serialnumber));


CREATE TABLE CART
( Cart_ID			int				  NOT NULL,
  Customer_IDC	  	INT 			  NOT NULL,
  Fname           	VARCHAR(25)       NOT NULL,
  Lname           	VARCHAR(25)       NOT NULL,
  Number_items    	INT 			  NOT NULL,
  Delivery        	BOOlEAN     	  NOT NULL,
  Employee_Discount BOOLEAN			  NOT NULL,
  
PRIMARY KEY   (Cart_ID), 
FOREIGN KEY (Customer_IDC) REFERENCES CUSTOMER (Customer_ID));

CREATE TABLE CHECKOUT
( RECPIT_ID			int				  NOT NULL,
  Shipping_Adress	VARCHAR(100),
  Tax           	INT       		  NOT NULL,
  Subtotal          INT       		  NOT NULL,
  GrandTotal    	INT 			  NOT NULL,
  Online_Recpit    	BOOlEAN     	  NOT NULL,
  Coupon 			BOOLEAN 		  NOT NULL,
  
PRIMARY KEY   (RECPIT_ID), 
FOREIGN KEY (RECPIT_ID) REFERENCES CART (Cart_ID));

CREATE TABLE Cart_Items
( Cart_IDCI			int				  NOT NULL,
  Product_Name		VARCHAR(100)      NOT NULL,
  Product_IDCI      INT       		  NOT NULL,
  
PRIMARY KEY   (Cart_IDCI), 
FOREIGN KEY (Product_IDCI) REFERENCES PRODUCT (Product_ID),
FOREIGN KEY (Cart_IDCI) REFERENCES CART (Cart_ID));

CREATE TABLE Searches
( Term				VarChar(100)	  NOT NULL,
  Result_type		VARCHAR(100),
  Customer_IDS      INT       		  NOT NULL,
  Product_IDS	    INT				  NOT NULL,
  
PRIMARY KEY   (Customer_IDS), 
FOREIGN KEY (Customer_IDS) REFERENCES CUSTOMER (Customer_ID),
FOREIGN KEY (Product_IDS) REFERENCES PRODUCT (Product_ID));


CREATE TABLE Purchases
( Item_Name		VarChar(100)	 	  NOT NULL,
  Result_type		VARCHAR(100),
  Customer_IDP      INT       		  NOT NULL,
  Item_IDP	    	INT				  NOT NULL,
  
PRIMARY KEY   (Customer_IDP), 
FOREIGN KEY (Customer_IDP) REFERENCES CUSTOMER (Customer_ID),
FOREIGN KEY (Item_IDP) REFERENCES PRODUCT (Product_ID));



