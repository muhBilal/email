@extends('layouts.app')
@section('title', 'Template')
@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Template</h1>

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
            $('#emailTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('emailData') }}",
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
                        data: 'first_name',
                        name: 'first_name',
                        className: 'text-left px-4 py-2'
                    },
                    {
                        data: 'email',
                        name: 'email',
                        className: 'text-left px-4 py-2'
                    },
                    {
                        data: 'phone_number',
                        name: 'no_telepon',
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
