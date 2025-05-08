<x-manuscript-layout>
    <div class="tab-pane " id="reviwerInformation" role="tabpanel">
        <div class="heading-sub_heading mb-3">
            <h5 class="mb-0">Reviewer Details</h5>
            <p class="text-muted fs-11">Input reviewer details ...</p>
        </div>
        <hr>
        <div class="accordion reviewer-details custom-accordionwithicon-plus" id="accordionWithplusicon">
            <div class="accordion-item">
                <h2 class="accordion-header d-flex " id="accordionwithplusExample1">
                    {{-- <button class="btn btn-danger cross_icon remove-btn"><span>x</span></button> --}}

                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#accor_plusExamplecollapse1" aria-expanded="true"
                        aria-controls="accor_plusExamplecollapse1">
                        <span class="auth-counter">
                            Suggested Reviewer 1
                        </span>
                    </button>
                </h2>
                <div id="accor_plusExamplecollapse1" class="accordion-collapse collapse show"
                    aria-labelledby="accordionwithplusExample1" data-bs-parent="#accordionWithplusicon">
                    <div class="accordion-body">

                        <div class="row gy-2">
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="form-control reviewer_email"
                                    id="suggested_reviewer_1_email" name="suggested_reviewer_1_email"
                                    value="{{ @$s_reviewer->suggested_reviewer_1_email }}" placeholder="email" required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Firstname</label>
                                <input type="text" class="form-control reviewer_firstname"
                                    id="suggested_reviewer_1_firstname" name="suggested_reviewer_1_firstname"
                                    value="{{ @$s_reviewer->suggested_reviewer_1_firstname }}" placeholder="firstname"
                                    required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Lastname</label>
                                <input type="text" class="form-control reviewer_lastname"
                                    id="suggested_reviewer_1_lastname" name="suggested_reviewer_1_lastname"
                                    value="{{ @$s_reviewer->suggested_reviewer_1_lastname }}" placeholder="lastname"
                                    required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">affiliation</label>
                                <input type="text" class="form-control suggested_reviewer_2_affiliation"
                                    id="suggested_reviewer_1_affiliation" name="suggested_reviewer_1_affiliation"
                                    value="{{ @$s_reviewer->suggested_reviewer_1_affiliation }}"
                                    placeholder="affiliation" required>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header d-flex " id="accordionwithplusExample2">
                    {{-- <button class="btn btn-danger cross_icon remove-btn"><span>x</span></button> --}}

                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#accor_plusExamplecollapse2" aria-expanded="true"
                        aria-controls="accor_plusExamplecollapse2">
                        <span class="auth-counter">
                            Suggested Reviewer 2
                        </span>
                    </button>
                </h2>
                <div id="accor_plusExamplecollapse2" class="accordion-collapse collapse show"
                    aria-labelledby="accordionwithplusExample2" data-bs-parent="#accordionWithplusicon">
                    <div class="accordion-body">

                        <div class="row gy-2">
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="form-control reviewer_email"
                                    id="suggested_reviewer_2_email" name="suggested_reviewer_2_email"
                                    value="{{ @$s_reviewer->suggested_reviewer_2_email }}" placeholder="email" required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Firstname</label>
                                <input type="text" class="form-control reviewer_firstname"
                                    id="suggested_reviewer_2_firstname" name="suggested_reviewer_2_firstname[]"
                                    value="{{ @$s_reviewer->suggested_reviewer_2_firstname }}" placeholder="firstname"
                                    required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Lastname</label>
                                <input type="text" class="form-control reviewer_lastname"
                                    id="suggested_reviewer_2_lastname" name="suggested_reviewer_2_lastname"
                                    value="{{ @$s_reviewer->suggested_reviewer_2_lastname }}" placeholder="lastname"
                                    required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">affiliation</label>
                                <input type="text" class="form-control reviewer_affiliation"
                                    id="suggested_reviewer_2_affiliation" name="suggested_reviewer_2_affiliation"
                                    value="{{ @$s_reviewer->suggested_reviewer_2_affiliation }}"
                                    placeholder="affiliation" required>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header d-flex " id="accordionwithplusExample1">
                    {{-- <button class="btn btn-danger cross_icon remove-btn"><span>x</span></button> --}}

                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#accor_plusExamplecollapse3" aria-expanded="true"
                        aria-controls="accor_plusExamplecollapse3">
                        <span class="auth-counter">
                            Suggested Reviewer 3
                        </span>
                    </button>
                </h2>
                <div id="accor_plusExamplecollapse3" class="accordion-collapse collapse show"
                    aria-labelledby="accordionwithplusExample3" data-bs-parent="#accordionWithplusicon">
                    <div class="accordion-body">

                        <div class="row gy-2">
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="form-control reviewer_email"
                                    id="suggested_reviewer_3_email" name="suggested_reviewer_3_email"
                                    value="{{ @$s_reviewer->suggested_reviewer_3_email }}" placeholder="email"
                                    required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Firstname</label>
                                <input type="text" class="form-control reviewer_firstname"
                                    id="suggested_reviewer_3_firstname" name="suggested_reviewer_3_firstname"
                                    value="{{ @$s_reviewer->suggested_reviewer_3_firstname }}" placeholder="firstname"
                                    required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Lastname</label>
                                <input type="text" class="form-control reviewer_lastname"
                                    id="suggested_reviewer_3_lastname" name="suggested_reviewer_3_lastname"
                                    value="{{ @$s_reviewer->suggested_reviewer_3_lastname }}" placeholder="lastname"
                                    required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">affiliation</label>
                                <input type="text" class="form-control reviewer_affiliation"
                                    id="suggested_reviewer_3_affiliation" name="suggested_reviewer_3_affiliation"
                                    value="{{ @$s_reviewer->suggested_reviewer_3_affiliation }}"
                                    placeholder="affiliation" required>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="row align-items-center justify-content-between mt-3">

            <div class="col-lg-12 col-6 d-flex justify-content-end">
                <button type="button" id="submitSuggestedReviewer"
                    class="btn btn-primary d-flex alig-items-center ">
                    Proceed To Final Step <i class="ri-arrow-right-line ms-2"></i>
                </button>
            </div>
        </div>
        @push('page-script')
            <script>
                $(document).ready(function() {
                    $('#submitSuggestedReviewer').click(function() {
                        let btnHtml = $(this).html();
                        disableBtn(this);
                        var url = "{{ route('submission.reviewer.validation') }}";

                        var suggested_reviewer_1_email = $('#suggested_reviewer_1_email').val();
                        var suggested_reviewer_1_firstname = $('#suggested_reviewer_1_firstname').val();
                        var suggested_reviewer_1_lastname = $('#suggested_reviewer_1_lastname').val();
                        var suggested_reviewer_1_affiliation = $('#suggested_reviewer_1_affiliation').val();
                        var suggested_reviewer_2_email = $('#suggested_reviewer_2_email').val();
                        var suggested_reviewer_2_firstname = $('#suggested_reviewer_2_firstname').val();
                        var suggested_reviewer_2_lastname = $('#suggested_reviewer_2_lastname').val();
                        var suggested_reviewer_2_affiliation = $('#suggested_reviewer_2_affiliation').val();
                        var suggested_reviewer_3_email = $('#suggested_reviewer_3_email').val();
                        var suggested_reviewer_3_firstname = $('#suggested_reviewer_3_firstname').val();
                        var suggested_reviewer_3_lastname = $('#suggested_reviewer_3_lastname').val();
                        var suggested_reviewer_3_affiliation = $('#suggested_reviewer_3_affiliation').val();
                        var params = {
                            suggested_reviewer_1_email: suggested_reviewer_1_email,
                            suggested_reviewer_1_firstname: suggested_reviewer_1_firstname,
                            suggested_reviewer_1_lastname: suggested_reviewer_1_lastname,
                            suggested_reviewer_1_affiliation: suggested_reviewer_1_affiliation,
                            suggested_reviewer_2_email: suggested_reviewer_2_email,
                            suggested_reviewer_2_firstname: suggested_reviewer_2_firstname,
                            suggested_reviewer_2_lastname: suggested_reviewer_2_lastname,
                            suggested_reviewer_2_affiliation: suggested_reviewer_2_affiliation,
                            suggested_reviewer_3_email: suggested_reviewer_3_email,
                            suggested_reviewer_3_firstname: suggested_reviewer_3_firstname,
                            suggested_reviewer_3_lastname: suggested_reviewer_3_lastname,
                            suggested_reviewer_3_affiliation: suggested_reviewer_3_affiliation,
                            manuscript_id: "{{ $manuscriptId }}"


                        };
                        removeDisableBtn(this, btnHtml);
                        getAjaxRequests(url, params, 'POST', function(response) {
                            console.log(response)
                        })
                    })
                })
            </script>
        @endpush
    </div>
</x-manuscript-layout>
