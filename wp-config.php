<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'cofa' );

/** Username của database */
define( 'DB_USER', 'cofa' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '123456' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'dlaQ@BGg[D$bu[eCQ`mA{Il~Ehl@bwQ,]m^k}X5x0~RhW{lc@iNj3J]*C5MEm{g.' );
define( 'SECURE_AUTH_KEY',  'm{y-YIm:a Ru YvW8faSxnZngc`=l}se:Pt+Ox=pb>bFr43U|2G;K0Ig9vAsp-L|' );
define( 'LOGGED_IN_KEY',    '4k7H}gFQJ%nP0,f$~eD&z~xSPDh#D44+vq^yG@B9{[]mP~,*1l1O#]XA1<c0Tk3>' );
define( 'NONCE_KEY',        'gkGN+j;/<OgD[-oq$cX4Ew_j{MQVXpWHP6-LKd8%4EE=G|%Ktt[3<= OgC~W(aFJ' );
define( 'AUTH_SALT',        'AG_D{gZfz{>>ii4A>YW2lbOTu_ax>`.IXFUq~rFWes&nu!VYKlDbM]8Jj]0>y}5/' );
define( 'SECURE_AUTH_SALT', 'P#pa>BJbH>.GON3Opsk;E7]h9D[KMLwrh2)Kd1u1|MdC$ZZFJ8P{L%/$jaYkW*#b' );
define( 'LOGGED_IN_SALT',   'F0)Xl8L=@/UyarvvFyo/j[WTvqkjF+ s&w(4^ZAU4p4MxrX.Z%wpL?b#agq5CQCl' );
define( 'NONCE_SALT',       'DT?xoReVKwi}|i; ejtc@i/qXy=:j,X!e7ljo/paG[Z66ERD,n&!dwK_ }}UTnva' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';
define('AUTOSAVE_INTERVAL', 300); // seconds
define('WP_POST_REVISIONS', false);
/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
