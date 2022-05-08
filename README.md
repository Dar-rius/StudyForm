# StudyForm

C’est un forum ou les étudiants des universités sénégalaises peuvent poser des questions dont ils ne trouvent pas la réponse
et peuvent répondre aux questions dont ils ont la réponse sur les cours.

Pour exécuter le site il vous faut le site xampp, puis démarrer les serveurs Apache et Mysql.

Connectez vous à mysql et taper les copier les commandes suivants:

Créer la base de données: 

``CREATE DATABASE forum;``

Accéder à la base de données: 

``USE forum;``

Créer la table question avec les différentes colonnes:

``CREATE TABLE question (id_question int(11) not null auto_increment, title_question varchar(255), 
text_question varchar(255), primary key (id_question));``

Créer la table reponse avec les différentes colonnes:

``CREATE TABLE reponse(question_id int(11) not null, reponse_id int(11) not null auto_increment, 
text_reponse varchar(255), primary key (reponse_id), foreign key (question_id) references question(id_question));``

Ensuite taper ceci dans votre navigateur: 

``localhost/studyForm/``
