@extends('layouts.template')
@section('page_title', 'ECOM | Add Category')
@section('creancedette', 'active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="panel-title">CAHIER DES CRÉANCES ET DES DETTES @if($valeur->id == env('TYPESTRUCTURE_CSPS')) CSPS @endif @if($valeur->id == env('TYPESTRUCTURE_CMA')) CMA @endif</h3>
    <div class="panel" style="padding-top: 0; padding-bottom: 0;">
        <form class="g-3" action="{{ route('creancedettes.store') }}" method="POST" novalidate="">
            @csrf
            <input type="hidden" id="typestructure" name="typestructure" value="{{ $valeur->id }}">
            <input type="hidden" id="type_creancedette" name="type_creancedette">
            <div class="row">
                <div class="col-12 col-xl-3 ps-0 mt-0" style="background-color: #ededec;">
                    <ul class="list-group mb-4 rounded-0">
                        <li class="list-group-item">
                            <div class="row mb-4">
                                <label class="col-sm-6 col-form-label col-form-label-sm">Entité</label>
                                <span class="col-sm-6"><small>{{ $valeur->nom_structure  }}</small></span>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-6 col-form-label col-form-label-sm">Exercice</label>
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
                                <label class="col-sm-6 col-form-label col-form-label-sm">Date opération</label>
                                <span class="col-sm-6"><small>{{ date('Y-m-d') }}</small></span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-xl-8 order-1 order-xl-0 ms-4 p-4">
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="num_facture">Numéro de la facture</label>
                        <div class="col-sm-8">
                            <input class="form-control @error('num_facture') is-invalid @enderror" id="num_facture" name="num_facture" type="text" placeholder="001-{{ date('Y') }}" value="{{ old('num_facture') }}" />
                            @error('num_facture')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="date_reception_facture">Date réception facture
                        </label>
                        <div class="col-sm-8">
                            <input class="form-control @error('date_reception_facture') is-invalid @enderror datetimepicker" id="date_reception_facture" name="date_reception_facture" type="text" placeholder="jj-mm-aaaa" value="{{ old('date_reception_facture') }}" />
                        @error('date_reception_facture')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="num_enregistrement">Numéro d’ordre d’enregistrement</label>
                        <div class="col-sm-8">
                            <input class="form-control @error('num_enregistrement') is-invalid @enderror" id="num_enregistrement" name="num_enregistrement" type="number" placeholder="0000001" value="{{ old('num_enregistrement') }}" />
                        @error('num_enregistrement')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="id_type_creancedette">Type d'operation</label>
                        <div class="col-sm-8">
                            <select class="form-select" id="id_type_creancedette" name="id_type_creancedette" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                                <option value="">Selectionner un type de créance ou dette ...</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->libelle }}</option>
                                @endforeach
                            </select>
                        @error('id_type_creancedette')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="nom_creancier_debiteur">Nom (créancier ou débiteur)</label>
                        <div class="col-sm-8">
                            <input class="form-control @error('nom_creancier_debiteur') is-invalid @enderror" id="nom_creancier_debiteur" name="nom_creancier_debiteur" type="text" placeholder="Nom (personne morale ou physique)" value="{{ old('nom_creancier_debiteur') }}" />
                        @error('nom_creancier_debiteur')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="libelle_creance_dette">Libelle de la creance ou dette</label>
                        <div class="col-sm-8">
                            <input class="form-control @error('libelle_creance_dette') is-invalid @enderror" id="libelle_creance_dette" name="libelle_creance_dette" type="text" placeholder="Intitulé" value="{{ old('libelle_creance_dette') }}" />
                            @error('libelle_creance_dette')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="montant_creance_dette">Montant initial</label>
                        <div class="col-sm-8">
                            <input class="form-control @error('montant_creance_dette') is-invalid @enderror" id="montant_creance_dette" name="montant_creance_dette" type="number" placeholder="2000000" value="{{ old('montant_creance_dette') }}" />
                            @error('montant_creance_dette')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div id="val_id_type_creance" class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="id_type_creance">Type de creance</label>
                        <div class="col-sm-8">
                            <select class="form-select" id="id_type_creance" name="id_type_creance" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}' onchange="hideArea();">
                                <option value="">Selectionner un type de créance ...</option>
                                @foreach($typecreances as $typecreance)
                                    <option value="{{ $typecreance->id }}">{{ $typecreance->libelle }}</option>
                                @endforeach
                                </select>
                            @error('designation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div id="val_id_type_dette" class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="id_type_dette">Type de dette
                        </label>
                        <div class="col-sm-8">
                            <select class="form-select" id="id_type_dette" name="id_type_dette" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                                <option value="">Selectionner un type de dette ...</option>
                                @foreach($typedettes as $typedette)
                                    <option value="{{ $typedette->id }}">{{ $typedette->libelle }}</option>
                                @endforeach
                                </select>
                            @error('id_type_dette')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="date_echeance">Date d'échéance
                        </label>
                        <div class="col-sm-8">
                            <input class="form-control @error('date_echeance') is-invalid @enderror datetimepicker" id="date_echeance" name="date_echeance" type="text" placeholder="jj-mm-aaaa" value="{{ old('date_echeance') }}" />
                            @error('date_echeance')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr>
                    <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
            <a class="btn btn-outline-primary btn-sm" href="{{ route('creancedettes.index') }}">Fermer</a>
                </div>
            </div>
        </form>
</div>
</div>
</div>
@endsection
