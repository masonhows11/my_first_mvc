<?php


$query_create_table = 'create table users(
         id int primary key auto_increment,
         username varchar(30) not null,
         fname varchar(30) not null,
         lname varchar(30) not null,
         password varchar(30) not null
        );';


$query_add_user = 'insert into users(username,fname,lname,password)
                    values
                    ("alicj","ali","lolo","123456789") ,
                    ("alicj1","ali1","lologhg","1289..//") ,
                    ("alicj2","ali2","lologhg","1289..//**"),
                    ("alikk","ali","owjy","123456789") ,
                    ("narges12","narges","mohammady","12456..//") ,
                    ("laleh30","laleh","marban","12622..//**");';