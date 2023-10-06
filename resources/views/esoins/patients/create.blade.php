@extends('layouts.template')
@section('page_title', 'ECOM | Add Category')
@section('dispensation', 'active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="panel-title">ENREGISTRER UN NOUVEAU PATIENT</h4>
        <div class="panel">
            <div class="my-4">
                <form class="g-3" action="{{ route('patients.store') }}" method="POST" novalidate="">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="col-form-label col-form-label-sm" for="label_birth_date">La date de naissance du patient est-elle connue?</label>
                                <div class="form-check">
                                  <input class="form-check-input" id="birth_date_yes" type="radio" name="birth_date" value="yes" onclick="afficheForm('birth_date', 'know_birth_date');" />
                                  <label class="form-check-label mb-0" for="birth_date_yes">Oui</label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" id="birth_date_no" type="radio" name="birth_date" value="no" onclick="afficheForm('birth_date', 'unknow_birth_date');" />
                                  <label class="form-check-label mb-0" for="birth_date_no">Non</label>
                                </div>
                            </div>

                            <div id="know_birth_date" class="mb-3" style="display: none;">
                                <label class="col-form-label col-form-label-sm" for="birth_date_know">Quelle est la date de naissance du patient?</label>
                                <input class="form-control input-border-bt" id="birth_date_know" type="date" name="birth_date_know" />
                            </div>
                            <div id="unknow_birth_date" class="mb-3" style="display: none;">
                                <label class="col-form-label col-form-label-sm" for="birth_date_unknow">Quel est l'âge du patient?</label>
                                <input class="form-control input-border-bt" id="birth_date_unknow" type="number" name="birth_date_unknow" />
                                <label class="col-form-label col-form-label-sm" for="birth_date_unknow">Âge en ...</label>
                                <div class="form-check">
                                  <input class="form-check-input" id="birth_date_day" type="radio" name="birth_date_item" value="day" />
                                  <label class="form-check-label mb-0" for="birth_date_day">Jours</label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" id="birth_date_month" type="radio" name="birth_date_item" value="month" />
                                  <label class="form-check-label mb-0" for="birth_date_month">Mois</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="birth_date_month" type="radio" name="birth_date_item" value="year" />
                                    <label class="form-check-label mb-0" for="birth_date_month">Années</label>
                                  </div>
                            </div>
                            <div id="know_birth_date" class="mb-3">
                                <label class="col-form-label col-form-label-sm" for="name">Nom et prénom du patient</label>
                                <input class="form-control input-border-bt" id="name" type="text" name="name" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label col-form-label-sm" for="sexe_patient">Sexe du patient</label>
                                <div class="form-check">
                                  <input class="form-check-input" id="sexe_patient_yes" type="radio" name="sexe_patient" value="male" />
                                  <label class="form-check-label mb-0" for="sexe_patient_yes">Masculin</label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" id="sexe_patient_no" type="radio" name="sexe_patient" value="female" />
                                  <label class="form-check-label mb-0" for="sexe_patient_no">Féminin</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <select name="" id="">
                                    <option value="">Selectionner un village</option>

                                </select>
                                <label class="col-form-label col-form-label-sm" for="village_patient">Village</label>
                                <input class="form-control input-border-bt" id="village_patient" type="text" name="village_patient" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label col-form-label-sm" for="mother_patient">Nom et prénom de la mère de l'enfant</label>
                                <input class="form-control input-border-bt" id="mother_patient" type="text" name="mother_patient" />
                            </div>
                            <!--<div class="mb-3">
                                <label class="col-form-label col-form-label-sm" for="affiliation_number">Numéro d'affiliation de la mère</label>
                                <input class="form-control input-border-bt" id="affiliation_number" type="text" name="affiliation_number" />
                            </div>-->
                            <!--<div class="mb-3">
                                <label class="col-form-label col-form-label-sm" for="phone_number">Est ce que la mère a un numéro de téléphone?</label>
                                <div class="form-check">
                                  <input class="form-check-input" id="phone_number_yes" type="radio" name="phone_number" value="yes" onclick="afficheForm('phone_number', 'know_phone_number');" />
                                  <label class="form-check-label mb-0" for="phone_number_yes">Oui</label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" id="phone_number_no" type="radio" name="phone_number" value="no" onclick="afficheForm('phone_number', 'know_phone_number');" />
                                  <label class="form-check-label mb-0" for="phone_number_no">Non</label>
                                </div>
                            </div>-->
                            <div id="know_phone_number" class="mb-3">
                                <label class="col-form-label col-form-label-sm" for="num_telephone">Numéro de téléphone mère/père</label>
                                <input class="form-control input-border-bt" id="num_telephone" type="text" name="num_telephone" />
                            </div>
                            <!--
                            <div class="mb-3">
                                <label class="col-form-label col-form-label-sm" for="extrait_naissance">L'enfant possède t-il un acte de naissance?</label>
                                <div class="form-check">
                                  <input class="form-check-input" id="extrait_naissance_yes" type="radio" name="extrait_naissance" value="yes" />
                                  <label class="form-check-label mb-0" for="extrait_naissance_yes">Oui</label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" id="extrait_naissance_no" type="radio" name="extrait_naissance" value="no" />
                                  <label class="form-check-label mb-0" for="extrait_naissance_no">Non</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="extrait_naissance_unknow" type="radio" name="extrait_naissance" value="unknow" />
                                    <label class="form-check-label mb-0" for="extrait_naissance_unknow">Je ne sais pas</label>
                                </div>
                            </div>-->
                        </div>

                        <div class="col-lg-4">
                            <!--<div class="mb-3">
                                <label class="col-form-label col-form-label-sm" for="cnib_father">Le père possède t-il une carte d'identité?</label>
                                <div class="form-check">
                                  <input class="form-check-input" id="cnib_father_yes" type="radio" name="cnib_father"  value="yes"/>
                                  <label class="form-check-label mb-0" for="cnib_father_yes">Oui</label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" id="cnib_father_no" type="radio" name="cnib_father" value="no" />
                                  <label class="form-check-label mb-0" for="cnib_father_no">Non</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="cnib_father_unknow" type="radio" name="cnib_father" value="unknow" />
                                    <label class="form-check-label mb-0" for="cnib_father_unknow">Je ne sais pas</label>
                                </div>
                            </div>-->
                            <!--<div class="mb-3">
                                <label class="col-form-label col-form-label-sm" for="cnib_mother">La mère possède t-il une carte d'identité?</label>
                                <div class="form-check">
                                  <input class="form-check-input" id="cnib_mother_yes" type="radio" name="cnib_mother" value="yes" />
                                  <label class="form-check-label mb-0" for="cnib_mother_yes">Oui</label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" id="cnib_mother_no" type="radio" name="cnib_mother" value="no" />
                                  <label class="form-check-label mb-0" for="cnib_mother_no">Non</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="cnib_mother_unknow" type="radio" name="cnib_mother" value="unknow" />
                                    <label class="form-check-label mb-0" for="cnib_mother_unknow">Je ne sais pas</label>
                                </div>
                            </div>-->
                            <!--<div class="mb-3">
                                <label class="col-form-label col-form-label-sm" for="gaspa_mother">La mère est-elle affillée à un GASPA ?</label>
                                <div class="form-check">
                                  <input class="form-check-input" id="gaspa_mother_yes" type="radio" name="gaspa_mother" value="yes" />
                                  <label class="form-check-label mb-0" for="gaspa_mother_yes">Oui</label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" id="gaspa_mother_no" type="radio" name="gaspa_mother" value="no" />
                                  <label class="form-check-label mb-0" for="gaspa_mother_no">Non</label>
                                </div>
                            </div>-->
                        </div>
                    </div>
                <hr>
                <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
                <a class="btn btn-outline-primary btn-sm" href="{{ route('app.consultation') }}">Fermer</a>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
