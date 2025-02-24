@extends('layouts.app')
@section('title', 'Template')
@section('content')

    <div class="header mb-4">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                <span class="font-medium">Berhasil!</span> {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                <span class="font-medium">Terjadi kesalahan!</span>
                <ul class="mt-1 ml-4 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold">Template</h1>
                <p class="text-gray-400">Complete Collection of Email Templates</p>
            </div>
            <button class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-700" aria-haspopup="dialog"
                aria-expanded="false" aria-controls="modal-create" data-hs-overlay="#modal-create">Create</button>
        </div>

        <div id="modal-create"
            class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
            role="dialog" tabindex="-1" aria-labelledby="modal-create-label">
            <div
                class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                    <div class="flex justify-between items-center py-3 px-4 border-b">
                        <h3 id="modal-create-label" class="font-bold text-gray-800">
                            Tambah Template
                        </h3>
                        <button type="button"
                            class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                            aria-label="Close" data-hs-overlay="#modal-create">
                            <span class="sr-only">Close</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-4 overflow-y-auto">
                        <form action="{{ route('email-template.store') }}" method="POST">
                            @csrf
                            <div class="space-y-3">
                                <label for="name" class="block text-sm font-medium mb-2">Nama</label>
                                <input id="name" name="name" type="text"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    required>
                            </div>
                            <div class="space-y-3 mt-5">
                                <label for="content" class="block text-sm font-medium mb-2">Teks HTML</label>
                                <textarea id="content" name="content" rows="10"
                                    class="w-full text-sm font-mono bg-gray-900 text-green-400 border border-gray-700 rounded-md focus:outline-none"
                                    placeholder="// Tulis HTML disini" required></textarea>
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                                <button type="button"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                    data-hs-overlay="#modal-create">
                                    Close
                                </button>
                                <button type="submit" id="saveTemplate"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                    Save changes
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
        <table id="emailTable" class="min-w-full overflow-hidden divide-y divide-gray-200 rounded-t-lg">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Nama</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Preview</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
        </table>
    </div>


    {{-- update modal --}}
    <button class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-700" aria-haspopup="dialog"
        aria-expanded="false" aria-controls="modal-update" data-hs-overlay="#modal-update" id="update">update</button>
    <div id="modal-update"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="modal-update-label">
        <div
            class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
            <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                <div class="flex justify-between items-center py-3 px-4 border-b">
                    <h3 id="modal-update-label" class="font-bold text-gray-800">
                        Update Template
                    </h3>
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                        aria-label="Close" data-hs-overlay="#modal-update">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <form id="updateForm" action="{{ route('email-template.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="update_id" name="id">
                        <div class="space-y-3">
                            <label for="update_name" class="block text-sm font-medium mb-2">Nama</label>
                            <input id="update-nama" name="name" type="text"
                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        </div>
                        <div class="space-y-3 mt-5">
                            <label for="update_content" class="block text-sm font-medium mb-2">Teks HTML</label>
                            <textarea id="update_content" name="content" rows="10"
                                class="w-full text-sm font-mono bg-gray-900 text-green-400 border border-gray-700 rounded-md focus:outline-none"
                                placeholder="// Tulis HTML disini"></textarea>
                        </div>
                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                            <button type="button"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                data-hs-overlay="#modal-update">
                                Close
                            </button>
                            <button type="submit" id="updateTemplate"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#emailTable').DataTable({
                deferRender: true,
                processing: true,
                serverSide: true,
                responsive: true,
                "initComplete": function(settings, json) {
                    $('.dataTables_scrollBody thead tr').css({
                        visibility: 'collapse'
                    });
                },
                ajax: "{{ route('email-template.data') }}",
                columns: [{
                        data: 'DT_RowIndex',
                    },
                    {
                        data: 'name',
                        name: 'name',
                        className: 'whitespace-nowrap px-6 py-4 border-b border-gray-200'
                    },
                    {
                        data: 'content',
                        name: 'content',
                        className: 'whitespace-nowrap px-6 py-4 border-b border-gray-200',
                        render: function(data) {
                            return data.length > 20 ? data.substr(0, 20) + '...' : data;
                        }
                    },
                    {
                        data: null,
                        className: 'whitespace-nowrap px-6 py-4 border-b border-gray-200',
                        render(data) {
                            return `
                                <button onclick="updateEmail(${data.id})" class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-700">Update</button>
                                <button onclick="deleteEmail(${data.id})" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-700 ml-2">Delete</button>
                        
                            `;
                        }
                    }
                ],
                "language": {
                    "paginate": {
                        "previous": "&laquo;",
                        "next": "&raquo;"
                    }
                },
                "pagingType": "simple_numbers",
                "drawCallback": function(settings) {
                    var paginateLinks = $('.paginate_button a');
                    var paginateButton = $('.paginate_button');
                    paginateLinks.each(function() {
                        $(this).addClass('bg-transparent p-2');
                    });
                    paginateButton.each(function() {
                        $(this).addClass('p-2');
                    });
                    $('.paginate_button.active a').addClass('bg-blue-600 text-white');

                    $('.dataTables_scrollBody thead tr').css({
                        visibility: 'collapse'
                    });
                },

                "rowCallback": function(row, data, index) {
                    $(row).find('.check-for-delete').on('click', function() {
                        if ($(this).is(':checked')) {
                            $(row).addClass('bg-blue-100');
                        } else {
                            $(row).removeClass('bg-blue-100');
                        }
                    });

                    $('.btn-delete-data').addClass('hidden');
                }
            });

            $(document).on('click', '#saveTemplate', function() {
                $.ajax({
                    url: "{{ route('sendEmail') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        city: null
                    },
                    success: function(response) {
                        let status = response.status;
                        if (status == 'success') {
                            alert('Email berhasil dikirim');
                        } else {
                            alert('Email gagal dikirim');
                        }
                    }
                });
            });

            $('#insert').click(function() {
                $('#update_name').val('valueToInsert');
            });

            $('#insert').click(function(){
                $('#test').val('valueToInsert');
                console.log("oke")
            })
        });

        function deleteEmail(id) {
            $.ajax({
                url: `/email-template/delete/${id}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(response) {
                    let status = response.status;
                    if (status == 'success') {
                        alert('Email berhasil dihapus');
                        $('#emailTable').DataTable().ajax.reload();
                    } else {
                        alert('Email gagal dihapus');
                    }
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        }

        function updateEmail(id) {
            $('#update').click();
            $.ajax({
                url: `/email-template/edit/${id}`,
                type: 'GET',
                success: function(response) {
                    console.log(response.id)
                    $('#update_id').val(response.id);
                    $('#update-nama').val(response.name);
                    $('#update_content').val(response.content);
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        }
    </script>
@endpush
