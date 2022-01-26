CREATE TABLE jed_servicos (
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    nome varchar(80) NOT NULL,
    descricao varchar (120) NOT NULL,
    urlimagem TEXT NULL,
    idpai int NULL,
    indstatus varchar(1) NOT NULL,
    dtcadastro TIMESTAMP NULL,
    dtedicao TIMESTAMP NULL,
    dtexclusao TIMESTAMP,
    usucriou int NULL,
    usueditou int NULL,
    usuexcluiu int NULL,
    PRIMARY KEY (id)
);
