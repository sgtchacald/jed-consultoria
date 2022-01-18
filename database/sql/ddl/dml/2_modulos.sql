CREATE TABLE jed_modulos (
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    nome varchar(100) NOT NULL,
    indstatus varchar(100) NOT NULL,
    dtcadastro TIMESTAMP NULL,
    dtedicao TIMESTAMP NULL,
    dtexclusao TIMESTAMP,
    usucriou int NULL,
    usueditou int NULL,
    usuexcluiu int NULL,
    PRIMARY KEY (id)
);

ALTER TABLE jed_modulos ADD codigo varchar(40) NOT NULL AFTER id;
