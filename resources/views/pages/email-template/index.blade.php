@extends('layouts.app')
@section('title', 'Template')
@section('content')

    <div class="header mb-4">

        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold">Template</h1>
                <p class="text-gray-400">Complete Collection of Email Templates</p>
            </div>
        <button class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-700" aria-haspopup="dialog" aria-expanded="false" aria-controls="modal-create" data-hs-overlay="#modal-create">Create</button>

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
                        <form action="">
                            <div class="space-y-3">
                                <label for="hs-leading-icon" class="block text-sm font-medium mb-">Nama</label>
                                <input type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                              </div>
                              <div class="space-y-3 mt-5">
                                <label for="hs-leading-icon" class="block text-sm font-medium mb-2">Teks HTML</label>
                                <textarea name="codeEditor" rows="10" class="w-full text-sm font-mono bg-gray-900 text-green-400 border border-gray-700 rounded-md focus:outline-none " placeholder="// Tulis HTML disini">
                                  </textarea>
                              </div>

                        </form>
                    </div>
                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                        <button type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                            data-hs-overlay="#modal-create">
                            Close
                        </button>
                        <button type="button" id="sendCity"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Save changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
        <table id="emailTable" class="min-w-full overflow-hidden divide-y divide-gray-200 rounded-t-lg">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        <input type="checkbox" id="checkAll">
                    </th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Nama</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Preview</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
        </table>
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
                ajax: "{{ route('email-template-data') }}",
                columns: [{
                        data: null,
                        orderable: false,
                        searchable: false,
                        className: 'whitespace-nowrap px-6 py-4 border-b border-gray-200',
                        render(data) {
                            return `<input type="checkbox" class="user-checkbox" value="${data.id}">`;
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        className: 'whitespace-nowrap px-6 py-4 border-b border-gray-200'
                    },
                    {
                        data: 'name',
                        name: 'name',
                        className: 'whitespace-nowrap px-6 py-4 border-b border-gray-200'
                    },
                    {
                        data: 'content',
                        name: 'content',
                        className: 'whitespace-nowrap px-6 py-4 border-b border-gray-200'
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
                

            $(document).on('change', '.user-checkbox', function() {
                let selected = [];
                $('.user-checkbox:checked').each(function() {
                    selected.push($(this).val());
                });
                console.log(selected);
            });
            

            $(document).on('change', '#checkAll', function() {
                $('.user-checkbox').prop('checked', this.checked);
                let selected = [];
                $('.user-checkbox:checked').each(function() {
                    selected.push($(this).val());
                });
                console.log(selected);
            });

            $(document).on('click', '#sendCity', function() {
                $.ajax({
                    url: "{{ route('sendEmail') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        city: $('#wilayah').val()
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

            $(document).on('click', '#sendAll', function() {
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
        });
    </script>
@endpush
