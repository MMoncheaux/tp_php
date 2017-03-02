#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: client
#------------------------------------------------------------

CREATE TABLE client(
        id           Int NOT NULL ,
        civilite     Varchar (255) ,
        nom          Varchar (250) ,
        prenom       Varchar (250) ,
        poste_occupe Varchar (250) ,
        nom_societe  Varchar (250) ,
        adresse1     Varchar (250) ,
        adresse2     Varchar (250) ,
        telephone1   Varchar (250) ,
        telephone2   Varchar (250) ,
        email        Varchar (250) ,
        created_date Date ,
        ville_id     Int ,
        GUID         Varchar (250) ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: guid
#------------------------------------------------------------

CREATE TABLE guid(
        GUID    Varchar (250) NOT NULL ,
        nom     Varchar (25) ,
        email   Varchar (250) ,
        societe Int ,
        id      Int ,
        PRIMARY KEY (GUID )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: villes
#------------------------------------------------------------

CREATE TABLE villes(
        ville_id          Int NOT NULL ,
        ville_nom         Varchar (250) ,
        ville_code_postal Varchar (250) ,
        PRIMARY KEY (ville_id )
)ENGINE=InnoDB;

ALTER TABLE client ADD CONSTRAINT FK_client_ville_id FOREIGN KEY (ville_id) REFERENCES villes(ville_id);
ALTER TABLE client ADD CONSTRAINT FK_client_GUID FOREIGN KEY (GUID) REFERENCES guid(GUID);
ALTER TABLE guid ADD CONSTRAINT FK_guid_id FOREIGN KEY (id) REFERENCES client(id);
