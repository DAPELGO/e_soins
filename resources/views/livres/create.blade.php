@extends('layouts.template')
@section('page_title', 'ECOM | Add Category')
@section('livre', 'active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="panel-title">SUIVI DE TRÉSORERIE @if($valeur->id == env('TYPESTRUCTURE_CSPS')) CSPS @endif @if($valeur->id == env('TYPESTRUCTURE_CMA')) CMA @endif</h3>
    <div class="panel" style="padding-top: 0; padding-bottom: 0;">
        <form action="{{ route('livres.store') }}" method="POST" novalidate="">
            @csrf
            <input type="hidden" id="id_typestructure" name="id_typestructure" value="{{ $valeur->id }}">
            <div class="row">
                <div class="col-12 col-xl-3 ps-0 mt-0" style="background-color: #ededec;">
                    <ul class="list-group mb-4 rounded-0">
                        <li class="list-group-item">
                            <div class="row mb-4">
                                <label class="col-sm-6 col-form-label col-form-label-sm">Entité</label>
                                <span class="col-sm-6"><small>{{ $exercice->libelle }}</small></span>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-6 col-form-label col-form-label-sm">Libellé</label>
                                <span class="col-sm-6"><small>{{ $exercice->libelle }}</small></span>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-6 col-form-label col-form-label-sm">Date Début</label>
                                <span class="col-sm-6"><small>{{ $exercice->date_debut }}</small></span>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-6 col-form-label col-form-label-sm">Date Fin</label>
                                <span class="col-sm-6"><small>{{ $exercice->date_fin }}</small></span>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-6 col-form-label col-form-label-sm">Solde Banque</label>
                                <span class="col-sm-6"><small>@if($solde) {{ $solde->solde_banque }} @else 0 @endif</small></span>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-6 col-form-label col-form-label-sm">Solde Caisse</label>
                                <span class="col-sm-6"><small>@if($solde) {{ $solde->solde_caisse }} @else 0 @endif</small></span>
                            </div>
                        </li>
                    </ul>
                    <div class="mb-2">
                        <label class="col-form-label col-form-label-sm">Nouveau Solde Banque </label>
                        <input class="form-control form-control-sm input-disabled" value="@if($solde) {{ $solde->solde_banque }} @else 0 @endif" disabled />
                    </div>
                    <div class="mb-2">
                        <label class="col-form-label col-form-label-sm">Nouveau Solde Caisse </label>
                        <input class="form-control form-control-sm input-disabled" value="@if($solde) {{ $solde->solde_caisse }} @else 0 @endif" disabled />
                    </div>
                </div>
                <div class="col-12 col-xl-8 order-1 order-xl-0 ms-4 py-4 pt-3">
                    @if($solde == NULL)
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="solde_initial_banque">Solde initial Banque</label>
                        <div class="col-sm-8">
                            <input class="form-control @error('solde_initial_banque') is-invalid @enderror" id="solde_initial_banque" name="solde_initial_banque" type="number" placeholder="2000000" value="{{ old('solde_initial_banque') }}" />
                            @error('solde_initial_banque')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="solde_initial_caisse">Solde initial Caisse</label>
                        <div class="col-sm-8">
                            <input class="form-control @error('solde_initial_caisse') is-invalid @enderror" id="solde_initial_caisse" name="solde_initial_caisse" type="number" placeholder="2000000" value="{{ old('solde_initial_caisse') }}" />
                            @error('solde_initial_caisse')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @endif
                    @if($valeur->id == env('TYPESTRUCTURE_CMA'))
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="livre_id">Livre de CMA
                        </label>
                        <div class="col-sm-8">
                            <select class="form-select" id="livre_id" name="livre_id" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                                <option value="">Selectionner un livre ...</option>
                                @foreach($livres as $livre)
                                    <option value="{{ $livre->id }}">{{ $livre->libelle }}</option>
                                @endforeach
                                </select>
                        @error('livre_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="num_enregistrement">Numero d'enregistrement</label>
                        <div class="col-sm-8">
                            <input class="form-control @error('num_enregistrement') is-invalid @enderror" id="num_enregistrement" name="num_enregistrement" type="text" placeholder="0000001" value="{{ old('num_enregistrement') }}" />
                        @error('num_enregistrement')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="ref_piece_justificative">Reference Pieces justificative</label>
                        <div class="col-sm-8">
                            <input class="form-control @error('ref_piece_justificative') is-invalid @enderror" id="ref_piece_justificative" name="ref_piece_justificative" type="text" placeholder="REF#00001" value="{{ old('ref_piece_justificative') }}" />
                        @error('ref_piece_justificative')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    @endif
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="id_type_operation">Type</label>
                        <div class="col-sm-8">
                            <select class="form-select" id="id_type_operation" name="id_type_operation" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}' onchange="changeValue('id_type_operation', 'id_de_vers', 'valeur');">
                                <option value="">Selectionner un type de structure ...</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->libelle }}</option>
                                @endforeach
                                </select>
                        @error('id_type_operation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="id_categorie">Catégorie</label>
                        <div class="col-sm-8">
                            <select class="form-select" id="id_categorie" name="id_categorie" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}' onchange="changeValue('id_categorie', 'id_libelle', 'valeur');">
                                <option value="">Selectionner un type de structure ...</option>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                                @endforeach
                                </select>
                            @error('date_debut')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="id_libelle">Libellé</label>
                        <div class="col-sm-8">
                            <select class="form-select" id="id_libelle" name="id_libelle">
                                <option value="">Selectionner un type de structure ...</option>
                                @foreach($libelles as $libelle)
                                    <option value="{{ $libelle->id }}">{{ $libelle->libelle }}</option>
                                @endforeach
                                </select>
                            @error('id_libelle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="designation">Désignation</label>
                        <div class="col-sm-8">
                            <textarea class="form-control  @error('designation') is-invalid @enderror fs--4" id="designation" name="designation" rows="3" placeholder="Description de structure">{{ old('designation') }}</textarea>
                            @error('designation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @if($valeur->id == env('TYPESTRUCTURE_CMA'))
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="id_type_evacuation">Type d'évacuation
                        </label>
                        <div class="col-sm-8">
                            <select class="form-select" id="id_type_evacuation" name="id_type_evacuation" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                                <option value="">Selectionner un type d'évacuation ...</option>
                                @foreach($typeevacuations as $typeevacuation)
                                    <option value="{{ $typeevacuation->id }}">{{ $typeevacuation->libelle }}</option>
                                @endforeach
                                </select>
                            @error('id_type_evacuation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="nom_prenom_patient">Nom & Prénom de l'évacue
                        </label>
                        <div class="col-sm-8">
                            <input class="form-control @error('nom_prenom_patient') is-invalid @enderror" id="nom_prenom_patient" name="nom_prenom_patient" type="text" placeholder="Nom & Prénom du patient" value="{{ old('nom_prenom_patient') }}" />
                            @error('nom_prenom_patient')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="age_patient">Âge du patient
                        </label>
                        <div class="col-sm-8">
                            <input class="form-control @error('age_patient') is-invalid @enderror datetimepicker" id="age_patient" name="age_patient" type="text" placeholder="jj-mm-aaaa" value="{{ old('age_patient') }}" />
                            @error('age_patient')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="id_structure_evacuation">Lieu de l'évacuation
                        </label>
                        <div class="col-sm-8">
                            <select class="form-select" id="id_structure_evacuation" name="id_structure_evacuation" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                                <option value="">Selectionner un lieu d'évacuation ...</option>
                                @foreach($structures as $structure)
                                    <option value="{{ $structure->id }}">{{ $structure->nom_structure }}</option>
                                @endforeach
                                </select>
                            @error('id_structure_evacuation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @endif
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm">Action</label>
                        <div class="col-sm-8">
                            <input type="hidden" id="action_livre" name="action_livre" value="">
                            <input class="form-control input-disabled" id="disabled_action" type="text" value="Action" style="color: var(--phoenix-gray-500) !important;" disabled />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="id_de_vers">De/Vers</label>
                        <div class="col-sm-8">
                            <select class="form-select" id="id_de_vers" name="id_de_vers">
                                <option value="">Selectionner un type de structure ...</option>
                                @foreach($devers as $dever)
                                    <option value="{{ $dever->id }}">{{ $dever->libelle }}</option>
                                @endforeach
                                </select>
                            @error('id_de_vers')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="montant_livre">Montant</label>
                        <div class="col-sm-8">
                            <input class="form-control @error('montant_livre') is-invalid @enderror" id="montant_livre" name="montant_livre" type="number" placeholder="2000000" value="{{ old('montant_livre') }}" />
                            @error('montant_livre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <input type="hidden" id="solde_banque" name="solde_banque" value="@if($solde) {{ $solde->solde_banque }} @else 0 @endif">
                    <input type="hidden" id="solde_caisse" name="solde_caisse" value="@if($solde) {{ $solde->solde_caisse }} @else 0 @endif">
                    <hr>
                    <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
                    <a class="btn btn-outline-primary btn-sm" href="{{ route('exercices.index') }}">Fermer</a>
                </div>
            </div>

        </form>
</div>
</div>
</div>
@endsection
