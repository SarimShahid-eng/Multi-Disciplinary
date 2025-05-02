<x-manuscript-layout>
    <style>
        .swal2-popup .swal2-title {
            font-weight: 500 !important;
            font-size: 1.675em !important;
        }
    </style>
    <div class="tab-pane" id="statementInformation" role="tabpanel">
        <div class="heading-sub_heading mb-3">
            <h5 class="mb-0">Statement Details</h5>
            <p class="text-muted fs-11">Input statement details ...</p>
        </div>
        <hr>

        <div class="row g-2">
            <div class="col-xxl-12 col-md-12">
                <label for="" class="form-label">Conflicts of interest</label>
                <div class="container-fluid ">
                    <label for="" class="d-flex align-items-center" style="mb-2"><span>Commercial
                            or
                            financial</span>
                        <i class="ri-information-fill ms-1" style="color:#405189; font-size:16px;"></i>
                    </label>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="conflict_interest" value="0"
                            @checked(!@$m_statement->commercial_financial)>
                        <label class="form-check-label">
                            No commercial or financial conflict of interest was identified for
                            this search
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="conflict_interest" value="1" checked
                            @checked(@$m_statement->commercial_financial)>
                        <label class="form-check-label">
                            A commercial or financial conflict of interest was identified for
                            this research
                        </label>
                    </div>
                    <textarea name="conflict_interest_reason" id="" class="form-control" cols="30" rows="10"
                        placeholder="Explain why here...">{{ @$m_statement->conflict_interest_reason }}</textarea>
                </div>


            </div>
            <div class="col-xxl-12 col-md-12">
                <label for="" class="form-label">Manuscript Submission</label>
                <div class="container-fluid ">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="manuscript_version" id="manuscript_version"
                            value="0">
                        <label class="form-check-label" for="manuscript_version">
                            No other version of this manuscript was previously submitted to a
                            multidisciplinary journal
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" value="1" name="manuscript_version"
                            id="manuscript_version2" checked>
                        <label class="form-check-label" for="manuscript_version2">
                            A version of this manuscript was previously submitted to a
                            multidisciplinary journal
                        </label>
                    </div>
                    <textarea name="manuscript_version_reason" id="" class="form-control" cols="30" rows="10"
                        placeholder="Explain why here...">{{ @$m_statement->manuscript_version_reason }}</textarea>
                </div>

            </div>
            <div class="col-xxl-12 col-md-12">
                <label for="" class="form-label">Funding</label>
                <div class="container-fluid ">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="funding" id="funding1" value="0"
                            @checked(!@$m_statement->funding)>
                        <label class="form-check-label" for="funding1">
                            No funding was received for the research and/or publication of this
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="funding" id="funding2" value="1"
                            checked @checked(@$m_statement->funding)>
                        <label class="form-check-label" for="funding2">
                            Funding was received for the research and/or publication of this
                        </label>
                    </div>
                    <label for="" class="d-flex align-items-center" style="mb-2"><span>Funding
                            Information</span>
                        <i class="ri-information-fill ms-1" style="color:#405189; font-size:16px;"></i>
                    </label>
                    <p class="mb-2">Declare all sources of funding received for the for the
                        research being
                        submited adding a short description of each funder's role. This
                        statement will be shown in the published article.</p>
                    <textarea name="funding_reason" id="" class="form-control" cols="30" rows="10"
                        placeholder="Type here...">{{ @$m_statement->funding_reason }}</textarea>
                </div>

            </div>

            <div class="col-xxl-12 col-md-12">
                <div class="d-flex align-items-center mb-3 mt-2">
                    {{-- <div class="label-and-radios"> --}}
                    <label for="" class="form-label mb-0">
                        * Use of Gen Ai
                    </label>
                    <div class="radios d-flex align-items-center ms-3">
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="genAi" id="genAi1"
                                value="1" checked @checked(@$m_statement->genAi)>
                            <label class="form-check-label" for="genAi1">
                                Yes
                            </label>
                        </div>
                        <div class="form-check  ms-2">
                            <input class="form-check-input" type="radio" name="genAi" id="genAi2"
                                value="0" @checked(!@$m_statement->genAi)>
                            <label class="form-check-label" for="genAi2">
                                No
                            </label>
                        </div>
                    </div>
                    {{-- </div> --}}
                </div>
                <hr>
                <p>
                    It is a requirement when submitting to declare if any authors have used
                    generative AI or AI-assisted technological methods to prepare this
                    manuscript paper and supplementary documents such as citation references,
                    etc. If there is a use of GenAI in writing, please list the software tools
                    or services used, how it was used, and for what reason it was used for. MDPI
                    reserves the right to conduct investigation and authors will be held fully
                    responsible for the content of the submitted paper</p>
                <p class="mt-3 mb-2">If in doubt, please select “Yes” and disclose the details
                    of the use of GenAI and related tools.</p>
                <textarea name="genAi_reason" id="" class="form-control" cols="30" rows="10">{{ @$m_statement->genAi_reason }}</textarea>
            </div>
            <div class="row align-items-center justify-content-between mt-3">

                <div class="col-lg-12 col-6 d-flex justify-content-end">
                    <button type="button" id="submitStatement" class="btn btn-primary d-flex alig-items-center ">
                        Proceed To Next Step <i class="ri-arrow-right-line ms-2"></i>
                    </button>
                </div>
            </div>
            <!--end col-->

        </div>
        <!--end row-->
        {{-- </form> --}}
        @push('page-script')
            {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
            <script>
                $('#submitStatement').click(function() {
                    let btnHtml = $(this).html();
                    disableBtn(this);
                    var url = "{{ route('submission.statement.validation') }}";
                    var params = {
                        conflict_interest: $('input[name="conflict_interest"]:checked').val(),
                        conflict_interest_reason: $('textarea[name="conflict_interest_reason"]').val(),
                        manuscript_version: $('input[name="manuscript_version"]:checked').val(),
                        manuscript_version_reason: $('textarea[name="manuscript_version_reason"]').val(),
                        funding: $('input[name="funding"]:checked').val(),
                        funding_reason: $('textarea[name="funding_reason"]').val(),
                        genAi: $('input[name="genAi"]:checked').val(),
                        genAi_reason: $('textarea[name="genAi_reason"]').val(),
                        manuscript_id: "{{ $manuscriptId }}"
                    };
                    removeDisableBtn(this, btnHtml);
                    getAjaxRequests(url, params, 'POST', function(response) {}, true, 2000)
                })
            </script>
        @endpush
    </div>
</x-manuscript-layout>
