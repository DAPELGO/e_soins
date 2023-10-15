@extends('layouts.template')
@section('page_title', 'ECOM | Add Category')
@section('user', 'active')
@section('content')
<div class="mt-6 shadow-lg p-4">
    <h3 class="mt-4">Utilisateurs</h3>
    <p class="text-700">Création de nouveau utilisateur</p>
    <hr>
    <div class="row g-4">
        <div class="col-12 col-xl-8 order-1 order-xl-0">
        <div data-component-card="data-component-card">
            <div class="p-0">
                <form class="g-3 border p-4 rounded-2" action="{{ route('users.update', $user->id) }}" method="POST" novalidate="">
                    @csrf
                    {{ method_field('PUT') }}
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label col-form-label-sm" for="drs_id">DRS</label>
                    <div class="col-sm-8">
                        <select class="form-select" id="drs_id" onchange="changeValue('drs_id', 'district_id', 'structure');">
                            <option value="">Select DRS</option>
                            @foreach (get_structure(env('LEVEL_DRS')) as $structure)
                                <option value="{{ $structure->id }}" @if(($dist and $structure->id == $dist->parent_id) or $structure->id == $user->structure_id ) selected @endif>{{ $structure->nom_structure }}</option>
                            @endforeach
                        </select>
                    @error('drs_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label col-form-label-sm" for="district_id">District</label>
                    <div class="col-sm-8">
                        <select class="form-select" id="district_id" name="district_id" onchange="changeValue('district_id', 'csps_id', 'structure');">
                            @if($dist)
                                @foreach($dists as $district)
                                    <option value="{{ $district->id }}" @if($district->id == $dist->id) selected @endif>{{ $district->nom_structure }}</option>
                                @endforeach
                            @else
                                <option value="">Select District</option>
                            @endif

                        </select>
                    @error('district_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label col-form-label-sm" for="csps_id">CSPS</label>
                    <div class="col-sm-8">
                        <select class="form-select mt-2" id="csps_id" name="csps_id">
                            @if($fm)
                                @foreach($fms as $frm)
                                    <option value="{{ $frm->id }}" @if($fm->id == $frm->id) selected @endif>{{ $frm->nom_structure }}</option>
                                @endforeach
                            @else
                                <option value="">Select CSPS</option>
                            @endif
                        </select>
                    @error('csps_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label col-form-label-sm" for="name">Nom & Prénom</label>
                    <div class="col-sm-8">
                    <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="Nom du utilisateur" value="{{ old('name') ? old('name') : $user->name }}" />
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label col-form-label-sm" for="email">Email</label>
                    <div class="col-sm-8">
                    <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="text" placeholder="email@user.com" value="{{ old('email') ? old('email') : $user->email }}" />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label" for="statut">Statut</label>
                    <div class="col-sm-8">
                        <div class="form-check">
                            <input class="form-check-input" id="statut" name="statut" type="checkbox" value="1"
                            @if($user->statut) checked @endif />
                            <label class="form-check-label" for="statut">Actif ?</label>
                        </div>
                        @error('statut')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label" for="nom_role">Rôle</label>
                    <div class="col-sm-8">
                        @foreach ($roles as $role )
                            <div class="form-check">
                                <input class="form-check-input" id="{{ $role->id }}" name="role[]" type="checkbox" value="{{ $role->id }}"
                                    @foreach($user->roles as $role_user)
                                        @if($role->id == $role_user->id)
                                            checked
                                        @endif
                                    @endforeach/>
                                <label class="form-check-label" for="{{ $role->id }}">{{ $role->nom_role }}</label>
                            </div>
                            @endforeach
                        @error('nom_role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <button class="btn btn-primary btn-sm" type="submit">Modifier</button>
                <a class="btn btn-outline-primary btn-sm" href="{{ route('users.index') }}">Fermer</a>
                </form>
            </div>
        </div>
        </div>

    </div>
    </div>
</div>
@endsection
