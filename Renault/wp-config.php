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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'RSwtF/%Bu,p>B4p6GfPn$w$q(xE62C/L|J(4hQrb/L}*z7Y8_I?ZpOHn@*]+tZbh');
define('SECURE_AUTH_KEY',  '0e*Tu7%YCd4:X t+-f -cp3TgA1|z?z// pH~ygg3 yyD#p1}FV6l)dm&vo%IC#X');
define('LOGGED_IN_KEY',    'A>0Fo6-tKZK3@/IOk%55#@=l9+_!KY)gEmih/k! |5{^O6v/EO?-T*P^w?2J87`Y');
define('NONCE_KEY',        'p1>Ub5mWD:Uj]x2}n`4^ <?3FcF (c-97C^Z]M>ma`w6|%Nm-J:X-3hh#c?D8l$@');
define('AUTH_SALT',        'Mi4yWi#t_[@s<L,QCB1Q_(Bd9dLi9Rc1YcjpX4 Gk3#G]%_Cb0df1d(m.7Zx$d-f');
define('SECURE_AUTH_SALT', 'f?iZNpH!~b|;6#tzzAtdqxHeOZy^!2%%DZ`a0Ew6_A%<a*Ccz48F<@SL+i$WW%}*');
define('LOGGED_IN_SALT',   '#[+G00.c[4g!/[j(Y@t#;BbHV]M8CT<UXw7/c@,cK07}Z;srDo^kd ,OE}&$]iHL');
define('NONCE_SALT',       'k$cO!c:s5T(kC0A4$Jn(T5mp|$0dV5+q(_>lxXMG/A:nN,.s^hUv6N6m^i@&F[;n');
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