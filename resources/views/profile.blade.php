@extends('layout.app')
@section('title', 'Profile')
@section('titleHeader', 'Profile')
@section('menu', 'Menu')
@section('subMenu', 'Profile')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h1 class="mb-0" style="font-family: 'Arial, sans-serif'; color: green;">Profile</h1>
                    </div>
                    <div class="card-body text-center">
                        <div class="profile-img mb-3">
                            <img class="rounded-circle"
                                src="{{ asset($user->profile_picture ?? 'admin_assets/assets/images/users/cashier 1.jpg') }}"
                                alt="Profile Picture" style="width: 150px; height: 150px;">
                        </div>
                        <table class="table table-bordered mt-3 text-center">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->role }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex gap-5 justify-content-center">
                            <div class="edit">
                                <button class="btn btn-sm btn-warning edit-item-btn" data-bs-toggle="modal"
                                    data-bs-target="#editModal" onclick="editProfile({{ $user }})">Edit
                                    Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- edit modal --}}
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="close-modal"></button>
                        </div>
                        <form action="{{ route('profile.update', $user->id) }}" id="editForm" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="nama-field" class="form-label">Nama</label>
                                    <input type="text" id="nama-edit" class="form-control" name="nama"
                                        placeholder="Masukan nama" required />
                                </div>

                                <div class="mb-3">
                                    <label for="username-field" class="form-label">Username</label>
                                    <input type="text" id="username-edit" class="form-control" name="username"
                                        placeholder="Masukan username" required />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-success" id="edit-btn">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('otherJs')
    <!-- prismjs plugin -->
    <script src="{{ asset('admin_assets/assets/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/libs/list.js/list.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ asset('admin_assets/assets/js/customJs/profile.init.js') }}"></script>

    <script>
        function editProfile(data) {
            const form = document.getElementById('editForm');
            form.action = "{{ route('profile.update', ['id' => '/']) }}/" + data.id;
            form.querySelector("#nama-edit").value = data.nama;
            form.querySelector("#username-edit").value = data.username;
        }
    </script>
@endsection
