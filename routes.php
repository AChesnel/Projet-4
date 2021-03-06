<?php
$routes = array(
	'displayHome'            => array('controller' => 'FrontendArticles', 'method' => 'displayHome'),
	'pageArticles'           => array('controller' => 'FrontendArticles', 'method' => 'displayArticles'),
	'article'	             => array('controller' => 'FrontendArticles', 'method' => 'page'),
	'envoyerCommentaire'     => array('controller' => 'FrontendArticles', 'method' => 'envoyerCommentaire'),
	'supprimerCommentaire'   => array('controller' => 'FrontendArticles', 'method' => 'supprimerCommentaire'),
	'signalerCommentaire'    => array('controller' => 'FrontendArticles', 'method' => 'signalerCommentaire'),
	'ajouterArticle'         => array('controller' => 'FrontendArticles', 'method' => 'ajouterArticle', 'firewall' => 1),
	'publierArticle'         => array('controller' => 'FrontendArticles', 'method' => 'publierArticle', 'firewall' => 1),
	'supprimerArticle'       => array('controller' => 'FrontendArticles', 'method' => 'supprimerArticle', 'firewall' => 1),
	'gestionArticles'        => array('controller' => 'FrontendArticles', 'method' => 'gestionArticles', 'firewall' => 1),
	'modifierArticle'        => array('controller' => 'FrontendArticles', 'method' => 'modifierArticle', 'firewall' => 1),
	'editerArticle'          => array('controller' => 'FrontendArticles', 'method' => 'editerArticle', 'firewall' => 1),
	'connexion'              => array('controller' => 'FrontendUser', 'method' => 'connexion' ),
	'login'                  => array('controller' => 'FrontendUser', 'method' => 'login'),
	'deconnexion'            => array('controller' => 'FrontendUser', 'method' => 'deconnexion'),
	'nouveauCompte'          => array('controller' => 'FrontendUser', 'method' => 'nouveauCompte'),
	'createAccount'          => array('controller' => 'FrontendUser', 'method' => 'createAccount'),
	'espaceAdmin'            => array('controller' => 'FrontendUser', 'method' => 'espaceAdmin', 'firewall' => 1),
	'gestionUtilisateurs'    => array('controller' => 'FrontendUser', 'method' => 'gestionUtilisateurs', 'firewall' => 1),
	'supprimerUtilisateur'   => array('controller' => 'FrontendUser', 'method' => 'supprimerUtilisateur', 'firewall' => 1),
	'bannirUtilisateur'      => array('controller' => 'FrontendUser', 'method' => 'bannirUtilisateur', 'firewall' => 1),
	'rehabiliterUtilisateur' => array('controller' => 'FrontendUser', 'method' => 'rehabiliterUtilisateur', 'firewall' => 1),
);