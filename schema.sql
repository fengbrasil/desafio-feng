
-- Clients Table --
CREATE TABLE `clients` (
	`id`       INTEGER,
	`name`     VARCHAR(255) NOT NULL,
	`email`    VARCHAR(255) NOT NULL,
	`phone`    VARCHAR(255) NOT NULL,
	`created`  DATETIME DEFAULT NULL,
	PRIMARY KEY(`id`)
);

-- Items Table --
CREATE TABLE `items` (
	`id`             INTEGER NOT NULL,
	`name`           VARCHAR(255) NOT NULL,
	`description`    TEXT NOT NULL,
	`value`          FLOAT NOT NULL,
	`created`        DATETIME DEFAULT NULL,
	PRIMARY KEY(`id`)
);

-- Orders Table --
CREATE TABLE `orders` (
	`id`       INTEGER NOT NULL,
	`order`    INTEGER NOT NULL,
	`date`     DATETIME DEFAULT NULL,
	`client`   INTEGER NOT NULL,
	`item`     INTEGER NOT NULL,
	`quantity` INTEGER NOT NULL,
	`created`  DATETIME DEFAULT NULL,
	PRIMARY KEY(`id`)
);


