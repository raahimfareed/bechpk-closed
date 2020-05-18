create table users (
    UserId varchar(60) primary key not null,
    FirstName varchar(25) not null,
    LastName varchar(25) not null,
    Email varchar(255) not null,
    `Password` varchar(255) not null,
    ProfileImage varchar(255),
    ProfileDescription varchar(255),
    TotalAds int(7) default 0,
    ActiveAds int(7) default 0,
    AccountStatus int(2) DEFAULT 0,
    AccountType varchar(50) default 'Basic'
    );