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
            @php
                $i = 1;
            @endphp
            @foreach ($nconsults as $nconsult)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $nconsult->nom_patient }}</td>
                <td>{{ calculate_age($nconsult->age_patient) }}</td>
                <td>{{ $nconsult->drs->nom_structure }}</td>
                <td>{{ $nconsult->district->nom_structure }}</td>
                <td>{{ $nconsult->fs->nom_structure }}</td>
                <td>{{ \Carbon\Carbon::parse($nconsult->visit_date)->format('d/m/Y') }}</td>
                <td>{{ $nconsult->total_facture }}</td>
                <td>
                    <a href="{{ route('esoins.fiche', $nconsult->id) }}" title="Voir la facture" class="btn btn-soft-primary btn-sm btn-actions"><span class="text-900 fs-3" data-feather="eye"></span></a>
                    @if($nconsult->user_id == Auth::user()->id)
                        <a class="btn btn-soft-danger btn-sm btn-actions sweet-conf" href="{{ route('esoins.delete', $nconsult->id) }}" title="Supprimer la facture" data="Voulez vous supprimer cette facture ?"><span class="text-900 fs-3" data-feather="trash-2"></span></a>
                    @endif
                </td>
            </tr>
            @endforeach
            @php
                $i++;
            @endphp
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
                //processing: true,
                //serverSide: true,
                //ajax: "{{ route('factures.list') }}",
                dom: 'Qfrtip',
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Toutes"]
                ],
                /* columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false},
                    {data: 'nom_patient', name:'nom_patient'},
                    {data: 'age_patient', name:'age_patient'},
                    {data: 'drs.nom_structure', name:'drs'},
                    {data: 'district.nom_structure', name:'district'},
                    {data: 'fs.nom_structure', name:'fs'},
                    {data: 'visit_date', name:'visit_date'},
                    {data: 'total_facture', name:'total_facture'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ], */
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
    <script src="{{asset('assets/DataTables/plugins/filtering/type-based/accent-neutralise.js')}}"></script>
@endsection
