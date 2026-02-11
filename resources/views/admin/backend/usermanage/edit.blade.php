@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Admin User</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Admin User</li>
                </ol>
            </nav>
        </div>


        <div class="card border-0 rounded-0">

            <div class="card-header">
                <h5 class="card-title">Personal Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('usermanage.update', $user->id) }}" method="POST" id="submit-form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="form-text1" class="form-label fs-14">Enter Name</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="ti ti-user"></i></div>
                            <input type="text" class="form-control" name="name"
                                value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="form-text1" class="form-label fs-14">Enter Email</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="ti ti-mail"></i></div>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3" hidden>
                        <label for="form-password1" class="form-label fs-14">Enter Password</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="ti ti-lock"></i></div>
                            <input type="password" class="form-control" name="password">

                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="form-password1" class="form-label fs-14">Enter Phone</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="ti ti-phone-call"></i></div>
                            <input type="text" name="phone" class="form-control"
                                value="{{ old('phone', $user->phone) }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address:</label>
                        <textarea name="address" class="form-control">{{ $user->address }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">
                                    Choose Department</label>
                                <select class="form-control" id="department" name="department">
                                    <option value="">-- Select Department--</option>

                                    {{-- <option value="Design_Structure">Design (Structure)</option> --}}
                                    <option value="Admin" {{ $user->department === 'Admin' ? 'selected' : '' }}>
                                        Admin</option>
                                    <option value="Design_Structure"
                                        {{ $user->department === 'Design_Structure' ? 'selected' : '' }}>
                                        Design_Structure</option>
                                    <option value="Design_Archi"
                                        {{ $user->department === 'Design_Archi' ? 'selected' : '' }}>Design(Archi)</option>
                                    <option value="Digital_Marketing"
                                        {{ $user->department === 'Digital_Marketing' ? 'selected' : '' }}>Digital Marketing
                                    </option>
                                    <option value="Engineer" {{ $user->department === 'Engineer' ? 'selected' : '' }}>
                                        Engineer</option>
                                    <option value="Finance_Account"
                                        {{ $user->department === 'Finance_Account' ? 'selected' : '' }}>Finance & Account
                                    </option>
                                    <option value="Management_Director"
                                        {{ $user->department === 'Management_Director' ? 'selected' : '' }}>
                                        Management/Director</option>
                                    <option value="Procurement"
                                        {{ $user->department === 'Procurement' ? 'selected' : '' }}>Procurement</option>
                                    <option value="HR" {{ $user->department === 'HR' ? 'selected' : '' }}>HR</option>
                                    <option value="QS" {{ $user->department === 'QS' ? 'selected' : '' }}>QS</option>
                                    <option value="Sales_Marketing"
                                        {{ $user->department === 'Sales_Marketing' ? 'selected' : '' }}>Sales & Marketing
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">Employee Number</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="codePrefix"></span>
                                    <input type="text" name="employee_number" class="form-control"
                                        value="{{ $user->employee_number }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="mb-3">
                                <label for="validationDefault01" class="form-label"> Roles & Designations </label>
                                <select class="form-select" name="role" id="example-select">
                                    <option value="" selected>Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                            {{ $user->hasRole($role->name) ? 'selected' : '' }}> {{ $role->name }}
                                        </option>
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
                                    <option value="Male" {{ $user->gender === 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $user->gender === 'Female' ? 'selected' : '' }}>Female
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label fs-14">NRC Number</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="ti ti-photo"></i></div>
                                    <input type="text" name="nrc" class="form-control"
                                        value="{{ $user->nrc }}">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-2">
                                <label for="validationDefault02" class="form-label">NRC Front Photo:</label>
                                <input type="file" class="form-control" name="nrcfrontphoto" id="nrc_front_image">
                            </div>
                            <div class="mb-2">
                                <label for="validationDefault02" class="form-label"></label>
                                <img id="showNrcFrontImage"
                                    src="{{ !empty($user->nrcfrontphoto) ? asset('upload/user_images/' . $user->nrcfrontphoto) : asset('upload/no_image.jpg') }}"
                                    class="img-thumbnail mb-2" style="width:70px;height:70px;object-fit:cover;"
                                    alt="image nrc front">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="mb-2">
                                <label for="validationDefault02" class="form-label">NRC Back Photo:</label>
                                <input type="file" class="form-control" name="nrcbackphoto" id="nrc_back_image">
                            </div>
                            <div class="mb-2">
                                <label for="validationDefault02" class="form-label"></label>
                                <img id="showNrcBackImage"
                                    src="{{ !empty($user->nrcbackphoto) ? asset('upload/user_images/' . $user->nrcbackphoto) : asset('upload/no_image.jpg') }}"
                                    class="img-thumbnail mb-2" style="width:70px;height:70px;object-fit:cover;"
                                    alt="image nrc back">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-2">
                                <label for="validationDefault02" class="form-label">Household Members:</label>
                                <input type="file" class="form-control" name="householdphoto" id="household_image">
                            </div>
                            <div class="mb-3">
                                <label for="validationDefault02" class="form-label"></label>
                                <img id="showHouseholdImage"
                                    src="{{ !empty($user->householdphoto) ? asset('upload/user_images/' . $user->householdphoto) : asset('upload/no_image.jpg') }}"
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
                                    src="{{ !empty($user->referenceletter) ? asset('upload/user_images/' . $user->referenceletter) : asset('upload/no_image.jpg') }}"
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
                                    src="{{ !empty($user->photo) ? asset('upload/user_images/' . $user->photo) : asset('upload/no_image.jpg') }}"
                                    class="img-thumbnail mb-2" style="width:70px;height:70px;object-fit:cover;"
                                    alt="image profile">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="mb-2">
                                <label for="validationDefault02" class="form-label">E-Signature:</label>
                                <input type="file" class="form-control" name="esingphoto" id="esingphoto_image">
                            </div>

                            <div class="mb-2">
                                <label for="validationDefault02" class="form-label"></label>
                                <img id="showEsignImage"
                                    src="{{ !empty($user->esingphoto) ? asset('upload/user_images/' . $user->esingphoto) : asset('upload/no_image.jpg') }}"
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
                                <select class="form-control" name="employeetype" data-choices data-choices-search-false
                                    data-choices-removeItem>
                                    <option value="">-- Select Employee Type--</option>
                                    <option value="Contract"{{ $user->employeetype === 'Contract' ? 'selected' : '' }}>
                                        Contract</option>
                                    <option value="Probation"{{ $user->employeetype === 'Probation' ? 'selected' : '' }}>
                                        Probation</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label for="form-password1" class="form-label fs-14"> Join Date:</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="ti ti-calendar"></i></div>
                                    <input type="date" name="joindate"
                                        value="{{ old('joindate', $user->joindate ? \Carbon\Carbon::parse($user->joindate)->format('Y-m-d') : '') }}>"
                                        class="form-control">
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
                                    <input type="text" class="form-control" name="contact_person"
                                        value="{{ $user->contact_person }}">

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label for="form-text1" class="form-label fs-14">Emergency Contact Number</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="ti ti-phone-call"></i></div>
                                    <input type="text" class="form-control" name="contact_number"
                                        value="{{ $user->contact_number }}">

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

    @push('scripts')
        {!! JsValidator::formRequest('App\Http\Requests\UserManage\UserUpdateRequest', '#submit-form') !!}

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

            // userTypeSelect.on('change', function() {
            //     prefixSpan.textContent = prefixMap[this.value] || '';
            // });
        });
        </script>
    @endpush
@endsection
