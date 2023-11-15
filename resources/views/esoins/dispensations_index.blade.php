@extends('layouts.template')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/DataTables/datatables.css')}}">
@endsection
@section('page_title', 'ECOM | All livre')
@section('factures', 'active')
@section('content')
<div class="mb-3 mt-1">
    <h4 style="padding: 0.4rem 0 0.4rem 1rem; background-color: #004ebc; color: white !important; font-size: 0.8rem;">LISTE DES FACTURES</h4>
</div>
  <div id="categories">
    @if ($structure->level_structure == env("LEVEL_FS") || $structure->level_structure == env("LEVEL_FS_CM") || $structure->level_structure == env("LEVEL_FS_CMA") || $structure->level_structure == env("LEVEL_TEST"))
    <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col col-auto">
      </div>
      <div class="col-auto">
        <div class="d-flex align-items-center">
          <a href="{{ route('factures.add') }}" class="btn btn-outline-primary btn-sm" style="font-weight: 600;"><span class="fas fa-plus me-2"></span>Nouvelle Facturation</a>
        </div>
      </div>
    </div>
    @endif
    <table class="table w-100" style="font-size: .72rem;" id="dataTableFis-facture">
        <thead>
          <tr>
            <th style="min-width:10px; color: #004ebc;">ID</th>
            <th style="color: #004ebc;">PATIENTS</th>
            <th style="color: #004ebc;">ÂGE</th>
            <th style="color: #004ebc;">DRS</th>
            <th style="color: #004ebc;">DS</th>
            <th style="color: #004ebc;">FS</th>
            <th style="color: #004ebc;">DATE CONSULT.</th>
            <th style="color: #004ebc;">MONTANT</th>
            <th style="color: #004ebc;">ACTIONS</th>
          </tr>
        </thead>
        <tbody class="align-middle white-space-nowrap fw-bold text-td">
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
                serverSide: true,
                ajax: "{{ route('factures.list') }}",
                ajax: {
                    "url": "{{ route('factures.list') }}",
                    "error": function (xhr, error, code)
                    {
                        if(xhr.status === 403 || xhr.status === 401){
                            window.location.href = "{{ route('logout') }}";
                        }
                        else{
                            console.log('Erreur datatable: code ' + xhr.status + ' ' + xhr.responseText);
                            msg = "Une erreur s'est produite lors du traitement du tableau. Veuillez verifier votre connexion et recharger la page";

                            swal({
                                title: 'Erreur !',
                                text: msg,
                                icon: 'warning',
                                confirmButtonText: 'Fermer'
                            });
                        }
                    }
                },
                searchBuilder: {
                    columns: [1,3,4,5,6],
                    depthLimit: 1,
                    conditions:{
                        string: {
                            '!null': null,
                            'not': null,
                            '>=': null,
                            '>': null,
                            '<=': null,
                            '<': null,
                            'null': null,
                            'between': null,
                            '!between': null,
                            'starts': null,
                            '!starts': null,
                            'contains': null,
                            '!contains': null,
                            'ends': null,
                            '!ends': null
                        },
                        num: {
                            '!null': null,
                            'not': null,
                            '>=': null,
                            '>': null,
                            '<=': null,
                            '<': null,
                            'null': null,
                            'between': null,
                            '!between': null,
                            'starts': null,
                            '!starts': null,
                            'contains': null,
                            '!contains': null,
                            'ends': null,
                            '!ends': null
                        },
                        html: {
                            '!null': null,
                            'not': null,
                            '>=': null,
                            '>': null,
                            '<=': null,
                            '<': null,
                            'null': null,
                            'between': null,
                            '!between': null,
                            'starts': null,
                            '!starts': null,
                            'contains': null,
                            '!contains': null,
                            'ends': null,
                            '!ends': null
                        },
                    }
                },
                dom: 'Qlfrtip',
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Toutes"]
                ],
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    { data: 'nom_patient', name: 'nom_patient', orderable: true, searchable: true },
                    { data: 'age_patient', name: 'age_patient', orderable: true, searchable: true },
                    { data: 'nom_drs', name: 'nom_drs', defaultContent: '-', orderable: true, searchable: true },
                    { data: 'nom_district', name: 'nom_district', defaultContent: '-', orderable: true, searchable: true },
                    { data: 'nom_fs', name: 'nom_fs', defaultContent: '-', orderable: true, searchable: true },
                    { data: 'visit_date', name: 'visit_date', orderable: true, searchable: true },
                    { data: 'total_facture', name: 'total_facture', orderable: true, searchable: true },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false}
                ],
                deferRender: true,
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Rechercher...",
                    searchBuilder: {
                        title: 'Filtre avancé',
                        add: 'Nouveau filtre',
                        button: 'Filtrer',
                        clearAll: 'Tout effacer',
                        value: 'Valeur',
                        condition: 'Condition',
                        data: 'Critère',
                        conditions :{
                            string: {
                                contains: 'Contient',
                                empty: 'Vide',
                                endsWith: 'Se termine par',
                                equals: 'Egal à',
                                not: 'Différent de',
                                notContains: 'Ne contient pas',
                                notEmpty: 'Non vide',
                                notEndsWith: 'Ne se termine pas par',
                                notStartsWith: 'Ne commence pas par',
                                startsWith: 'Commence par'
                            }
                        }
                    },
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
        });
    </script>
    {{-- <script src="{{asset('assets/DataTables/plugins/filtering/type-based/accent-neutralise.js')}}"></script> --}}
@endsection
