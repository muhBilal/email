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
    </div>
    <div class="flex justify-end mb-4">
        <button id="createBtn" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Create</button>
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
