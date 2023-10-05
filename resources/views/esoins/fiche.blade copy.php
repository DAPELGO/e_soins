@extends('layouts.template')
@section('page_title', 'ECOM | All user')
@section('consultation', 'active')
@section('content')
  <h4 style="padding: 1rem; background-color: #004ebc; color: white !important; font-size: 0.8rem; margin-bottom:0 !important;">FEUILLE DE SOINS</h4>
  <div style="background-color: #ededec; padding: 1.5rem;">
    <div class="mb-4 bg-white mt-2 position-relative top-1 p-4" style="border: 1px solid #acacac;">
        <div class="row fs--1">
            <div class="col-lg-4"><span class="fw-black">DRS : </span>{{ $drs->nom_structure }}</div>
            <div class="col-lg-4 offset-4"><span class="fw-black">Date : </span> {{ $consult->visit_date }}</div>
            <div class="col-lg-4"><span class="fw-black">DS : </span> {{ $consult->csps? $consult->district : $district->nom_structure }}</div>
            <div class="col-lg-4 offset-4"><span class="fw-black">N° </span><small><i>(Serie)</i></small> : {{ $consult->serie_number }}</div>
            <div class="col-auto"><span class="fw-black">FS</span> : {{ $consult->csps? $consult->csps : $csps->nom_structure }}</div>
        </div>
        <hr>
        <div class="row py-2 pe-0 fs--1">
            <div class="col-lg-4"><span class="text-black fw-bold">Nom & Prénom :</span> {{ $consult->nom_patient ? $consult->nom_patient : $patient->name }}</div>
            <div class="col-lg-4 offset-4"><span class="text-black fw-bold">Village/secteur :</span> {{ $consult->csps }}</div>
        </div>

        <div class="row py-2 pe-0 fs--1">
            <div class="col-lg-2">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" id="inlineCheckbox1" type="checkbox" value="option1" disabled="" @if($consult->consultation_type == 'enfant de moins de 5 ans') checked @endif />
                  <label class="form-check-label text-black fw-bold" for="inlineCheckbox1" style="opacity: inherit;">Enfant < 5ans</label>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" id="inlineCheckbox1" type="checkbox" value="option1" disabled="" @if($consult->consultation_type == 'femme enceinte') checked @endif />
                  <label class="form-check-label text-black fw-bold" for="inlineCheckbox1" style="opacity: inherit;">Femme enceinte </label>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" id="inlineCheckbox1" type="checkbox" value="option1" disabled="" @if($consult->consultation_type == 'accouchement') checked @endif />
                  <label class="form-check-label text-black fw-bold" for="inlineCheckbox1" style="opacity: inherit;">Accouchement </label>
                </div>
            </div>
            <div class="col-lg-4 offset-2">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" id="inlineCheckbox1" type="checkbox" value="option1" disabled="" @if($consult->consultation_type == 'dépistage lésions précancer') checked @endif />
                  <label class="form-check-label" for="inlineCheckbox1" style="opacity: inherit;"><span class="text-black fw-bold">Dépistage lésions pré cancer</span> <small><i>(Col de l’utérus)</i></small></label>
                </div>
            </div>
        </div>
        <div class="row py-2 pe-0 fs--1">
            <div class="col-lg-1 text-black fw-bold">Âge : </div>
            <div class="col-lg-1 text-black fw-bold">Sexe : </div>
            <div class="col-lg-1">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" id="inlineCheckbox1" type="checkbox" value="option1" disabled="" />
                  <label class="form-check-label text-black fw-bold" for="inlineCheckbox1" style="opacity: inherit;">M</label>
                </div>
            </div>
            <div class="col-lg-1">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" id="inlineCheckbox1" type="checkbox" value="option1" disabled="" checked />
                  <label class="form-check-label text-black fw-bold" for="inlineCheckbox1" style="opacity: inherit;">F</label>
                </div>
            </div>
            <div class="col-lg-4">
                <span class="text-black fw-bold">N° </span><small><i>(sur le Registre de consultation)</i></small> : {{ $consult->registre_number }}
            </div>
            <div class="col-lg-1">
                <span class="text-black fw-bold">Diagnostic:</span>
            </div>
            <div class="col-lg-3">
                <input class="form-control form-control-sm input-border-bt" id="diagnostic" type="text" required="required" name="diagnostic" placeholder="Saisir le diagnostic" />
            </div>
        </div>

        <div class="row py-2 pe-0 fs--1">
            <div class="col-lg-4"><span class="text-black fw-bold">Nom du père/mère (pour enfants < 5 ans) :</span> DARRA Alisse</div>
            <div class="col-lg-4"><span class="text-black fw-bold">Contact : </span>(+226) 71 00 22 66</div>
            <div class="col-lg-4"><span class="text-black fw-bold">N° Ordonnance : </span>{{ $consult->num_ordonance }}</div>
        </div>
        <hr>
        <h3 class="text-center">ORDONNANCE MEDICALE</h3>
        <hr>

        <div class="row">
            <div class="col-lg-6">
                <h4 class="fs--2" style="background-color: #F2F2F2; padding: 0.5rem;">ACTES PRESCRITS</h4>
                <div class="table-responsive scrollbar border-1">
                    <table class="table fs--2 mb-0">
                      <thead>
                        <tr>
                          <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:32%; color: #004ebc;">ACTES</th>
                          <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:32%; color: #004ebc;">QUANTITÉ</th>
                          <th class="border-top border-200 pe-0 align-middle" scope="col" style="width:17%; color: #004ebc;">MONTANT</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        <?php $i = 0; $total_act = 0; $quantity_acte = 0; ?>
                        @foreach($actes as $acte)
                        <tr>
                          <td class="white-space-nowrap ps-0" style="width:32%">
                            <div class="d-flex align-items-center">
                              <h6 class="mb-0 me-3">{{ $acte->description }}</h6><a href="#!">
                              </a>
                            </div>
                          </td>
                          <td class="align-middle" style="width:17%">
                            <h6 class="mb-0">{{ $quantity_act[$i] }}</h6>
                          </td>
                          <td class="align-middle" style="width:17%">
                            <h6 class="mb-0">{{ $acte->unit_cost }}</h6>
                          </td>
                        </tr>
                        <?php $total_act = $total_act + ($acte->unit_cost?$acte->unit_cost : 0) *$quantity_act[$i]; $quantity_acte = $quantity_acte + $quantity_act[$i]; ?>
                        <?php $i++; ?>
                        @endforeach
                        <tr>
                            <td class="white-space-nowrap ps-0" style="width:32%">
                              <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-3">TOTAL</h6><a href="#!">
                                </a>
                              </div>
                            </td>
                            <td class="align-middle" style="width:17%">
                                <h6 class="mb-0">{{ $quantity_acte }}</h6>
                              </td>
                            <td class="align-middle" style="width:17%">
                              <h6 class="mb-0">{{ $consult->cout_total_act ? $consult->cout_total_act : $total_act }}</h6>
                            </td>
                          </tr>

                      </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="table-responsive scrollbar border-1">
                    <h4 class="fs--2" style="background-color: #F2F2F2; padding: 0.5rem;">MÉDICAMENTS</h4>
                    <table class="table fs--2 mb-0">
                      <thead>
                        <tr>
                          <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:32%; color: #004ebc;">MÉDICAMENTS</th>
                          <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:32%; color: #004ebc;">QUANTITÉ</th>
                          <th class="border-top border-200 pe-0 align-middle" scope="col" style="width:17%; color: #004ebc;">MONTANT</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        <?php $i = 0; $total_eq = 0; $quantity_equipement = 0; ?>
                        @foreach($equipements as $equipement)
                        <tr>
                          <td class="white-space-nowrap ps-0" style="width:32%">
                            <div class="d-flex align-items-center">
                              <h6 class="mb-0 me-3">{{ $equipement->description }}</h6><a href="#!">
                              </a>
                            </div>
                          </td>
                          <td class="align-middle" style="width:17%">
                            <h6 class="mb-0">{{ $quantity_eq[$i] }}</h6>
                          </td>
                          <td class="align-middle" style="width:17%">
                            <h6 class="mb-0">{{ $equipement->unit_cost_drd }}</h6>
                          </td>
                        </tr>
                        <?php $total_eq = $total_eq + $quantity_eq[$i]; $quantity_equipement = $quantity_equipement + $quantity_eq[$i]; ?>
                        <?php $i++; ?>
                        @endforeach
                        <tr>
                            <td class="white-space-nowrap ps-0" style="width:32%">
                              <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-3">TOTAL</h6><a href="#!">
                                </a>
                              </div>
                            </td>
                            <td class="align-middle" style="width:17%">
                                <h6 class="mb-0">{{ $consult->cout_tatol_equipement }}</h6>
                              </td>
                            <td class="align-middle" style="width:17%">
                              <h6 class="mb-0">{{ $consult->cout_tatol_equipement }}</h6>
                            </td>
                          </tr>

                      </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <h4 class="fs--2" style="background-color: #F2F2F2; padding: 0.5rem;">MÉDICAMENTS PRESCRIPTS</h4>
                <div class="table-responsive scrollbar border-1">
                    <table class="table fs--2 mb-0">
                      <thead>
                        <tr>
                          <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:32%; color: #004ebc;">PRODUITS</th>
                          <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:32%; color: #004ebc;">QUANTITÉ</th>
                          <th class="border-top border-200 pe-0 align-middle" scope="col" style="width:17%; color: #004ebc;">MONTANT</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        <?php $i = 0; $total_prod = 0; $quantity_product = 0; ?>
                        @foreach ($cproducts as $cproduct )
                        <tr>
                          <td class="white-space-nowrap ps-0" style="width:32%">
                            <div class="d-flex align-items-center">
                              <h6 class="mb-0 me-3">{{ $cproduct->name }}</h6><a href="#!">
                              </a>
                            </div>
                          </td>
                          <td class="align-middle" style="width:17%">
                            <h6 class="mb-0">{{ $quantity_prod[$i] }}</h6>
                          </td>
                          <td class="align-middle" style="width:17%">
                            <h6 class="mb-0">{{ $cproduct->drd_price*$quantity_prod[$i] }}</h6>
                          </td>
                        </tr>
                        <?php $total_prod = $total_prod + $cproduct->drd_price*$quantity_prod[$i]; $quantity_product = $quantity_product + $quantity_prod[$i]; ?>
                        <?php $i++; ?>
                        @endforeach
                        <tr>
                            <td class="white-space-nowrap ps-0" style="width:32%">
                              <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-3">TOTAL</h6><a href="#!">
                                </a>
                              </div>
                            </td>
                            <td class="align-middle" style="width:17%">
                              <h6 class="mb-0">{{ $quantity_product }}</h6>
                            </td>
                            <td class="align-middle" style="width:17%">
                              <h6 class="mb-0">{{ $consult->cout_total_prod ? $consult->cout_total_prod : $total_prod }}</h6>
                            </td>
                          </tr>
                      </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <h4 class="fs--2" style="background-color: #F2F2F2; padding: 0.5rem;">MÉDICAMENTS SERIVS</h4>
                <div class="table-responsive scrollbar border-1">
                    <table class="table fs--2 mb-0">
                      <thead>
                        <tr>
                          <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:32%; color: #004ebc;">PRODUITS</th>
                          <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:32%; color: #004ebc;">QUANTITÉ</th>
                          <th class="border-top border-200 pe-0 align-middle" scope="col" style="width:17%; color: #004ebc;">MONTANT</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        <?php $ntotal = 0; $nprodtotal = 0; ?>
                        @foreach ($nproducts as $nproduct )
                        <tr>
                          <td class="white-space-nowrap ps-0" style="width:32%">
                            <div class="d-flex align-items-center">
                              <h6 class="mb-0 me-3">{{ $nproduct->name }}</h6><a href="#!">
                              </a>
                            </div>
                          </td>
                          <td class="align-middle" style="width:17%">
                            <h6 class="mb-0">{{ $nproduct->quantity_product}}</h6>
                          </td>
                          <td class="align-middle" style="width:17%">
                            <h6 class="mb-0">{{ $nproduct->drd_price*$nproduct->quantity_product }}</h6>
                          </td>
                        </tr>
                        <?php $ntotal = $ntotal + $nproduct->drd_price*$nproduct->quantity_product; $nprodtotal = $nprodtotal + $nproduct->quantity_product; ?>
                        @endforeach
                        <tr>
                            <td class="white-space-nowrap ps-0" style="width:32%">
                              <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-3">TOTAL</h6><a href="#!">
                                </a>
                              </div>
                            </td>
                            <td class="align-middle" style="width:17%">
                              <h6 class="mb-0">{{ $nprodtotal }}</h6>
                            </td>
                            <td class="align-middle" style="width:17%">
                              <h6 class="mb-0">{{ $ntotal }}</h6>
                            </td>
                          </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="p-4">
            <hr>
            <h3 class="text-center">RÉSUMÉ DE LA FACTURE</h3>
        </div>
        <div class="table-responsive scrollbar border-1">
            <table class="table fs--2 mb-0">
              <thead>
                <tr>
                  <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:32%; color: #004ebc;">DÉSIGNATION</th>
                  <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:32%; color: #004ebc;">QUANITÉ</th>
                  <th class="border-top border-200 pe-0 align-middle" scope="col" style="width:17%; color: #004ebc;">MONTANT</th>
                </tr>
              </thead>
              <tbody class="list">
                <tr>
                  <td class="white-space-nowrap ps-0" style="width:32%">
                    <div class="d-flex align-items-center">
                      <h6 class="mb-0 me-3">Actes</h6><a href="#!">
                      </a>
                    </div>
                  </td>
                  <td class="align-middle" style="width:17%">
                    <h6 class="mb-0">02</h6>
                  </td>
                  <td class="align-middle" style="width:17%">
                    <h6 class="mb-0">{{ $consult->cout_total_act }}</h6>
                  </td>
                </tr>
                <tr>
                    <td class="white-space-nowrap ps-0" style="width:32%">
                      <div class="d-flex align-items-center">
                        <h6 class="mb-0 me-3">Équipements</h6><a href="#!">
                        </a>
                      </div>
                    </td>
                    <td class="align-middle" style="width:17%">
                      <h6 class="mb-0">02</h6>
                    </td>
                    <td class="align-middle" style="width:17%">
                      <h6 class="mb-0">{{ $consult->cout_tatol_equipement }}</h6>
                    </td>
                  </tr>
                  <tr>
                    <td class="white-space-nowrap ps-0" style="width:32%">
                      <div class="d-flex align-items-center">
                        <h6 class="mb-0 me-3">Mise en observation <small><i>(niveau CSPS)</i></small></h6><a href="#!">
                        </a>
                      </div>
                    </td>
                    <td class="align-middle" style="width:17%">
                      <h6 class="mb-0">02</h6>
                    </td>
                    <td class="align-middle" style="width:17%">
                      <h6 class="mb-0">{{ $consult->cout_mise_en_observation }}</h6>
                    </td>
                  </tr>
                  <tr>
                    <td class="white-space-nowrap ps-0" style="width:32%">
                      <div class="d-flex align-items-center">
                        <h6 class="mb-0 me-3">TOTAL CONSULTATION</h6><a href="#!">
                        </a>
                      </div>
                    </td>
                    <td class="align-middle" style="width:17%">
                      <h6 class="mb-0">02</h6>
                    </td>
                    <td class="align-middle" style="width:17%">
                      <h6 class="mb-0">{{ $consult->cout_total_act + $consult->cout_tatol_equipement + $consult->cout_mise_en_observation + $ntotal }}</h6>
                    </td>
                  </tr>

              </tbody>
            </table>
        </div>
        <div class="col-auto offset-8 pt-4 fs--1">
            <i>{{ $consult->nom_agent }} <br><span>{{ $consult->qualification }}</span></i>
        </div>
        <div class="pt-12 fs--1">
            <i>Nom & Prénom du Gérant</i>
        </div>
    </div>
</div>
@endsection
