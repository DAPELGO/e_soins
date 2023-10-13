@extends('layouts.template')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/DataTables/datatables.css')}}">
@endsection
@section('page_title', 'ECOM | All user')
@section('user', 'active')
@section('content')
  <h4 style="padding: 1rem; background-color: #004ebc; color: white !important; font-size: 0.8rem; margin-bottom:0 !important;">LES UTILISATEURS</h4>
  <div id="categories">
    <div class="row align-items-center justify-content-between g-3 mb-4 mt-2">
      <div class="col col-auto">
      </div>
      <div class="col-auto">
        <div class="d-flex align-items-center">
          <a href="{{ route('users.create') }}" class="btn btn-outline-primary btn-sm"><span class="fas fa-plus me-2"></span>Ajouter un utilisateur</a>
        </div>
      </div>
    </div>
    <table class="table w-100" style="font-size: .72rem;" id="dataTableFis-user">
        <thead>
          <tr>
            <th class="white-space-nowrap fs--1 align-middle ps-0"></th>
            <th class="sort align-middle" scope="col" data-sort="id" style="min-width:10px; color: #004ebc;">ID</th>
            <th class="sort align-middle" scope="col" data-sort="user_name" style="color: #004ebc;">NOM</th>
            <th class="sort align-middle" scope="col" data-sort="user_name" style="color: #004ebc;">EMAIL</th>
            <th class="sort align-middle" scope="col" data-sort="user_name" style="color: #004ebc;">STRUCTURE</th>
            <th class="sort align-middle" scope="col" data-sort="last_active" style="color: #004ebc;">ACTIONS</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr class="hover-actions-trigger btn-reveal-trigger position-static">
            <td class="fs--1 align-middle ps-0 py-3">
              <div class="form-check mb-0 fs-0">
                  <input class="form-check-input" type="checkbox" name="user[]" id="{{ $user->id }}" data-bulk-select-row='{}' />
              </div>
            </td>
            <td class="id align-middle white-space-nowrap fw-bold">{{ $user->id }}</td>
            <td class="user_name align-middle white-space-nowrap fw-bold"><a class="fw-bold" href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a></td>
            <td class="user_name align-middle white-space-nowrap fw-bold">{{ $user->email }}</td>
            <td class="user_name align-middle white-space-nowrap fw-bold">{{ $user->nom_structure }}</td>
            <td class="last_active align-middle white-space-nowrap text-700">
              <a href="{{ route('users.edit', $user->id) }}" class="btn btn-soft-primary btn-sm btn-actions"><span class="text-900 fs-3" data-feather="edit"></span></a>
              <a class="btn btn-soft-danger btn-sm btn-actions sweet-conf" href="{{ route('users.delete', $user->id) }}" data="Voulez vous supprimer cet utilisateur ?"><span class="text-900 fs-3" data-feather="trash-2"></span></a>
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweet-alert/app.js') }}"></script>
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
