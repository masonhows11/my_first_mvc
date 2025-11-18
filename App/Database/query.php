<?php


$query = 'create table users(
         id int primary key auto_increment,
         username varchar(30) not null,
         fname varchar(30) not null,
         lname varchar(30) not null,
         password varchar(30) not null
        );';