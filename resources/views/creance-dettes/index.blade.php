@extends('layouts.template')
@section('page_title', 'ECOM | All creancedette')
@section('creancedette', 'active')
@section('content')
<h4 class="panel-title">LES CRÉANCES ET DETTES</h4>
  <div class="panel" id="categories" data-list='{"valueNames":["id","creancedette_name","subcreancedette_count","product_count","last_active","slug"],"page":10,"pagination":true}'>
    <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col col-auto">
        <div class="search-box">
          <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
            <input class="form-control form-control-sm search-input search" type="search" placeholder="Rechercher" aria-label="Search" />
            <span class="fas fa-search search-box-icon"></span>

          </form>
        </div>
      </div>
      <div class="col-auto">
        <div class="d-flex align-items-center">
          <button class="btn btn-link text-900 me-4 px-0"><span class="fa-solid fa-file-export fs--1 me-2"></span>Export</button>
          <a href="{{ route('creancedettes.create') }}" class="btn btn-outline-primary btn-sm" style="font-weight: 600;"><span class="fas fa-plus me-2"></span>Ajouter une créance ou dette</a>
        </div>
      </div>
    </div>
    <div class="mb-4 bg-white border-y border-300 mt-2 position-relative top-1">
      <div class="table-responsive scrollbar ms-n1 ps-1">
        <table class="table mb-0" style="font-size: .72rem !important;">
          <thead>
            <tr>
              <th class="white-space-nowrap align-middle ps-0">
                <div class="form-check mb-0 fs-0">
                  <input class="form-check-input" id="checkbox-bulk-categories-select" type="checkbox" data-bulk-select='{"body":"categories-table-body"}' />
                </div>
              </th>
              <th class="ps-0 align-middle" scope="col" data-sort="id" style="min-width:10px; color: #004ebc;">ID</th>
              <th class="ps-0 align-middle" scope="col" data-sort="creancedette_name" style="color: #004ebc;" >LIBELLÉ</th>
              <th class="ps-0 align-middle" scope="col" data-sort="creancedette_name" style="color: #004ebc;" >TYPE</th>
              <th class="ps-0 align-middle" scope="col" data-sort="creancedette_name" style="color: #004ebc;" >CRÉANCIER OU DÉBITEUR</th>
              <th class="ps-0 align-middle" scope="col" data-sort="creancedette_name" style="color: #004ebc;" >MONTANT</th>
              <th class="ps-0 align-middle" scope="col" data-sort="creancedette_name" style="color: #004ebc;" >DATE ÉCHÉANCE</th>
              <th class="ps-0 align-middle" scope="col" data-sort="creancedette_name" style="color: #004ebc;" >DATE CRÉATION</th>
              <th class="ps-0 align-middle" scope="col" data-sort="creancedette_name" style="color: #004ebc;" >ACTIONS</th>
            </tr>
          </thead>
          <tbody class="list" id="categories-table-body">
            @foreach($creancedettes as $creancedette)
            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
              <td class="fs--1 align-middle ps-0 py-3">
                <div class="form-check mb-0 fs-0">
                    <input class="form-check-input" type="checkbox" name="creancedette[]" id="{{ $creancedette->id }}" data-bulk-select-row='{}' />
                </div>
              </td>
              <td class="align-middle">
                <h6 class="mb-0">{{ $creancedette->id }}</h6>
              </td>
              <td class="align-middle">
                <h6 class="mb-0">{{ $creancedette->libelle_creance_dette }}</h6>
              </td>
              <td class="align-middle">
                <h6 class="mb-0">{{ $creancedette->type_creancedette }}</h6>
              </td>
              <td class="align-middle">
                <h6 class="mb-0">{{ $creancedette->nom_creancier_debiteur }}</h6>
              </td>
              <td class="align-middle">
                <h6 class="mb-0">{{ $creancedette->montant_creance_dette }}</h6>
              </td>
              <td class="align-middle">
                <h6 class="mb-0">{{ $creancedette->date_echeance }}</h6>
              </td>
              <td class="align-middle">
                <h6 class="mb-0">{{ $creancedette->created_at }}</h6>
              </td>
              <td class="last_active align-middle white-space-nowrap text-700">
                <a href="{{ route('creancedettes.edit', $creancedette->id) }}" class="btn btn-soft-primary btn-sm btn-actions"><span class="text-900 fs-3" data-feather="edit"></span></a>
                <a href="{{ route('creancedettes.show', $creancedette->id) }}" class="btn btn-soft-danger btn-sm btn-actions"><span class="text-900 fs-3" data-feather="trash-2"></span></a>
                <a href="{{ route('creancedette.payment', $creancedette->id) }}" class="btn btn-soft-primary btn-sm btn-actions"><span class="text-900 fs-3" data-feather="dollar-sign"></span></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
        <div class="col-auto d-flex">
          <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a class="fw-semi-bold" href="#!" data-list-view="*">Toutes les creancedettes<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
        </div>
        <div class="col-auto d-flex">
          <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
          <ul class="mb-0 pagination"></ul>
          <button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
        </div>
      </div>
    </div>
  </div>
@endsection
