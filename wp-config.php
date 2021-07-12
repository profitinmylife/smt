<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'admin_smt' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'admin_smt' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '5Yy8JI4u5IVvz9eX' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         's{|yZQ%oLDFQz[2a~CxoFi%KKT}LFeQ.Up+biF[gI&*69<s9&t~j@_2`~E(zPu+r' );
define( 'SECURE_AUTH_KEY',  ';,:gy.Z|%H;dYbZ7WCvYGfkE;jA PDn .,VYy$RfqO<9.~el* ;:x??Wc,40H4Mm' );
define( 'LOGGED_IN_KEY',    'L3s 4bRLl]Pl:|{OS,n~b<PeZd}(41VP8>YJdUn)~WTKN7u/~_x9_4eZXdk| Y<l' );
define( 'NONCE_KEY',        ' F]NVS[=S,Z:Nwz@VCs5$Byx[7Ditmmag0Z.4`>%wxn@(]Ait6;<gkp|/wcVWSh.' );
define( 'AUTH_SALT',        '=bR9?-5p&7r .ouG>B/QN]&Z^+s4geg-Se8q/(aL~G{{Yr+:i(VY?5U48tAT:W&C' );
define( 'SECURE_AUTH_SALT', 'kx.]B:m=K@tq#BRotUQ(<cHz,ESuC0Xj@dA<T5qh1(hO1* G9*/8FB&cpSa2r;wz' );
define( 'LOGGED_IN_SALT',   'l!+o8Q(e,HgC8^4_N8K)Y- 4|O}@R4raz .k0z4hZp+[6tK9|Cw ls=`u?;PKt?!' );
define( 'NONCE_SALT',       '%V`ggx]5lGiF`r{NMcY|$c;mkGF;;z[drlDO~r9~wnOXo,4[[S43iZg<0T^7M0%/' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
