@extends('layouts.app')
@section('head')
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="px-0 pt-1 pb-0 mb-0 bg-transparent breadcrumb me-sm-6 me-5">
            <li class="text-sm breadcrumb-item">
                <a class="opacity-3 text-dark" href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-house"></i>
                </a>
            </li>
            <li class="text-sm breadcrumb-item text-dark active" aria-current="page">
                Campaigns List
            </li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="w-full mx-auto mb-5">
        <h2 class="text-3xl font-bold text-gray-700">Campaigns</h2>
    </div>
    <div class="w-full px-5 mx-auto card">
        <div class="flex justify-between my-4">
            <h6 class="text-xl">Campaign's List</h6>
            <a href="{{ route('campaign.create') }}" class="btn bg-gradient-primary">
                Add Campaign
            </a>
        </div>
        <div class="w-full pb-5">
            <table class="table table-bordered table-hover dt-responsive" id="campaignTableId">
                <thead>
                    <tr>
                        <th> #</th>
                        <th>Name</th>
                        <th>Ratio</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            handleDataTable();
            handleDeleteItem();
        });


        const handleDeleteItem = () => {
            $('#campaignTableId').on('click', '.campaignItemDeleteBtn', function() {
                let id = $(this).attr('data-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0d6efd',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete(`/campaign/delete/${id}`)
                            .then(function(response) {

                                if (response.status) {
                                    Swal.fire({
                                        title: 'Deleted!',
                                        text: 'Campaign has been deleted.',
                                        icon: 'success',
                                        confirmButtonColor: '#0d6efd',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            $('#campaignTableId').DataTable().ajax.reload();
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Error!',
                                        text: 'Something went wrong.',
                                        icon: 'error',
                                        confirmButtonColor: '#0d6efd',
                                    });
                                }
                            });

                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                _token: token
                            },
                            success: function(response) {
                                if (response.status) {
                                    Swal.fire({
                                        title: 'Deleted!',
                                        text: 'User has been deleted.',
                                        icon: 'success',
                                        confirmButtonColor: '#0d6efd',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            $('#campaignTableId').DataTable().ajax
                                                .reload();
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Error!',
                                        text: 'Something went wrong.',
                                        icon: 'error',
                                        confirmButtonColor: '#0d6efd',
                                    });
                                }
                            }
                        });
                    }
                });
            });
        };


        const handleDataTable = () => {
            $('#campaignTableId').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('campaign.index') }}",
                columns: [{
                        data: function(row, type, set, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        searchable: false,
                        orderable: false,
                        className: "align-self-start text-start",
                        name: 'item'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: function(row) {
                            return "<span class='badge bg-gradient-secondary'>" + row.ratio +
                                "</span>";
                        },
                        searchable: false,
                        orderable: false,
                        className: "text-center",
                        name: 'ratio'
                    },
                    {
                        data: function(row) {
                            if (row.status == 'active') {
                                return "<span class='badge bg-gradient-success'>" + row.status +
                                    "</span>";
                            } else {
                                return "<span class='badge bg-gradient-primary'>" + row.status +
                                    "</span>";
                            }
                        },
                        searchable: false,
                        orderable: false,
                        className: "text-center",
                        name: 'status'
                    },
                    {
                        data: function(row) {

                            return `
                            <div class="mt-2 btn-group"  role="group" aria-label="Basic outlined example">
                                <a href="/campaign/show/${row.id}" class="px-3 btn btn-sm bg-gradient-primary" type="button"
                                 data-bs-toggle="tooltip" data-bs-placement="top" title="show details">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="/campaign/edit/${row.id}" class="px-3 btn btn-sm bg-gradient-info campaignEditBtn" type="button"
                                     data-bs-toggle="tooltip" data-bs-placement="top" title="Edit item">
                                     <i class="fa fa-pen"></i>
                                 </a>
                                 <button class="px-3 btn btn-sm bg-gradient-danger campaignItemDeleteBtn" data-id="${row.id}" type="button" data-bs-toggle="tooltip"
                                     data-bs-placement="top" title="Remove item">
                                     <i class="fa fa-trash"></i>
                                 </button>
                            </div>
                            `;
                        },
                        searchable: false,
                        orderable: false,
                        className: "text-center",
                        name: 'action'
                    },
                ]
            });

            $('.input-sm').addClass('form-control form-control-sm');
            $('#campaignTableId_filter').addClass('px-5');
        };
    </script>
@endpush
