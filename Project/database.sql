create database test;
use test;
create table users(
    id int(11) not null auto_increment,
    sname varchar(100) not null,
    age int(3) not null,
    email varchar(100) not null,
    primary key (id)
);