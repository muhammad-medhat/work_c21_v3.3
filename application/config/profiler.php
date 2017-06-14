<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Profiler Sections
| -------------------------------------------------------------------------
| This file lets you determine whether or not various sections of Profiler
| data are displayed when the Profiler is enabled.
| Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/profiling.html
|
*/


$config['benchmarks']         = false;// 	Elapsed time of Benchmark points and total execution time 	TRUE
$config['config']             = true;// 	CodeIgniter Config variables 	TRUE
$config['controller_info']    = false;// 	The Controller class and method requested 	TRUE
$config['get']                = false;// 	Any GET data passed in the request 	TRUE
$config['http_headers']       = false;// 	The HTTP headers for the current request 	TRUE
$config['memory_usage']       = false;// 	Amount of memory consumed by the current request, in bytes 	TRUE
$config['post']               = false;// 	Any POST data passed in the request 	TRUE
$config['queries']            = true;// 	Listing of all database queries executed, including execution time 	TRUE
$config['uri_string']         = false;// 	The URI of the current request 	TRUE
$config['query_toggle_count'] = false;// 	The number of queries after which the query block will default to hidden.
