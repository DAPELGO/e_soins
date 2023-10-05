@extends('layouts.template')
@section('page_title', 'ECOM | Add Category')
@section('consultation', 'active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="panel-title">NOUVELLE CONSULTATION</h4>
        <div class="panel">
            <div class="my-0">

                <div class="row">
                    <div class="col-lg-3">
                        <div class="card h-100">
                            <div class="card-body" style="background-color: #f2f2f2;">
                              <div class="border-bottom border-dashed border-300 pb-1 mb-4">
                                <div class="row align-items-center g-3 g-sm-5 text-center text-sm-start">
                                  <div class="col-12 col-sm-auto offset-2">
                                    <div class="dz-preview dz-preview-single">
                                        <div class="dz-preview-cover d-flex align-items-center justify-content-center mb-2 mb-md-0">
                                            <div class="avatar avatar-4xl"><img class="rounded-circle avatar-placeholder" src="{{ asset('assets/img/team/avatar.webp')  }}" alt="..." data-dz-thumbnail="data-dz-thumbnail" /></div>
                                            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-12 col-sm-auto flex-1">
                                    <h3 class="me-1 fs--1">{{ $patient->name }}</h3>
                                    <p class="form-check-label">{{ $patient->sexe }} | {{ $patient->birth_date }}</p>
                                    <p class="form-check-label"><span class="fas fa-phone text-400 hover-primary"></span> {{ $patient->affiliation_number }}</p>
                                    <p class="form-check-label"><span class="fas fa-restroom text-400 hover-primary"></span> {{ $patient->mother }}</p>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3">
                                <h5 class="text-800"><span class="fas fa-map-marker-alt text-400 hover-primary"></span> DRS</h5><p class="form-check-label">{{ $patient->birth_date }}</p>
                              </div>
                              <div class="mb-3">
                                <h5 class="text-800"><span class="fas fa-map-marker-alt text-400 hover-primary"></span> District</h5><a class="form-check-label" href="mailto:shatinon@jeemail.com">{{ $patient->sexe }}</a>
                              </div>
                              <div class="mb-3">
                                <h5 class="text-800"><span class="fas fa-map-marker-alt text-400 hover-primary"></span> Formation sanitaire</h5><a class="form-check-label" href="tel:+1234567890">+226 {{ $patient->affiliation_number }}</a>
                               </div>
                               <div class="mb-3">
                                <h5 class="text-800"><span class="fas fa-map-marker-alt text-400 hover-primary"></span> Village/Secteur</h5><a class="form-check-label" href="tel:+1234567890">+226 {{ $patient->affiliation_number }}</a>
                               </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="card theme-wizard mb-5" data-theme-wizard="data-theme-wizard">
                            <div class="card-header pt-2 pb-2 border-bottom-0">
                            <ul class="nav justify-content-between nav-wizard">
                                <li class="nav-item"><a class="nav-link active fw-semi-bold" href="#bootstrap-wizard-validation-tab1" data-bs-toggle="tab" data-wizard-step="1">
                                    <div class="text-center d-inline-block"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-lock"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Généralitées</span></div>
                                </a></li>
                                <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab2" data-bs-toggle="tab" data-wizard-step="2">
                                    <div class="text-center d-inline-block"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-user"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Médicaments</span></div>
                                </a></li>
                                <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab3" data-bs-toggle="tab" data-wizard-step="3">
                                    <div class="text-center d-inline-block"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-file-alt"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Actes</span></div>
                                </a></li>
                                <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab4" data-bs-toggle="tab" data-wizard-step="4">
                                    <div class="text-center d-inline-block"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-check"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Consommables médicaux</span></div>
                                </a></li>
                                <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab5" data-bs-toggle="tab" data-wizard-step="5">
                                    <div class="text-center d-inline-block"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-check"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Fiche de soins</span></div>
                                </a></li>
                            </ul>
                            </div>
                            <div class="card-body pt-0 pb-0">
                            <div class="tab-content">
                                <div class="tab-pane active" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab1" id="bootstrap-wizard-validation-tab1">
                                    <form class="needs-validation" id="wizardValidationForm1" novalidate="novalidate" data-wizard-form="1">
                                        <input type="hidden" id="patient_id" name="patient_id" value="{{ $patient->id }}">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <span class="fas fa-asterisk fs--2 me-1 text-danger"></span><label class="col-form-label col-form-label-sm" for="consultation_date">Date de consultation</label>
                                                <input class="form-control input-border-bt datetimepicker" id="consultation_date" type="date" required="required" placeholder="dd-mm-aaaa" name="consultation_date" data-options='{"dateFormat":"d/m/y","disableMobile":true}' value="{{ date('d/m/Y') }}" />
                                                <div class="invalid-feedback">Please choose a username.</div>
                                            </div>
                                            <div class="mb-3">
                                                <span class="fas fa-asterisk fs--2 me-1 text-danger"></span><label class="col-form-label col-form-label-sm" for="registre_number">N° <span class="form-check-label"><i>(sur le Registre de consultation)</i></span></label>
                                                <input class="form-control input-border-bt" id="registre_number" type="text" required="required" name="registre_number" />
                                                <div class="invalid-feedback">Please choose a username.</div>
                                            </div>
                                            <div class="mb-3">
                                                <span class="fas fa-asterisk fs--2 me-1 text-danger"></span><label class="col-form-label col-form-label-sm" for="serie_number">N° <span class="form-check-label"><i>(Serie)</i></span></label>
                                                <input class="form-control input-border-bt" id="serie_number" type="text" required="required" name="serie_number" />
                                                <div class="invalid-feedback">Please choose a username.</div>
                                            </div>
                                            <div class="mb-3">
                                                <span class="fas fa-asterisk fs--2 me-1 text-danger"></span><label class="col-form-label col-form-label-sm" for="patient_type">Quel est le type du patient?</label>
                                                <div class="form-check">
                                                  <input class="form-check-input" type="radio" name="patient_type" required="required" value="Enfant de<5ans" />
                                                  <label class="form-check-label mb-0" for="patient_type">Enfant < 5ans</label>
                                                </div>
                                                <div class="form-check">
                                                  <input class="form-check-input" type="radio" name="patient_type" required="required" value="femme enceinte" />
                                                  <label class="form-check-label mb-0" for="patient_type">Femme enceinte</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="patient_type" required="required" value="accouchement" />
                                                    <label class="form-check-label mb-0" for="patient_type">Accouchement</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="patient_type" required="required" value="depistage_des_lesions_précancereuses" />
                                                    <label class="form-check-label mb-0" for="patient_type">Dépistage lésions pré cancer<span class="form-check-label"><i>(Col de l’utérus)</i></span></label>
                                                </div>
                                                <div class="invalid-feedback">Please choose a username.</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3 mt-3">
                                                <label class="col-form-label col-form-label-sm" for="mise_observ">Mise en observation</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="mise_observation" name="mise_observation" />
                                                    <label class="form-check-label" for="flexCheckDefault">Est ce que le patient a été mis en observation</label>
                                                  </div>
                                            </div>
                                            <div class="mb-3" id="show_observation_montant" style="display: none;">
                                                <label class="col-form-label col-form-label-sm" for="observation_montant">Montant</label>
                                                <input class="form-control input-border-bt" id="observation_montant" type="number" name="observation_montant" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label col-form-label-sm" for="diagnostic">Diagnostic</label>
                                                <select class="form-select" id="diagnostic" name="diagnostic" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>
                                                    <option value="">Select diagnostic...</option>
                                                    <option>Paludisme simple</option>
                                                    <option>Diarrhée</option>
                                                    <option>Toux ou rhume</option>
                                                    <option>Malnutrition</option>
                                                  </select>
                                                <div class="invalid-feedback">Please choose a username.</div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                <div class="tab-pane" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab2" id="bootstrap-wizard-validation-tab2">
                                <form class="needs-validation" id="wizardValidationForm2" novalidate="novalidate" data-wizard-form="2">
                                    <input type="hidden" id="code_product">
                                    <input type="hidden" id="quantity_product">
                                    <input type="hidden" id="index_product">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <span class="fas fa-asterisk fs--2 me-1 text-danger"></span><label class="col-form-label col-form-label-sm" for="ordonnance_number">Numéro d'ordonnance</label>
                                                <input class="form-control input-border-bt" id="ordonnance_number" type="text" required="required" placeholder="00000001" name="ordonnance_number" />
                                                <div class="invalid-feedback">Please choose a username.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div id="products" data-list='{"valueNames":["product","price","category","tags","vendor_acte","time"],"page":10,"pagination":true}'>
                                        <div class="mb-4">
                                          <div class="row g-3">
                                            <div class="col-auto col-6">
                                              <div class="search-box">
                                                  <input class="form-control search-input search" type="search" placeholder="Rechercher produits" aria-label="Rechercher" />
                                                  <span class="fas fa-search search-box-icon"></span>
                                              </div>
                                            </div>
                                            <div class="col-auto col-6">
                                                <div class="total panel-title" style="padding: 0.1rem 1rem;"><span>MONTANT TOTAL : </span><strong class="badge badge-light-primary rounded-pill" id="total_account_product" style="font-size: 1.2rem;">0</strong></div>
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
                                                  <th class="sort align-middle ps-3" scope="col" data-sort="tags" style="width:50px;">TOTAL</th>
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
                                                    <input class="form-control @error('quantity') is-invalid @enderror form-control-sm" id="quantity_product{{ $product->id }}" name="quantity_product{{ $product->id }}" type="number" value="{{ old('quantity') ? old('quantity') : 0 }}" style="width: 5rem;" disabled onclick="setPrice({{ $product->id }}, 'product');" onkeyup="setPrice({{ $product->id }}, 'product');" />
                                                    @error('quantity')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                  </td>
                                                  <td class="category align-middle white-space-nowrap text-600 fs--1 ps-1 fw-semi-bold"><span class="badge badge-tag me-2 mb-2" id="price_product{{ $product->id }}">{{ $product->prix_pvp }}</span></td>
                                                  <td class="tags align-middle review pb-2 ps-3"><a class="text-decoration-none" href="#!"><span id="total_product{{ $product->id }}" class="badge badge-tag me-2 mb-2">0.00</span></a>
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
                                                  <input class="form-control search-input search" type="search" placeholder="Search actes" aria-label="Search" />
                                                  <span class="fas fa-search search-box-icon"></span>
                                              </div>
                                            </div>
                                            <div class="col-auto col-6">
                                                <div class="total panel-title" style="padding: 0.1rem 1rem;"><span>MONTANT TOTAL : </span><strong class="badge badge-light-primary rounded-pill" id="total_account_acte" style="font-size: 1.2rem;">0</strong></div>
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
                                                  <th class="sort align-middle ps-3" scope="col" data-sort="tags_acte" style="width:50px;">TOTAL</th>
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
                                                    <input class="form-control @error('quantity_acte') is-invalid @enderror form-control-sm" id="quantity_acte{{ $acte->id }}" name="quantity_acte{{ $acte->id }}" type="number" value="{{ old('quantity_acte') ? old('quantity_acte') : 0 }}" style="width: 5rem;" disabled onclick="setPrice({{ $acte->id }}, 'acte');" onkeyup="setPrice({{ $acte->id }}, 'acte');" />
                                                    @error('quantity_acte')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                  </td>
                                                  <td class="category_acte align-middle white-space-nowrap text-600 fs--1 ps-1 fw-semi-bold"><span class="badge badge-tag me-2 mb-2" id="price_acte{{ $acte->id }}">{{ $acte->price_pvp }}</span></td>
                                                  <td class="tags align-middle review pb-2 ps-3"><a class="text-decoration-none" href="#!"><span id="total_acte{{ $acte->id }}" class="badge badge-tag me-2 mb-2">0.00</span></a>
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
                                <div class="tab-pane" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab4" id="bootstrap-wizard-validation-tab4">
                                    <form class="mb-2 needs-validation" id="wizardValidationForm4" novalidate="novalidate" data-wizard-form="4">
                                        <input type="hidden" id="code_equipement">
                                        <input type="hidden" id="quantity_equipement">
                                        <input type="hidden" id="index_equipement">
                                        <div id="equipements" data-list='{"valueNames":["equipement","price_equipement","category_equipement","tags_equipement","vendor_equipement","time_equipement"],"page":10,"pagination":true}'>
                                            <div class="mb-4">
                                            <div class="row g-3">
                                                <div class="col-auto col-6">
                                                <div class="search-box">
                                                    <input class="form-control search-input search" type="search" placeholder="Search equipements" aria-label="Search" />
                                                    <span class="fas fa-search search-box-icon"></span>
                                                </div>
                                                </div>
                                                <div class="col-auto col-6">
                                                    <div class="total panel-title" style="padding: 0.1rem 1rem;"><span>MONTANT TOTAL : </span><strong class="badge badge-light-primary rounded-pill" id="total_account_equipement" style="font-size: 1.2rem;">0</strong></div>
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
                                                        <input class="form-check-input" id="checkbox-bulk-equipements-select" type="checkbox" data-bulk-select='{"body":"equipements-table-body"}' />
                                                        </div>
                                                    </th>
                                                    <th class="sort white-space-nowrap align-middle ps-1" scope="col" style="width:150px;" data-sort="equipement">CONSOMMABLES MÉDICAUX</th>
                                                    <th class="sort align-middle ps-1" scope="col" data-sort="price_equipement" style="width:50px;">QUANTITÉ</th>
                                                    <th class="sort align-middle ps-1" scope="col" data-sort="category_equipement" style="width:50px;">PRIX</th>
                                                    <th class="sort align-middle ps-3" scope="col" data-sort="tags_equipement" style="width:50px;">TOTAL</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list" id="equipements-table-body">
                                                    @foreach($equipements as $equipement)
                                                    <tr class="position-static">
                                                    <td class="fs--1 align-middle">
                                                        <div class="form-check mb-0 fs-0">
                                                        <input class="form-check-input" type="checkbox"  name="check_equipement{{ $equipement->id }}" id="check_equipement{{ $equipement->id }}" data-bulk-select-row='{"equipement":"","price_equipement":"0.0","category_equipement":"appareil","tags_equipement":["Health",],"star":false}' value="{{ $equipement->code_equipement }}" onclick="selectProduct({{ $equipement->id }}, 'equipement');" />
                                                        </div>
                                                    </td>
                                                    <td class="equipement align-middle ps-1">{{ $equipement->description }}</td>
                                                    <td class="price_equipement align-middle white-space-nowrap text-end fw-bold text-700">
                                                        <input class="form-control @error('quantity_equipement') is-invalid @enderror form-control-sm" id="quantity_equipement{{ $equipement->id }}" name="quantity_equipement{{ $equipement->id }}" type="number" value="{{ old('quantity_equipement') ? old('quantity_equipement') : 0 }}" style="width: 5rem;" disabled onclick="setPrice({{ $equipement->id }}, 'equipement');" onkeyup="setPrice({{ $equipement->id }}, 'equipement');" />
                                                        @error('quantity_equipement')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                    <td class="category_equipement align-middle white-space-nowrap text-600 fs--1 ps-1 fw-semi-bold"><span class="badge badge-tag me-2 mb-2" id="price_equipement{{ $equipement->id }}">{{ $equipement->unit_cost_drd }}</span></td>
                                                    <td class="tags align-middle review pb-2 ps-3"><a class="text-decoration-none" href="#!"><span id="total_equipement{{ $equipement->id }}" class="badge badge-tag me-2 mb-2">0.00</span></a>
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
                                <div class="tab-pane" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab5" id="bootstrap-wizard-validation-tab5">
                                    <div class="table-responsive scrollbar">
                                        <table class="table fs--2 mb-0">
                                          <thead>
                                            <tr>
                                              <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:32%; color: #004ebc;">DÉSIGNATION</th>
                                              <th class="border-top border-200 align-middle" scope="col" style="width:16%; color: #004ebc;">QUANTITÉ</th>
                                              <th class="border-top border-200 align-middle" scope="col" style="width:20%; color: #004ebc;">MONTANT</th>
                                            </tr>
                                          </thead>
                                          <tbody class="list">
                                            <!-- ORDONNANCE -->
                                            <tr>
                                              <td class="white-space-nowrap ps-0" style="width:32%">
                                                <div class="d-flex align-items-center">
                                                  <h6 class="mb-0 me-3">Médicaments</h6><a href="#!">
                                                  </a>
                                                </div>
                                              </td>
                                              <td class="align-middle" style="width:17%">
                                                <h6 class="mb-0">###</h6>
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
                                                  <h6 class="mb-0">###</h6>
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
                                                  <h6 class="mb-0">###</h6>
                                                </td>
                                                <td class="align-middle" style="width:17%">
                                                  <h6 class="mb-0" id="cout_global_equipement">###</h6>
                                                </td>
                                            </tr>

                                            <!-- MISE EN OBSERVATION -->
                                            <tr>
                                                <td class="white-space-nowrap ps-0" style="width:32%">
                                                  <div class="d-flex align-items-center">
                                                    <h6 class="mb-0 me-3">Mise en observation(<i>Niveau CSPS </i>)</h6><a href="#!">
                                                    </a>
                                                  </div>
                                                </td>
                                                <td class="align-middle" style="width:17%">
                                                  <h6 class="mb-0">###</h6>
                                                </td>
                                                <td class="align-middle" style="width:17%">
                                                  <h6 class="mb-0" id="cout_global_observation">###</h6>
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
                                                  <h6 class="mb-0">###</h6>
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
