--TEST--
Test array_diff_uassoc() function : usage variation -Passing unexpected values to callback argument
--FILE--
<?php
/* Prototype  : array array_diff_uassoc(array arr1, array arr2 [, array ...], callback key_comp_func)
 * Description: Computes the difference of arrays with additional index check which is performed by a
 * 				user supplied callback function
 * Source code: ext/standard/array.c
 */

echo "*** Testing array_diff_uassoc() : usage variation ***\n";

//Initialize array
$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
$array2 = array("a" => "green", "yellow", "red");

//get an unset variable
$unset_var = 10;
unset ($unset_var);

//resource variable
$fp = fopen(__FILE__, "r");

// define some classes
class classWithToString
{
	public function __toString() {
		return "Class A object";
	}
}

class classWithoutToString
{
}

// heredoc string
$heredoc = <<<EOT
hello world
EOT;

// add arrays
$index_array = array (1, 2, 3);
$assoc_array = array ('one' => 1, 'two' => 2);

//array of values to iterate over
$inputs = array(

      // int data
      'int 0' => 0,
      'int 1' => 1,
      'int 12345' => 12345,
      'int -12345' => -12345,

      // float data
      'float 10.5' => 10.5,
      'float -10.5' => -10.5,
      'float 12.3456789000e10' => 12.3456789000e10,
      'float -12.3456789000e10' => -12.3456789000e10,
      'float .5' => .5,

      // array data
      'empty array' => array(),
      'int indexed array' => $index_array,
      'associative array' => $assoc_array,
      'nested arrays' => array('foo', $index_array, $assoc_array),

      // null data
      'uppercase NULL' => NULL,
      'lowercase null' => null,

      // boolean data
      'lowercase true' => true,
      'lowercase false' =>false,
      'uppercase TRUE' =>TRUE,
      'uppercase FALSE' =>FALSE,

      // empty data
      'empty string DQ' => "",
      'empty string SQ' => '',

      // string data
      'string DQ' => "string",
      'string SQ' => 'string',
      'mixed case string' => "sTrInG",
      'heredoc' => $heredoc,

      // object data
      'instance of classWithToString' => new classWithToString(),
      'instance of classWithoutToString' => new classWithoutToString(),

      // undefined data
      'undefined var' => @$undefined_var,

      // unset data
      'unset var' => @$unset_var,

      // resource data
      'resource' => $fp,
);

// loop through each element of the array for key_comp_func

foreach($inputs as $key =>$value) {
      echo "\n--$key--\n";
      var_dump( array_diff_uassoc($array1, $array2, $value) );
};

fclose($fp);
?>
===DONE===
--EXPECTF--
*** Testing array_diff_uassoc() : usage variation ***

--int 0--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL

--int 1--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL

--int 12345--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL

--int -12345--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL

--float 10.5--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL

--float -10.5--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL

--float 12.3456789000e10--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL

--float -12.3456789000e10--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL

--float .5--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL

--empty array--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, array must have exactly two members in %s on line %d
NULL

--int indexed array--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, array must have exactly two members in %s on line %d
NULL

--associative array--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, first array member is not a valid class name or object in %s on line %d
NULL

--nested arrays--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, array must have exactly two members in %s on line %d
NULL

--uppercase NULL--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL

--lowercase null--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL

--lowercase true--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL

--lowercase false--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL

--uppercase TRUE--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL

--uppercase FALSE--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL

--empty string DQ--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, function '' not found or invalid function name in %s on line %d
NULL

--empty string SQ--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, function '' not found or invalid function name in %s on line %d
NULL

--string DQ--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, function 'string' not found or invalid function name in %s on line %d
NULL

--string SQ--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, function 'string' not found or invalid function name in %s on line %d
NULL

--mixed case string--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, function 'sTrInG' not found or invalid function name in %s on line %d
NULL

--heredoc--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, function 'hello world' not found or invalid function name in %s on line %d
NULL

--instance of classWithToString--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL

--instance of classWithoutToString--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL

--undefined var--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL

--unset var--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL

--resource--

Warning: array_diff_uassoc() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL
===DONE===
