<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
define('EXIT_SUCCESS', 0); // no errors
define('EXIT_ERROR', 1); // generic error
define('EXIT_CONFIG', 3); // configuration error
define('EXIT_UNKNOWN_FILE', 4); // file not found
define('EXIT_UNKNOWN_CLASS', 5); // unknown class
define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
define('EXIT_USER_INPUT', 7); // invalid user input
define('EXIT_DATABASE', 8); // database error
define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/*
|------------------------------------
| Database Tables
|--------------------------------------------------------------------------
|*/
define('categories_table', 'categories');
define('products_table', 'products');
define('items_table', 'items');
define('items_categories_table', 'items_categories');
define('items_units_table', 'items_units');
define('items_transactions_table', 'stocks_transactions');
define('items_transactions_types_table', 'stocks_transactions_types');
define('products_items_table', 'products_items');
define('users_table', 'users');
define('work_shifts_table', 'work_shifts');
define('settings_table', 'settings');
define('stocks_table', 'stocks');

define('customers_table', 'customers');
define('customers_sections_table', 'customers_sections');
define('orders_table', 'orders');
define('order_details_table', 'order_details');
//define('items_table', 'items');
define('categories__id', 'id');
define('categories__name', 'name');
define('categories__desc', 'desc');

define('items__id', 'id');
define('items__name', 'name');
define('items__desc', 'desc');
define('items__reorder_level', 'reorder_level');
define('items__current_qty', 'current_qty');
define('items__new_qty', 'new_qty');
define('items__item_category', 'item_category');
define('items__item_unit', 'item_unit');

define('items_transactions__id', 'id');
define('items_transactions__item_id', 'item_id');
define('items_transactions__qty', 'qty');
define('items_transactions__date', 'created');

define('items_units__id', 'id');
define('items_units__name', 'name');

define('items_categories__id', 'id');
define('items_categories__name', 'name');

define('products__id', 'id');
define('products__name', 'arabic');
define('products__desc', 'desc');
define('products__price', 'price');
define('products__cat_id', 'cat_id');

define('products_items__id', 'id');
define('products_items__product_id', 'product_id');
define('products_items__item_id', 'item_id');
define('products_items__amount', 'amount');

define('customers__id', 'id');
define('customers__name', 'name');
define('customers__is_available', 'is_available');

define('orders__id', 'id');
define('orders__shift_id', 'shift_id');
define('orders__total', 'total');
define('orders__customer_id', 'customer_id');
define('orders__is_checked', 'is_checked');
define('orders__start_time', 'start_time');
define('orders__end_time', 'end_time');


define('order_details__id', 'id');
define('order_details__product_id', 'product_id');
define('order_details__quantity', 'quantity');
define('order_details__order_id', 'order_id');

define('users__id', 'id');
define('users__name', 'name');
define('users__username', 'username');
define('users__password', 'password');
define('users__role', 'role');

define('work_shifts__date', 'date');
define('work_shifts__start', 'start_time');
define('work_shifts__end', 'end_time');
define('work_shifts__closed', 'closed');
define('work_shifts__username', 'username');


define('stock_items_table', 'stock_items');
define('stock_items__item_id', 'item_id');
define('stock_items__stock_id', 'stock_id');
define('stock_items__current_qty', 'current_qty');
define('stock_items__unit', 'unit');

define('deffered_stock_items_table', 'deffered_stock_items');


define('general_limit', 5);

define('mysql_datetime_format', 'Y-m-d H:i:s');
define('date_format', 'Y-m-d');
define('time_format', 'H:i:s');
define('val_table_has_person', 1);
define('val_table_has_no_persons', 0);

define('approximation', 4); //will be the approximation used for orders 4 means to round to the nearst quarter
define('approximation_items', 10);
