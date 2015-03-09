<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/Editing_wp-config.php Modifier
 * wp-config.php} (en anglais). C'est votre hébergeur qui doit vous donner vos
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
//define('WP_CACHE', true); //Added by WP-Cache Manager
define('DB_NAME', 'aerofun');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '9fkrTrByulxJ');

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
define('AUTH_KEY',         '/6:E>8t29H>e!Yt5Svun)<zBz{_cvdrFJJ3iR-pry%=_r4VM2.gunTjrM ;-iWoU'); 
define('SECURE_AUTH_KEY',  'k[zC&n(S)?5ZfZj4RT+(,+u3;6-upwOuScOJVa%|XK/Z^k;D}S+/Yg$R$wq/g`ck'); 
define('LOGGED_IN_KEY',    '2E8b 2){1Nz+2@h_38%n8VzH8+gIMJs}Tv4-32s<qGVX3^s&YieSZK-kvvq*92ww'); 
define('NONCE_KEY',        'Q|~Iu+/o%SSy8W{}|mp[m_w77Jn=g)tT`$GeH%>]T9n&+E):u<T`7bY=47Ea{7q5'); 
define('AUTH_SALT',        '=POL|z=&b{SSl/`9]U}l``[VBwGmOpPF:q34>P.]y<s{-S{&6g9|5cERfL8 M?19'); 
define('SECURE_AUTH_SALT', '+,O~|5;&OJRHKaOvLw sU+w7Q<^_z_<>hC#0$; !)N-?ximHv}s4Dl-tIt/L8U;_'); 
define('LOGGED_IN_SALT',   '|4D4Zdz~[bMR.A:&@zG-Vti9[]|yY2GL$m)<uc#i(AI6Y8fAB<rr}tw(1X53mA(/'); 
define('NONCE_SALT',       'r/hh#Fs2%a>4B|9sZx>FiUcN7,b[&1);kJh[L@iXnu`f(;xw,EgH/g~Nq++Q.S-u'); 
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