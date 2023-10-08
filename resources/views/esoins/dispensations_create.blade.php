@extends('layouts.template')
@section('css')
  <link rel="stylesheet" type="text/css" href="{{asset('assets/DataTables/datatables.css')}}">
@endsection
@section('page_title', 'ECOM | Add Category')
@section('factures', 'active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="panel-title">NOUVELLE FACTURATION</h4>
        <div class="panel">
            <div class="my-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card theme-wizard mb-5" data-theme-wizard="data-theme-wizard">
                            <div class="card-header pt-2 pb-2 border-bottom-0">
                                <ul class="nav justify-content-between nav-wizard">
                                    <li class="nav-item"><a class="nav-link active fw-semi-bold" href="#bootstrap-wizard-validation-tab1" data-bs-toggle="tab" data-wizard-step="1">
                                        <div class="text-center d-inline-block"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-lock"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Informations générales</span></div>
                                    </a></li>
                                    <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab2" data-bs-toggle="tab" data-wizard-step="2">
                                        <div class="text-center d-inline-block"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-user"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Médicaments et Consommables médicaux</span></div>
                                    </a></li>
                                    <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab3" data-bs-toggle="tab" data-wizard-step="4">
                                        <div class="text-center d-inline-block"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-check"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Actes</span></div>
                                    </a></li>
                                    <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab4" data-bs-toggle="tab" data-wizard-step="5">
                                        <div class="text-center d-inline-block"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-check"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Examens complémentaires</span></div>
                                    </a></li>
                                    <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab5" data-bs-toggle="tab" data-wizard-step="6">
                                        <div class="text-center d-inline-block"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-check"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Mise en observation / Hospitalisation</span></div>
                                    </a></li>
                                    <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab6" data-bs-toggle="tab" data-wizard-step="6">
                                        <div class="text-center d-inline-block"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-check"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Évacuation</span></div>
                                    </a></li>
                                    <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab7" data-bs-toggle="tab" data-wizard-step="7">
                                        <div class="text-center d-inline-block"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-check"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Validation</span></div>
                                    </a></li>
                                </ul>
                            </div>
                            <div class="card-body pt-0 pb-0">
                                <div class="tab-content">
                                    <!-- INFORMATIONS GENERALES -->
                                    <div class="tab-pane active" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab1" id="bootstrap-wizard-validation-tab1">
                                        <form class="needs-validation" id="wizardValidationForm1" novalidate="novalidate" data-wizard-form="1">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="col-form-label col-form-label-sm" for="nom_patient">Nom et prénom du patient</label>
                                                        <input class="form-control input-border-bt" id="nom_patient" type="text" name="nom_patient" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label col-form-label-sm" for="village_patient">Village / secteur</label>
                                                        <input class="form-control input-border-bt" id="village_patient" type="text" name="village_patient" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label col-form-label-sm" for="distance_village_patient">Distance</label>
                                                        <select class="form-select" id="distance_village_patient" name="distance_village_patient">
                                                            <option value="" disabled selected>Selectionner une distance...</option>
                                                            <option value="1">moins de 5 km</option>
                                                            <option value="2">Entre 5 et 10 km</option>
                                                            <option value="3">Plus de 10 km</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label col-form-label-sm" for="age">Age du patient</label>
                                                        <input class="form-control input-border-bt" id="age" min="1" type="number" name="age" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label col-form-label-sm">Âge en ...</label>
                                                        <div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" id="birth_date_day" type="radio" name="birth_date_item" value="day" />
                                                                <label class="form-check-label mb-0" for="birth_date_day">Jours</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" id="birth_date_month" type="radio" name="birth_date_item" value="month" />
                                                                <label class="form-check-label mb-0" for="birth_date_month">Mois</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" id="birth_date_month" type="radio" name="birth_date_item" value="year" />
                                                                <label class="form-check-label mb-0" for="birth_date_month">Années</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label col-form-label-sm" for="sexe_patient">Sexe du patient</label>
                                                        <div>
                                                            <div class="form-check form-check-inline">
                                                            <input class="form-check-input" id="sexe_patient_yes" type="radio" name="sexe_patient" value="male" />
                                                            <label class="form-check-label mb-0" for="sexe_patient_yes">Masculin</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                            <input class="form-check-input" id="sexe_patient_no" type="radio" name="sexe_patient" value="female" />
                                                            <label class="form-check-label mb-0" for="sexe_patient_no">Féminin</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label col-form-label-sm" for="parent_patient">Nom du Père / Mère (Pour enfant de < 5 ans)</label>
                                                        <input class="form-control input-border-bt" id="parent_patient" type="text" name="parent_patient" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label col-form-label-sm" for="num_telephone">Contact</label>
                                                        <input class="form-control input-border-bt" id="num_telephone" type="tel" name="num_telephone" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <span class="fas fa-asterisk fs--2 me-1 text-danger"></span>
                                                        <label class="col-form-label col-form-label-sm" for="consultation_date">Date de facturation</label>
                                                        <input class="form-control input-border-bt" id="consultation_date" type="date" required="required" placeholder="dd-mm-aaaa" name="consultation_date" value="{{ date('d/m/Y') }}" />
                                                        <div class="invalid-feedback">Veuillez entrez une date !</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label col-form-label-sm" for="serie_number">N° de serie sur l'ordonnance</i></span></label>
                                                        <input class="form-control input-border-bt" id="serie_number" type="text" name="serie_number" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <span class="fas fa-asterisk fs--2 me-1 text-danger"></span>
                                                        <label class="col-form-label col-form-label-sm" for="registre_number">N° <span class="form-check-label"><i>(sur le régistre de consultation)</i></span></label>
                                                        <input class="form-control input-border-bt" id="registre_number" type="text" required="required" name="registre_number" />
                                                        <div class="invalid-feedback">Veuillez entrer le numéro !</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <span class="fas fa-asterisk fs--2 me-1 text-danger"></span><label class="col-form-label col-form-label-sm" for="prestation">Prestations</label>
                                                        @foreach ($prestations as $prestation)
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="patient_type" id="prestation{{ $prestation->id }}" required="required" value="{{ $prestation->id }}" onclick="changeValue('prestation{{ $prestation->id }}', 'type_prestation', 'valeur');" />
                                                                <label class="form-check-label mb-0" for="patient_type">{{ $prestation->libelle }}</label>
                                                            </div>
                                                        @endforeach
                                                        <div class="invalid-feedback">Veuillez choisir une cible !</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label col-form-label-sm" for="type_prestation">Type de prestation</label>
                                                        <select class="form-select" id="type_prestation" name="type_prestation">
                                                            <option value="" disabled selected>Selectionner type de prestation...</option>
                                                        </select>
                                                        <div class="invalid-feedback">Veuillez selectionner une prestation !</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- MEDICAMENTS ET CONSOMMABLES MEDICAUX -->
                                    <div class="tab-pane" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab2" id="bootstrap-wizard-validation-tab2">
                                        <form class="needs-validation" id="wizardValidationForm2" novalidate="novalidate" data-wizard-form="2">
                                            <input type="hidden" id="code_product">
                                            <input type="hidden" id="quantity_product">
                                            <input type="hidden" id="index_product">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="col-form-label col-form-label-sm" for="ordonnance_number">Numéro d'ordonnance</label>
                                                        <input class="form-control input-border-bt" id="ordonnance_number" type="text" placeholder="00000001" name="ordonnance_number" />
                                                    </div>
                                                    <div class="row g-3">
                                                        <div class="total panel-title p-1"><span>MONTANT TOTAL : </span><strong class="badge badge-light-primary rounded-pill" id="total_account_product" style="font-size: 1rem;">0</strong></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div id="products">
                                                <table class="table w-100" id="dataTableFis-products">
                                                    <thead>
                                                        <tr>
                                                            <th style="max-width:20px; width:18px;"></th>
                                                            <th style="width:150px;">PRODUIT</th>
                                                            <th style="width:50px;">QUANTITÉ</th>
                                                            <th style="width:50px;">MONTANT</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($products as $product)
                                                        <tr class="position-static">
                                                            <td class="fs--1 align-middle">
                                                                <div class="form-check mb-0 fs-0">
                                                                    <input class="form-check-input" type="checkbox"  name="check_product{{ $product->id }}" id="check_product{{ $product->id }}" value="{{ $product->code_product }}" onclick="selectProduct({{ $product->id }}, 'product');" />
                                                                </div>
                                                            </td>
                                                            <td class="product align-middle ps-1">{{ $product->name }}</td>
                                                            <td class="align-middle white-space-nowrap text-end fw-bold text-700">
                                                                <input class="form-control @error('quantity_product'.$product->id) is-invalid @enderror form-control-sm" id="quantity_product{{ $product->id }}" name="quantity_product{{ $product->id }}" type="number" min="0" value="{{ old('quantity_product'.$product->id) ? old('quantity_product'.$product->id) : 0 }}" style="width: 5rem;" disabled />
                                                                @error('quantity_product'.$product->id)
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                            <td class="align-middle white-space-nowrap text-end fw-bold text-700">
                                                                <input class="form-control @error('amount_product'.$product->id) is-invalid @enderror form-control-sm" id="amount_product{{ $product->id }}" name="amount_product{{ $product->id }}" type="number" min="0" value="{{ old('amount_product'.$product->id) ? old('amount_product'.$product->id) : 0 }}"  disabled onfocusout="setPrice({{ $product->id }}, 'product');" />
                                                                @error('amount_product'.$product->id)
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- ACTES -->
                                    <div class="tab-pane" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab3" id="bootstrap-wizard-validation-tab3">
                                        <form class="mb-2 needs-validation" id="wizardValidationForm3" novalidate="novalidate" data-wizard-form="3">
                                            <input type="hidden" id="code_acte">
                                            <input type="hidden" id="quantity_acte">
                                            <input type="hidden" id="index_acte">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="row g-3">
                                                        <div class="total panel-title p-1"><span>MONTANT TOTAL : </span><strong class="badge badge-light-primary rounded-pill" id="total_account_acte" style="font-size: 1rem;">0</strong></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div id="actes">
                                                <table class="table w-100" id="dataTableFis-actes">
                                                    <thead>
                                                    <tr>
                                                        <th style="max-width:20px; width:18px;"></th>
                                                        <th style="width:150px;">ACTE</th>
                                                        <th style="width:50px;">QUANTITÉ</th>
                                                        <th style="width:50px;">MONTANT</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($actes as $acte)
                                                    <tr class="position-static">
                                                        <td class="fs--1 align-middle">
                                                            <div class="form-check mb-0 fs-0">
                                                            <input class="form-check-input" type="checkbox"  name="check_acte{{ $acte->id }}" id="check_acte{{ $acte->id }}" value="{{ $acte->code_acte }}" onclick="selectProduct({{ $acte->id }}, 'acte');" />
                                                            </div>
                                                        </td>
                                                        <td class="acte align-middle ps-1">{{ $acte->description }}</td>
                                                        <td class="align-middle white-space-nowrap text-end fw-bold text-700">
                                                        <input class="form-control @error('quantity_acte'.$acte->id) is-invalid @enderror form-control-sm" id="quantity_acte{{ $acte->id }}" name="quantity_acte{{ $acte->id }}" type="number" min="0" value="{{ old('quantity_acte'.$acte->id) ? old('quantity_acte'.$acte->id) : 0 }}" style="width: 5rem;" disabled />
                                                        @error('quantity_acte'.$acte->id)
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        </td>
                                                        <td class="align-middle white-space-nowrap text-end fw-bold text-700">
                                                        <input class="form-control @error('amount_acte'.$acte->id) is-invalid @enderror form-control-sm" id="amount_acte{{ $acte->id }}" name="amount_acte{{ $acte->id }}" type="number" min="0" value="{{ old('amount_acte'.$acte->id) ? old('amount_acte'.$acte->id) : 0 }}" disabled onfocusout="setPrice({{ $acte->id }}, 'acte');" />
                                                        @error('amount_acte'.$acte->id)
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- EXAMENS COMPLEMENTAIRES -->
                                    <div class="tab-pane" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab4" id="bootstrap-wizard-validation-tab4">
                                        <form class="mb-2 needs-validation" id="wizardValidationForm4" novalidate="novalidate" data-wizard-form="4">
                                            <input type="hidden" id="code_examen">
                                            <input type="hidden" id="quantity_examen">
                                            <input type="hidden" id="index_examen">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="row g-3">
                                                        <div class="total panel-title p-1"><span>MONTANT TOTAL : </span><strong class="badge badge-light-primary rounded-pill" id="total_account_examen" style="font-size: 1rem;">0</strong></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div id="examens">
                                                <table class="table w-100" id="dataTableFis-examens">
                                                    <thead>
                                                        <tr>
                                                            <th style="max-width:20px; width:18px;"></th>
                                                            <th style="width:150px;" data-sort="examen">EXAMENS COMPLÉMENTAIRES</th>
                                                            <th style="width:50px;">QUANTITÉ</th>
                                                            <th style="width:50px;">MONTANT</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($examens as $examen)
                                                        <tr class="position-static">
                                                            <td class="fs--1 align-middle">
                                                                <div class="form-check mb-0 fs-0">
                                                                <input class="form-check-input" type="checkbox"  name="check_examen{{ $examen->id }}" id="check_examen{{ $examen->id }}" value="{{ $examen->code_examen }}" onclick="selectProduct({{ $examen->id }}, 'examen');" />
                                                                </div>
                                                            </td>
                                                            <td class="examen align-middle ps-1">{{ $examen->nom_examen }}</td>
                                                            <td class="price_examen align-middle white-space-nowrap text-end fw-bold text-700">
                                                                <input class="form-control @error('quantity_examen'.$examen->id) is-invalid @enderror form-control-sm" id="quantity_examen{{ $examen->id }}" name="quantity_examen{{ $examen->id }}" type="number" value="{{ old('quantity_examen'.$examen->id) ? old('quantity_examen'.$examen->id) : 0 }}" style="width: 5rem;" disabled />
                                                                @error('quantity_examen'.$examen->id)
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                            <td class="price_examen align-middle white-space-nowrap text-end fw-bold text-700">
                                                                <input class="form-control @error('amount_examen'.$examen->id) is-invalid @enderror form-control-sm" id="amount_examen{{ $examen->id }}" name="amount_examen{{ $examen->id }}" type="number" value="{{ old('amount_examen'.$examen->id) ? old('amount_examen'.$examen->id) : 0 }}" disabled onfocusout="setPrice({{ $examen->id }}, 'examen');" />
                                                                @error('amount_examen'.$examen->id)
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- HOSPITALISATION -->
                                    <div class="tab-pane" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab5" id="bootstrap-wizard-validation-tab5">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3 mt-3">
                                                    <div class="mb-3">
                                                        <label class="col-form-label col-form-label-sm" for="label_type_observation">Type</label>
                                                        <div class="form-check">
                                                        <input class="form-check-input" id="mise_observation" type="radio" name="type_observation" value="observation" />
                                                        <label class="form-check-label mb-0" for="mise_observation">Mise en observation</label>
                                                        </div>
                                                        <div class="form-check">
                                                        <input class="form-check-input" id="hospitalisation" type="radio" name="type_observation" value="hospitalisation" />
                                                        <label class="form-check-label mb-0" for="hospitalisation">Hospitalisation</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" id="ambulatoire" type="radio" name="type_observation" value="ambulatoire" />
                                                            <label class="form-check-label mb-0" for="amb">Ambulatoire</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="show_mise_observation" style="display: none;">
                                                    <div class="mb-3">
                                                        <label class="col-form-label col-form-label-sm" for="nbre_jours">Nombre de jours</label>
                                                        <input class="form-control input-border-bt" id="nbre_jours" type="number" name="nbre_jours" onclick="calculMontantObservation();" onkeyup="calculMontantObservation();" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label col-form-label-sm" for="observation_montant">Montant</label>
                                                        <input class="form-control input-border-bt" id="observation_montant" type="text" name="observation_montant"  />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- EVACUATION -->
                                    <div class="tab-pane" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab6" id="bootstrap-wizard-validation-tab6">
                                        <div class="mb-3 mt-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="evacuation_patient" name="evacuation_patient" />
                                                <label class="form-check-label" for="flexCheckDefault">Évacuation ?</label>
                                            </div>
                                        </div>
                                        <div class="mb-3" id="show_evacuation_montant" style="display: none;">
                                            <label class="col-form-label col-form-label-sm" for="evacuation_montant">Montant</label>
                                            <input class="form-control input-border-bt" id="evacuation_montant" type="number" name="evacuation_montant" style="width:25%;" />
                                        </div>
                                    </div>
                                    <!-- FICHE -->
                                    <div class="tab-pane" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab7" id="bootstrap-wizard-validation-tab7">
                                        <div class="table-responsive scrollbar">
                                            <div class="row mb-3">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <span class="fas fa-asterisk fs--2 me-1 text-danger"></span><label class="col-form-label col-form-label-sm" for="name_prescripteur">Nom et prénom du prescripteur</label>
                                                        <input class="form-control input-border-bt" id="name_prescripteur" type="text" name="name_prescripteur" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <span class="fas fa-asterisk fs--2 me-1 text-danger"></span><label class="col-form-label col-form-label-sm" for="contact_prescripteur">Contact du prescripteur</label>
                                                        <input class="form-control input-border-bt" id="contact_prescripteur" type="text" name="contact_prescripteur" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label col-form-label-sm" for="qualification_prescripteur">Qualification du prescripteur</label>
                                                        <select class="form-select" id="qualification_prescripteur" name="qualification_prescripteur">
                                                            <option value="">Veuillez choisir...</option>
                                                            <option value="1">Médécin généraliste</option>
                                                            <option value="2">Médécin spécialiste</option>
                                                            <option value="3">Infirmier breveté</option>
                                                            <option value="3">Infirmier / IDE</option>
                                                            <option value="4">Attaché / Ingénieur</option>
                                                            <option value="5">Sage femme / Maïeuticien</option>
                                                            <option value="5">Sage femme d'etat / Maïeuticien d'etat</option>
                                                            <option value="6">Accoucheuse auxiliaire</option>
                                                            <option value="6">Accoucheuse brevetée</option>
                                                            <option value="7">AIS / ASC</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <span class="fas fa-asterisk fs--2 me-1 text-danger"></span><label class="col-form-label col-form-label-sm" for="name_gerant">Nom et prénom du gérant</label>
                                                        <input class="form-control input-border-bt" id="name_gerant" type="text" name="name_gerant" value="{{Auth::user()->name}}" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <span class="fas fa-asterisk fs--2 me-1 text-danger"></span><label class="col-form-label col-form-label-sm" for="contact_gerant">Contact du gérant</label>
                                                        <input class="form-control input-border-bt" id="contact_gerant" type="tel" name="contact_gerant" />
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h4 style="color:#004ebc">RECAPITULATIF</h4>
                                            <table class="table fs--2 mt-3">
                                            <thead>
                                                <tr>
                                                <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:32%; color: #004ebc;">DÉSIGNATION</th>
                                                <th class="border-top border-200 align-middle" scope="col" style="width:20%; color: #004ebc;">MONTANT</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                <!-- ORDONNANCE -->
                                                <tr>
                                                <td class="white-space-nowrap ps-0" style="width:32%">
                                                    <div class="d-flex align-items-center">
                                                    <h6 class="mb-0 me-3">Médicaments et Consommables médicaux</h6><a href="#!">
                                                    </a>
                                                    </div>
                                                </td>
                                                <td class="align-middle" style="width:17%">
                                                    <h6 class="mb-0" id="cout_global_product">###</h6>
                                                </td>
                                                </tr>
                                                <!-- ACTE -->
                                                <tr>
                                                    <td class="white-space-nowrap ps-0" style="width:32%">
                                                    <div class="d-flex align-items-center">
                                                        <h6 class="mb-0 me-3">Actes</h6><a href="#!">
                                                        </a>
                                                    </div>
                                                    </td>
                                                    <td class="align-middle" style="width:17%">
                                                    <h6 class="mb-0" id="cout_global_acte">###</h6>
                                                    </td>
                                                </tr>
                                                <!-- EQUIPEMENT -->
                                                <tr>
                                                    <td class="white-space-nowrap ps-0" style="width:32%">
                                                    <div class="d-flex align-items-center">
                                                        <h6 class="mb-0 me-3">Examens complémentaires</h6><a href="#!">
                                                        </a>
                                                    </div>
                                                    </td>
                                                    <td class="align-middle" style="width:17%">
                                                    <h6 class="mb-0" id="cout_global_examen">###</h6>
                                                    </td>
                                                </tr>
                                                <!-- MISE EN OBSERVATION -->
                                                <tr>
                                                    <td class="white-space-nowrap ps-0" style="width:32%">
                                                    <div class="d-flex align-items-center">
                                                        <h6 class="mb-0 me-3">Mise en observation / Hospitalisation</h6><a href="#!">
                                                        </a>
                                                    </div>
                                                    </td>
                                                    <td class="align-middle" style="width:17%">
                                                    <h6 class="mb-0" id="cout_global_observation">###</h6>
                                                    </td>
                                                </tr>
                                                <!-- EVACUATION -->
                                                <tr>
                                                    <td class="white-space-nowrap ps-0" style="width:32%">
                                                    <div class="d-flex align-items-center">
                                                        <h6 class="mb-0 me-3">Évacuation</h6><a href="#!">
                                                        </a>
                                                    </div>
                                                    </td>
                                                    <td class="align-middle" style="width:17%">
                                                    <h6 class="mb-0" id="cout_global_evacuation">###</h6>
                                                    </td>
                                                </tr>
                                                <!-- TOTAL -->
                                                <tr>
                                                    <td class="white-space-nowrap ps-0" style="width:32%">
                                                    <div class="d-flex align-items-center">
                                                        <h6 class="mb-0 me-3">TOTAL</h6><a href="#!">
                                                        </a>
                                                    </div>
                                                    </td>
                                                    <td class="align-middle" style="width:17%">
                                                    <h6 class="mb-0" id="cout_global_total">###</h6>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </div>
                                        <div class="pt-3 pb-3">
                                            <button class="btn btn-primary px-6" id="save-form">Valider</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-top-0" data-wizard-footer="data-wizard-footer">
                                <div class="d-flex pager wizard list-inline mb-0">
                                    <button class="d-none btn btn-secondary" type="button" data-wizard-prev-btn="data-wizard-prev-btn"><span class="fas fa-chevron-left me-1" data-fa-transform="shrink-3"></span>Précédent</button>
                                    <div class="flex-1 text-end">
                                    <button class="btn btn-primary px-6 px-sm-6" type="submit" data-wizard-next-btn="data-wizard-next-btn">Suivant<span class="fas fa-chevron-right ms-1" data-fa-transform="shrink-3"> </span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
  <script src="{{asset('assets/DataTables/datatables.js')}}"></script>
  <script>
    $(document).ready(function() {
        $('[id^="dataTableFis-"]').DataTable({
            retrieve: true,
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "Toutes"]
            ],
            "order": [],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Rechercher...",
                "decimal":        "",
                "emptyTable":     "Aucune donnée disponible dans ce tableau",
                "info":           "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                "infoEmpty":      "Affichage de 0 à 0 sur 0 entrées",
                "infoFiltered":   "(filtré sur un total de _MAX_ entrées)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "Affichage de _MENU_ entrées",
                "loadingRecords": "Chargement...",
                "processing":     "Traitement...",
                "zeroRecords":    "Aucune correspondance trouvée",
                "paginate": {
                    "first":      "Début",
                    "last":       "Fin",
                    "next":       "<i class='icofont icofont-double-right'></i>",
                    "previous":   "<i class='icofont icofont-double-left'></i>"
                },
                "aria": {
                    "sortAscending":  ": Cliquez pour activer le tri ascendant",
                    "sortDescending": ": Cliquez pour activer le tri descendant"
                }
            }
        });

        // $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        //     $($.fn.dataTable.tables(true)).DataTable()
        //         .columns.adjust()
        //         .responsive.recalc();
        // });
    });
  </script>
@endsection

