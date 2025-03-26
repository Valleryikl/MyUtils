DROP DATABASE IF EXISTS utils;
CREATE DATABASE utils;

USE utils;

DROP TABLE IF EXISTS progres;
DROP TABLE IF EXISTS completed;

CREATE TABLE progres (
    id                  INT             NOT NULL AUTO_INCREMENT,
    progres_task        VARCHAR(255)    NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE completed (
    id                  INT             NOT NULL AUTO_INCREMENT,
    completed_task      VARCHAR(255)    NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO progres
            (progres_task)
    VALUES  ('Buy wine'),
            ('Cook dinner')
;

INSERT INTO completed 
            (completed_task)
    VALUES  ('Buy cheese')
;