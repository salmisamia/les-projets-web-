<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'blog2');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'DX=)b<|x[#=a.*RsQ!N*X1Hp(uH[YttKy6P[C&Y{Xr766YS[;9$]Ov<FZ7pI8!EG');
define('SECURE_AUTH_KEY',  'EWsp-KQ%9y#C{fFEzP00=6Q<?I~k^i&^?Z{PI`Cr69oKBgy$7V{H,$5g?6H*$cUN');
define('LOGGED_IN_KEY',    '7kfv/@051,XVS<GPPx?LsB?$<e$k)PN[2,aeeS[o0<B?-$iwpq%b<mZTv,X_=B7a');
define('NONCE_KEY',        'Uw)pCR)1Bm/;B,2(6B{{Z5mPzpodfK,KtL`lyHY&C7,$+SXdx-rNbRaFxZpGF+=s');
define('AUTH_SALT',        'O&dcwa>N1(wC..Wz+)ipKf&KCP;.GXy+<ie [./E<m_!^U`AmI]L/,#!)6L=El>w');
define('SECURE_AUTH_SALT', '_&,.X?%A(TT(#7W>mxeZ#R*e/4k%LpnZ$qy~wrxTKjQ6}+S1OF<j#wKH,lKia}-(');
define('LOGGED_IN_SALT',   '7Ym4hmc`2kn[uY,cB|G4%oqQUC7R51i+l8Zqj[3)jbnt|Spragq*MK{.=CHwV-b<');
define('NONCE_SALT',       'jeeF&~bZCmo98Hp}LNlMu4Y}v7$-]t]=sLqynA|zp$a_tTp{2Er7JtKl[uSzByk~');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/**
 * Langue de localisation de WordPress, par défaut en Anglais.
 *
 * Modifiez cette valeur pour localiser WordPress. Un fichier MO correspondant
 * au langage choisi doit être installé dans le dossier wp-content/languages.
 * Par exemple, pour mettre en place une traduction française, mettez le fichier
 * fr_FR.mo dans wp-content/languages, et réglez l'option ci-dessous à "fr_FR".
 */
define('WPLANG', 'fr_FR');

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');