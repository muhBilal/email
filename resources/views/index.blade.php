@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="header mb-4">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold">User Email List</h1>
                <p class="text-gray-400">Complete Collection of User Email Addresses</p>
            </div>
            <button class="bg-orange-500 hover:bg-orange-700 text-white px-4 py-2 rounded flex items-center" aria-haspopup="dialog" aria-expanded="false" aria-controls="modal-create" data-hs-overlay="#modal-create"><i class="fas fa-plus mr-2"></i> Create</button>
        </div>
        <div class="mt-6 flex space-x-4">
            <button class="bg-black text-white px-4 py-2 rounded flex items-center">
                <i class="fas fa-paper-plane mr-2"></i> Kirim Email
            </button>
            <button type="button" class="border border-black text-black px-4 py-2 rounded flex items-center hover:bg-black hover:text-white" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-scale-animation-modal">
                <i class="fas fa-users mr-2"></i> Kirim by wilayah
            </button>
            <button class="border border-black text-black px-4 py-2 rounded flex items-center hover:bg-black hover:text-white">
                <i class="fas fa-user-friends mr-2"></i> Kirim semua client
            </button>
            <button type="button" class="border border-black text-black px-4 py-2 rounded flex items-center hover:bg-black hover:text-white" aria-haspopup="dialog" aria-expanded="false" aria-controls="importModal" data-hs-overlay="#importModal">
                <i class="fas fa-file-import mr-2"></i> Import File
            </button>
        </div>

        

        <div id="importModal"
            class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
            role="dialog" tabindex="-1" aria-labelledby="importModal-label">
            <div
                class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                    <div class="flex justify-between items-center py-3 px-4 border-b">
                        <h3 id="importModal-label" class="font-bold text-gray-800">
                            Modal title
                        </h3>
                        <button type="button"
                            class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                            aria-label="Close" data-hs-overlay="#importModal">
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
                        <label for="file" class="block text-sm font-medium text-gray-700">File</label>
                        <input type="file" id="fileInput" name="file"
                            class="block w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Choose file" required>
                    </div>
                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                        <button type="button"
                            id="closeModalImport"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                            data-hs-overlay="#importModal">
                            Close
                        </button>
                        <button id="importFile" type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{-- 
        <input type="file" id="fileInput" />
        <button class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-700" id="importFile">oke Client</button> --}}

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

    <div class="grid grid-cols-1 pb-6">
        <div class="col-span-12 xl:col-span-6">
            <div class="card">
                <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
                    <table id="emailTable" class="min-w-full overflow-hidden divide-y divide-gray-200 rounded-t-lg">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    <input type="checkbox" id="checkAll">
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">ID</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Nama</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Email</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Telp</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            let selected = [];

            $('#emailTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                deferRender: true,
                "initComplete": function(settings, json) {
                    $('.dataTables_scrollBody thead tr').css({
                        visibility: 'collapse'
                    });
                },
                ajax: "{{ route('emailData') }}",
                columns: [{
                        data: null,
                        orderable: false,
                        searchable: false,
                        className: 'text-left whitespace-nowrap px-6 py-4 border-b border-gray-200',
                        render(data) {
                            return `<input type="checkbox" name="id[]" class="user-checkbox" value="${data.id}">`;
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        className: 'text-left whitespace-nowrap px-6 py-4 border-b border-gray-200'
                    },
                    {
                        data: 'full_name',
                        name: 'full_name',
                        className: 'text-left whitespace-nowrap px-6 py-4 border-b border-gray-200'
                    },
                    {
                        data: 'email',
                        name: 'email',
                        className: 'text-left whitespace-nowrap px-6 py-4 border-b border-gray-200'
                    },
                    {
                        data: 'phone_number',
                        name: 'no_telepon',
                        className: 'text-left whitespace-nowrap px-6 py-4 border-b border-gray-200'
                    },
                    {
                        data: null,
                        className: 'text-left whitespace-nowrap px-6 py-4 border-b border-gray-200',
                        render(data) {
                            return `<button class="bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-700">Detail</button>`;
                        }
                    }
                ],
                language: {
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
                },
            });

            $(document).on('click', '.check-for-delete', function() {
                let checked = $('.check-for-delete:checked').length;
                if (checked > 0) {
                    $('.btn-delete-data').removeClass('hidden');
                } else {
                    $('.btn-delete-data').addClass('hidden');
                }
            });
            $(document).on('click', '.btn-delete-data', function() {
                Swal.fire({
                    title: 'Apakah anda yakin ingin menghapus data Regulasi Matriks?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#5156BE',
                    cancelButtonColor: '#FD625E',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        let id = [];
                        $('.check-for-delete:checked').each(function() {
                            id.push($(this).val());
                        });
                        $.ajax({
                            url: "",
                            method: 'POST',
                            data: {
                                ids: id
                            },
                            success: function(data) {
                                $('#myDataTable').DataTable().ajax.reload();
                                $('.btn-delete-data').addClass('hidden');
                                Swal.fire({
                                    title: 'Berhasil Terhapus!',
                                    text: 'Data Regulasi Matriks berhasil dihapus.',
                                    icon: 'success',
                                    showCancelButton: false,
                                    confirmButtonColor: '#5156BE',
                                    confirmButtonText: 'oke',
                                })
                            }
                        });
                    }
                })
            });

            $(document).on('change', '.user-checkbox', function() {
                let selected = [];
                $('.user-checkbox:checked').each(function() {
                    selected.push($(this).val());
                });
                console.log(selected);
            });

            $(document).on('change', '#checkAll', function() {
                selected = [];
                $('.user-checkbox').prop('checked', this.checked);
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

            $(document).on('click', '#importFile', function() {
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
                            // alert('File berhasil diimport');
                            $('#importModal').removeClass('hs-overlay-open');
                        } else {

                        }
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        alert('Terjadi kesalahan saat mengupload file!');
                    }
                });

            });

            $(document).on('click', '#sendSelected', function(){
                let selectedIds = [];
                $(".user-checkbox:checked").each(function() {
                    selectedIds.push($(this).val()); 
                });
                // console.log("Selected IDs:", selectedIds);
                //send ajax to send email
                $.ajax({
                    url: "{{ route('sendEmail') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        selectedEmail: selectedIds
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
            })
        });
    </script>
@endpush
