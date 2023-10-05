@extends('layouts.template')
@section('page_title', 'ECOM | All livre')
@section('consultation', 'active')
@section('content')
<div class="mb-3 mt-1">
    <h4 style="padding: 0.4rem 0 0.4rem 1rem; background-color: #004ebc; color: white !important; font-size: 0.8rem;">LISTE DES CONSULLTATIONS</h4>
</div>
  <div id="categories" data-list='{"valueNames":["id","livre_name","sublivre_count","product_count","last_active","slug"],"page":10,"pagination":true}'>
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
          <a href="{{ route('patients.index') }}" class="btn btn-outline-primary btn-sm" style="font-weight: 600;"><span class="fas fa-plus me-2"></span>Saisie consultation</a>
        </div>
      </div>
    </div>
    <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-white border-y border-300 mt-2 position-relative top-1">
      <div class="table-responsive scrollbar ms-n1 ps-1">
        <table class="table table-sm mb-0 p-1 text-700" style="font-size: .72rem;">
          <thead>
            <tr>
              <th class="white-space-nowrap fs--1 align-middle ps-0">
                <div class="form-check mb-0 fs-0">
                  <input class="form-check-input" id="checkbox-bulk-categories-select" type="checkbox" data-bulk-select='{"body":"categories-table-body"}' />
                </div>
              </th>
              <th class="sort align-middle" scope="col" data-sort="id" style="min-width:10px; color: #004ebc;">ID</th>
              <th class="sort align-middle" scope="col" data-sort="livre_name" style="color: #004ebc;">PATIENTS</th>
              <th class="sort align-middle" scope="col" data-sort="livre_name" style="color: #004ebc;">ÂGE</th>
              <th class="sort align-middle" scope="col" data-sort="livre_name" style="color: #004ebc;">CSPS/CM</th>
              <th class="sort align-middle" scope="col" data-sort="livre_name" style="color: #004ebc;">DATE CONULT.</th>
              <th class="sort align-middle" scope="col" data-sort="livre_name" style="color: #004ebc;">MONTANT</th>
              <th class="sort align-middle" scope="col" data-sort="livre_name" style="color: #004ebc;">STATUT</th>
              <th class="sort align-middle" scope="col" data-sort="last_active" style="color: #004ebc;">ACTIONS</th>
            </tr>
          </thead>
          <tbody class="list" id="categories-table-body">
            <?php $i = 1; ?>
            @foreach($rconsults as $rconsult)
            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
              <td class="fs--1 align-middle ps-0 py-3">
                <div class="form-check mb-0 fs-0">
                    <input class="form-check-input" type="checkbox" name="livre[]" id="{{ $i }}" data-bulk-select-row='{}' />
                </div>
              </td>
              <td class="id align-middle white-space-nowrap fw-bold">{{ $i }}</td>
              <td class="livre_name align-middle white-space-nowrap text-td"><a class="fw-bold" href="{{ route('esoins.fiche', $rconsult->id) }}">{{ $rconsult->nom_patient }}</a>
              </td>
              <td class="livre_name align-middle white-space-nowrap fw-bold text-td"> {{ $i + 6 }} mois</td>
              <td class="livre_name align-middle white-space-nowrap fw-bold text-td">{{ $rconsult->csps}}</td>
              <td class="livre_name align-middle white-space-nowrap fw-bold text-td">{{ $rconsult->visit_date}}</td>
              <td class="livre_name align-middle white-space-nowrap fw-bold text-td">{{ $rconsult->cout_total_act }}</td>
              <td class="livre_name align-middle white-space-nowrap fw-bold text-td">
                @if(count(check_dispensation($rconsult->num_ordonance))>0)
                    <span class="badge ms-2 badge badge-phoenix badge-phoenix-success">COMPLETED</span>
                @else
                    <span class="badge badge-tag me-2 mb-2">NOUVEAU</span>
                @endif
              </td>
              <td class="last_active align-middle white-space-nowrap text-700">
                <a href="{{ route('esoins.fiche', $rconsult->id) }}" class="btn btn-soft-primary btn-sm btn-actions"><span class="text-900 fs-3 fas fa-user-md"></span></a>
              </td>
            </tr>
            <?php $i++; ?>
            @endforeach
            @foreach($nconsults as $nconsult)
            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
              <td class="fs--1 align-middle ps-0 py-3">
                <div class="form-check mb-0 fs-0">
                    <input class="form-check-input" type="checkbox" name="livre[]" id="{{ $i }}" data-bulk-select-row='{}' />
                </div>
              </td>
              <td class="id align-middle white-space-nowrap fw-bold">{{ $i }}</td>
              <td class="livre_name align-middle white-space-nowrap text-td"><a class="fw-bold" href="{{ route('esoins.fiche', $nconsult->id) }}">{{ $nconsult->name }}</a></td>
              <td class="livre_name align-middle white-space-nowrap fw-bold text-td">{{ $nconsult->birth_date }}</td>
              <td class="livre_name align-middle white-space-nowrap fw-bold text-td">{{ $nconsult->csps}}</td>
              <td class="livre_name align-middle white-space-nowrap fw-bold text-td">{{ $nconsult->visit_date}}</td>
              <td class="livre_name align-middle white-space-nowrap fw-bold text-td">{{ $nconsult->cout_total_act }}</td>
              <td class="livre_name align-middle white-space-nowrap fw-bold text-td">
                @if(count(check_dispensation($nconsult->num_ordonance))>0)
                    <span class="badge ms-2 badge badge-phoenix badge-phoenix-success">COMPLETED</span>
                @else
                    <span class="badge badge-tag me-2 mb-2">NOUVEAU</span>
                @endif
              </td>
              <td class="last_active align-middle white-space-nowrap text-700">
                <a href="{{ route('esoins.fiche', $nconsult->id) }}" class="btn btn-soft-primary btn-sm btn-actions"><span class="text-900 fs-3 fas fa-user-md"></span></a>
              </td>
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
        <div class="col-auto d-flex">
          <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a class="fw-semi-bold" href="#!" data-list-view="*">Tous les livres<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
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
