@extends('layouts.admin-layout')

@section('title', 'Admin Dashboard')

@section('content')
    {{-- Navbar --}}
    <nav>
        <a href="#birthday">Birthday</a>
        <a href="#structure">Structure</a>
        <a href="#pd-pj">PD PJ Members</a>
    </nav>

    {{-- Birthday Section --}}
    <section id="birthday">
        <h1>Birthday</h1>

        {{-- Flash messages --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        {{-- Birthday Table --}}
        <div class="birthday-table">
            <h2>Birthday List</h2>
            <div class="search-container">
                <input type="text" id="birthdaySearch" onkeyup="searchTable('birthdayTable', 'birthdaySearch')" placeholder="Search by Name...">
            </div>
            <table id="birthdayTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Jurusan</th>
                        <th>Angkatan</th>
                        <th>Tanggal Lahir</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($birthdays as $birthday)
                        <tr>
                            <td>{{ $birthday->name }}</td>
                            <td>{{ $birthday->jurusan }}</td>
                            <td>{{ $birthday->angkatan }}</td>
                            <td>{{ $birthday->tanggal_lahir }}</td>
                            <td>
                                <button class="edit-button" onclick="window.location.href='{{ route('admin.birthday.edit', $birthday->id) }}'">Edit</button>
                                <button type="button" class="delete-button" onclick="openDeleteModal('{{ route('admin.birthday.destroy', $birthday->id) }}')">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No birthdays found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="birthday-form">
            <h2>Add Birthday</h2>
            <form method="POST" action="{{ route('admin.birthday.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan:</label>
                    <input type="text" id="jurusan" name="jurusan" required>
                </div>
                <div class="form-group">
                    <label for="angkatan">Angkatan:</label>
                    <input type="text" id="angkatan" name="angkatan" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </section>

    {{-- PD PJ Section --}}
    <section id="pd-pj">
        <h1>PD PJ Members</h1>
        <div class="search-container">
            <input type="text" id="pdPjSearch" onkeyup="searchTable('pdPjTable', 'pdPjSearch')" placeholder="Search by Name...">
        </div>
        <div class="pd-pj-table">
            <h2>PD PJ Members List</h2>
            <table id="pdPjTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Major</th>
                        <th>Batch</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pdPjMembers as $pdPjMember)
                        <tr>
                            <td>{{ $pdPjMember->name }}</td>
                            <td>{{ $pdPjMember->role }}</td>
                            <td>{{ $pdPjMember->major }}</td>
                            <td>{{ $pdPjMember->batch }}</td>
                            <td>
                                <button class="edit-button" onclick="window.location.href='{{ route('admin.pdpj.edit', $pdPjMember->id) }}'">Edit</button>
                                <button type="button" class="delete-button" onclick="openDeleteModal('{{ route('admin.pdpj.destroy', $pdPjMember->id) }}')">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Form tambah member PD PJ --}}
        <div class="add-pd-pj-member-form">
            <h2>Add PD PJ Member</h2>
            <form method="POST" action="{{ route('admin.pdpj.store') }}">
                @csrf
                <div class="form-group">
                    <label for="role">Role:</label>
                    <input type="text" id="role" name="role" required>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="major">Major:</label>
                    <input type="text" id="major" name="major" required>
                </div>
                <div class="form-group">
                    <label for="batch">Batch:</label>
                    <input type="text" id="batch" name="batch" required>
                </div>
                <button type="submit">Add Member</button>
            </form>
        </div>
    </section>

    {{-- POUT Structure Section --}}
    <section id="structure">
        <h1>POUT Structure</h1>
        <div class="search-container">
            <input type="text" id="structureSearch" onkeyup="searchTable('structureTable', 'structureSearch')" placeholder="Search by Role...">
        </div>
        <div class="structure-table">
            <h2>Manage Structure</h2>
            <table id="structureTable">
                <thead>
                    <tr>
                        <th>Role</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Major</th>
                        <th>Batch</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $member)
                        <tr>
                            <td>{{ $member->role }}</td>
                            <td>{{ $member->name }}</td>
                            <td><img src="{{ $member->photo }}" alt="{{ $member->name }}" width="50"></td>
                            <td>{{ $member->major }}</td>
                            <td>{{ $member->batch }}</td>
                            <td>
                                <button class="edit-button" onclick="window.location.href='{{ route('admin.structure.edit', $member->id) }}'">Edit</button>
                                <button type="button" class="delete-button" onclick="openDeleteModal('{{ route('admin.structure.destroy', $member->id) }}')">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Form tambah member POUT Structure --}}
        <div class="add-member-form">
            <h2>Add Member</h2>
            <form method="POST" action="{{ route('admin.structure.storeMember') }}">
                @csrf
                <div class="form-group">
                    <label for="role">Role:</label>
                    <input type="text" id="role" name="role" required>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="photo">Photo URL:</label>
                    <input type="text" id="photo" name="photo" required>
                </div>
                <div class="form-group">
                    <label for="major">Major:</label>
                    <input type="text" id="major" name="major" required>
                </div>
                <div class="form-group">
                    <label for="batch">Batch:</label>
                    <input type="text" id="batch" name="batch" required>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </section>

    {{-- Modal Popup untuk Delete --}}
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeDeleteModal()">&times;</span>
            <p>Are you sure you want to delete this item?</p>
            <form id="deleteForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    </div>

    <button onclick="scrollToTop()" id="scrollToTopBtn" title="Go to top">&#8679;</button>

    {{-- Script untuk Modal Popup dan Scroll to Top --}}
    <script>
        // Fungsi untuk pencarian dalam tabel
        function searchTable(tableId, inputId) {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById(inputId);
            filter = input.value.toUpperCase();
            table = document.getElementById(tableId);
            tr = table.getElementsByTagName("tr");

            // Loop melalui semua baris tabel, sembunyikan yang tidak sesuai dengan pencarian
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0]; // Ganti angka 0 sesuai dengan indeks kolom yang ingin Anda cari
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = ""; // Tampilkan baris jika cocok dengan pencarian
                    } else {
                        tr[i].style.display = "none"; // Sembunyikan baris jika tidak cocok
                    }
                }
            }
        }

        // Fungsi untuk membuka modal delete
        function openDeleteModal(deleteUrl) {
            var modal = document.getElementById('deleteModal');
            var form = document.getElementById('deleteForm');
            form.action = deleteUrl; 
            modal.style.display = 'block';

            // Menutup modal jika user mengklik di luar area modal
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }

        // Fungsi untuk menutup modal delete
        function closeDeleteModal() {
            var modal = document.getElementById('deleteModal');
            modal.style.display = 'none'; // Sembunyikan modal
        }

        // Fungsi untuk melakukan scroll ke atas
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Menampilkan atau menyembunyikan tombol scroll to top berdasarkan posisi scroll
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("scrollToTopBtn").style.display = "block";
            } else {
                document.getElementById("scrollToTopBtn").style.display = "none";
            }
        }
    </script>
@endsection
