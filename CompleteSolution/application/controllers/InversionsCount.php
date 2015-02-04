<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InversionsCount extends CI_Controller {

	public $inversions_count=0;
	
	


	function print_array($array){
		echo "<pre>";
		print_r($array);
		echo "<br/>";
		echo "</pre>";
	}

	function count_inversions(&$arrayToSort)
	{

		
		if (sizeof($arrayToSort) <= 1)
			return $arrayToSort;

    // split our input array into two halves
    // left...
		$leftFrag = array_slice($arrayToSort, 0, (int)(count($arrayToSort)/2));
    // right...
		$rightFrag = array_slice($arrayToSort, (int)(count($arrayToSort)/2));

    // RECURSION
    // split the two halves into their respective halves...
		$leftFrag = $this->count_inversions($leftFrag);
		$rightFrag = $this->count_inversions($rightFrag);

		$returnArray = $this->merge($leftFrag, $rightFrag);

		return $returnArray;
	}


	function merge(&$lF, &$rF)
	{
		$result = array();

		$left_wing_counter=0;
		$left_wing_length=count($lF);
    // while both arrays have something in them
		while (count($lF)>0 && count($rF)>0) {
			if ($lF[0] <= $rF[0]) {
				$left_wing_counter++;

				array_push($result, array_shift($lF));

			}
			else {				
				//add length of remaning array of left side 
				//Total lenght of left side- current position of leftside
				// $this->inversions_count+=count($lF)-$left_wing_counter;
				// echo "Left array length ".$left_wing_length." left array index " .$left_wing_counter;
				// echo "</br>";
				$this->inversions_count+=$left_wing_length-$left_wing_counter;

				array_push($result, array_shift($rF));

			}
		}

    // did not see this in the pseudo code,
    // but it became necessary as one of the arrays
    // can become empty before the other
		array_splice($result, count($result), 0, $lF);
		array_splice($result, count($result), 0, $rF);

		return $result;
	}


}
