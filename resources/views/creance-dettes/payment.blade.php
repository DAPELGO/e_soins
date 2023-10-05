@extends('layouts.template')
@section('page_title', 'ECOM | Add Category')
@section('creancedette', 'active')
@section('content')
    <h3 class="panel-title">PAIEMENT DES CRÉANCES OU DETTES</h3>
    <div style="border: 1.5rem solid #ededec; padding: 0.6rem 0.6rem 0 0;">
            <div class="row g-4">
                <div class="col-12 col-xl-6 bg-white" style="margin-top: 0 !important; border: 1rem solid #ededec; border-left:0.5rem solid #ededec;">
                    <div class="mb-3 mt-3">
                      <h3 style="text-transform: uppercase; font-size: 0.8rem;">État des versements de la {{ $creancedette->type_creancedette }}</h3>
                      <span><small>Situation sur les versements effectués.</small></span>
                    </div>
                    @if(count($paiements)>0)
                    <div class="table-responsive scrollbar">
                      <table class="table fs--2 mb-0">
                        <thead>
                          <tr>
                            <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:32%; color: #004ebc;">DATE VERS.</th>
                            <th class="border-top border-200 align-middle" scope="col" style="width:16%; color: #004ebc;">VERSÉ</th>
                            <th class="border-top border-200 align-middle" scope="col" style="width:20%; color: #004ebc;">RESTE</th>
                            <th class="border-top border-200 pe-0 align-middle" scope="col" style="width:17%; color: #004ebc;">TOTAL</th>
                          </tr>
                        </thead>
                        <tbody class="list">
                          @foreach($paiements as $paiement)
                          <tr>
                            <td class="white-space-nowrap ps-0" style="width:32%">
                              <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-3">{{ $paiement->created_at }}</h6><a href="#!">
                                </a>
                              </div>
                            </td>
                            <td class="align-middle" style="width:17%">
                              <h6 class="mb-0">{{ $paiement->montant_verse }}</h6>
                            </td>
                            <td class="align-middle" style="width:17%">
                              <h6 class="mb-0">{{ $paiement->somme_restante }}</h6>
                            </td>
                            <td class="align-middle pe-0" style="width:17%">
                              <h6>{{ $paiement->somme_versee }}<span class="text-700 fw-semi-bold ms-2">({{ round(($paiement->somme_versee/$creancedette->montant_creance_dette)*100, 2) }}%)</span></h6>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    @else
                    <div class="alert alert-outline-warning" role="alert">Aucun versement n'a été effectué.</div>
                    @endif
                  </div>
                <div class="col-12 col-xl-3 order-1 order-xl-0 py-3 mt-3">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <label class="col-sm-6 col-form-label col-form-label-sm">Montant</label>
                                <span class="col-sm-6"><small>{{ $creancedette->montant_creance_dette }}</small></span>
                            </div>
                            <div class="row">
                                <label class="col-sm-6 col-form-label col-form-label-sm">Type</label>
                                <span class="col-sm-6"><small>{{ $creancedette->type_creancedette }}</small></span>
                            </div>
                            <div class="row">
                                <label class="col-sm-6 col-form-label col-form-label-sm">Libellé</label>
                                <span class="col-sm-6"><small>{{ $creancedette->libelle_creance_dette }}</small></span>
                            </div>
                            <div class="row">
                                <label class="col-sm-6 col-form-label col-form-label-sm">Num. Facture</label>
                                <span class="col-sm-6"><small>{{ $creancedette->num_facture }}</small></span>
                            </div>
                            <div class="row">
                                <label class="col-sm-6 col-form-label col-form-label-sm">Créance ou Débiteur</label>
                                <span class="col-sm-6"><small>{{ $creancedette->nom_creancier_debiteur }}</small></span>
                            </div>
                            <div class="row">
                                <label class="col-sm-6 col-form-label col-form-label-sm">Date récept.</label>
                                <span class="col-sm-6"><small>{{ $creancedette->date_reception_facture }}</small></span>
                            </div>
                            <div class="row">
                                <label class="col-sm-6 col-form-label col-form-label-sm">Date écheance</label>
                                <span class="col-sm-6"><small>{{ $creancedette->date_echeance }}</small></span>
                            </div>
                            <div class="row">
                                <label class="col-sm-6 col-form-label col-form-label-sm">Entité</label>
                                <span class="col-sm-6"><small>{{ $valeur->nom_structure }}</small></span>
                            </div>
                            <div class="row">
                                <label class="col-sm-6 col-form-label col-form-label-sm">Exercice</label>
                                <span class="col-sm-6"><small>{{ $exercice->libelle }}</small></span>
                            </div>
                            <div class="row">
                                <label class="col-sm-6 col-form-label col-form-label-sm">Date Début</label>
                                <span class="col-sm-6"><small>{{ $exercice->date_debut }}</small></span>
                            </div>
                            <div class="row">
                                <label class="col-sm-6 col-form-label col-form-label-sm">Date Fin</label>
                                <span class="col-sm-6"><small>{{ $exercice->date_fin }}</small></span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-xl-3 py-2" style="">
                    <form class="g-3 border rounded-2 p-3" action="{{ route('creancedette.payer', $creancedette->id) }}" method="POST" novalidate="">
                        @csrf
                        <input type="hidden" id="somme_versee" name="somme_versee" type="text" value="{{ $toal_verse }}"  >
                        <input type="hidden" id="somme_restante" name="somme_restante" type="text" value="{{ $total_restant }}"  >
                        <div class="mb-2">
                            <label class="col-form-label col-form-label-sm">Total versé </label>
                            <input class="form-control form-control-sm" value="{{ $toal_verse }}" style="color: #004ebc; font-weight:bold; font-size: 12px;" disabled />
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label col-form-label-sm">Total restant </label>
                            <input class="form-control form-control-sm" value="{{ $total_restant }}"  style="color: #004ebc; font-weight:bold; font-size: 12px;" disabled />
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label col-form-label-sm" for="montant_verse">Montant versé </label>
                            <input class="form-control form-control-sm @error('montant_verse') is-invalid @enderror " id="montant_verse" name="montant_verse" type="number" placeholder="200000" value="{{ old('montant_verse') }}" />
                            @error('montant_verse')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="col-form-label col-form-label-sm" for="date_paiement">Date versement </label>
                            <input class="form-control form-control-sm @error('date_paiement') is-invalid @enderror datetimepicker" id="date_paiement" name="date_paiement" type="text" placeholder="jj-mm-aaaa" value="{{ old('date_paiement') }}" />
                            @error('date_paiement')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr>
                        <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('creancedettes.index') }}">Fermer</a>
                    </form>
                </div>


            </div>
    </div>
@endsection
