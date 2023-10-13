@extends('layouts.template')
@section('css')
  <link rel="stylesheet" type="text/css" href="{{asset('assets/DataTables/datatables.css')}}">
@endsection
@section('page_title', 'ECOM | All livre')
@section('factures', 'active')
@section('content')
<div class="mb-3 mt-1">
    <h4 style="padding: 0.4rem 0 0.4rem 1rem; background-color: #004ebc; color: white !important; font-size: 0.8rem;">LISTE DES FACTURES</h4>
</div>
  <div id="categories">
    <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col col-auto">
      </div>
      <div class="col-auto">
        <div class="d-flex align-items-center">
          <a href="{{ route('factures.add') }}" class="btn btn-outline-primary btn-sm" style="font-weight: 600;"><span class="fas fa-plus me-2"></span>Nouvelle Facturation</a>
        </div>
      </div>
    </div>
    <table class="table w-100" style="font-size: .72rem;" id="dataTableFis-facture">
        <thead>
          <tr>
            <th class="white-space-nowrap fs--1 align-middle ps-0"></th>
            <th style="min-width:10px; color: #004ebc;">ID</th>
            <th style="color: #004ebc;">PATIENTS</th>
            <th style="color: #004ebc;">ÂGE</th>
            <th style="color: #004ebc;">CSPS/CM</th>
            <th style="color: #004ebc;">DATE CONSULT.</th>
            <th style="color: #004ebc;">MONTANT</th>
            <th style="color: #004ebc;">ACTIONS</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          @foreach($nconsults as $nconsult)
          <tr class="hover-actions-trigger btn-reveal-trigger position-static">
            <td class="fs--1 align-middle ps-0 py-3">
              <div class="form-check mb-0 fs-0">
                  <input class="form-check-input" type="checkbox" name="livre[]" id="{{ $i }}" />
              </div>
            </td>
            <td class="id align-middle white-space-nowrap fw-bold">{{ $i }}</td>
            <td class="livre_name align-middle white-space-nowrap text-td"><a class="fw-bold" href="{{ route('esoins.fiche', $nconsult->id) }}">{{ $nconsult->nom_patient }}</a></td>
            <td class="livre_name align-middle white-space-nowrap fw-bold text-td">{{ calculate_age($nconsult->age_patient) }}</td>
            <td class="livre_name align-middle white-space-nowrap fw-bold text-td">{{ $nconsult->nom_structure}}</td>
            <td class="livre_name align-middle white-space-nowrap fw-bold text-td">{{ \Carbon\Carbon::parse($nconsult->visit_date)->format('d/m/Y') }}</td>
            <td class="livre_name align-middle white-space-nowrap fw-bold text-td">{{ $nconsult->cout_total_prod + $nconsult->cout_total_act + $nconsult->cout_total_ex + $nconsult->cout_mise_en_observation + $nconsult->cout_evacuation }} FCFA</td>
            <td class="last_active align-middle white-space-nowrap text-700">
              <a href="{{ route('esoins.fiche', $nconsult->id) }}" title="Voir la fiche" class="btn btn-soft-primary btn-sm btn-actions"><span class="text-900 fs-3 fas fa-user-md"></span></a>
            </td>
          </tr>
          <?php $i++; ?>
          @endforeach
        </tbody>
      </table>
  </div>
@endsection
@section('script')
  <script src="{{asset('assets/DataTables/datatables.js')}}"></script>
  <script>
    $(document).ready(function() {
        $('[id^="dataTableFis-"]').DataTable({
            retrieve: true,
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "Toutes"]
            ],
            "order": [],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Rechercher...",
                "decimal":        "",
                "emptyTable":     "Aucune donnée disponible dans ce tableau",
                "info":           "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                "infoEmpty":      "Affichage de 0 à 0 sur 0 entrées",
                "infoFiltered":   "(filtré sur un total de _MAX_ entrées)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "Affichage de _MENU_ entrées",
                "loadingRecords": "Chargement...",
                "processing":     "Traitement...",
                "zeroRecords":    "Aucune correspondance trouvée",
                "paginate": {
                    "first":      "Début",
                    "last":       "Fin",
                    "next":       "<i class='icofont icofont-double-right'></i>",
                    "previous":   "<i class='icofont icofont-double-left'></i>"
                },
                "aria": {
                    "sortAscending":  ": Cliquez pour activer le tri ascendant",
                    "sortDescending": ": Cliquez pour activer le tri descendant"
                }
            }
        });

        // $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        //     $($.fn.dataTable.tables(true)).DataTable()
        //         .columns.adjust()
        //         .responsive.recalc();
        // });
    });
  </script>
@endsection
