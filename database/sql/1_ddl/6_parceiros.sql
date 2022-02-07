CREATE TABLE jed_parceiros (
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    nome varchar(80) NOT NULL,
    urlimagem TEXT NOT NULL,
    indexibirparceiro varchar(1) NULL,
    indstatus varchar(1) NOT NULL,
    dtcadastro TIMESTAMP NULL,
    dtedicao TIMESTAMP NULL,
    dtexclusao TIMESTAMP,
    usucriou int NULL,
    usueditou int NULL,
    usuexcluiu int NULL,
    PRIMARY KEY (id)
);
