<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */


define('NAMA_APLIKASI','BUSINESS SYSTEM');
define('VERSI','2');
define('PT','PT. XXXX');
define('ALAMAT','Jl. Pasir Kaliki, Ruko Pascal Hyper Square Blok C29 No. 25-27 Bandung Jawa Barat Indonesia');
define('COPYRIGHT','Exo Pamuji ©');


define('DB_NAME','template_ci');
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');

define('PRM_USER','prm_user');
define('PRM_MENU_MITRA_ACCESS','prm_menu_access_mitra');
define('PRM_MENU_GROUP_MITRA','prm_menu_group_mitra');
define('PRM_SETTING_WARNA','prm_setting_warna');
define('PRM_MENU_MITRA','prm_menu_mitra');
define('PRM_MASTER_KANTOR','prm_master_kantor');
define('PRM_MASTER_DIVISI','prm_master_divisi');
define('PRM_MASTER_JABATAN','prm_master_jabatan');
define('PRM_MASTER_AREA','prm_master_area');
define('PRM_MASTER_GROUP_MENU','prm_master_group_menu');
define('PRM_MASTER_KARYAWAN','prm_master_karyawan');


