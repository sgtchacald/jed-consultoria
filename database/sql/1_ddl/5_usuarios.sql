ALTER TABLE users ADD cargo varchar(80) AFTER name;
ALTER TABLE users ADD descricaocargo varchar(120) AFTER cargo;
ALTER TABLE users ADD urlimagem TEXT AFTER descricaocargo;
ALTER TABLE users ADD indstatus varchar(1) AFTER remember_token;
ALTER TABLE users ADD dtcadastro timestamp NULL DEFAULT NULL AFTER indstatus;
ALTER TABLE users ADD dtedicao timestamp NULL DEFAULT NULL AFTER dtcadastro;
ALTER TABLE users ADD dtexclusao timestamp NULL DEFAULT NULL AFTER dtedicao;
ALTER TABLE users ADD usucriou int DEFAULT NULL AFTER dtexclusao;
ALTER TABLE users ADD usueditou int DEFAULT NULL AFTER usucriou;

