CREATE TABLE jed_links_uteis (
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    nome varchar(80) NOT NULL,
    descricao varchar (120) NOT NULL,
    url TEXT(100) NOT NULL,
    icone varchar (40) NULL,
    indstatus varchar(1) NOT NULL,
    dtcadastro TIMESTAMP NULL,
    dtedicao TIMESTAMP NULL,
    dtexclusao TIMESTAMP,
    usucriou int NULL,
    usueditou int NULL,
    usuexcluiu int NULL,
    PRIMARY KEY (id)
);

ALTER TABLE jed_modulos ADD codigo varchar(40) NOT NULL AFTER id;
