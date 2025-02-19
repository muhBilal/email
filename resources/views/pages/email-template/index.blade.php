@extends('layouts.app')
@section('title', 'Template')
@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Template</h1>

    <div class="flex justify-end mb-4">
        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700" aria-haspopup="dialog" aria-expanded="false" aria-controls="modal-create" data-hs-overlay="#modal-create">Create</button>
    </div>
    <div>
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
                                <input type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                              </div>
                              <div class="space-y-3 mt-5">
                                <label for="hs-leading-icon" class="block text-sm font-medium mb-">HTML File</label>
                                  <label class="block">
                                    <span class="sr-only">Choose HTML files</span>
                                    <input type="file" class="block w-full text-sm text-gray-500
                                      file:me-4 file:py-2 file:px-4
                                      file:rounded-lg file:border-0
                                      file:text-sm file:font-semibold
                                      file:bg-blue-600 file:text-white
                                      hover:file:bg-blue-700
                                      file:disabled:opacity-50 file:disabled:pointer-events-none
                                      dark:text-neutral-500
                                      dark:file:bg-blue-500
                                      dark:hover:file:bg-blue-400
                                    ">
                                  </label>
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
        <table id="emailTable" class="stripe hover w-full">
            <thead>
                <tr>
                    <th class="text-left px-4 py-2">
                        <input type="checkbox" id="checkAll">
                    </th>
                    <th class="text-left px-4 py-2">ID</th>
                    <th class="text-left px-4 py-2">Nama</th>
                    <th class="text-left px-4 py-2">Preview</th>
                    <th class="text-left px-4 py-2">Aksi</th>
                </tr>
            </thead>
        </table>
    </div>

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#emailTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('email-template-data') }}",
                columns: [{
                        data: null,
                        orderable: false,
                        searchable: false,
                        className: 'text-center px-4 py-2',
                        render(data) {
                            return `<input type="checkbox" class="user-checkbox" value="${data.id}">`;
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        className: 'text-left px-4 py-2'
                    },
                    {
                        data: 'name',
                        name: 'name',
                        className: 'text-left px-4 py-2'
                    },
                    {
                        data: 'content',
                        name: 'content',
                        className: 'text-left px-4 py-2'
                    },
                    {
                        data: null,
                        className: 'text-left px-4 py-2',
                        render(data) {
                            return `
                                <button onclick="updateEmail(${data.id})" class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-700">Update</button>
                                <button onclick="deleteEmail(${data.id})" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-700 ml-2">Delete</button>
                        
                            `;
                        }
                    }
                ],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Cari email...",
                    lengthMenu: "Tampilkan _MENU_ data"
                },
                initComplete: function() {
                    $("input[type='search']").addClass(
                        "border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-lg px-4 py-2"
                        );
                    $("select").addClass(
                        "border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-lg px-2 py-1"
                        );
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
