DROP DATABASE database;
CREATE DATABASE database;
USE database;
CREATE TABLE tablaula(
    aulacodg varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    aulanomb varchar(15) NOT NULL
);
CREATE TABLE tbañoesc(
    añsccodg varchar(10) PRIMARY KEY,
    añscfini date NOT NULL,
    añscffin date NOT NULL
);
CREATE TABLE tbcalesc(
    clsccodg varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    añsccodg varchar(10) NOT NULL,
    clscdate date NOT NULL,
    clscobsv varchar(100) NULL,
    FOREIGN KEY (añsccodg) REFERENCES tbañoesc(añsccodg)
);
CREATE TABLE tabantro(
    antocodg varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    clsccodg varchar(32) NOT NULL,
    FOREIGN KEY (clsccodg) REFERENCES tbcalesc(clsccodg)
);
CREATE TABLE tablcatg(
    catgcodg varchar(10) PRIMARY KEY,
    catgdscp varchar(50) NOT NULL
);
CREATE TABLE tbcroact(
    crctcodg varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    clsccodg varchar(32) NOT NULL,
    FOREIGN KEY (clsccodg) REFERENCES tbcalesc(clsccodg),
    crctacto varchar(50) NOT NULL
);
CREATE TABLE tablinvr(
    invrcodg varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    aulacodg varchar(32) NOT NULL,
    FOREIGN KEY (aulacodg) REFERENCES tablaula(aulacodg),
    catgcodg varchar(10) NOT NULL,
    FOREIGN KEY (catgcodg) REFERENCES tablcatg(catgcodg),
    invrdscp varchar(50) NOT NULL,
    invrcant integer DEFAULT 1,
    invrvalu float NULL,
    invrstat varchar(14) NOT NULL,
    invrmotv varchar(10) NULL,
    invrtype varchar(14) NOT NULL
);
CREATE TABLE tabcolab(
    colabcod varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    invrcodg varchar(32) NOT NULL,
    FOREIGN KEY (invrcodg) REFERENCES tablinvr(invrcodg),
    colabcat integer NOT NULL,
    colabdia timestamp DEFAULT CURRENT_TIMESTAMP,
    colabtyp varchar(14) NOT NULL,
    colabobs varchar(100) NULL
);
CREATE TABLE tablamat(
    matcodig varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    aulacodg varchar(32) NOT NULL,
    FOREIGN KEY (aulacodg) REFERENCES tablaula(aulacodg),
    añsccodg varchar(10) NOT NULL,
    FOREIGN KEY (añsccodg) REFERENCES tbañoesc(añsccodg),
    matturno varchar(6) NOT NULL,
    matgrupo varchar(10) NOT NULL,
    matsecco varchar(1) DEFAULT "A"
);
CREATE TABLE tabacept(
    aceptcod varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    colabcod varchar(32) NOT NULL,
    FOREIGN KEY (colabcod) REFERENCES tabcolab(colabcod),
    aceptobs varchar(100) NULL
);
CREATE TABLE tbconast(
    coascodg varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    clsccodg varchar(32) NOT NULL,
    FOREIGN KEY (clsccodg) REFERENCES tbcalesc(clsccodg),
    matcodig varchar(32) NOT NULL,
    FOREIGN KEY (matcodig) REFERENCES tablamat(matcodig),
    coasvaro integer NOT NULL,
    coashemb integer NOT NULL,
    coastodo integer NOT NULL,
    coasobsv varchar(100) NULL
);
CREATE TABLE tablpais(
    paiscodg varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    paisnomb varchar(50) NOT NULL
);
CREATE TABLE tablestd(
    estdcodg varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    paiscodg varchar(32) NOT NULL,
    FOREIGN KEY (paiscodg) REFERENCES tablpais(paiscodg),
    estdnomb varchar(50) NOT NULL
);
CREATE TABLE tdmuncip(
    muncpcod varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    estdcodg varchar(32) NOT NULL,
    FOREIGN KEY (estdcodg) REFERENCES tablestd(estdcodg),
    muncpnom varchar(50) NOT NULL
);
CREATE TABLE tdciudad(
    ciudadcd varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    muncpcod varchar(32) NOT NULL,
    FOREIGN KEY (muncpcod) REFERENCES tdmuncip(muncpcod),
    ciudadnm varchar(50) NOT NULL
);
CREATE TABLE tabparrq(
    parrqcod varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    ciudadcd varchar(32) NOT NULL,
    FOREIGN KEY (ciudadcd) REFERENCES tdciudad(ciudadcd),
    parrqnom varchar(50) NOT NULL
);
CREATE TABLE tablreun(
    reuncodg varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    clsccodg varchar(32) NOT NULL,
    FOREIGN KEY (clsccodg) REFERENCES tbcalesc(clsccodg),
    aulacodg varchar(32) NOT NULL,
    FOREIGN KEY (aulacodg) REFERENCES tablaula(aulacodg),
    reuntype varchar(50) NOT NULL,
);
CREATE TABLE tablniño(
    nñcedesc varchar(15) PRIMARY KEY,
    parrqcod varchar(32) NOT NULL,
    FOREIGN KEY (parrqcod) REFERENCES tabparrq(parrqcod),
    nñprnomb varchar(12) NOT NULL,
    nñsgnomb varchar(12) NULL,
    nñprapel varchar(12) NOT NULL,
    nñsgapel varchar(12) NULL,
    nñgenero varchar(1) NOT NULL,
    nñfecnac date NOT NULL,
    nñnacion varchar(1) NOT NULL,
    nñlugnac varchar(100) NULL,
    nñdirecc varchar(100) NOT NULL,
    nñherman int DEFAULT 0,
    nñtransp varchar(30) NULL,
    nñestado varchar(15) NOT NULL,
    nñperfil varchar(50) NOT NULL
);
CREATE TABLE tbniñosa(
    nñsacodg varchar(15) PRIMARY KEY,
    nñcedesc varchar(15) NOT NULL,
    FOREIGN KEY (nñcedesc) REFERENCES tablniño(nñcedesc),
    nñsadoct varchar(50) NULL,
    nñsaallg tinyint NOT NULL,
    nñsafood varchar(50) NULL,
    nñsamedc varchar(50) NULL,
    nñsaatmd tinyint NULL,
    nñsalimt varchar(50) NULL,
    nñsavuls tinyint NOT NULL,
    nñsarazo varchar(50) NULL,
    nñsa_sae tinyint NOT NULL,
    nñsarsae varchar(50) NULL,
    nñsahabt int NOT NULL,
    nñsatual varchar(50) NOT NULL,
    nñsadepo varchar(50) NULL,
    nñsaplay varchar(50) NULL,
    nñsaobsv varchar(100) NULL
);
CREATE TABLE tablpers(
    perscedi varchar(12) PRIMARY KEY,
    parrqcod varchar(32) NOT NULL,
    FOREIGN KEY (parrqcod) REFERENCES tabparrq(parrqcod),
    persnom1 varchar(12) NOT NULL,
    persnom2 varchar(12) NULL,
    persape1 varchar(12) NOT NULL,
    persape2 varchar(12) NULL,
    perstel1 varchar(20) NULL,
    perstel2 varchar(20) NULL,
    persfena date NOT NULL,
    persluna varchar(100) NULL,
    persnaco varchar(1) NOT NULL,
    persdire varchar(100) NOT NULL,
    perscatg varchar(25) NOT NULL,
    persstat varchar(15) NOT NULL,
    persfoto varchar(50) NOT NULL
);
CREATE TABLE tblcargo(
    cargcodg varchar(6) PRIMARY KEY,
    cargfunc varchar(15) NOT NULL,
    cargdenm varchar(50) NOT NULL
);
CREATE TABLE tabperso(
    persoced varchar(12) PRIMARY KEY,
    perscedi varchar(12) NOT NULL,
    FOREIGN KEY (perscedi) REFERENCES tablpers(perscedi),
    cargcodg varchar(6) NOT NULL,
    FOREIGN KEY (cargcodg) REFERENCES tblcargo(cargcodg),
    persotim date NOT NULL
);
CREATE TABLE tabrepre(
    repreced varchar(12) PRIMARY KEY,
    perscedi varchar(12) NOT NULL,
    FOREIGN KEY (perscedi) REFERENCES tablpers(perscedi),
    repre_fe varchar(30) NOT NULL,
    repretit varchar(100) NULL,
    repretrb varchar(100) NULL,
    reprelug varchar(100) NULL
);
CREATE TABLE tabluser(
    username varchar(12) PRIMARY KEY,
    perscedi varchar(12) NOT NULL,
    FOREIGN KEY (perscedi) REFERENCES tablpers(perscedi),
    userpawo varchar(1024) NOT NULL,
    usercorr varchar(100) NULL,
    usercode int NOT NULL,
    userstat varchar(15) NOT NULL
);
CREATE TABLE tablbook(
    bookcodg varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    persoced varchar(12) NOT NULL,
    FOREIGN KEY (persoced) REFERENCES tabperso(persoced),
    clsccodg varchar(32) NOT NULL,
    FOREIGN KEY (clsccodg) REFERENCES tbcalesc(clsccodg),
    bookhini time NOT NULL,
    bookhfin time NOT NULL,
    bookturn varchar(6) NOT NULL,
    bookobsv varchar(100) NULL
);
CREATE TABLE tabparez(
    parzcodg varchar(32) PRIMARY KEY,
    nñcedesc varchar(15) NOT NULL,
    FOREIGN KEY (nñcedesc) REFERENCES tablniño(nñcedesc),
    perscedi varchar(15) NOT NULL,
    FOREIGN KEY (perscedi) REFERENCES tablpers(perscedi),
    parztype varchar(32) NOT NULL,
    parzvvjt tinyint NOT NULL
);
CREATE TABLE detacept(
    detacpcd varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    aceptcod varchar(32) NOT NULL,
    FOREIGN KEY (aceptcod) REFERENCES tabacept(aceptcod),
    persoced varchar(12) NOT NULL,
    FOREIGN KEY (persoced) REFERENCES tabperso(persoced)
);
CREATE TABLE dantronñ(
    dpancodg varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    antocodg varchar(32) NOT NULL,
    FOREIGN KEY (antocodg) REFERENCES tabantro(antocodg),
    nñcedesc varchar(15) NOT NULL,
    FOREIGN KEY (nñcedesc) REFERENCES tablniño(nñcedesc),
    dpanalto float NOT NULL,
    dpangodo float NOT NULL
);
CREATE TABLE dantropo(
    dpapcodg varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    antocodg varchar(32) NOT NULL,
    FOREIGN KEY (antocodg) REFERENCES tabantro(antocodg),
    persoced varchar(12) NOT NULL,
    FOREIGN KEY (persoced) REFERENCES tabperso(persoced)
);
CREATE TABLE detlaula(
    daulacod varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    aulacodg varchar(32) NOT NULL,
    FOREIGN KEY (aulacodg) REFERENCES tablaula(aulacodg),
    dauladia timestamp DEFAULT CURRENT_TIMESTAMP,
    daulastt varchar(15) NOT NULL,
    daulaobv varchar(100)
);
CREATE TABLE detcolab (
    dcolbcod varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    colabcod varchar(32) NOT NULL,
    FOREIGN KEY (colabcod) REFERENCES tabcolab(colabcod),
    perscedi varchar(12) NOT NULL,
    FOREIGN KEY (perscedi) REFERENCES tablpers(perscedi)
);
CREATE TABLE detmatnñ (
    demtnñcd varchar(32) PRIMARY KEY DEFAULT REPLACE(UUID(), "-", ""),
    matcodig varchar(32) NOT NULL,
    FOREIGN KEY (matcodig) REFERENCES tablamat(matcodig),
    nñcedesc varchar(15) NOT NULL,
    FOREIGN KEY (nñcedesc) REFERENCES tablniño(nñcedesc)
);
CREATE TABLE detmatpo (
    demtpocd varchar(32) PRIMARY KEY,
    matcodig varchar(32) NOT NULL,
    FOREIGN KEY (matcodig) REFERENCES tablamat(matcodig),
    persoced varchar(12) NOT NULL,
    FOREIGN KEY (persoced) REFERENCES tabperso(persoced)
);
CREATE TABLE detreurp (
    derurpcd varchar(32) PRIMARY KEY,
    reuncodg varchar(32) NOT NULL,
    FOREIGN KEY (reuncodg) REFERENCES tablreun(reuncodg),
    repreced varchar(12) NOT NULL,
    FOREIGN KEY (repreced) REFERENCES tabrepre(repreced)
);