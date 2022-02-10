CREATE TABLE jed_contatos (
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    nome varchar(100) NOT NULL,
    email varchar(100) NOT NULL,
    telefone varchar(16) NOT NULL,
    assunto  varchar(30) NOT NULL,
    mensagem  TEXT NOT NULL,
    indstatus varchar(100) NOT NULL,
    dtcadastro TIMESTAMP NULL,
    dtedicao TIMESTAMP NULL,
    dtexclusao TIMESTAMP,
    usucriou int NULL,
    usueditou int NULL,
    usuexcluiu int NULL,
    PRIMARY KEY (id)
);
