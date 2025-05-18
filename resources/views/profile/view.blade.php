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
    <div class="container-fluid">
        <div class="row">
            <div class="col-xxl-9">
                <div class="card mt-xxl-n5">
                    <div class="card-body p-4">
                        <div class="heading-sub_heading mb-3">
                            <h5 class="mb-0">Edit Profile Data</h5>
                            <hr>
                            <!-- <p class="text-muted fs-11">Input manuscript details ...</p> -->
                        </div>
                        <form action="{{ route('profile.update') }}" method="POST" class="ajaxForm">
                      @csrf
                            <div class="row gy-2">
                            {{-- <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">ORCID</label>
                                <p class="edit-profile-value blue"><span class="id-logo">iD</span>0000-00020651501569
                                    [unbind] [What is this?]</p>
                            </div> --}}
                            {{--
                            <div class="col-xxl-12 col-md-12">
                                <label for="country" class="d-block required">Title</label>
                                <select class="form-select" id="inputGroupSelect02"
                                    style="background-color: white; color: black;">
                                    <option value="" selected="" data-select2-id="select2-data-2-czgx">Select
                                        Title</option>
                                    <option value="1">Dr.</option>
                                    <option value="2">Prof.</option>
                                    <option value="3">Mr.</option>
                                </select>
                            </div> --}}
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label required">First Name</label>
                                <input type="text" class="form-control" value="{{ $user->firstname }}"
                                    name="firstname" placeholder="Enter Firstname">
                            </div>
                            {{-- <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label required">Middle Name</label>
                                <input type="text" name="middlename" class="form-control"
                                    value="{{ $user->middlename }}" placeholder="">
                            </div> --}}
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Last Name</label>
                                <input type="text" name="lastname" class="form-control" value="{{ $user->lastname }}"
                                    placeholder="Gulzar">
                            </div>

                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label required">Affiliation</label>
                                <input type="text" class="form-control" name="affiliation"
                                    value="{{ $user->affiliation }}" placeholder="King Faisal Univerity">
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label required">Address 1</label>
                                <input type="text" class="form-control" name="address1"
                                    value="{{ $user->address1 }}">
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Address 2</label>
                                <input type="text" class="form-control" name="address2" value="{{ $user->address2 }}"
                                    placeholder="Address 2">
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label required">Zip Code</label>
                                <input type="text" class="form-control" name="zip_code" value="{{ $user->zip_code }}"
                                    placeholder="31982">
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label required">City</label>
                                <input type="text" class="form-control" name="city" value="{{ $user->city }}"
                                    placeholder="Al-Ahsa">
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label required">County/Region</label>
                                <select class="js-example-basic-single" name="country">
                                    <option value="" selected>Select Country</option>
                                    @foreach ($countries as $country)
                                        <option @selected(@$user->country === $country) value="{{ $country }}">
                                            {{ $country }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Biography</label>
                                <textarea class="form-control" id="abstract" name="abstract" placeholder="Write Biography" cols="30"
                                    rows="10">{{ $user->abstract }}</textarea>
                            </div>
                            <button type="submit" id="submitManuscript"
                                class="btn btn-primary w-auto px-3 py-1 ms-3">Save</button>

                            {{-- <p class="text-muted required m-10" style="margin-top: 10px;">Denotes Required Field</p> --}}

                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>
