<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'u972871083_kia');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'u972871083_kia');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'midia@123');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ':CbE]8V`jVm1SS.{T^Q3vFk1?G_s`.x{|YH2>z7FT=/Zen(mp~C_]WAczpdVu;h[');
define('SECURE_AUTH_KEY',  'VjXs;V015UU~K97q&U,1}2oTCPrvqF=0<K!;[7JO`V7B>W]#&U$K`Q-y&3T`MVaE');
define('LOGGED_IN_KEY',    '5?dY#&F0bG02IV)N;}5NTpGV`7Mq1Z%(10.qs:@k uh,]kqzg]DqQVCBWiB2Yd5Y');
define('NONCE_KEY',        'mK+lBY#YV4@xhB0>AG:x#&I99cK)`cO0^g*P;=r<_Ohs,~] w8b&A68LwuVjW&#O');
define('AUTH_SALT',        'fVs>#!fn;/h@nF/S}xBaJ+-^rW;:Bx/AUq3K(|U4)i*$SekcH|c~Xj2u>UV[JMF5');
define('SECURE_AUTH_SALT', 'RRWZ2,2iS0&il|k{ssckm.?^xsP?&#mX+%iz>eKaICG;>>s=M_?l =Et3;KW/MLF');
define('LOGGED_IN_SALT',   '_d7I>~RQMa{[NXW*4[w`IOW~~CV7 E3CimfkHe;YoQhA_p(jUg0t5/f?j[1(NP0c');
define('NONCE_SALT',       ']^/s%Yt<#_2:~ &65tDWNj_G#F8Sd:uxa~pS9GHNg}*idD4GTWEp5fpq#p rG5s{');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
