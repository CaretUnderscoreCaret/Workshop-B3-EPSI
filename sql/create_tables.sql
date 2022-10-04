CREATE TABLE LesMarchands(
	nomMarchand: VARCHAR(50) NOT NULL,
	idMarchand: INTEGER NOT NULL,
	typeMarchand: VARCHAR(50) NOT NULL,
	coordXMarchand: INTEGER,
	coordYMarchand: INTEGER,
	adrMarchand: VARCHAR(50),
	/*nbVentesTot: INTEGER,*/
	CONSTRAINT pk_marchand_nom PRIMARY KEY (idMarchand),
	CONSTRAINT ck_typemarchand CHECK (typeMarchand IN ('petit producteur', 'grand producteur', 'autres'))
)
/* TODO : AUTRES : ENTREPRISES VENDANT AUX AGRICULTEURS (CHANGER LE NOM) */

CREATE TABLE LesClients(
	idClient: INTEGER NOT NULL,
	typeClient: VARCHAR(50) NOT NULL,
	CONSTRAINT pk_idclient PRIMARY KEY (idClient),
	CONSTRAINT ck_typeClient CHECK (typeClient IN ('Entreprise agroalimentaire', 'Entreprise de transformation', 'Autre entreprise'))
)

CREATE TABLE LesProduits(
	nomProd: VARCHAR(50) NOT NULL,
	idProd: INTEGER NOT NULL,
	categProd: VARCHAR(50) NOT NULL,
	dateRecolte: DATE,
	datePeremption: DATE,
	statutProd: VARCHAR(50) NOT NULL,
	CONSTRAINT pk_id_produit PRIMARY KEY (idProd),
	CONSTRAINT ck_categ_produit CHECK (categProd IN ('viandes', 'fruits', 'legumes', 'cererales', 'plantes', 'champignons', 'miel', 'engrais')), /* TODO: ajouter ce qui reste */
	CONSTRAINT ck_statut_prod CHECK (statutProd IN ('active', 'desactive'))
)

CREATE TABLE LesCommandes(
	idClient: VARCHAR(50) NOT NULL,
	idProd: VARCHAR(50) NOT NULL,
	nbAchete: INTEGER,
	dateVente: DATE,
	/*Commentaire: VARCHAR(50),*/
	CONSTRAINT fk_id_client FOREIGN KEY (idClient) REFERENCES LesClients(idClient),
	CONSTRAINT fk_id_prod FOREIGN KEY (idProd) REFERENCES LesProduits(idProd),
)

CREATE TABLE MarchandProduits(
	idMarchand: INTEGER,
	idProduit: INTEGER,
	nbVentes: INTEGER
)

/* TODO: mettre allergènes? */

/* TODO: faire trigger pour nbVentesTot dans lesMarchands (doit se mettre à jour quand nbVentes de MarchandProduits se met à jour)