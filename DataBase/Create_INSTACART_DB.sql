DROP DATABASE IF EXISTS INSTACART;
CREATE DATABASE INSTACART; 
USE INSTACART;

SET NAMES utf8 ;
SET character_set_client = utf8mb4 ;
CREATE TABLE users
( id	  		INT 			  NOT NULL,
  username		char(25)          NOT NULL,
  email           VARCHAR(50)     NOT NULL,
  password       VARCHAR(50) 	  NOT NULL,

PRIMARY KEY   (id));
INSERT INTO users VALUES (1,'halsowadi' ,'halsowadi1@gmail.com' ,'1234' );
INSERT INTO users VALUES (2,'joey124','joeyman@gmail.com' ,'1234' );
INSERT INTO users VALUES (3,'lisp3' ,'lispsucks@gmail.com' ,'1234' );
INSERT INTO users VALUES (4, 'cos2354','cosc@gmail.com' ,'1234' );
CREATE TABLE CUSTOMER
( Customer_ID	  INT 			  NOT NULL,
  Fname           VARCHAR(25)     NOT NULL,
  Lname           VARCHAR(25)     NOT NULL,
  PhoneNumber     INT,
  Bdate           DATE,	 		  
  Address         VARCHAR(100),    
  Reward_points       INT	     NOT NULL, 
PRIMARY KEY   (Customer_ID),
FOREIGN KEY (Customer_ID) REFERENCES users (id));
INSERT INTO Customer VALUES (1,'John','Smith', 313,'1965-01-02','731 Fondren, Houston TX',5);
INSERT INTO Customer VALUES (2,'Joe','Johnson', 313,'1965-05-03','731 Joy st, Ann Arbor MI',1);
INSERT INTO Customer VALUES (3,'Hussein','Alsowadi', 313,'1999-01-09','73132 Katherine, Canton MI',1);
INSERT INTO Customer VALUES (4,'Joe','Johnson', 313,'1965-01-09','73144 Katherine, Canton MI',1);
CREATE TABLE PRODUCT
(Product_ID			int			  NOT NULL,
product_name       VARCHAR(30)        NOT NULL,
  Product_materials  VARCHAR(50)	  NOT NULL,
  stock_Count        INT			  NOT NULL,		  
  Price         	     INT 				NOT NULL,    
  
PRIMARY KEY   (Product_ID));
INSERT INTO PRODUCT VALUES (1,'Dove Soap Bar','soap stuff, chemicals, something that smells good', 2,  4);
INSERT INTO PRODUCT VALUES (2,'Axe Soap Bar ','soap stuff, chemicals, something that smells good', 2 , 4);
INSERT INTO PRODUCT VALUES (3,'Johnson&Johnson Soap Bar ','soap stuff, chemicals, something that smells good', 4,4);
INSERT INTO PRODUCT VALUES (4,'Lays Chips','pototeos, GMOS, salt, corn, startch', 40, 2);
INSERT INTO PRODUCT VALUES (5,'Sun Chips','pototeos, GMOS, salt, corn, startch', 35, 1);
INSERT INTO PRODUCT VALUES (6,'Cookies','sugar, GMOS, salt, corn, startch, flour, choclate', 35,5);
INSERT INTO PRODUCT VALUES (7,'Fallout: New Vegas','video game made by Bethesda', 35,60);
INSERT INTO PRODUCT VALUES (8,'Cat Squishmellow','cotton', 40, 10);
INSERT INTO PRODUCT VALUES (9,'Dog Squishmellow','cotton', 40,10);
CREATE TABLE CART
( Cart_ID			int				  NOT NULL,
  Customer_IDC	  	INT 			  NOT NULL,
  Number_items    	INT 			  NOT NULL,
  Delivery        	BOOlEAN     	  NOT NULL,
  Employee_Discount BOOLEAN			  NOT NULL,
  
PRIMARY KEY   (Cart_ID), 
FOREIGN KEY (Customer_IDC) REFERENCES users (id));
INSERT INTO CART VALUES (1,1,  2, false, false);
INSERT INTO CART VALUES (2,2,  2, false, false);
INSERT INTO CART VALUES (3,3,  2, false, false);
INSERT INTO CART VALUES (4,4,  2, false, false);


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
INSERT INTO CHECKOUT VALUES (1, '4354 katherine st Ypsilanti MI 48187', 1, 2, 3, true, false);
INSERT INTO CHECKOUT VALUES (2, '333 State st Ypsilanti MI 48187', 1, 2, 3, true, false);
INSERT INTO CHECKOUT VALUES (3, '4324 silver st Ypsilanti MI 48187', 1, 2, 3, true, false);
INSERT INTO CHECKOUT VALUES (4, '1111 wat st Ypsilanti MI 48187', 1, 2, 3, true, false);

CREATE TABLE Cart_Items
( Cart_IDCI			int				  NOT NULL,
  Product_Name		VARCHAR(30)      NOT NULL,
  Product_IDCI      INT       		  NOT NULL,
  
PRIMARY KEY   (Cart_IDCI), 
FOREIGN KEY (Cart_IDCI) REFERENCES CART (Cart_ID));



CREATE TABLE Searches
( Term				VarChar(100)	  NOT NULL,
  Result_type		VARCHAR(100),
  Customer_IDS      INT       		  NOT NULL,
  Product_IDS	    INT				  NOT NULL,
  
PRIMARY KEY   (Customer_IDS), 
FOREIGN KEY (Customer_IDS) REFERENCES users (id));


CREATE TABLE Purchases
( Item_Name		VarChar(100)	 	  NOT NULL,
  Result_type		VARCHAR(100),
  Customer_IDP      INT       		  NOT NULL,
  Item_IDP	    	INT				  NOT NULL,
  
PRIMARY KEY   (Customer_IDP), 
FOREIGN KEY (Customer_IDP) REFERENCES users (id));



