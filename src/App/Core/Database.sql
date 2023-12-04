-- Exported from QuickDBD: https://www.quickdatabasediagrams.com/
-- Link to schema: https://app.quickdatabasediagrams.com/#/d/BIXOl5
-- NOTE! If you have used non-SQL datatypes in your design, you will have to change these here.

-- Exported from QuickDBD: https://www.quickdatabasediagrams.com/
-- NOTE! If you have used non-SQL datatypes in your design, you will have to change these here.

CREATE TABLE `User` (
    `id` int  NOT NULL ,
    `admin` boolean  NOT NULL ,
    `name` varchar(30)  NOT NULL ,
    `firstname` varchar(30)  NOT NULL ,
    `nb_phone` varchar(30)  NOT NULL ,
    `mail` varchar(30)  NOT NULL ,
    `password` varchar(30)  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `Favorite` (
    `id_user` int  NOT NULL ,
    `id_vehicle` int  NOT NULL 
);

CREATE TABLE `Brand` (
    `id` int  NOT NULL ,
    `name_brand` varchar(30)  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `Places` (
    `id` int  NOT NULL ,
    `nb_places` int  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `Color` (
    `id` int  NOT NULL ,
    `name_color` varchar(30)  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `vehicle` (
    `id` int  NOT NULL ,
    `name_model` varchar(30)  NOT NULL ,
    `price` float  NOT NULL ,
    `description_vehicle` text  NOT NULL ,
    `id_brand` int  NOT NULL ,
    `id_nb_place` int  NOT NULL ,
    `id_color` int  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `Comment` (
    `id` int  NOT NULL ,
    `id_user` int  NOT NULL ,
    `id_vehicle` int  NOT NULL ,
    `comment` text  NOT NULL ,
    `note` int  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `Reservation` (
    `id` int  NOT NULL ,
    `state` int  NOT NULL ,
    `id_user` int  NOT NULL ,
    `id_vehicle` int  NOT NULL ,
    `date_begin` datetime  NOT NULL ,
    `date_end` datetime  NOT NULL ,
    `nb_day` int  NOT NULL ,
    `total_price` float  NOT NULL ,
    `date_reservation` datetime  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

ALTER TABLE `Favorite` ADD CONSTRAINT `fk_Favorite_id_user` FOREIGN KEY(`id_user`)
REFERENCES `User` (`id`);

ALTER TABLE `Favorite` ADD CONSTRAINT `fk_Favorite_id_vehicle` FOREIGN KEY(`id_vehicle`)
REFERENCES `vehicle` (`id`);

ALTER TABLE `Places` ADD CONSTRAINT `fk_Places_id` FOREIGN KEY(`id`)
REFERENCES `vehicle` (`id_nb_place`);

ALTER TABLE `Color` ADD CONSTRAINT `fk_Color_id` FOREIGN KEY(`id`)
REFERENCES `vehicle` (`id_color`);

ALTER TABLE `vehicle` ADD CONSTRAINT `fk_vehicle_id_brand` FOREIGN KEY(`id_brand`)
REFERENCES `Brand` (`id`);

ALTER TABLE `Comment` ADD CONSTRAINT `fk_Comment_id_user` FOREIGN KEY(`id_user`)
REFERENCES `User` (`id`);

ALTER TABLE `Comment` ADD CONSTRAINT `fk_Comment_id_vehicle` FOREIGN KEY(`id_vehicle`)
REFERENCES `vehicle` (`id`);

ALTER TABLE `Reservation` ADD CONSTRAINT `fk_Reservation_id_user` FOREIGN KEY(`id_user`)
REFERENCES `User` (`id`);

ALTER TABLE `Reservation` ADD CONSTRAINT `fk_Reservation_id_vehicle` FOREIGN KEY(`id_vehicle`)
REFERENCES `vehicle` (`id`);





-- INSERT
-- INSERT INTO Brand (id, name_brand) VALUES (1, "Renault");
