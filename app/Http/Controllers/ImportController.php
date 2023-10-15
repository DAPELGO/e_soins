<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acte;
use App\Models\Equipement;
use App\Models\Product;
use App\Models\Structure;
use App\Models\Nproduct;
use App\Models\Org_unit;
use App\Models\Examen;
use App\Models\Infrastructure;
use App\Models\Region;
use App\Models\Province;
use App\Models\Commune;
use App\Models\Arrondissement;
use App\Models\Indicateur_typelocalite;
use App\Models\Indicateurvaleur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{
	// CONVERT DATA TO ARRAY
	function csvToArray($filename = '', $delimiter = ';')
	{
	    if (!file_exists($filename) || !is_readable($filename))
	        return false;

	    $header = null;
	    $data = array();
	    if (($handle = fopen($filename, 'r')) !== false)
	    {
	        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
	        {
	            if (!$header)
	                $header = $row;
	            else
	                $data[] = array_merge( $row);
	        }
	        fclose($handle);
	    }

	    return $data;
	}

	/**
	* This method display import indicateur view
	*/
    public function viewCsv()
    {
        $structure = Structure::where('id', 2)->first();
        return view('importCsv', compact('structure'));
    }

    /**
	* This method save indicateur data
	*/
	public function importCsv(Request $request)
	{
		$this->validate($request, [
			'file_import' => 'required',
		]);

	    	$file = $request->file('file_import');

	    	// File Details
	       	$filename = $file->getClientOriginalName();
	       	$extension = $file->getClientOriginalExtension();
	       	$tempPath = $file->getRealPath();
	       	$fileSize = $file->getSize();
	       	$mimeType = $file->getMimeType();


	    	// Valid File Extensions
	        $valid_extension = array("csv");

	      	// 2MB in Bytes
	        $maxFileSize = 12097152;

		// Check file extension
        if(in_array(strtolower($extension),$valid_extension))
	    {

	        // Check file size
	        if($fileSize <= $maxFileSize){

	          // File upload location
	          // $location = 'uploads';

	          // Upload file
	          // $file->move($location, $filename);

	          // Import CSV to Database
	          // $file = public_path($location."/".$filename);

	          // Reading file
	         // $file = fopen($filepath,"r");
	              // Reading file
	              //$file = public_path('uploads/bn.csv');


	        $customerArr = $this->csvToArray($file);
	       for ($i = 0; $i < count($customerArr); $i ++)
	       {
	       		if ($customerArr[$i][1] != '') {


                // ACTE
	       		/*$acte = Acte::create([
	       						'id' => $customerArr[$i][0],
	       						'code_acte' => Time(),
	       						'description' => $customerArr[$i][1],
                                'price_pvp' => $customerArr[$i][2],
                                'niveau' => $customerArr[$i][3],
               	]);

                echo $i.' - '.$acte->id.' - '.utf8_encode($customerArr[$i][0]).' - '.utf8_encode($customerArr[$i][1]).'<br/>';*/

               	// EQUIPEMENT
	       		/*$equipement = Equipement::create([
	       						'id' => $customerArr[$i][0],
	       						'code_equipement' => Time(),
	       						'description' => $customerArr[$i][1],
                                'unit_cost_drd' => $customerArr[$i][2],
                                'unit_cost_pvp' => $customerArr[$i][3],
               	]);

                echo $i.' - '.$equipement->id.' - '.$customerArr[$i][0].' - '.$customerArr[$i][1].'<br/>';*/

                // EXAMEN
	       		/*$examen = Examen::create([
                                    'id' => $customerArr[$i][0],
                                    'code_examen' => Time(),
                                    'nom_examen' => $customerArr[$i][1],
                                    'prix_pvp' => $customerArr[$i][2],
                                    'niveau' => $customerArr[$i][3],
                    ]);

                echo $i.' - '.$examen->id.' - '.$customerArr[$i][0].' - '.$customerArr[$i][1].'<br/>';*/

                // PRODUCT
	       		/*$product = Product::create([
                    'id' => $customerArr[$i][0],
                    'code_product' => Time(),
                    'name' => $customerArr[$i][1],
                    'prix_pvp' => $customerArr[$i][3],
                    'class' => $customerArr[$i][4],
                    'prix_drd' => $customerArr[$i][2],
                ]);

                echo $i.' - '.$product->id.' - '.$customerArr[$i][0].' - '.$customerArr[$i][1].'<br/>';*/

                // PRODUCT
                $parent = Structure::where('nom_structure', $customerArr[$i][0])->first();
	       		$structure = Structure::create([
                    'parent_id' => $parent->id,
                    'nom_structure' => $customerArr[$i][1],
                    'level_structure' => $customerArr[$i][2],
                ]);

                echo $i.' - '.$structure->id.' - '.$customerArr[$i][0].' - '.$customerArr[$i][1].'<br/>';
                // PRODUCT
	       		/*$nproduct = Nproduct::create([
                    'code_product' => html_entity_decode($customerArr[$i][0]),
                    'name' => html_entity_decode($customerArr[$i][1]),
                    'short_name' => html_entity_decode($customerArr[$i][2]),
                    'cameg_price' => html_entity_decode($customerArr[$i][3]),
                    'drd_price' => html_entity_decode($customerArr[$i][4]),
                    'etab_price' => html_entity_decode($customerArr[$i][5]),
                    'uid' => html_entity_decode($customerArr[$i][6]),
                ]);

                echo $i.' - '.$nproduct->id.' - '.$customerArr[$i][0].' - '.$customerArr[$i][1].'<br/>';*/

                // ORG UNIT
	       		/*$org_unit = Org_unit::create([
                    'code'=>$customerArr[$i][0],
                    'nom'=>$customerArr[$i][1],
                    'type'=>$customerArr[$i][2],
                    'latitude'=>$customerArr[$i][3],
                    'longitude'=>$customerArr[$i][4],
                    'ref_externe'=>$customerArr[$i][7],
                    'parent_one'=>$customerArr[$i][8],
                    'parent_two'=>$customerArr[$i][9],
                    'parent_three'=>$customerArr[$i][10],
                    'parent_four'=>$customerArr[$i][11],
                    'ref_parent_one'=>$customerArr[$i][12],
                    'ref_parent_two'=>$customerArr[$i][13],
                    'ref_parent_three'=>$customerArr[$i][14],
                    'ref_parent_four'=>$customerArr[$i][15],
                    'created_at'=>$customerArr[$i][5],
                    'updated_at'=>$customerArr[$i][6],
                ]);

                echo $i.' - '.$org_unit->id.' - '.$customerArr[$i][0].' - '.$customerArr[$i][1].'<br/>';*/

               }

				// DB::insert("insert into arrondissements (geom,  nom,id_pays, code) values (?,?,?,?)", [$customerArr[$i][0], $customerArr[$i][2],$customerArr[$i][3],$customerArr[$i][4]]);

			}

			}

			// return redirect()->route('indicateurs.index');
		}

	}

	/**
	* This method display import infrastructure view
	*/
    public function viewInf()
    {
    	if (Auth::user()->can('infrastructures.create')) {

    		$categories = Categorie::where('sup', FALSE)->get();
            $pays = Localite::where(['sup' => FALSE, 'id_type_localite'=>2])->get();
            return view ('imports.infrastructure', compact('categories','pays'));
    	}
    }

    /**
	* This method save infrastructure data
	*/
	public function importInf(Request $request)
	{
		$this->validate($request, [
			'id_commune' => 'required',
			'id_sous_categorie' => 'required',
			'fichier_inf' => 'required',
		]);

	    	$file = $request->file('fichier_inf');

	    	// File Details
	       	$filename = $file->getClientOriginalName();
	       	$extension = $file->getClientOriginalExtension();
	       	$tempPath = $file->getRealPath();
	       	$fileSize = $file->getSize();
	       	$mimeType = $file->getMimeType();


	    	// Valid File Extensions
	        $valid_extension = array("csv");

	      	// 2MB in Bytes
	        $maxFileSize = 12097152;

		// Check file extension
        if(in_array(strtolower($extension),$valid_extension))
	    {

	        // Check file size
	        if($fileSize <= $maxFileSize){

	          // File upload location
	          $location = 'uploads';

	          // Upload file
	          $file->move($location, $filename);

	          // Import CSV to Database
	          $file = public_path($location."/".$filename);

	          // Reading file
	         // $file = fopen($filepath,"r");
	              // Reading file
	              //$file = public_path('uploads/bn.csv');


	        $customerArr = $this->csvToArray($file);
			// dd($customerArr);
	       for ($i = 0; $i < count($customerArr); $i ++)
	       {
	       		// $localite = Localite::where('code_localite', utf8_encode($customerArr[$i][4]))->first();
	       		// Infrastructure::create([
	       		// 				'id_souscategorie' => utf8_encode($customerArr[$i][0]),
	       		// 				'nom_infrastructure' => utf8_encode($customerArr[$i][1]),
	       		// 				'code_infrastructure' => utf8_encode($customerArr[$i][2]),
          //                       'image_infrastructure' => utf8_encode($customerArr[$i][3]),
          //                       'id_localite' => $localite->id,
          //      	]);

               	Infrastructure::where('code_infrastructure', utf8_encode($customerArr[$i][2]))
			        			->update([
			        				'type_infrastructure' => utf8_encode($customerArr[$i][5]),
			        				'etat_infrastructure' => utf8_encode($customerArr[$i][6]),
			        				'accessibilite_physique' => utf8_encode($customerArr[$i][7]),
			        				'fonctionnalite' => utf8_encode($customerArr[$i][8]),
			        				'materiaux_construction' => utf8_encode($customerArr[$i][9]),
			        			]);

				// DB::insert("insert into arrondissements (geom,  nom,id_pays, code) values (?,?,?,?)", [$customerArr[$i][0], $customerArr[$i][2],$customerArr[$i][3],$customerArr[$i][4]]);

			}

			}

			return redirect()->route('infrastructures.index');
		}

	}

	/**
	* This method display import secteur view
	*/
    public function viewSect()
    {
    	if (Auth::user()->can('secteurs.create')) {

    		return view ('imports.secteur');
    	}
    }

    /**
	* This method save secteur data
	*/
	public function importSect(Request $request)
	{
		$this->validate($request, [
			'fichier_sect' => 'required',
		]);

	    	$file = $request->file('fichier_sect');

	    	// File Details
	       	$filename = $file->getClientOriginalName();
	       	$extension = $file->getClientOriginalExtension();
	       	$tempPath = $file->getRealPath();
	       	$fileSize = $file->getSize();
	       	$mimeType = $file->getMimeType();


	    	// Valid File Extensions
	        $valid_extension = array("csv");

	      	// 2MB in Bytes
	        $maxFileSize = 12097152;

		// Check file extension
        if(in_array(strtolower($extension),$valid_extension))
	    {

	        // Check file size
	        if($fileSize <= $maxFileSize){

	          // File upload location
	          $location = 'uploads';

	          // Upload file
	          $file->move($location, $filename);

	          // Import CSV to Database
	          $file = public_path($location."/".$filename);

	          // Reading file

	        $customerArr = $this->csvToArray($file);

	       for ($i = 0; $i < count($customerArr); $i ++)
	       {

	       		Secteur::create([
	       						'code_secteur' => utf8_encode($customerArr[$i][0]),
                                'nom_secteur' => utf8_encode($customerArr[$i][1]),
               	]);



			}

			}

			return redirect()->route('secteurs.index');
		}

	}


	/**
	* This method display import categorie view
	*/
    public function viewCat()
    {
    	if (Auth::user()->can('categories.create')) {

    		return view ('imports.categorie');
    	}
    }

    /**
	* This method save categorie data
	*/
	public function importCat(Request $request)
	{
		$this->validate($request, [
			'fichier_cat' => 'required',
		]);

	    	$file = $request->file('fichier_cat');

	    	// File Details
	       	$filename = $file->getClientOriginalName();
	       	$extension = $file->getClientOriginalExtension();
	       	$tempPath = $file->getRealPath();
	       	$fileSize = $file->getSize();
	       	$mimeType = $file->getMimeType();


	    	// Valid File Extensions
	        $valid_extension = array("csv");

	      	// 2MB in Bytes
	        $maxFileSize = 12097152;

		// Check file extension
        if(in_array(strtolower($extension),$valid_extension))
	    {

	        // Check file size
	        if($fileSize <= $maxFileSize){

	          // File upload location
	          $location = 'uploads';

	          // Upload file
	          $file->move($location, $filename);

	          // Import CSV to Database
	          $file = public_path($location."/".$filename);

	          // Reading file

	        $customerArr = $this->csvToArray($file);

	       for ($i = 0; $i < count($customerArr); $i ++)
	       {

	       		Categorie::create([
	       						'id' => $customerArr[$i][2],
	       						'code_categorie' => $customerArr[$i][0],
                                'nom_categorie' => $customerArr[$i][1],
               	]);



			}

			}

			return redirect()->route('categories.index');
		}

	}

	/**
	* This method display import soussecteur view
	*/
    public function viewSoussect()
    {
    	if (Auth::user()->can('soussecteurs.create')) {

    		$secteurs = Secteur::where('sup', FALSE)->get();
    		return view ('imports.soussecteur', compact("secteurs"));
    	}
    }

    /**
	* This method save soussecteur data
	*/
	public function importSoussect(Request $request)
	{
		$this->validate($request, [
			'fichier_soussect' => 'required',
			'id_secteur' => 'required',
		]);

	    	$file = $request->file('fichier_soussect');

	    	// File Details
	       	$filename = $file->getClientOriginalName();
	       	$extension = $file->getClientOriginalExtension();
	       	$tempPath = $file->getRealPath();
	       	$fileSize = $file->getSize();
	       	$mimeType = $file->getMimeType();


	    	// Valid File Extensions
	        $valid_extension = array("csv");

	      	// 2MB in Bytes
	        $maxFileSize = 12097152;

		// Check file extension
        if(in_array(strtolower($extension),$valid_extension))
	    {

	        // Check file size
	        if($fileSize <= $maxFileSize){

	          // File upload location
	          $location = 'uploads';

	          // Upload file
	          $file->move($location, $filename);

	          // Import CSV to Database
	          $file = public_path($location."/".$filename);

	          // Reading file

	        $customerArr = $this->csvToArray($file);

	       for ($i = 0; $i < count($customerArr); $i ++)
	       {
	       		$secteur = Secteur::where('code_secteur', utf8_encode($customerArr[$i][4]))->first();
	       		Soussecteur::create([
	       						'id_secteur'=>$secteur->id,
	       						'code_sous_secteur' => utf8_encode($customerArr[$i][1]),
                                'nom_sous_secteur' => utf8_encode($customerArr[$i][2]),
               	]);



			}

			}

			return redirect()->route('soussecteurs.index');
		}

	}


	/**
	* This method display import souscategorie view
	*/
    public function viewSouscat()
    {
    	if (Auth::user()->can('souscategories.create')) {

    		$categories = Categorie::where('sup', FALSE)->get();
    		return view ('imports.souscategorie', compact("categories"));
    	}
    }

    /**
	* This method save souscategorie data
	*/
	public function importSouscat(Request $request)
	{
		$this->validate($request, [
			'fichier_souscat' => 'required',
			'id_categorie' => 'required',
		]);

	    	$file = $request->file('fichier_souscat');

	    	// File Details
	       	$filename = $file->getClientOriginalName();
	       	$extension = $file->getClientOriginalExtension();
	       	$tempPath = $file->getRealPath();
	       	$fileSize = $file->getSize();
	       	$mimeType = $file->getMimeType();


	    	// Valid File Extensions
	        $valid_extension = array("csv");

	      	// 2MB in Bytes
	        $maxFileSize = 12097152;

		// Check file extension
        if(in_array(strtolower($extension),$valid_extension))
	    {

	        // Check file size
	        if($fileSize <= $maxFileSize){

	          // File upload location
	          $location = 'uploads';

	          // Upload file
	          $file->move($location, $filename);

	          // Import CSV to Database
	          $file = public_path($location."/".$filename);

	          // Reading file

	        $customerArr = $this->csvToArray($file);

	       for ($i = 0; $i < count($customerArr); $i ++)
	       {

	       		Souscategorie::create([
	       						'id_categorie'=>$customerArr[$i][2],
	       						'code_sous_categorie' => $customerArr[$i][0],
                                'nom_sous_categorie' => $customerArr[$i][1],
               	]);



			}

			}

			return redirect()->route('souscategories.index');
		}

	}

	/**
	* This method display import localite view
	*/
    public function viewLocal()
    {
    	if (Auth::user()->can('localites.create')) {

    		return view ('imports.localite');
    	}
    }

    /**
	* This method save localite data
	*/
	public function importLocal(Request $request)
	{
		$this->validate($request, [
			'fichier_local' => 'required',
		]);

	    	$file = $request->file('fichier_local');

	    	// File Details
	       	$filename = $file->getClientOriginalName();
	       	$extension = $file->getClientOriginalExtension();
	       	$tempPath = $file->getRealPath();
	       	$fileSize = $file->getSize();
	       	$mimeType = $file->getMimeType();


	    	// Valid File Extensions
	        $valid_extension = array("csv");

	      	// 2MB in Bytes
	        $maxFileSize = 12097152;

		// Check file extension
        if(in_array(strtolower($extension),$valid_extension))
	    {

	        // Check file size
	        if($fileSize <= $maxFileSize){

	          // File upload location
	          $location = 'uploads';

	          // Upload file
	          $file->move($location, $filename);

	          // Import CSV to Database
	          $file = public_path($location."/".$filename);

	          // Reading file

	        $customerArr = $this->csvToArray($file);

	       for ($i = 0; $i < count($customerArr); $i ++)
	       {

	       		Localite::create([
	       						'code_localite'=>$customerArr[$i][1],
	       						'nom_localite' => $customerArr[$i][2],
                                'id_type_localite' => 6,
                                'id_parent_localite' => $customerArr[$i][3],
               	]);



			}

			}

			return redirect()->route('pays.index');
		}

	}

	public function load()
	{
		$localites = Localite::where('id_type_localite', 6)->get();
		$communes = Commune::all();

		foreach ($localites as $localite) {
			foreach ($communes as $commune) {
				if($localite->id_parent_localite == $commune->id){

					$localite_r = DB::table('localites')
				                ->join('communes', 'communes.ref_commune', '=', 'localites.code_localite')
				                ->select('localites.*')
				                ->where('communes.id', $commune->id)
				                ->first();
				    // echo $localite_r->id.' '.$localite_r->code_localite.' '.$localite_r->nom_localite.' '.$localite->nom_localite.' <br/>';

				    $localte_u = Localite::where('id', $localite->id)->first();
				    $localte_u->update(['id_parent_localite'=>$localite_r->id]);

				}
			}

		}
	}

	/**
	* This method display import indicateurvaleur view
	*/
    public function viewIndVal()
    {
    	if (Auth::user()->can('indicateurvaleurs.create')) {

    		$secteurs = Secteur::where('sup', FALSE)->get();
    		$indicateurs = Indicateur::where('sup_indicateur', FALSE)->get();

    		return view ('imports.indicateurvaleur', compact('secteurs', 'indicateurs'));
    	}
    }

    /**
	* This method save indicateurvaleur data
	*/
	public function importIndVal(Request $request)
	{
		$this->validate($request, [
			'fichier_local' => 'required',
			'id_indicateur_import' => 'required',
		]);

	    	$file = $request->file('fichier_local');

	    	// File Details
	       	$filename = $file->getClientOriginalName();
	       	$extension = $file->getClientOriginalExtension();
	       	$tempPath = $file->getRealPath();
	       	$fileSize = $file->getSize();
	       	$mimeType = $file->getMimeType();


	    	// Valid File Extensions
	        $valid_extension = array("csv");

	      	// 2MB in Bytes
	        $maxFileSize = 12097152;

		// Check file extension
        if(in_array(strtolower($extension),$valid_extension))
	    {

	        // Check file size
	        if($fileSize <= $maxFileSize){

	          // File upload location
	          $location = 'uploads';

	          // Upload file
	          $file->move($location, $filename);

	          // Import CSV to Database
	          $file = public_path($location."/".$filename);

	          // Reading file

	        $customerArr = $this->csvToArray($file);

	       for ($i = 0; $i < count($customerArr); $i ++)
	       {
	       		$localite = Localite::where('code_localite', $customerArr[$i][0])->first();
	       		// $indicateur = Indicateur::where('code_indicateur', $customerArr[$i][0])->first();
	       		// $infrastructure = Infrastructure::where('code_infrastructure', $customerArr[$i][2])->first();
	       		// if (!empty($customerArr[$i][12])) {
	       			Indicateurvaleur::create([
	       						'id_indicateur'=>$request->id_indicateur_import,
	       						'id_localite' => $localite->id,
                                'periode_valeur_indicateur' => $customerArr[$i][2],
                                'valeur_indicateur' => $customerArr[$i][1],
               		]);
	       		// }


			}

			}

			return redirect()->route('indicateurvaleurs.index');
		}

	}
}
