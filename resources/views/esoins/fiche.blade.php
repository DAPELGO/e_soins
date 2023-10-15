@extends('layouts.template')
@section('page_title', 'ECOM | All user')
@section('factures', 'active')
@section('content')
  <h4 style="padding: 1rem; background-color: #004ebc; color: white !important; font-size: 0.8rem; margin-bottom:0 !important;">FEUILLE DE SOINS</h4>
  <div style="background-color: #ededec; padding: 1.5rem;">
    <div class="mb-4 bg-white mt-2 position-relative top-1 p-4" style="border: 1px solid #acacac;">
        <div class="row p-2 fs--1">
            <div class="col-8">
                <div><span class="fw-black">DRS : </span>{{ $drs->nom_structure }}</div>
                <div><span class="fw-black">DS : </span> {{ $consult->csps? $consult->district : $district->nom_structure }}</div>
                <div><span class="fw-black">FS</span> : {{ $consult->csps? $consult->csps : $csps->nom_structure }}</div>
            </div>
            <div class="col-4">
                <div><span class="fw-black">Date : </span> {{ \Carbon\Carbon::parse($consult->visit_date)->format('d/m/Y') }}</div>
                <div><span class="fw-black">N° de serie sur l'ordonnance</span> : {{ $consult->serie_number }}</div>
                <div><span class="fw-black">N° </span><small><i>(Sur le registre de consultation)</i></small> : {{ $consult->registre_number }}</div>
            </div>
        </div>
        <hr>
        <div class="row p-2 fs--1">
            <div class="row">
                <div class="col-8">
                    <div><span class="text-black fw-bold">Nom & Prénom :</span>  {{ $consult->nom_patient }}</div>
                </div>
                <div class="col-4">
                    <div><span class="text-black fw-bold">Village / secteur : </span>{{ $consult->village }}</div>
                    <div>
                        <span class="text-black fw-bold">Distance : </span>
                        @if($consult->distance_village==1)
                        moins de 5 km
                        @elseif($consult->distance_village==2)
                        Entre 5 et 10 km
                        @else
                        Plus de 10 km
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row p2 fs--1">
            @foreach ($prestations as $prestation)
            <div class="col-auto">
                <div class="form-check form-check-inline">
                <input class="form-check-input" id="inlineCheckbox1_{{$prestation->id}}" type="checkbox" value="{{$prestation->id}}" disabled="" @if($consult->consultation_type == $prestation->id) checked @endif />
                <label class="form-check-label text-black fw-bold" for="inlineCheckbox1_{{$prestation->id}}" style="opacity: inherit;">{{ $prestation->libelle }}</label>
                </div>
            </div>
            @endforeach
        </div>
        <hr>
        <div class="row p-2 fs--1">
            <div class="col-4">
                <span class="text-black fw-bold">Âge :</span> {{ calculate_age($consult->age_patient) }}
            </div>
            <div class="col-4">
                <span class="text-black fw-bold">Sexe : </span>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="inlineCheckbox1" type="checkbox" value="option1" disabled="" @if($consult->sex == 'female') checked @endif />
                    <label class="form-check-label text-black fw-bold" for="inlineCheckbox1" style="opacity: inherit;">F</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="inlineCheckbox1" type="checkbox" value="male" disabled="" @if($consult->sex == 'male') checked @endif />
                    <label class="form-check-label text-black fw-bold" for="inlineCheckbox1" style="opacity: inherit;">M</label>
                </div>
            </div>
            <div class="col-4">
                {{-- <div><span class="text-black fw-bold">N° </span><small><i>(sur le Registre de consultation)</i></small> : {{ $consult->registre_number }}</div> --}}
                <div><span class="text-black fw-bold">Diagnostic: </span>{{ $typeprestation }}</div>
            </div>
        </div>
        <div class="row p-2 fs--1">
            <div class="col-auto"><span class="text-black fw-bold">Nom du Père / Mère (Pour enfant de < 5 ans) : </span> {{ $consult->parent_name }}</div>
            <div class="col-auto"><span class="text-black fw-bold">Contact : </span>{{ $consult->tel }} </div>
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
                            @if(count($quantity_act)>0)
                                <h6 class="mb-0">{{ $quantity_act[$i] }}</h6>
                            @endif
                          </td>
                          <td class="align-middle" style="width:17%">
                            @if(count($amount_act)>0)
                            <h6 class="mb-0">{{ floatval($amount_act[$i]) }}</h6>
                            @endif
                          </td>
                        </tr>
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
                                {{-- <h6 class="mb-0">{{ $quantity_acte }}</h6> --}}
                            </td>
                            <td class="align-middle" style="width:17%">
                              <h6 class="mb-0">{{ $consult->cout_total_act ? $consult->cout_total_act : 0 }}</h6>
                            </td>
                          </tr>
                      </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="table-responsive scrollbar border-1">
                    <h4 class="fs--2" style="background-color: #F2F2F2; padding: 0.5rem;">EXAMENS COMPLÉMENTAIRES</h4>
                    <table class="table fs--2 mb-0">
                      <thead>
                        <tr>
                          <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:32%; color: #004ebc;">CONSOMMABLES MÉDICAUX</th>
                          <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:32%; color: #004ebc;">QUANTITÉ</th>
                          <th class="border-top border-200 pe-0 align-middle" scope="col" style="width:17%; color: #004ebc;">MONTANT</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        <?php $i = 0; $total_eq = 0; $quantity_examen = 0; ?>
                        @foreach($examens as $examen)
                        <tr>
                          <td class="white-space-nowrap ps-0" style="width:32%">
                            <div class="d-flex align-items-center">
                              <h6 class="mb-0 me-3">{{ $examen->description }}</h6><a href="#!">
                              </a>
                            </div>
                          </td>
                          <td class="align-middle" style="width:17%">
                            @if(count($quantity_ex)>0)
                                <h6 class="mb-0">{{ $quantity_ex[$i] }}</h6>
                            @endif
                          </td>
                          <td class="align-middle" style="width:17%">
                            @if(count($amount_ex)>0)
                                <h6 class="mb-0">{{ floatval($amount_ex[$i]) }}</h6>
                            @endif
                          </td>
                        </tr>
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
                                {{-- <h6 class="mb-0">{{ $quantity_examen }}</h6> --}}
                              </td>
                            <td class="align-middle" style="width:17%">
                              <h6 class="mb-0">{{$consult->cout_total_ex ? $consult->cout_total_ex : 0 }}</h6>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h4 class="fs--2" style="background-color: #F2F2F2; padding: 0.5rem;">MÉDICAMENTS ET CONSOMMABLES MÉDICAUX PRESCRIPTS</h4>
                <div class="table-responsive scrollbar border-1">
                    <table class="table fs--2 mb-0">
                      <thead>
                        <tr>
                          <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:78%; color: #004ebc;">PRODUITS</th>
                          <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:12%; color: #004ebc;">QUANTITÉ</th>
                          <th class="border-top border-200 pe-0 align-middle" scope="col" style="width:12%; color: #004ebc;">MONTANT</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        <?php $i = 0; $total_prod = 0; $quantity_product = 0; ?>
                        @foreach ($cproducts as $cproduct )
                        <tr>
                          <td class="align-middle">
                            <div class="d-flex align-items-center">
                              <h6 class="mb-0 me-3">{{ $cproduct->name }}</h6><a href="#!">
                              </a>
                            </div>
                          </td>
                          <td class="align-middle">
                            @if(count($quantity_prod)>0)
                                <h6 class="mb-0">{{ $quantity_prod[$i] }}</h6>
                            @endif
                          </td>
                          <td class="align-middle">
                            @if(count($amount_prod)>0)
                                <h6 class="mb-0">{{ floatval($amount_prod[$i]) }}</h6>
                            @endif

                          </td>
                        </tr>
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
                                {{-- <h6 class="mb-0">{{ $quantity_examen }}</h6> --}}
                              </td>
                            <td class="align-middle" style="width:17%">
                              <h6 class="mb-0">{{$consult->cout_total_prod ? $consult->cout_total_prod : 0 }}</h6>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <h4 class="fs--2" style="background-color: #F2F2F2; padding: 0.5rem;">ÉVACUATION SANITAIRE / MISE EN OBSERVATION</h4>
                <div class="table-responsive scrollbar border-1">
                    <table class="table fs--2 mb-0">
                      <thead>
                        <tr>
                          <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:78%; color: #004ebc;">DESIGNATION</th>
                          <th class="border-top border-200 pe-0 align-middle" scope="col" style="width:12%; color: #004ebc;">MONTANT</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        <tr>
                            <td class="align-middle" style="width:32%">
                                <div class="d-flex align-items-center">
                                  <h6 class="mb-0 me-3">Mise en observation</h6><a href="#!">
                                  </a>
                                </div>
                            </td>
                            <td class="align-middle" style="width:17%">
                              <h6 class="mb-0">{{ $consult->cout_mise_en_observation ? $consult->cout_mise_en_observation : 0 }}</h6>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle" style="width:32%">
                                <div class="d-flex align-items-center">
                                  <h6 class="mb-0 me-3">Evacuation</h6><a href="#!">
                                  </a>
                                </div>
                            </td>
                            <td class="align-middle" style="width:17%">
                              <h6 class="mb-0">{{ $consult->cout_evacuation ? $consult->cout_evacuation : 0 }}</h6>
                            </td>
                        </tr>
                        <tr>
                            <td class="white-space-nowrap ps-0" style="width:32%">
                              <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-3">TOTAL</h6><a href="#!">
                                </a>
                              </div>
                            </td>
                            <td class="align-middle" style="width:17%">
                              <h6 class="mb-0">{{ $consult->cout_evacuation + $consult->cout_mise_en_observation }}</h6>
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
                  <th class="border-top border-200 ps-0 align-middle" scope="col" style="color: #004ebc;">DÉSIGNATION</th>
                  <th class="border-top border-200 pe-0 align-middle" scope="col" style="color: #004ebc;">MONTANT</th>
                </tr>
              </thead>
              <tbody class="list">
                <tr>
                    <td class="align-middle">
                      <div class="d-flex align-items-center">
                        <h6 class="mb-0 me-3">Médicaments et Consommables médicaux</h6><a href="#!">
                        </a>
                      </div>
                    </td>
                    <td class="align-middle">
                      <h6 class="mb-0">{{ $consult->cout_total_prod ? $consult->cout_total_prod : 0 }}</h6>
                    </td>
                  </tr>
                <tr>
                  <td class="align-middle">
                    <div class="d-flex align-items-center">
                      <h6 class="mb-0 me-3">Actes</h6><a href="#!">
                      </a>
                    </div>
                  </td>
                  <td class="align-middle">
                    <h6 class="mb-0">{{ $consult->cout_total_act ? $consult->cout_total_act : 0 }}</h6>
                  </td>
                </tr>
                <tr>
                    <td class="white-space-nowrap ps-0 align-middle">
                      <div class="d-flex align-items-center">
                        <h6 class="mb-0 me-3">Examens complémentaires</h6><a href="#!">
                        </a>
                      </div>
                    </td>
                    <td class="align-middle">
                      <h6 class="mb-0">{{ $consult->cout_total_ex ? $consult->cout_total_ex : 0 }}</h6>
                    </td>
                  </tr>
                  <tr>
                    <td class="white-space-nowrap ps-0">
                      <div class="d-flex align-items-center">
                        <h6 class="mb-0 me-3">Mise en observation / Hospitalisation</h6>
                      </div>
                    </td>
                    <td class="align-middle">
                      <h6 class="mb-0">{{ $consult->cout_mise_en_observation ? $consult->cout_mise_en_observation : 0 }} </h6>
                    </td>
                  </tr>
                  <tr>
                    <td class="white-space-nowrap ps-0">
                      <div class="d-flex align-items-center">
                        <h6 class="mb-0 me-3">Évacuation</h6>
                      </div>
                    </td>
                    <td class="align-middle">
                      <h6 class="mb-0">{{ $consult->cout_evacuation ? $consult->cout_evacuation : 0 }}</h6>
                    </td>
                  </tr>
                  <tr>
                    <td class="white-space-nowrap ps-0">
                      <div class="d-flex align-items-center">
                        <h6 class="mb-0 me-3">TOTAL CONSULTATION</h6><a href="#!">
                        </a>
                      </div>
                    </td>
                    <td class="align-middle">
                      <h6 class="mb-0">{{ $consult->cout_total_prod + $consult->cout_total_act + $consult->cout_total_ex + $consult->cout_mise_en_observation + $consult->cout_evacuation }}</h6>
                    </td>
                  </tr>

              </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-6 pt-4 fs--1 text-center">
                <span><u>Nom & Prénom du Gérant</u> <br><br> @if($consult->name_gerant) <b>{{ $consult->name_gerant }}</b>@endif</i>
            </div>
            <div class="col-6 pt-4 fs--1 text-center">
                <span><u>Nom & Prénom du Prescripteur</u> <br><br> @if($consult->nom_prescripteur) <b>{{ $consult->nom_prescripteur }}</b> <br> @if($qualification->libelle) <i><span> {{ $qualification->libelle }}</span></i>@endif @endif</i>
            </div>
        </div>
    </div>
</div>
@endsection
