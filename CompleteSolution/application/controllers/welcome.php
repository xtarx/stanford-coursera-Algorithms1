<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include ("InversionsCount.php");

class Welcome extends CI_Controller {


	public function index()
	{
		set_time_limit(0);

		$array = explode("\n", file_get_contents('problems/1/sample.txt'));
		// $array = explode("\n", file_get_contents('problems/1/IntegerArray.txt'));		
		$input=array();
		foreach ($array as $key => $value) {
			# code...
			$input[]=trim($value);
		}

		$this->programmingQuestion1($input);

	}


/**
 * Inversion count example
 * @return int inversion count
 */
public function programmingQuestion1($input)
{
	$inversionsCount = new InversionsCount;		
	$inversionsCount->count_inversions($input);		
	echo "Inversions are ".$inversionsCount->inversions_count;

}








}
