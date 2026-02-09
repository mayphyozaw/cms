@extends('layouts.app')
@section('content')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css"> --}}
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Users</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create User</li>
                </ol>
            </nav>
        </div>


        <div class="row justify-content-center">

            <div class="col-lg-12 md-12">
                <div class="card border-0 rounded-0">

                    <div class="card-header">
                        <h5 class="card-title">Personal Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('usermanage.store') }}" method="POST" id="submit-form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fs-14">Enter Name</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="ti ti-user"></i></div>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" placeholder="">

                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fs-14">Enter Email</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="ti ti-mail"></i></div>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" placeholder="">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fs-14">Enter Password</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="ti ti-lock"></i></div>
                                    <input type="password" class="form-control" name="password" placeholder="">

                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fs-14">Enter Phone</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="ti ti-phone-call"></i></div>
                                    <input type="text" name="phone" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Address:</label>
                                <textarea name="address" class="form-control"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Choose Department</label>
                                        <select class="form-control" id="department" name="department">
                                            <option value="">-- Select Department--</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Design_Structure">Design (Structure)</option>
                                            <option value="Design_Archi">Design(Archi)</option>
                                            <option value="Digital_Marketing">Digital Marketing</option>
                                            <option value="Engineer">Engineer</option>
                                            <option value="Finance_Account">Finance & Account</option>
                                            <option value="Management_Director">Management/Director</option>
                                            <option value="Procurement">Procurement</option>
                                            <option value="HR">HR</option>
                                            <option value="QS">QS</option>
                                            <option value="Sales_Marketing">Sales & Marketing</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="mb-3">
                                        <label for="form-label fs-14" class="form-label fs-14">Employee Number</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="codePrefix"></span>
                                            <input type="text" name="employee_number" class="form-control"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12">
                                    <div class="mb-3">
                                        <label for="validationDefault01" class="form-label"> Roles & Designations </label>
                                    <select class="form-select" name="role" id="example-select">
                                        <option value="" selected>Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"> {{ $role->name }} </option>
                                        @endforeach
                                    </select>
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Gender</label>
                                        <select class="form-control" name="gender">
                                            <option value="">-- Select Gender--</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label fs-14">NRC Number</label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="ti ti-photo"></i></div>
                                            <input type="text" name="nrc" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-2">
                                        <label for="validationDefault02" class="form-label">NRC Front Photo:</label>
                                        <input type="file" class="form-control" name="nrcfrontphoto"
                                            id="nrc_front_image">
                                    </div>
                                    <div class="mb-2">
                                        <label for="validationDefault02" class="form-label"></label>
                                        <img id="showNrcFrontImage"
                                            src="{{ !empty($user_data->nrcfrontphoto) ? asset('upload/user_images/' . $user_data->nrcfrontphoto) : asset('upload/no_image.jpg') }}"
                                            class="img-thumbnail mb-2" style="width:70px;height:70px;object-fit:cover;"
                                            alt="image nrc front">

                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-2">
                                        <label for="validationDefault02" class="form-label">NRC Back Photo:</label>
                                        <input type="file" class="form-control" name="nrcbackphoto"
                                            id="nrc_back_image">
                                    </div>
                                    <div class="mb-2">
                                        <label for="validationDefault02" class="form-label"></label>
                                        <img id="showNrcBackImage"
                                            src="{{ !empty($user_data->nrcbackphoto) ? asset('upload/user_images/' . $user_data->nrcbackphoto) : asset('upload/no_image.jpg') }}"
                                            class="img-thumbnail mb-2" style="width:70px;height:70px;object-fit:cover;"
                                            alt="image nrc back">

                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-2">
                                        <label for="validationDefault02" class="form-label">Household Members:</label>
                                        <input type="file" class="form-control" name="householdphoto"
                                            id="household_image">
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationDefault02" class="form-label"></label>
                                        <img id="showHouseholdImage"
                                            src="{{ !empty($user_data->householdphoto) ? asset('upload/user_images/' . $user_data->householdphoto) : asset('upload/no_image.jpg') }}"
                                            class="img-thumbnail mb-2" style="width:70px;height:70px;object-fit:cover;"
                                            alt="image household">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-2">
                                        <label for="validationDefault02" class="form-label">Reference Letter:</label>
                                        <input type="file" class="form-control" name="referenceletter"
                                            id="referenceletter_image">
                                    </div>

                                    <div class="mb-2">
                                        <label for="validationDefault02" class="form-label"></label>
                                        <img id="showReferImage"
                                            src="{{ !empty($user_data->referenceletter) ? asset('upload/user_images/' . $user_data->referenceletter) : asset('upload/no_image.jpg') }}"
                                            class="img-thumbnail mb-2" style="width:70px;height:70px;object-fit:cover;"
                                            alt="image referenceletter">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-2">
                                        <label for="validationDefault02" class="form-label">Profile Photo:</label>
                                        <input type="file" class="form-control" name="photo" id="user_image">
                                    </div>

                                    <div class="mb-2">
                                        <label for="validationDefault02" class="form-label"></label>
                                        <img id="showImage"
                                            src="{{ !empty($user_data->photo) ? asset('upload/user_images/' . $user_data->photo) : asset('upload/no_image.jpg') }}"
                                            class="img-thumbnail mb-2" style="width:70px;height:70px;object-fit:cover;"
                                            alt="image profile">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-2">
                                        <label for="validationDefault02" class="form-label">E-Signature:</label>
                                        <input type="file" class="form-control" name="esingphoto"
                                            id="esingphoto_image">
                                    </div>

                                    <div class="mb-2">
                                        <label for="validationDefault02" class="form-label"></label>
                                        <img id="showEsignImage"
                                            src="{{ !empty($user_data->esingphoto) ? asset('upload/user_images/' . $user_data->esingphoto) : asset('upload/no_image.jpg') }}"
                                            class="img-thumbnail mb-2" style="width:70px;height:70px;object-fit:cover;"
                                            alt="image esingphoto">
                                    </div>


                                </div>

                            </div>


                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Employee Type</label>
                                        <select class="form-control" name="employeetype" data-choices
                                            data-choices-search-false data-choices-removeItem>
                                            <option value="">-- Select Employee Type--</option>
                                            <option value="Contract">Contract</option>
                                            <option value="Probation">Probation</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="form-password1" class="form-label fs-14">Date:</label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="ti ti-calendar"></i></div>
                                            <input type="date" name="joindate" value="<?php echo date('Y-m-d'); ?>"
                                                class="form-control">
                                            @error('date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="form-text1" class="form-label fs-14">Emergency Contact Person</label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="ti ti-user"></i></div>
                                            <input type="text"
                                                class="form-control @error('contact_person') is-invalid @enderror"
                                                name="contact_person" placeholder="">
                                            @error('contact_person')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="form-text1" class="form-label fs-14">Emergency Contact Number</label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="ti ti-phone-call"></i></div>
                                            <input type="text"
                                                class="form-control @error('contact_number') is-invalid @enderror"
                                                name="contact_number" placeholder="">
                                            @error('contact_number')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\UserManage\UserStoreRequest', '#submit-form') !!}

    <script type="text/javascript">
        $(document).ready(function() {
            $('#user_image').on('change', function() {
                if (this.files && this.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage')
                            .attr('src', e.target.result)
                            .show();
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });

        $(document).ready(function() {
            $('#nrc_front_image').on('change', function() {
                if (this.files && this.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showNrcFrontImage')
                            .attr('src', e.target.result)
                            .show();
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });



        $(document).ready(function() {
            $('#nrc_back_image').on('change', function() {
                if (this.files && this.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showNrcBackImage')
                            .attr('src', e.target.result)
                            .show();
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });



        $(document).ready(function() {
            $('#household_image').on('change', function() {
                if (this.files && this.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showHouseholdImage')
                            .attr('src', e.target.result)
                            .show();
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });



        $(document).ready(function() {
            $('#referenceletter_image').on('change', function() {
                if (this.files && this.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showReferImage')
                            .attr('src', e.target.result)
                            .show();
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });

        $(document).ready(function() {
            $('#esingphoto_image').on('change', function() {
                if (this.files && this.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showEsignImage')
                            .attr('src', e.target.result)
                            .show();
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });


        // $(document).ready(function() {

        //     const userTypeSelect = document.getElementById('department');
        //     const prefixSpan = document.getElementById('codePrefix');

        //     const prefixMap = { 
        //         Admin: 'EMP-'
        //         Design_Structure: 'EMP-',
        //         Design_Archi: 'EMP-',
        //         Digital_Marketing: 'EMP-',
        //         Finance_Account: 'EMP-',
        //         Management_Director: 'EMP-',
        //         Procurement: 'EMP-',
        //         QS: 'EMP-',
        //         Engineer: 'EMP-',
        //         Sales_Marketing: 'EMP-',
        //         HR: 'EMP-',
        //     };

        //     userTypeSelect.on('change', function() {
        //         prefixSpan.textContent = prefixMap[this.value] || '';
        //     });

        // });


        $(document).ready(function() {

            const prefixMap = {
                Admin: 'EMP-',
                Design_Structure: 'EMP-',
                Design_Archi: 'EMP-',
                Digital_Marketing: 'EMP-',
                Finance_Account: 'EMP-',
                Management_Director: 'EMP-',
                Procurement: 'EMP-',
                QS: 'EMP-',
                Engineer: 'EMP-',
                Sales_Marketing: 'EMP-',
                HR: 'EMP-',
            };

            $('#department').on('change', function() {
                let dept = $(this).val();
                $('#codePrefix').text(prefixMap[dept] || '');
            });

        });
    </script>
@endpush
