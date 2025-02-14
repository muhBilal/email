@extends('layouts.app')
@section('title','Home')
@section('content')

    <h1 class="text-2xl font-bold text-gray-800 mb-4">User Email Lists</h1>

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
        $('#emailTable').DataTable({
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
                        return `<button class="bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-700">Detail</button>`;
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
    });
</script>

@endpush
