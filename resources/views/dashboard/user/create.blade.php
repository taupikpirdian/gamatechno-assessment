@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{$title}}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form method="post" action="{{ route($routes) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">Nama</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" required>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">Role</label>
                                    <select class="form-control" name="role" required id="role">
                                        <option value="">Pilih Role</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->name}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('role'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6" id="optionInstitusi">
                                <div>
                                    <label class="form-label red-bullet">Institusi</label>
                                    <select class="form-control" name="institution" id="institution">
                                        <option value="" selected>Pilih Institusi</option>
                                    </select>
                                    @if ($errors->has('institution'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('institution') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-4">
                                <a class="btn btn-primary" href="{{$back_url}}">Kembali</a>
                                <button class="btn btn-info" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection

@push ('after-scripts')
    <script>
        $(function () {
            $(document).ready(function () {
                // Button click event
                $('#role').change(function() {
                    // Get the selected value from the dropdown
                    var selectedValue = $(this).val();
                    if (selectedValue === "admin") {
                        $("#optionInstitusi").addClass("d-none");
                        $('#institution').prop('required', false);
                    }else{
                        $("#optionInstitusi").removeClass("d-none");

                        $('#institution').prop('required', true);
                        $('#institution').empty();
                        $('#institution').append($('<option>', {
                            value: '',
                            text: 'Pilih Institusi'
                        }));
                        $.ajax({
                            url: '/users/institution/list/' + selectedValue,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                $.each(data, function(id, name) {
                                    $('#institution').append($('<option>', {
                                        value: id,
                                        text: name
                                    }));
                                });
                                $('#institution').trigger('change');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush