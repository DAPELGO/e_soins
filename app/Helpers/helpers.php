<?php

use App\Models\Structure;

// Get "nom_localite"
if(!function_exists('get_structure')){
	function get_structure($level){
		$structures = Structure::where('level_structure', $level)->get();
		return $structures;
	}
}

if(!function_exists('get_structure_parent')){
	function get_structure_parent($id){
		$structure = Structure::where('id', $id)->first();
		return $structure;
	}
}

if(!function_exists('check_dispensation')){
	function check_dispensation($num_ordonance){
		$dispensations = DB::table('netsigl')->select('netsigl.*')->where('netsigl.ordonnance_id', $num_ordonance)->get();
		return $dispensations;
	}
}

if(!function_exists('get_structure_level')){
	function get_structure_level($level){
		$level_name = '';
        switch ($level) {
            case 1:
                $level_name = 'NATIONAL';
                break;
            case 2:
                $level_name = 'REGION';
                break;
            case 3:
                $level_name = 'PROVINCE';
                break;
            case 4:
                $level_name = 'DISTRICT';
                break;
            case 5:
                $level_name = 'COMMUNE';
                break;
            default:
                $level_name = 'FS';
                break;
        }
		return $level_name;
	}
}

// Calculate patient age
if (!function_exists('calculate_age')) {
    function calculate_age($birthDate) {
        try {
            $birthDate = new DateTime($birthDate);
        } catch (Exception $e) {
            return 'ND';
        }

        $currentDate = new DateTime();
        $interval = $currentDate->diff($birthDate);

        if ($interval->y > 0) {
            $age = $interval->y . ' an' . ($interval->y > 1 ? 's' : '');
        } elseif ($interval->m > 0) {
            $age = $interval->m . ' mois';
        } else {
            $age = $interval->d . ' jour' . ($interval->d > 1 ? 's' : '');
        }

        return $age;
    }
}


if (!function_exists('calculate_birth_date')) {
    function calculate_birth_date($age) {
        $currentDate = new DateTime();

        $age = preg_replace('/\s+/', '', $age);

        $matches = [];
        preg_match('/^(\d+)\s*(an|mois|jour)s?$/', $age, $matches);

        if (empty($matches)) {
            return null;
        }

        $quantity = intval($matches[1]);
        $unit = $matches[2];

        switch ($unit) {
            case 'an':
                $birthDate = $currentDate->sub(new DateInterval("P{$quantity}Y"));
                break;
            case 'mois':
                $birthDate = $currentDate->sub(new DateInterval("P{$quantity}M"));
                break;
            case 'jour':
                $birthDate = $currentDate->sub(new DateInterval("P{$quantity}D"));
                break;
            default:
                return null;
        }

        return $birthDate->format('d-m-Y');
    }
}

