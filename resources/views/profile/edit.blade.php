<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="page-content pt-0">
        <div class="container-fluid">


            <div class="row">

                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails"
                                        role="tab">
                                        <i class="fas fa-home"></i> Personal Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-bs-toggle="tab" href="#changePassword" role="tab">
                                        <i class="fas fa-home"></i> Change Password
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <form action="{{ route('profile.update') }}" class="ajaxForm" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="nameInput" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="nameInput"
                                                        placeholder="Enter your name" name="name"
                                                        value="{{ $user->name }}">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="usernameInput" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="usernameInput"
                                                        placeholder="username" name="username"
                                                        value="{{ $user->username }}">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            {{-- <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="phonenumberInput" class="form-label">Phone
                                                        Number</label>
                                                    <input type="text" class="form-control" id="phonenumberInput"
                                                        placeholder="Enter your phone number" value="+(1) 987 6543">
                                                </div>
                                            </div> --}}
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="emailInput" class="form-label">Email Address</label>
                                                    <input type="email" name="email" class="form-control"
                                                        id="emailInput" placeholder="Enter your email"
                                                        value="{{ $user->email }}">
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <!--end col-->
                                            {{-- country backup --}}
                                            {{-- <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="countryInput" class="form-label">Country</label>
                                                    <input type="text" class="form-control" id="countryInput"
                                                        placeholder="Country" value="United States" />
                                                </div>
                                            </div> --}}
                                            <!--end col-->

                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <!--end tab-pane-->
                                <div class="tab-pane" id="changePassword" role="tabpanel">
                                    <form action="{{ route('password.update') }}" class="ajaxForm" method="POST">
                                        @csrf
                                        <div class="row g-2">
                                            <div class="col-lg-4">
                                                <div>
                                                    <label for="newpasswordInput" class="form-label">New
                                                        Password*</label>
                                                    <input type="password" name="password" class="form-control"
                                                        id="newpasswordInput" placeholder="Enter new password">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4">
                                                <div>
                                                    <label for="confirmpasswordInput" class="form-label">Confirm
                                                        Password*</label>
                                                    <input type="password" class="form-control"
                                                        id="confirmpasswordInput" name="password_confirmation"
                                                        placeholder="Confirm password">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-success">Reset
                                                        Password</button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div><!-- End Page-content -->
    @push('page-script')
        <script>
            $(document).ready(function() {
                $('.nav').each(function() {
                    $(this).click(function() {
                        $(this).addClass('active').siblings('.nav').removeClass('active')
                    })
                })
                $("#profile-img-file-input").on("change", function(event) {
                    var file = event.target.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $(".user-profile-image").attr("src", e.target.result).show();
                        };
                        reader.readAsDataURL(file);
                    }
                });
            })
        </script>
    @endpush
</x-app-layout>
