@extends('layouts.app')
@section('title','Home')
@section('content')

    <h1 class="text-2xl font-bold text-gray-800 mb-4">User Email Lists</h1>

    <div class="flex justify-end mb-4">
        <button id="createBtn" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Create</button>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
        <table id="emailTable" class="stripe hover w-full">
            <thead>
                <tr>
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
    $(document).ready(function () {
        let table = $('#emailTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('emailData') }}",
            columns: [
                { data: 'id', name: 'id', className: 'text-left px-4 py-2' },
                { data: 'nama', name: 'nama', className: 'text-left px-4 py-2' },
                { data: 'email', name: 'email', className: 'text-left px-4 py-2' },
                { data: 'no_telepon', name: 'no_telepon', className: 'text-left px-4 py-2' },
                {
                    data: null,
                    className: 'text-left px-4 py-2',
                    render(data) {
                        return `
                            <button onclick="updateEmail(${data.id})" class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-700">Update</button>
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
            initComplete: function () {
                $("input[type='search']").addClass("border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-lg px-4 py-2");
                $("select").addClass("border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-lg px-2 py-1");
            }
        });
    
        $('#createBtn').click(function() {
            window.location.href = "{{ route('email.create') }}";
        });
    });

    function updateEmail(id) {
        window.location.href = `/email/update/${id}`;
    }

    function deleteEmail(id) {
        if (confirm('Apakah Anda yakin ingin menghapus email ini?')) {
            $.ajax({
                url: `/email/delete/${id}`,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(response) {
                    alert('Email berhasil dihapus');
                    $('#emailTable').DataTable().ajax.reload();
                },
                error: function(error) {
                    alert('Gagal menghapus email');
                }
            });
        }
    }
</script>
@endpush
