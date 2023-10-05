<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Role;
use App\Models\Structure;
use App\Models\Valeur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \stdClass;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('users.view')) {
            $users = User::where('is_delete', FALSE)->get();

            $users = DB::table('users')
                                ->join('structures', 'structures.id', 'users.structure_id')
                                ->select('users.*', 'structures.nom_structure')
                                ->where('users.is_delete', FALSE)
                                ->get();
            return view('users.index', compact("users"));
        }else{
            return redirect(route('app.home'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('users.create')) {

            $roles = Role::where('is_delete', FALSE)->get();
            // $valeurs = Valeur::where('id', env('TYPESTRUCTURE_CSPS'))->orWhere('id', env('TYPESTRUCTURE_CMA'))->get();
            // $valeurs = $valeurs->where('id_parametre', env('TYPESTRUCTURE'))->orWhere()->get();
            return view('users.create', compact('roles'));
        }

        return redirect(route('app.home'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->can('users.create')) {

            // Validation des données
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'role' => 'required',
            ]);


            // Check "statut"
            switch ($request->statut) {
                case 1:
                    $status = $request->statut;
                    break;

                default:
                    $status = 0;
                    break;
            }
            $structure_id = 0;
            $csps_id = $request->csps_id;
            $dist_id = $request->district_id;
            $reg_id = $request->drs_id;
            if($csps_id){
                $structure_id = $csps_id;
            }elseif($dist_id){
                $structure_id = $dist_id;
            }else{
                $structure_id = $reg_id;
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'statut' => $status,
                'password' => bcrypt($request->password),
            ]);

            $user->roles()->sync($request->role);
            $user->update([
                'structure_id' => $structure_id,
            ]);

            session()->flash('notification.message', 'Utilisateur créé avec succès !');
            session()->flash('notification.type', 'success');
            session()->flash('notification.title', 'Succès');

            return redirect()->route('users.index');
        }

        return redirect(route('app.home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->can('users.view')) {
            $user = User::find($id);
            $roles =  Role::where('is_delete', FALSE)->get();
            return view('users.show', compact('user', 'roles'));
        }

        return redirect(route('app.home'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('users.update')) {
            // $user = User::find($id);
            $dist = NULL;
            $dists = NULL;
            $fm = NULL;
            $fms = NULL;

            $user =  User::where('id', $id)->first();
            $structure =  Structure::where('id', $user->structure_id)->first();


            switch ($structure->level_structure) {
                case env('LEVEL_DRS'):
                    $reg = Structure::where('id', $user->structure_id)->first();
                    break;

                case env('LEVEL_DISTRICT'):
                    $dist = Structure::where('id', $user->structure_id)->first();
                    $dists = Structure::where('parent_id', $dist->parent_id)->get();
                    $reg = Structure::where('id', $dist->parent_id)->first();
                    break;

                default:
                    $fm = Structure::where('id', $user->structure_id)->first();
                    $fms = Structure::where('parent_id', $fm->parent_id)->get();
                    $dist = Structure::where('id', $fm->parent_id)->first();
                    $dists = Structure::where('parent_id', $dist->parent_id)->get();
                    break;
            }
            $roles =  Role::where('is_delete', FALSE)->get();
            return view('users.edit', compact('user', 'roles', 'fm', 'dist', 'dists', 'fms'));
        }

        return redirect(route('app.home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->can('users.update')) {
            // Validation des données
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'role' => 'required',
            ]);


            // Check "statut"
            switch ($request->statut) {
                case 1:
                    $status = $request->statut;
                    break;

                default:
                    $status = 0;
                    break;
            }
            $structure_id = 0;
            $csps_id = $request->csps_id;
            $dist_id = $request->district_id;
            $reg_id = $request->drs_id;
            if($csps_id){
                $structure_id = $csps_id;
            }elseif($dist_id){
                $structure_id = $dist_id;
            }else{
                $structure_id = $reg_id;
            }

            $user =  User::where('id', $id)->first();
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'statut' => $status,
                'structure_id' => $structure_id,
                'password' => bcrypt($request->password),
            ]);

            $user->roles()->sync($request->role);

            session()->flash('notification.message', 'Utilisateur créé avec succès !');
            session()->flash('notification.type', 'success');
            session()->flash('notification.title', 'Succès');

            return redirect()->route('users.index');
        }

        return redirect(route('app.home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete(Request $request)
    {
        if (Auth::user()->can('users.delete')) {

            $id = $request->id;
            $user = User::findOrFail($id);
            $user->update([
                'is_delete' => 1,
            ]);

            session()->flash('notification.message', 'Utilisateur supprimé avec succès !');
            session()->flash('notification.type', 'error');
            session()->flash('notification.title', 'Suppression');
        }
    }

    /**
    * This method display the reinitialisation page
    */
    public function reinitialiser($id)
    {
        if (Auth::user()->can('profile')) {

            $user = User::findOrFail($id);
            $user->update([
                'password'=>bcrypt($this->default_password)
            ]);

            session()->flash('notification.message', 'Compte réinitialisé avec succès !');
            session()->flash('notification.type', 'success');
            session()->flash('notification.title', 'Succès');

            return redirect()->route('user.profile');
        }
    }

    /**
    * This method display the user profile view page
    */

    public function viewprofile()
    {
        if (Auth::user()->can('profile')) {
            $user = User::where('email', Auth::user()->email)->first();
            $roles =  Role::where('is_delete', FALSE)->get();
            return view('users.profile', compact('user', 'roles'));
        }

        return redirect(route('app.home'));
    }

    /**
    * This method display the user profile view page
    */

    public function profile()
    {
        // $user = DB::select("select *from region_user");
        $profile = DB::table('users')
                    ->join('volontaires', 'volontaires.id_user', '=', 'users.id')
                    ->join('view_liste_inscription', 'volontaires.id_user', '=', 'view_liste_inscription.id_user')
                    ->select('users.*', 'volontaires.*', 'view_liste_inscription.libelle_profession')
                    ->where(['view_liste_inscription.is_valide'=>TRUE, 'users.id'=>Auth::user()->id])
                    ->first();

        $formation = DB::table('formations')
                        ->join('formation_session', 'formation_session.formation_id', '=', 'formations.id')
                        ->join('session_user', 'session_user.session_id', '=', 'formation_session.session_id')
                        ->select('formations.*')
                        ->where('session_user.user_id',  Auth::user()->id)
                        ->get();
        $activite = DB::table('activites')
                        ->join('activite_user', 'activite_user.activite_id', '=', 'activites.id')
                        ->select('activites.*')
                        ->where('activite_user.user_id',  Auth::user()->id)
                        ->get();
        $piececv = Piecejointe::where(['code'=>'CV', 'id_user'=>Auth::user()->id])->first();
        $pieceats = Piecejointe::where(['code'=>'Attestation', 'id_user'=>Auth::user()->id])->get();
        $piecedocs = Piecejointe::where(['code'=>'Document', 'id_user'=>Auth::user()->id])->get();
        $localisation = DB::table('communes')
                        ->join('provinces', 'provinces.id', '=', 'communes.id_province')
                        ->join('regions', 'regions.id', '=', 'provinces.id_region')
                        ->select('communes.libelle as commune', 'provinces.libelle as province', 'regions.libelle as region')
                        ->where('communes.id',  $profile->id_commune)
                        ->get();

        $nombreformation = DB::table('formations')
                        ->join('formation_session', 'formation_session.formation_id', '=', 'formations.id')
                        ->join('session_user', 'session_user.session_id', '=', 'formation_session.session_id')
                        ->select('formations.*')
                        ->where('session_user.user_id',  Auth::user()->id)
                        ->count();
        $nombreactivite = DB::table('activites')
                        ->join('activite_user', 'activite_user.activite_id', '=', 'activites.id')
                        ->select('activites.*')
                        ->where('activite_user.user_id',  Auth::user()->id)
                        ->count();
        $nombremission = DB::table('missionhorspays')
                        ->join('users', 'users.id', '=', 'missionhorspays.id_user')
                        ->select('missionhorspays.*')
                        ->where('missionhorspays.id_user',  Auth::user()->id)
                        ->count();
        $domaineetude = DB::table('valeurs')
                    ->select('valeurs.libelle')
                    ->where('valeurs.id',  $profile->domaine_etude)
                    ->get();

        return view('frontend.user.profile', compact('profile', 'formation', 'activite', 'piececv', 'pieceats', 'piecedocs','nombreformation','nombreactivite','nombremission', 'localisation','domaineetude'));

    }

    public function formation()
    {
        // $user = DB::select("select *from region_user");

        $formation = DB::table('users')
                    ->join('volontaires', 'volontaires.id_user', '=', 'users.id')
                    ->join('user_formation', 'user_formation.user_id', '=', 'users.id')
                    ->join('formations', 'user_formation.formation_id', '=', 'formations.id')
                    ->select('users.*', 'formations.*')
                    ->where('users.id',  Auth::user()->id)
                    ->first();
        return view('frontend.user.formation', compact('formation'));

    }

    public function activite()
    {
        // $user = DB::select("select *from region_user");

        $activite = DB::table('users')
                    ->join('volontaires', 'volontaires.id_user', '=', 'users.id')
                    ->join('user_activite', 'user_activite.user_id', '=', 'users.id')
                    ->join('activites', 'user_activite.activite_id', '=', 'activites.id')
                    ->select('users.*', 'activites.*')
                    ->where('users.id',  Auth::user()->id)
                    ->first();
        return view('frontend.user.activite', compact('activite'));

    }

    public function editUser()
    {
        $user = DB::table('users')
                    ->join('volontaires', 'volontaires.id_user', '=', 'users.id')
                    ->select('users.*', 'volontaires.*')
                    ->where('users.id',  Auth::user()->id)
                    ->first();
        $user = User::where('id', Auth::user()->id)->first();
        $volontaire = Volontaire::where('id_user', $user->id)->first();
        $commune = Commune::where('id', $user->id_commune)->first();
        $communes = Commune::where('id_province', $commune->id_province)->get();
        $arrondissements = Arrondissement::where('id_commune', $commune->id)->get();
        $provincesel = Province::where('id', $commune->id_province)->first();
        $provinces = Province::where('id_region', $provincesel->id_region)->get();
        $regionsel = Region::where('id', $provincesel->id_region)->first();
        $regions = Region::where('is_delete', false)->get();
        $sexes = Valeur::where(['is_delete'=>false, 'id_param'=>env('Sexe')])->get();
        $simatrimoniales = Valeur::where(['is_delete'=>false, 'id_param'=>env('Simatrimoniale')])->get();
        $groupsanguins = Valeur::where(['is_delete'=>false, 'id_param'=>env('Groupsanguin')])->get();
        $permisconduires = Valeur::where(['is_delete'=>false, 'id_param'=>env('Permisconduire')])->get();
        $moyendeplacements = Valeur::where(['is_delete'=>false, 'id_param'=>env('Moyendeplacement')])->get();
        $niveaus = Valeur::where(['is_delete'=>false, 'id_param'=>env('Niveau')])->get();
        $professions = Valeur::where(['is_delete'=>false, 'id_param'=>env('Profession')])->get();
        $disponibilites = Valeur::where(['is_delete'=>false, 'id_param'=>env('Disponibilite')])->get();
        $langues = Valeur::where(['is_delete'=>false, 'id_param'=>env('Langue')])->get();
        $langs = DB::table('valeur_volontaire')
                    ->join('valeurs', 'valeurs.id', '=', 'valeur_volontaire.valeur_id')
                    ->select('valeurs.*')
                    ->where(['valeurs.id_param'=>env('Langue'), 'valeur_volontaire.volontaire_id'=>$volontaire->id])
                    ->get();
        $typeformations = Valeur::where(['is_delete'=>false, 'id_param'=>env('type_formation')])->get();
        $typeforms = DB::table('valeur_volontaire')
                    ->join('valeurs', 'valeurs.id', '=', 'valeur_volontaire.valeur_id')
                    ->select('valeurs.*')
                    ->where(['valeurs.id_param'=>env('type_formation'), 'valeur_volontaire.volontaire_id'=>$volontaire->id])
                    ->get();
        $domaines = Valeur::where(['is_delete'=>false, 'id_param'=>env('domaine_etude')])->get();
        $doms = DB::table('valeur_volontaire')
                    ->join('valeurs', 'valeurs.id', '=', 'valeur_volontaire.valeur_id')
                    ->select('valeurs.*')
                    ->where(['valeurs.id_param'=>env('domaine_etude'), 'valeur_volontaire.volontaire_id'=>$volontaire->id])
                    ->get();
        $formationpros = Valeur::where(['is_delete'=>false, 'id_param'=>env('formation_professionnelle')])->get();
        $formpros = DB::table('valeur_volontaire')
                    ->join('valeurs', 'valeurs.id', '=', 'valeur_volontaire.valeur_id')
                    ->select('valeurs.*')
                    ->where(['valeurs.id_param'=>env('formation_professionnelle'), 'valeur_volontaire.volontaire_id'=>$volontaire->id])
                    ->get();
        $typevolontaires = Valeur::where(['is_delete'=>false, 'id_param'=>env('type_volontaire')])->get();
        $typevols = DB::table('valeur_volontaire')
                    ->join('valeurs', 'valeurs.id', '=', 'valeur_volontaire.valeur_id')
                    ->select('valeurs.*')
                    ->where(['valeurs.id_param'=>env('formation_professionnelle'), 'valeur_volontaire.volontaire_id'=>$volontaire->id])
                    ->get();
        $typeactivites = Typeactivite::where('is_delete', false)->get();
        $typeacts = DB::table('valeur_volontaire')
                    ->join('typeactivites', 'typeactivites.id', '=', 'valeur_volontaire.valeur_id')
                    ->select('typeactivites.*')
                    ->where('valeur_volontaire.volontaire_id', $volontaire->id)
                    ->get();
        //$domaines = Domaine::where('is_delete', false)->get();
        /*$doms = DB::table('valeur_volontaire')
                    ->join('domaines', 'domaines.id', '=', 'valeur_volontaire.valeur_id')
                    ->select('domaines.*')
                    ->where('valeur_volontaire.volontaire_id', $volontaire->id)
                    ->get();*/
        return view('frontend.auths.edit', compact('user', 'volontaire', 'arrondissements', 'communes', 'provincesel', 'provinces', 'regionsel', 'regions', 'sexes', 'simatrimoniales', 'groupsanguins', 'permisconduires', 'moyendeplacements', 'niveaus', 'professions', 'disponibilites', 'langues', 'langs', 'typeformations', 'typeforms', 'formationpros', 'formpros', 'typevolontaires', 'typevols', 'typeactivites', 'typeacts', 'domaines', 'doms'));
    }

    /**************** SELECT CHARGEMENT DES SOUS TABLES *************************/
    public function editData(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $volontaire = Volontaire::where('id_user', Auth::user()->id)->first();
        $id_permis_conduire = 0;
        $id_moyen_deplacement = 0;
        $id_formation = 0;
        $id_type_formation = 0;
        $id_arrondissement = 0;
        $id_type_volontaire = 0;
        $autre_domaine_etude = '';
        $autre_formation_professionnelle = '';
        $autre_periode_disponibilite = '';
        if($request->permis_conduire == 'oui') {
            $id_permis_conduire = $request->id_permis_conduire;
        }

        if($request->moyen_deplacement == 'oui') {
            $id_moyen_deplacement = $request->id_moyen_deplacement;
        }

        if($request->formation == 'oui') {
            $id_formation = $request->id_formation;
            $id_type_formation = $request->id_type_formation;
        }

        if($request->ancien_volontaire == 'oui') {
            $id_type_volontaire = $request->id_type_volontaire;
        }

        if($request->domaine_etude == env('autre_domaine')) {
            $autre_domaine_etude = $request->autre_domaine_etude;
        }

        if($request->formation_professionnelle == env('autre_formation')) {
            $autre_formation_professionnelle = $request->autre_formation_professionnelle;
        }
        if($request->id_periode_disponibilite == env('autre_disponibilite')) {
            $autre_periode_disponibilite = $request->autre_periode_disponibilite;
        }

        if($request->arrondissement != '') {
            $id_arrondissement = $request->id_arrondissement;
        }

        if($request->user_password == '')
        {
            $password = bcrypt(env('default_password'));
        }else{
            $password = bcrypt($request->user_password);
        }

        $date_adhesion = date("Y-m-d");
        if($request->ancien_volontaire == "oui") {
            $date_adhesion = $request->date_adhesion;
        }

        $url_pictture = '';
        if($request->hasFile('url_pictture')) {
            $url_pictture = $request->url_pictture->store('public/profile/user');
        }

        $user->update([
            'name' => $request->nom_prenom,
            'email' => $request->email,
            'id_commune'=>$request->id_commune,
            'id_arrondissement'=>$id_arrondissement,
            'password' => $password,
            'url_profil'=>$url_pictture,
        ]);

        $volontaire->update([
            'id_sexe'=>$request->id_sexe,
            'id_situation_matrimoniale'=>$request->id_situation_matrimoniale,
            'id_groupe_sanguin'=>$request->id_groupe_sanguin,
            'date_naissance'=>$request->date_naissance,
            'lieu_naissance'=>$request->lieu_naissance,
            'reference_cnib'=>$request->reference_cnib,
            'numero_telephone'=>$request->numero_telephone,
            'numero_whatsapp'=>$request->numero_whatsapp,
            'permis_conduire'=>$request->permis_conduire,
            'id_permis_conduire'=>$id_permis_conduire,
            'moyen_deplacement'=>$request->moyen_deplacement,
            'id_moyen_deplacement'=>$id_moyen_deplacement,
            'id_alphabetisation'=>$request->id_alphabetisation,
            'domaine_etude'=>$request->domaine_etude,
            'formation_professionnelle'=>$request->formation_professionnelle,
            'autre_domaine_etude'=>$autre_domaine_etude,
            'autre_formation_professionnelle'=>$autre_formation_professionnelle,
            'autre_periode_disponibilite'=>$autre_periode_disponibilite,
            'id_profession'=>$request->id_profession,
            'id_type_volontaire'=>$id_type_volontaire,
            'date_adhesion'=>$date_adhesion,
            'ancien_volontaire'=>$request->ancien_volontaire,
            'formation'=>$request->formation,
            'id_formation'=>$id_formation,
            'id_type_formation'=>$id_type_formation,
            'experience'=>$request->experience,
            'experience_activite'=>$request->experience_activite,
            'id_periode_disponibilite'=>$request->id_periode_disponibilite,
            'representation'=>$request->representation,
            'mission'=>$request->mission,
            'autres_observations'=>$request->autres_observations,
            'village_secteur'=>$request->village_secteur,
            'code_user'=>Time(),
        ]);

        if($request->hasFile('cv_user')) {
            $cv_user = $request->cv_user->store('public/users/cv');
            Piecejointe::create([
                'code'=>'CV',
                'nom'=>'CV',
                'url_file'=>$cv_user,
                'id_user'=>$user->id,
            ]);
        }
        $langue = (array) $request->langue;
        $langs = DB::table('valeur_volontaire')
                    ->select('valeur_volontaire.*')
                    ->where(['valeur_volontaire.type_table'=>'langue', 'valeur_volontaire.volontaire_id'=>$volontaire->id])
                    ->get();
        $typeactivite = (array) $request->typeactivite;
        $typeacts = DB::table('valeur_volontaire')
                    ->select('valeur_volontaire.*')
                    ->where(['valeur_volontaire.type_table'=>'typeactivite', 'valeur_volontaire.volontaire_id'=>$volontaire->id])
                    ->get();
        $domaine = (array) $request->domaine;
        $doms = DB::table('valeur_volontaire')
                    ->join('valeurs', 'valeurs.id', '=', 'valeur_volontaire.valeur_id')
                    ->select('valeurs.*')
                    ->where(['valeurs.id_param'=>env('domaine_etude'), 'valeur_volontaire.volontaire_id'=>$volontaire->id])
                    ->get();
        $typeformation = (array) $request->typeformation;
        $typeforms = DB::table('valeur_volontaire')
                    ->select('valeur_volontaire.*')
                    ->where(['valeur_volontaire.type_table'=>'typeformation', 'valeur_volontaire.volontaire_id'=>$volontaire->id])
                    ->get();
        DB::table('valeur_volontaire')->where(['volontaire_id'=>$volontaire->id, 'type_table'=>'langue'])->delete();
        DB::table('valeur_volontaire')->where(['volontaire_id'=>$volontaire->id, 'type_table'=>'typeactivite'])->delete();
        DB::table('valeur_volontaire')->where(['volontaire_id'=>$volontaire->id, 'type_table'=>'domaine'])->delete();
        DB::table('valeur_volontaire')->where(['volontaire_id'=>$volontaire->id, 'type_table'=>'typeformation'])->delete();

        for($i = 0; $i<count($langue); $i++){
            DB::insert('insert into valeur_volontaire (volontaire_id, valeur_id, type_table) values (?, ?, ?)', [$volontaire->id, $langue[$i], 'langue']);
        }

        for($i = 0; $i<count($typeactivite); $i++){
            DB::insert('insert into valeur_volontaire (volontaire_id, valeur_id, type_table) values (?, ?, ?)', [$volontaire->id, $typeactivite[$i], 'typeactivite']);
        }

        for($i = 0; $i<count($domaine); $i++){
            DB::insert('insert into valeur_volontaire (volontaire_id, valeur_id, type_table) values (?, ?, ?)', [$volontaire->id, $domaine[$i], 'domaine']);
        }

        for($i = 0; $i<count($typeformation); $i++){
            DB::insert('insert into valeur_volontaire (volontaire_id, valeur_id, type_table) values (?, ?, ?)', [$volontaire->id, $typeformation[$i], 'domaine']);
        }
        return redirect()->route('frontend.profile');
    }

    public function piece(Request $request)
    {
        $type_form = $request->type_form;
        $user = User::where('id', Auth::user()->id)->first();
        switch ($type_form) {
            case 'cv':
                $cv_user = '';
                if($request->hasFile('cv_user')) {
                    $cv_user = $request->cv_user->store('public/users/cv');
                }
                $picejointecv = Piecejointe::where(['code'=>'CV', 'id_user'=>Auth::user()->id])->first();
                if($picejointecv){
                    $picejointecv->update([
                        'url_file'=>$cv_user,
                    ]);
                }else{
                    Piecejointe::create([
                        'code'=>'CV',
                        'nom'=>'CV',
                        'url_file'=>$cv_user,
                        'id_user'=>$user->id,
                    ]);
                }
                break;
            case 'attestation':
                $attestation_user = '';
                if($request->hasFile('attestation_user')) {
                    $attestation_user = $request->attestation_user->store('public/users/attestation');
                }

                Piecejointe::create([
                    'code'=>'Attestation',
                    'nom'=>'Attestation',
                    'url_file'=>$attestation_user,
                    'title_file'=>$request->title_file,
                    'id_user'=>$user->id,
                ]);
                break;

            default:
                $document_user = '';
                if($request->hasFile('document_user')) {
                    $document_user = $request->document_user->store('public/users/document');
                }

                Piecejointe::create([
                    'code'=>'Document',
                    'nom'=>'Document',
                    'url_file'=>$document_user,
                    'title_file'=>$request->title_file,
                    'id_user'=>$user->id,
                ]);
                break;
        }
        return redirect()->route('frontend.profile');
    }

    public function picture(Request $request)
    {
        // Validation des données
        $this->validate($request, [
            'url_pictture' => 'required'
        ]);
        $url_pictture = '';
        if($request->hasFile('url_pictture')) {
            $url_pictture = $request->url_pictture->store('public/profile/user');
            $user = User::where('id', Auth::user()->id)->first();
            $user->update([
                'url_profil'=>$url_pictture,
            ]);
        }

        return redirect()->route('frontend.profile');
    }
}
