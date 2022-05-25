<?php 

function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^0-9\-]/', '', $string); // Removes special chars.
}
function add_string($val)
{
$final_val = 0;
if (strpos($val, '-') !== false) {
	return "negatives not allowed";
	}	

	if ($val == '') {
		return "0";
	}
	else if (strpos($val, ';') !== false) {

		$arr = explode(';', $val);
		foreach ($arr as $key => $value) {
			$removed_special = (int) clean($value);
			if (is_int($removed_special) ) {
				$final_val = $final_val + $removed_special;
			}
			
			
		}
		return $final_val; 
	}
	else{
		$arr = explode(',', $val);
		if (count($arr) == 1) {
			return "0";
		}
		else if (count($arr) > 2) {
			return "string has more than two parameters";
		}
		else{
			//$a = $arr[0];

			//$b = $arr[1];
			
			foreach ($arr as $key => $value) {
				//print_r($value);

				
				if (strpos($value, '\n') !== false) {
					   $data_val = explode('\n', $value);
					   $all_sum = 0;
					  // print_r($data_val);
					   if ($data_val[1] == '') {
					   return "not valid";
					   }
					   foreach ($data_val as $key => $value_1) {
					   	$all_sum = $all_sum + $value_1;
					   }
					   $final_val = $final_val + $all_sum;

					}
					else{
						$final_val = $final_val + $value;
					}

			}
			// if ($a < 0 || $b < 0) {
			// 	return "negatives not allowed";	
			// }
			// else if ($a < 0 || $b < 0) {
			// 	# code...
			// }
			return $final_val;
		}
	}
	

	
}





$string = $_GET['string'];
echo add_string($string);
 ?>