@extends('layouts.template')
@section('page_title', 'ECOM | Add Category')
@section('category', 'active')
@section('content')

    <h3>Rôles des utilisateurs</h3>
    <p class="text-700">Création d'un nouveau rôle et attribution des droits.</p>
    <div class="mt-4">
    <div class="row g-4">
        <div class="col-12 col-xl-8 order-1 order-xl-0">

        <div class="card shadow-none border border-300" data-component-card="data-component-card">
            <div class="card-body p-0">

            <div class="p-4 code-to-copy">
                <form class="g-3" action="{{ route('roles.update', $role->id) }}" method="POST" novalidate="">
                    @csrf
                    {{ method_field('PUT') }}
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-sm" for="nom_role">Libellé</label>
                    <div class="col-sm-10">
                    <input class="form-control @error('nom_role') is-invalid @enderror" id="nom_role" name="nom_role" type="text" placeholder="Nom du role" value="{{ old('nom_role') ? old('nom_role') : $role->nom_role }}" />
                    @error('nom_role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-sm" for="nom_role">Permission</label>
                    <div class="col-sm-10">
                        <div class="row">
                            @foreach ($permissions as $permission )
                            <div class="col-lg-6">
                                <div class="form-check">
                                    <input class="form-check-input" id="{{ $permission->id }}" name="permission[]" type="checkbox" value="{{ $permission->id }}" @foreach($role->permissions as $role_permission)
                                        @if($permission->id == $role_permission->id)
                                            checked
                                        @endif
                                    @endforeach />
                                    <label class="form-check-label" for="{{ $permission->id }}">{{ $permission->nom_permission }}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        @error('nom_role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
                <a class="btn btn-outline-primary btn-sm" href="{{ route('roles.index') }}">Fermer</a>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection
