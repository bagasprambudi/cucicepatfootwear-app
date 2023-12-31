@extends('dashboard.template')
@section('content-dashboard')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Pribadi</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/dashboard/profile/{{ auth()->user()->id }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Enter name"
                                        name="name" value="{{ auth()->user()->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email address</label>
                                    <input type="email" class="form-control" disabled id="inputEmail"
                                        placeholder="Enter email" name="email" value="{{ auth()->user()->email }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="inputNoHp">No HP</label>
                                    <input type="text" class="form-control" id="inputNoHp" placeholder="Enter No Hp"
                                        name="no_hp" value="{{ auth()->user()->no_hp }}" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="6" required>{{ auth()->user()->address }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning"><i class="bi bi-save2 mr-2"></i>
                                Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <!-- general form elements -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Update Password</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/dashboard/profile/{{ auth()->user()->id }}/updatepassword" method="POST">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputNewPassword">Old Password</label>
                                <input type="password" class="form-control" id="inputNewPassword"
                                    placeholder="Enter old password" name="old-pw">
                            </div>
                            <div class="form-group">
                                <label for="inputRepeatNewPassword">Repeat New Password</label>
                                <input type="password" class="form-control" id="inputRepeatNewPassword"
                                    placeholder="Enter new password" name="new-password">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning"><i class="bi bi-key-fill"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Danger</h3>
                    </div>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-danger m-3">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    <script>
        let loadFile = function(event) {
            let ppnow = document.getElementById('ppnow')
            ppnow.style.display = 'none'

            document.getElementById('btnupdatepp').disabled = false

            let output = document.getElementById('output')
            output.style.width = '160px'
            output.classList.add('img-thumbnail')
            output.src = URL.createObjectURL(event.target.files[0])
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };
    </script>
