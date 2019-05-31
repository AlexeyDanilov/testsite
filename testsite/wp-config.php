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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wp_dev' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '2}&{Suxm%)kF31N)qQtcPGJ%x{ZJ3xVSrVT57+=Xk+ ]^k#SdFE2=ciQ`/!r4()T' );
define( 'SECURE_AUTH_KEY',  'rFq%0+j*FOwG@HGM6_946JC$W)lX*;u5lNlL-g[ #*q;!o/js#.5{MJc&p]7[E <' );
define( 'LOGGED_IN_KEY',    '>%h%%A&3e`lYOp}ju}?2OC6ZevFgkhq$oLCrowcb8E#`usA-0!}[l1V).CBsXo$E' );
define( 'NONCE_KEY',        'gS1e%&A+>d,f+RrJG&5qs,[>Ni0In%uPlT;;^;`sFs|:qZ&Q%9l@G&v;87Nvh)[K' );
define( 'AUTH_SALT',        '#58P(;vKt2HAE.162c0E8Df.V2m),f{phyR}q{;I/C;A`c o%(<Pys%GMoDP:Z)y' );
define( 'SECURE_AUTH_SALT', 'OSKjV2!K=tI$8b3;U&YMOB=WR~3P`5sb`Lkv,X`OOi%sxR>p+(7W|C!DL:<DUcKt' );
define( 'LOGGED_IN_SALT',   'qx03(Ih)E}SU1#OAK{70+BEb4tZ{H0iB.(V;iA|}h:*]E4(5bCdMKqSbzMF{-<<m' );
define( 'NONCE_SALT',       '/7JmQYBJJ~F?J1&B,j2V+FW<5q^9~D%H}GlJt@&6R<]HpK>?Kh:Z%+l7*mQ1YgrW' );

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
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
