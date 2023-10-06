@extends('layouts.template')
@section('page_title', 'ECOM | Add Category')
@section('consultation', 'active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="panel-title">NOUVELLE DISPENSATION</h4>
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
                                    <div class="text-center d-inline-block"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-check"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Fiche de soins</span></div>
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
                                                    <label class="col-form-label col-form-label-sm" for="name">Nom et prénom du patient</label>
                                                    <input class="form-control input-border-bt" id="name" type="text" name="name" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="col-form-label col-form-label-sm" for="village_patient">Village / secteur</label>
                                                    <input class="form-control input-border-bt" id="village_patient" type="text" name="village_patient" />
                                                </div>
                                                {{-- <div class="mb-3">
                                                    <label class="col-form-label col-form-label-sm" for="age">Age du patient ?</label>
                                                    <input class="form-control input-border-bt" id="age" type="number" name="age" />
                                                </div> --}}
                                                <div class="mb-3">
                                                    <label class="col-form-label col-form-label-sm" for="age">Quel est l'âge du patient ?</label>
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
                                                    <label class="col-form-label col-form-label-sm" for="consultation_date">Date</label>
                                                    <input class="form-control input-border-bt" id="consultation_date" type="text" required="required" placeholder="dd-mm-aaaa" name="consultation_date" value="{{ date('d/m/Y') }}" />
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
                                                    <span class="fas fa-asterisk fs--2 me-1 text-danger"></span><label class="col-form-label col-form-label-sm" for="patient_type">Cible</label>
                                                    @foreach ($typeprestations as $typeprestation)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="patient_type" id="cible{{ $typeprestation->id }}" required="required" value="{{ $typeprestation->id }}" onclick="changeValue('cible{{ $typeprestation->id }}', 'type_prestation', 'valeur');" />
                                                            <label class="form-check-label mb-0" for="patient_type">{{ $typeprestation->libelle }}</label>
                                                        </div>
                                                    @endforeach
                                                    <div class="invalid-feedback">Veuillez choisir une cible !</div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="col-form-label col-form-label-sm" for="type_prestation">Type de prestation</label>
                                                    <select class="form-select" id="type_prestation" name="type_prestation">
                                                        <option value="">Selectionner type de prestation...</option>
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
                                        {{-- <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <span class="fas fa-asterisk fs--2 me-1 text-danger"></span><label class="col-form-label col-form-label-sm" for="ordonnance_number">Numéro d'ordonnance</label>
                                                    <input class="form-control input-border-bt" id="ordonnance_number" type="text" required="required" placeholder="00000001" name="ordonnance_number" />
                                                    <div class="invalid-feedback">Please choose a username.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr> --}}
                                        <div id="products" data-list='{"valueNames":["product","price","category","tags","vendor_acte","time"],"page":1000,"pagination":true}'>
                                            <div class="mb-4">
                                            <div class="row g-3">
                                                <div class="col-auto col-6">
                                                <div class="search-box">
                                                    <input class="form-control search-input search" type="search" placeholder="Rechercher..." aria-label="Rechercher" />
                                                    <span class="fas fa-search search-box-icon"></span>
                                                </div>
                                                </div>
                                                <div class="col-auto col-6">
                                                    <div class="total panel-title p-1"><span>MONTANT TOTAL : </span><strong class="badge badge-light-primary rounded-pill" id="total_account_product" style="font-size: 1rem;">0</strong></div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="bg-white border-top border-bottom border-200 position-relative top-1" style="height: 24rem; max-height: 24rem; overflow:scroll">
                                            <div class="table-responsive scrollbar mx-n1 px-1">
                                                <table class="table fs--1 mb-0">
                                                <thead>
                                                    <tr>
                                                    <th class="white-space-nowrap fs--1 align-middle ps-0" style="max-width:20px; width:18px;">
                                                        <div class="form-check mb-0 fs-0">
                                                        <input class="form-check-input" id="checkbox-bulk-products-select" type="checkbox" data-bulk-select='{"body":"products-table-body"}' />
                                                        </div>
                                                    </th>
                                                    <th class="sort white-space-nowrap align-middle ps-1" scope="col" style="width:150px;" data-sort="product">PRODUIT</th>
                                                    <th class="sort align-middle ps-1" scope="col" data-sort="price" style="width:50px;">QUANTITÉ</th>
                                                    <th class="sort align-middle ps-1" scope="col" data-sort="category" style="width:50px;">PRIX</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list" id="products-table-body">
                                                    @foreach($products as $product)
                                                    <tr class="position-static">
                                                    <td class="fs--1 align-middle">
                                                        <div class="form-check mb-0 fs-0">
                                                        <input class="form-check-input" type="checkbox"  name="check_product{{ $product->id }}" id="check_product{{ $product->id }}" data-bulk-select-row='{"product":"","price":"0.0","category":"appareil","tags":["Health",],"star":false}' value="{{ $product->code_product }}" onclick="selectProduct({{ $product->id }}, 'product');" />
                                                        </div>
                                                    </td>
                                                    <td class="product align-middle ps-1">{{ $product->name }}</td>
                                                    <td class="price align-middle white-space-nowrap text-end fw-bold text-700">
                                                        <input class="form-control @error('quantity') is-invalid @enderror form-control-sm" id="quantity_product{{ $product->id }}" name="quantity_product{{ $product->id }}" type="number" min="0" value="{{ old('quantity') ? old('quantity') : 0 }}" style="width: 5rem;" disabled />
                                                        @error('quantity')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                    <td class="price align-middle white-space-nowrap text-end fw-bold text-700">
                                                        <input class="form-control @error('amount') is-invalid @enderror form-control-sm" id="amount_product{{ $product->id }}" name="amount_product{{ $product->id }}" type="number" min="0" value="{{ old('amount') ? old('amount') : 0 }}"  disabled onkeyup="setPrice({{ $product->id }}, 'product');" />
                                                        @error('amount')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                    </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                </table>
                                            </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- ACTES -->
                                <div class="tab-pane" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab3" id="bootstrap-wizard-validation-tab3">
                                    <form class="mb-2 needs-validation" id="wizardValidationForm3" novalidate="novalidate" data-wizard-form="3">
                                        <input type="hidden" id="code_acte">
                                        <input type="hidden" id="quantity_acte">
                                        <input type="hidden" id="index_acte">
                                        <div id="actes" data-list='{"valueNames":["acte","price_acte","category_acte","tags_acte","vendor_acte","time_acte"],"page":10,"pagination":true}'>
                                            <div class="mb-4">
                                              <div class="row g-3">
                                                <div class="col-auto col-6">
                                                  <div class="search-box">
                                                      <input class="form-control search-input search" type="search" placeholder="Rechercher..." aria-label="Search" />
                                                      <span class="fas fa-search search-box-icon"></span>
                                                  </div>
                                                </div>
                                                <div class="col-auto col-6">
                                                    <div class="total panel-title p-1"><span>MONTANT TOTAL : </span><strong class="badge badge-light-primary rounded-pill" id="total_account_acte" style="font-size: 1rem;">0</strong></div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="bg-white border-top border-bottom border-200 position-relative top-1" style="height: 24rem; max-height: 24rem; overflow:scroll">
                                              <div class="table-responsive scrollbar mx-n1 px-1">
                                                <table class="table fs--1 mb-0">
                                                  <thead>
                                                    <tr>
                                                      <th class="white-space-nowrap fs--1 align-middle ps-0" style="max-width:20px; width:18px;">
                                                        <div class="form-check mb-0 fs-0">
                                                          <input class="form-check-input" id="checkbox-bulk-actes-select" type="checkbox" data-bulk-select='{"body":"actes-table-body"}' />
                                                        </div>
                                                      </th>
                                                      <th class="sort white-space-nowrap align-middle ps-1" scope="col" style="width:150px;" data-sort="acte">ACTE</th>
                                                      <th class="sort align-middle ps-1" scope="col" data-sort="price_acte" style="width:50px;">QUANTITÉ</th>
                                                      <th class="sort align-middle ps-1" scope="col" data-sort="category_acte" style="width:50px;">PRIX</th>
                                                      {{-- <th class="sort align-middle ps-3" scope="col" data-sort="tags_acte" style="width:50px;">TOTAL</th> --}}
                                                    </tr>
                                                  </thead>
                                                  <tbody class="list" id="actes-table-body">
                                                    @foreach($actes as $acte)
                                                    <tr class="position-static">
                                                      <td class="fs--1 align-middle">
                                                        <div class="form-check mb-0 fs-0">
                                                          <input class="form-check-input" type="checkbox"  name="check_acte{{ $acte->id }}" id="check_acte{{ $acte->id }}" data-bulk-select-row='{"acte":"","price_acte":"0.0","category_acte":"appareil_acte","tags_acte":["Health",],"star":false}' value="{{ $acte->code_acte }}" onclick="selectProduct({{ $acte->id }}, 'acte');" />
                                                        </div>
                                                      </td>
                                                      <td class="acte align-middle ps-1">{{ $acte->description }}</td>
                                                      <td class="price_acte align-middle white-space-nowrap text-end fw-bold text-700">
                                                        <input class="form-control @error('quantity_acte') is-invalid @enderror form-control-sm" id="quantity_acte{{ $acte->id }}" name="quantity_acte{{ $acte->id }}" type="number" min="0" value="{{ old('quantity_acte') ? old('quantity_acte') : 0 }}" style="width: 5rem;" disabled onclick="setPrice({{ $acte->id }}, 'acte');" />
                                                        @error('quantity_acte')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                      </td>
                                                      <td class="price_acte align-middle white-space-nowrap text-end fw-bold text-700">
                                                        <input class="form-control @error('amount_acte') is-invalid @enderror form-control-sm" id="amount_acte{{ $acte->id }}" name="amount_acte{{ $acte->id }}" type="number" min="0" value="{{ old('amount_acte') ? old('amount_acte') : 0 }}" disabled onclick="setPrice({{ $acte->id }}, 'acte');" onkeyup="setPrice({{ $acte->id }}, 'acte');" />
                                                        @error('amount_acte')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                      </td>
                                                    </tr>
                                                    @endforeach
                                                  </tbody>
                                                </table>
                                              </div>
                                            </div>
                                          </div>
                                    </form>
                                </div>
                                <!-- EXAMENS COMPLEMENTAIRES -->
                                <div class="tab-pane" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab4" id="bootstrap-wizard-validation-tab4">

                                    <form class="mb-2 needs-validation" id="wizardValidationForm4" novalidate="novalidate" data-wizard-form="4">
                                        <input type="hidden" id="code_examen">
                                        <input type="hidden" id="quantity_examen">
                                        <input type="hidden" id="index_examen">
                                        <div id="examens" data-list='{"valueNames":["examen","price_examen","category_examen","tags_examen","vendor_examen","time_examen"],"page":10,"pagination":true}'>
                                            <div class="mb-4">
                                            <div class="row g-3">
                                                <div class="col-auto col-6">
                                                <div class="search-box">
                                                    <input class="form-control search-input search" type="search" placeholder="Search examens" aria-label="Search" />
                                                    <span class="fas fa-search search-box-icon"></span>
                                                </div>
                                                </div>
                                                <div class="col-auto col-6">
                                                    <div class="total panel-title p-1"><span>MONTANT TOTAL : </span><strong class="badge badge-light-primary rounded-pill" id="total_account_examen" style="font-size: 1rem;">0</strong></div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="bg-white border-top border-bottom border-200 position-relative top-1" style="height: 24rem; max-height: 24rem; overflow:scroll">
                                            <div class="table-responsive scrollbar mx-n1 px-1">
                                                <table class="table fs--1 mb-0">
                                                <thead>
                                                    <tr>
                                                    <th class="white-space-nowrap fs--1 align-middle ps-0" style="max-width:20px; width:18px;">
                                                        <div class="form-check mb-0 fs-0">
                                                        <input class="form-check-input" id="checkbox-bulk-examens-select" type="checkbox" data-bulk-select='{"body":"examens-table-body"}' />
                                                        </div>
                                                    </th>
                                                    <th class="sort white-space-nowrap align-middle ps-1" scope="col" style="width:150px;" data-sort="examen">EXAMENS COMPLÉMENTAIRES</th>
                                                    <th class="sort align-middle ps-1" scope="col" data-sort="price_examen" style="width:50px;">QUANTITÉ</th>
                                                    <th class="sort align-middle ps-1" scope="col" data-sort="category_examen" style="width:50px;">PRIX</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list" id="examens-table-body">
                                                    @foreach($examens as $examen)
                                                    <tr class="position-static">
                                                    <td class="fs--1 align-middle">
                                                        <div class="form-check mb-0 fs-0">
                                                        <input class="form-check-input" type="checkbox"  name="check_examen{{ $examen->id }}" id="check_examen{{ $examen->id }}" data-bulk-select-row='{"examen":"","price_examen":"0.0","category_examen":"appareil","tags_examen":["Health",],"star":false}' value="{{ $examen->code_examen }}" onclick="selectProduct({{ $examen->id }}, 'examen');" />
                                                        </div>
                                                    </td>
                                                    <td class="examen align-middle ps-1">{{ $examen->nom_examen }}</td>
                                                    <td class="price_examen align-middle white-space-nowrap text-end fw-bold text-700">
                                                        <input class="form-control @error('quantity_examen') is-invalid @enderror form-control-sm" id="quantity_examen{{ $examen->id }}" name="quantity_examen{{ $examen->id }}" type="number" value="{{ old('quantity_examen') ? old('quantity_examen') : 0 }}" style="width: 5rem;" disabled onclick="setPrice({{ $examen->id }}, 'examen');" />
                                                        @error('quantity_examen')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                    <td class="price_examen align-middle white-space-nowrap text-end fw-bold text-700">
                                                        <input class="form-control @error('amount_examen') is-invalid @enderror form-control-sm" id="amount_examen{{ $examen->id }}" name="amount_examen{{ $examen->id }}" type="number" value="{{ old('amount_examen') ? old('amount_examen') : 0 }}" disabled onclick="setPrice({{ $examen->id }}, 'examen');" onkeyup="setPrice({{ $examen->id }}, 'examen');" />
                                                        @error('amount_examen')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                </table>
                                            </div>
                                            </div>
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
                                                    <input class="form-control input-border-bt" id="observation_montant" type="text" name="observation_montant" disabled />
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
                                            <label class="form-check-label" for="flexCheckDefault">Évacuation?</label>
                                          </div>
                                    </div>
                                    <div class="mb-3" id="show_evacuation_montant" style="display: none;">
                                        <label class="col-form-label col-form-label-sm" for="evacuation_montant">Nombre de kilomètre</label>
                                        <input class="form-control input-border-bt" id="nbre_kilometre" type="number" name="nbre_kilometre" style="width:25%;" />
                                    </div>
                                </div>
                                <!-- FICHE -->
                                <div class="tab-pane" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab7" id="bootstrap-wizard-validation-tab7">
                                    <div class="table-responsive scrollbar">
                                        <table class="table fs--2 mb-0">
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
