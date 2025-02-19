@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-4">User Email Lists</h1>
    <div>
        <button class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-700">Kirim Email</button>
        <button type="button" class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-700" aria-haspopup="dialog"
            aria-expanded="false" aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-scale-animation-modal">
            Kirim by wilayah
        </button>
        <button class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-700" id="sendAll">Kirim semua
            client</button>

        <input type="file" id="fileInput" />
        <button class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-700" id="submit">oke Client</button>

        <div id="hs-scale-animation-modal"
            class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
            role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
            <div
                class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                    <div class="flex justify-between items-center py-3 px-4 border-b">
                        <h3 id="hs-scale-animation-modal-label" class="font-bold text-gray-800">
                            Modal title
                        </h3>
                        <button type="button"
                            class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                            aria-label="Close" data-hs-overlay="#hs-scale-animation-modal">
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
                        <h1>Pilih Wilayah</h1>
                        <select name="wilayah" id="wilayah"
                            class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-2">
                            <option value="surabaya">Surabaya</option>
                            <option value="jakarta">Jakarta</option>
                            <option value="bandung">Bandung</option>
                        </select>

                        {{-- <h1>Pilih Template</h1> --}}
                    </div>
                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                        <button type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                            data-hs-overlay="#hs-scale-animation-modal">
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
        <div id="modal-create"
            class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
            role="dialog" tabindex="-1" aria-labelledby="modal-create-label">
            <div
                class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                    <div class="flex justify-between items-center py-3 px-4 border-b">
                        <h3 id="modal-create-label" class="font-bold text-gray-800">
                            Tambah Client
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
                                <div>
                                  <label for="hs-leading-icon" class="block text-sm font-medium mb-">Nama</label>
                                  <div class="sm:flex rounded-lg shadow-sm">
                                    <span class="py-3 px-4 inline-flex items-center min-w-fit w-full border border-gray-200 bg-gray-50 text-sm text-gray-500 -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:w-auto sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400">First and last name</span>
                                    <input type="text" class="py-3 px-4 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    <input type="text" class="py-3 px-4 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                  </div>
                                </div>
                            </div>

                            <div class="max-w-sm space-y-3">
                                <div>
                                  <label for="hs-leading-icon" class="block text-sm font-medium mb-">Email</label>
                                  <div class="relative">
                                    <input type="text" id="hs-leading-icon" name="hs-leading-icon" class="py-3 px-4 ps-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="you@site.com">
                                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-4">
                                      <svg class="shrink-0 size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                      </svg>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="max-w-sm space-y-3">
                                <div>
                                  <label for="hs-inline-leading-select-label" class="block text-sm font-medium mb-2">Telepon</label>
                                  <div class="relative">
                                    <input type="text" id="hs-inline-leading-select-label" name="inline-add-on" class="py-3 px-4 ps-20 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="xxx-xxxx-xxx">
                                    <div class="absolute inset-y-0 start-0 flex items-center text-gray-500 ps-px">
                                      <label for="hs-inline-leading-select-country" class="sr-only">Country</label>
                                      <select id="hs-inline-leading-select-country" name="hs-inline-leading-select-country" class="block w-full border-transparent rounded-lg focus:ring-blue-600 focus:border-blue-600 dark:text-neutral-500 dark:bg-neutral-800 text-sm">
                                        <option>+62</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
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
    <div class="flex justify-end mb-4">
        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700" aria-haspopup="dialog" aria-expanded="false" aria-controls="modal-create" data-hs-overlay="#modal-create">Create</button>
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
                    <th class="text-left px-4 py-2">Email</th>
                    <th class="text-left px-4 py-2">Telp</th>
                    <th class="text-left px-4 py-2">Aksi</th>
                </tr>
            </thead>
        </table>
    </div>

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // $('#emailTable').DataTable({
            //     processing: true,
            //     serverSide: true,
            //     ajax: "{{ route('emailData') }}",
            //     columns: [{
            //             data: null,
            //             orderable: false,
            //             searchable: false,
            //             className: 'text-center px-4 py-2',
            //             render(data) {
            //                 return `<input type="checkbox" class="user-checkbox" value="${data.id}">`;
            //             }
            //         },
            //         {
            //             data: 'id',
            //             name: 'id',
            //             className: 'text-left px-4 py-2'
            //         },
            //         {
            //             data: 'first_name',
            //             name: 'first_name',
            //             className: 'text-left px-4 py-2'
            //         },
            //         {
            //             data: 'email',
            //             name: 'email',
            //             className: 'text-left px-4 py-2'
            //         },
            //         {
            //             data: 'phone_number',
            //             name: 'no_telepon',
            //             className: 'text-left px-4 py-2'
            //         },
            //         {
            //             data: null,
            //             className: 'text-left px-4 py-2',
            //             render(data) {
            //                 return `<button class="bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-700">Detail</button>`;
            //             }
            //         }
            //     ],
            //     language: {
            //         search: "_INPUT_",
            //         searchPlaceholder: "Cari email...",
            //         lengthMenu: "Tampilkan _MENU_ data"
            //     },
            //     initComplete: function() {
            //         $("input[type='search']").addClass(
            //             "border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-lg px-4 py-2"
            //             );
            //         $("select").addClass(
            //             "border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-lg px-2 py-1"
            //             );
            //     }
            // });

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

            $(document).on('click', '#submit', function() {
                let file = $('#fileInput')[0].files[0];

                if (!file) {
                    alert('Pilih file terlebih dahulu!');
                    return;
                }

                let formData = new FormData();
                formData.append('file', file);
                formData.append('_token', "{{ csrf_token() }}");

                $.ajax({
                    url: "{{ route('importClient') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status === 'success') {
                            alert('File berhasil diimport');
                        } else {

                        }
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        alert('Terjadi kesalahan saat mengupload file!');
                    }
                });

            });
        });
    </script>
@endpush
