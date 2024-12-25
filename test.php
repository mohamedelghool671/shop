<?php 

/*
users 
products 
orders 
categories 
reviews 

users : orders => 1 : m ;
products : orders => m : m ;
categories : products => 1 : m ; 
users : reviews => 1 : m ; 

products table ==>  (id , category, title, description , price , quantity , image)
users table ==> (username , email , password , phone , address)
orders table ==> 
categories table ==> (id , title )



*/