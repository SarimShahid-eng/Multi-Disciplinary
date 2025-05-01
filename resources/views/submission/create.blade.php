<x-app-layout>
    <style>
        .tags-container {
            display: flex;
            flex-wrap: wrap;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            min-height: 40px;
            align-items: center;
        }

        .tag {
            background-color: #435590;
            color: white;
            padding: 5px 10px;
            margin: 2px;
            border-radius: 4px;
            display: flex;
            align-items: center;
        }

        .tag .remove-tag {
            cursor: pointer;
            margin-left: 5px;
            font-weight: bold;
            margin-right: 10px;
        }

        .tags-input {
            border: none;
            outline: none;
            flex-grow: 1;
            padding: 5px;
        }

        .cross_icon {
            border-radius: 0;
            color: white;
            font-weight: bold;
        }

        .incomplete_sub_border::after {
            content: "";
            background: #405189;
            height: 1px;
            position: absolute;
            width: 100%;
            left: 0;
            bottom: 0;
            -webkit-transition: all 250ms ease 0s;
            transition: all 250ms ease 0s;
            -webkit-transform: scale(0);
            /* transform: scale(0); */
            transform: scale(1);
            /* color: #405189; */
        }

        .incomp-sub {
            padding: 1rem 1rem;
            background-color: #8080802e;
        }

        .active-link {
            background-color: #405189;
            color: white !important;
            font-weight: 500
        }
    </style>
    <div class="row">

        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header pb-1">
                    <ul class="d-flex ps-0">
                        <li>
                            <a href="{{ route('submission.incomplete_submission.index') }}"
                                class="text-primary fw-medium p-2 rounded-1">
                                Incomplete Submission(1)
                            </a>
                        </li>
                        <li> <a href="{{ route('submission.incomplete_submission.index') }}""
                                class="active-link text-primary p-2 rounded-1">Manuscript Information</a>
                        </li>
                        <li> <a href="#" class="text-primary p-2 rounded-1">Author Information</a> </li>
                        <li> <a href="#" class="text-primary p-2 rounded-1">Reviewer Information</a> </li>
                        <li> <a href="#" class="text-primary p-2 rounded-1">Statement</a> </li>
                    </ul>

                </div>
                <div class="card-body p-4">
                    <form method="POST" class="ajax-image-Form" action="{{ route('submission.store') }}">
                        @csrf
                        <div class="tab-content">
                            <div class="tab-pane active" id="manuscriptInformation" role="tabpanel">
                                <div class="heading-sub_heading mb-3">
                                    <h5 class="mb-0">Manuscript Details</h5>
                                    <p class="text-muted fs-11">Input manuscript details ...</p>
                                </div>
                                <hr>

                                <div class="row gy-2">
                                    {{-- journal selection --}}
                                    <div class="col-xxl-12 col-md-12">
                                        <label for="country" class="d-block">Select Jounrnal</label>
                                        <select id="journal_id" class="js-example-basic-single" name="journal_id">
                                            <option value="" selected>Select Journal</option>

                                            @foreach ($journals as $journal)
                                                <option @selected(@$journal->id === @$submission->journal_id) value="{{ $journal->id }}">
                                                    {{ $journal->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xxl-12 col-md-12">
                                        <label for="" class="form-label">Upload File</label>
                                        <input type="file" class="form-control" id="file" name="file">
                                    </div>
                                    {{-- article selection --}}
                                    <div class="col-xxl-12 col-md-12">
                                        <label for="country" class="d-block">Select Article Type</label>
                                        <select id="article_type" class="js-example-basic-single"
                                            name="article_type_id">
                                            <option value="" selected>Select Article Type</option>

                                            @foreach ($article_types as $article_type)
                                                <option @selected(@$article_type->id === @$submission->article_type_id) value="{{ $article_type->id }}">
                                                    {{ $article_type->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xxl-12 col-md-12">
                                        <label for="" class="form-label">Title</label>
                                        <input type="text" id="title" class="form-control" name="title"
                                            placeholder="Title" required>
                                    </div>
                                    <div class="col-xxl-12 col-md-12">
                                        <label for="" class="form-label">Abstract</label>
                                        <textarea class="form-control" id="abstract" name="abstract" placeholder="Write Abstract" cols="30"
                                            rows="10"{{ @$submission->abstract }}"></textarea>

                                    </div>
                                    <div class="col-xxl-12 col-md-12">
                                        <label for="" class="form-label">Keywords</label>
                                        <div class="tags-container">
                                            <input type="text" class="form-control tags-input" id="keywords"
                                                value="{{ @$submission->keywords }}" placeholder="keywords">
                                        </div>
                                        <input type="hidden" name="keyword" id="tags-hidden">
                                    </div>




                                    <div class="row align-items-center justify-content-between mt-3">
                                        <div class="col-lg-6 col-6">
                                            <button type="button" disabled
                                                class="btn btn-primary prev-btn d-flex alig-items-center "><i
                                                    class="ri-arrow-left-line me-2"></i>
                                                Previous</button>
                                        </div>
                                        <div class="col-lg-6 col-6 d-flex justify-content-end">
                                            <button type="button"
                                                class="btn btn-primary d-flex alig-items-center next-btn">
                                                Next <i class="ri-arrow-right-line ms-2"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!--end col-->
                                </div>
                                <!--end row-->
                                {{-- </form> --}}
                            </div>
                            <!--end tab-pane-->
                            <div class="tab-pane " id="authorInformation" role="tabpanel">
                                <div class="heading-sub_heading mb-3">
                                    <h5 class="mb-0">Author Details</h5>
                                    <p class="text-muted fs-11">Input author details ...</p>
                                </div>
                                <hr>
                                <div class="live-preview">
                                    <div class="accordion author-details custom-accordionwithicon-plus"
                                        id="accordionWithplusicon">
                                        <div class="accordion-item" data-author-id="1">
                                            <h2 class="accordion-header d-flex " id="accordionwithplusExample1">
                                                {{-- <button class="btn btn-danger cross_icon remove-btn"><span>x</span></button> --}}

                                                <button class="accordion-button" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#accor_plusExamplecollapse3" aria-expanded="true"
                                                    aria-controls="accor_plusExamplecollapse1">
                                                    <span class="auth-counter">
                                                        Author 1
                                                    </span>
                                                </button>
                                            </h2>
                                            <div id="accor_plusExamplecollapse1"
                                                class="accordion-collapse collapse show"
                                                aria-labelledby="accordionwithplusExample1"
                                                data-bs-parent="#accordionWithplusicon">
                                                <div class="accordion-body">

                                                    <div class="row gy-2">
                                                        <div class="col-xxl-12 col-md-12">
                                                            <label for="" class="form-label">Email</label>
                                                            <input type="text" class="form-control author_email"
                                                                id="author_email" name="author_email[]"
                                                                value="{{ @$submission->email }}" placeholder="email"
                                                                required>
                                                        </div>
                                                        <div class="col-xxl-12 col-md-12">
                                                            <label for="" class="form-label">Title</label>
                                                            <input type="text" class="form-control author_title"
                                                                id="author_title" name="author_title[]"
                                                                value="{{ @$submission->title }}" placeholder="title"
                                                                required>
                                                        </div>
                                                        <div class="col-xxl-12 col-md-12">
                                                            <label for="" class="form-label">Name</label>
                                                            <div class="row">

                                                                <div class="col-md-4 col-">
                                                                    <input type="text"
                                                                        class="form-control author_firstname"
                                                                        name="author_firstname[]"
                                                                        id="author_firstname"
                                                                        value="{{ @$submission->firstname }}"
                                                                        placeholder="Firstname" required>
                                                                </div>

                                                                <div class="col-md-4 col-">
                                                                    <input type="text"
                                                                        class="form-control col-md-4 author_middlename"
                                                                        name="author_middlename[]"
                                                                        id="author_middlename"
                                                                        value="{{ @$submission->middlename }}"
                                                                        placeholder="Middlename" required>
                                                                </div>
                                                                <div class="col-md-4 col-">
                                                                    <input type="text"
                                                                        class="form-control col-md-4 author_lastname"
                                                                        name="author_lastname[]" id="author_lastname"
                                                                        value="{{ @$submission->lastname }}"
                                                                        placeholder="Lastname" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xxl-12 col-md-12">
                                                            <label for=""
                                                                class="form-label">Affiliation</label>
                                                            <input type="text"
                                                                class="form-control author_affiliation"
                                                                name="author_affiliation[]" id="author_affiliation"
                                                                value="{{ @$submission->affiliation }}"
                                                                placeholder="Department, College, University name, City, Postcode, Country"
                                                                required>
                                                        </div>
                                                        <div class="col-xxl-12 col-md-12">
                                                            <label for="" class="form-label">Corresponding
                                                                Author</label>
                                                            <div class="check-wrapper d-flex ms-1">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input co_author"
                                                                        value="1" type="radio"
                                                                        name="co_author[1]" id="flexRadioDefault1">
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault1">
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                                <div class="form-check ms-2">
                                                                    <input class="form-check-input co_author"
                                                                        value="0" type="radio"
                                                                        name="co_author[1]" id="flexRadioDefault2">
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault2">
                                                                        No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--end col-->
                                                    <div class="col-lg-12 ">
                                                        <div class="text-center">
                                                            <button id="addAuthor" type="submit"
                                                                class="btn btn-success">+ Add an
                                                                author</button>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    {{-- </div> --}}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row align-items-center justify-content-between mt-3">
                                    <div class="col-lg-6 col-6">
                                        <button type="button"
                                            class="btn btn-primary d-flex alig-items-center prev-btn"><i
                                                class="ri-arrow-left-line me-2"></i>
                                            Previous</button>
                                    </div>
                                    <div class="col-lg-6 col-6 d-flex justify-content-end">
                                        <button type="button"
                                            class="btn btn-primary d-flex alig-items-center next-btn">
                                            Next <i class="ri-arrow-right-line ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--end tab-pane-->
                            <div class="tab-pane " id="reviwerInformation" role="tabpanel">
                                <div class="heading-sub_heading mb-3">
                                    <h5 class="mb-0">Reviewer Details</h5>
                                    <p class="text-muted fs-11">Input reviewer details ...</p>
                                </div>
                                <hr>
                                <div class="accordion reviewer-details custom-accordionwithicon-plus"
                                    id="accordionWithplusicon">
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
                                            aria-labelledby="accordionwithplusExample1"
                                            data-bs-parent="#accordionWithplusicon">
                                            <div class="accordion-body">

                                                <div class="row gy-2">
                                                    <div class="col-xxl-12 col-md-12">
                                                        <label for="" class="form-label">Email</label>
                                                        <input type="email" class="form-control reviewer_email"
                                                            id="reviewer_email" name="reviewer_email[]"
                                                            value="{{ @$submission->email }}" placeholder="email"
                                                            required>
                                                    </div>
                                                    <div class="col-xxl-12 col-md-12">
                                                        <label for="" class="form-label">Firstname</label>
                                                        <input type="text" class="form-control reviewer_firstname"
                                                            id="reviewer_firstname" name="reviewer_firstname[]"
                                                            value="{{ @$submission->firstname }}"
                                                            placeholder="firstname" required>
                                                    </div>
                                                    <div class="col-xxl-12 col-md-12">
                                                        <label for="" class="form-label">Lastname</label>
                                                        <input type="text" class="form-control reviewer_lastname"
                                                            id="reviewer_lastname" name="reviewer_lastname[]"
                                                            value="{{ @$submission->lastname }}"
                                                            placeholder="lastname" required>
                                                    </div>
                                                    <div class="col-xxl-12 col-md-12">
                                                        <label for="" class="form-label">affiliation</label>
                                                        <input type="text"
                                                            class="form-control reviewer_affiliation"
                                                            id="reviewer_affiliation" name="reviewer_affiliation[]"
                                                            value="{{ @$submission->affiliation }}"
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
                                            aria-labelledby="accordionwithplusExample2"
                                            data-bs-parent="#accordionWithplusicon">
                                            <div class="accordion-body">

                                                <div class="row gy-2">
                                                    <div class="col-xxl-12 col-md-12">
                                                        <label for="" class="form-label">Email</label>
                                                        <input type="email" class="form-control reviewer_email"
                                                            id="reviewer_email" name="reviewer_email[]"
                                                            value="{{ @$submission->email }}" placeholder="email"
                                                            required>
                                                    </div>
                                                    <div class="col-xxl-12 col-md-12">
                                                        <label for="" class="form-label">Firstname</label>
                                                        <input type="text" class="form-control reviewer_firstname"
                                                            id="reviewer_firstname" name="reviewer_firstname[]"
                                                            value="{{ @$submission->firstname }}"
                                                            placeholder="firstname" required>
                                                    </div>
                                                    <div class="col-xxl-12 col-md-12">
                                                        <label for="" class="form-label">Lastname</label>
                                                        <input type="text" class="form-control reviewer_lastname"
                                                            id="reviewer_lastname" name="reviewer_lastname[]"
                                                            value="{{ @$submission->lastname }}"
                                                            placeholder="lastname" required>
                                                    </div>
                                                    <div class="col-xxl-12 col-md-12">
                                                        <label for="" class="form-label">affiliation</label>
                                                        <input type="text"
                                                            class="form-control reviewer_affiliation"
                                                            id="reviewer_affiliation" name="reviewer_affiliation[]"
                                                            value="{{ @$submission->affiliation }}"
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
                                            aria-labelledby="accordionwithplusExample3"
                                            data-bs-parent="#accordionWithplusicon">
                                            <div class="accordion-body">

                                                <div class="row gy-2">
                                                    <div class="col-xxl-12 col-md-12">
                                                        <label for="" class="form-label">Email</label>
                                                        <input type="email" class="form-control reviewer_email"
                                                            id="reviewer_email" name="reviewer_email[]"
                                                            value="{{ @$submission->email }}" placeholder="email"
                                                            required>
                                                    </div>
                                                    <div class="col-xxl-12 col-md-12">
                                                        <label for="" class="form-label">Firstname</label>
                                                        <input type="text" class="form-control reviewer_firstname"
                                                            id="reviewer_firstname" name="reviewer_firstname[]"
                                                            value="{{ @$submission->firstname }}"
                                                            placeholder="firstname" required>
                                                    </div>
                                                    <div class="col-xxl-12 col-md-12">
                                                        <label for="" class="form-label">Lastname</label>
                                                        <input type="text" class="form-control reviewer_lastname"
                                                            id="reviewer_lastname" name="reviewer_lastname[]"
                                                            value="{{ @$submission->lastname }}"
                                                            placeholder="lastname" required>
                                                    </div>
                                                    <div class="col-xxl-12 col-md-12">
                                                        <label for="" class="form-label">affiliation</label>
                                                        <input type="text"
                                                            class="form-control reviewer_affiliation"
                                                            id="reviewer_affiliation" name="reviewer_affiliation[]"
                                                            value="{{ @$submission->affiliation }}"
                                                            placeholder="affiliation" required>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row g-2">

                                    <div class="row align-items-center justify-content-between mt-3">
                                        <div class="col-lg-6 col-6">

                                            <button type="button"
                                                class="btn btn-primary prev-btn d-flex alig-items-center">
                                                <i class="ri-arrow-left-line me-2"></i> Previous
                                            </button>
                                        </div>
                                        <div class="col-lg-6 col-6 d-flex justify-content-end">
                                            <button type="button"
                                                class="btn btn-primary d-flex alig-items-center next-btn">Next <i
                                                    class="ri-arrow-right-line ms-2"></i></button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                                {{-- </form> --}}

                            </div>
                            <!--end tab-pane-->
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
                                            <label for="" class="d-flex align-items-center"
                                                style="mb-2"><span>Commercial
                                                    or
                                                    financial</span>
                                                <i class="ri-information-fill ms-1"
                                                    style="color:#405189; font-size:16px;"></i>
                                            </label>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio"
                                                    name="commercial_financial" value="0">
                                                <label class="form-check-label">
                                                    No commercial or financial conflict of interest was identified for
                                                    this search
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="radio"
                                                    name="commercial_financial" value="1" checked>
                                                <label class="form-check-label">
                                                    A commercial or financial conflict of interest was identified for
                                                    this research
                                                </label>
                                            </div>
                                            <textarea name="commercial_financial_reason" id="" class="form-control" cols="30" rows="10"
                                                placeholder="Explain why here..."></textarea>
                                        </div>


                                    </div>
                                    <div class="col-xxl-12 col-md-12">
                                        <label for="" class="form-label">Manuscript Submission</label>
                                        <div class="container-fluid ">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio"
                                                    name="previous_version_exist" id="previous_version_exist"
                                                    value="0">
                                                <label class="form-check-label" for="previous_version_exist">
                                                    No other version of this manuscript was previously submitted to a
                                                    multidisciplinary journal
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="radio" value="1"
                                                    name="previous_version_exist" id="previous_version_exist2"
                                                    checked>
                                                <label class="form-check-label" for="previous_version_exist2">
                                                    A version of this manuscript was previously submitted to a
                                                    multidisciplinary journal
                                                </label>
                                            </div>
                                            <textarea name="previous_version_exist_reason" id="" class="form-control" cols="30" rows="10"
                                                placeholder="Explain why here..."></textarea>
                                        </div>

                                    </div>
                                    <div class="col-xxl-12 col-md-12">
                                        <label for="" class="form-label">Funding</label>
                                        <div class="container-fluid ">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio"
                                                    name="is_funding_received" id="is_funding_received1"
                                                    value="0">
                                                <label class="form-check-label" for="is_funding_received1">
                                                    No funding was received for the research and/or publication of this
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="radio"
                                                    name="is_funding_received" id="is_funding_received2"
                                                    value="1" checked>
                                                <label class="form-check-label" for="is_funding_received2">
                                                    Funding was received for the research and/or publication of this
                                                </label>
                                            </div>
                                            <label for="" class="d-flex align-items-center"
                                                style="mb-2"><span>Funding Information</span>
                                                <i class="ri-information-fill ms-1"
                                                    style="color:#405189; font-size:16px;"></i>
                                            </label>
                                            <p class="mb-2">Declare all sources of funding received for the for the
                                                research being
                                                submited adding a short description of each funder's role. This
                                                statement will be shown in the published article.</p>
                                            <textarea name="is_funding_received_reason" id="" class="form-control" cols="30" rows="10"
                                                placeholder="Type here..."></textarea>
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
                                                    <input class="form-check-input" type="radio" name="gen_ai_use"
                                                        id="gen_ai_use1" value="1" checked>
                                                    <label class="form-check-label" for="gen_ai_use1">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check  ms-2">
                                                    <input class="form-check-input" type="radio" name="gen_ai_use"
                                                        id="gen_ai_use2" value="0">
                                                    <label class="form-check-label" for="gen_ai_use2">
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
                                        <textarea name="gen_ai_use_reason" id="" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                    <!--end col-->
                                    <div class="row align-items-center justify-content-between mt-3">
                                        <div class="col-lg-6 col-6">
                                            <button type="button"
                                                class="btn btn-primary prev-btn d-flex alig-items-center "
                                                data-prev="reviwerInformation"><i class="ri-arrow-left-line me-2"></i>
                                                Previous</button>
                                        </div>
                                        <div class="col-lg-6 col-6 d-flex justify-content-end">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                                {{-- </form> --}}

                            </div>
                            <!--end tab-pane-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>

    <!--end row-->
    </div>
    </div>
    </div>


    </div>

    <!--end col-->
    </div>
    @push('page-script')
        <script>
            $(document).ready(function() {
                $(".next-btn").click(function() {
                    let url;
                    let nextTabPaneId = $(".tab-pane.active").next(".tab-pane").attr(
                        "id");

                    if (nextTabPaneId === 'authorInformation') {
                        $('.prev-btn').removeAttr('disabled');
                        url = "{{ route('submission.manuscript.validation') }}";
                        var params = {
                            journal_id: $('#journal_id').val(),
                            file: 'file',
                            article_type: $('#article_type').val(),
                            title: $('#title').val(),
                            abstract: $('#abstract').val(),
                            keyword: $('#tags-hidden').val(),
                        }
                        getAjaxFileRequests(url, params, 'POST', function(response) {
                            changeTab('next');
                        })

                    } else if (nextTabPaneId === 'reviwerInformation') {
                        var firstname = [];
                        var lastname = [];
                        var middlename = [];
                        var email = [];
                        var title = [];
                        var affiliation = [];
                        var co_author = [];
                        $('.author-details .accordion-item').each(function() {
                            var authorId = $(this).data('author-id');
                            firstname.push($(this).find('.author_firstname').val());
                            lastname.push($(this).find('.author_lastname').val());
                            middlename.push($(this).find('.author_middlename').val());
                            email.push($(this).find('.author_email').val());
                            title.push($(this).find('.author_title').val());
                            affiliation.push($(this).find('.author_affiliation').val());
                            co_author.push($(this).find('input[name="co_author[' + authorId +
                                ']"]:checked').val() || null);

                        });
                        var params = {
                            author_email: email,
                            author_title: title,
                            author_firstname: firstname,
                            author_middlename: middlename,
                            author_lastname: lastname,
                            author_affiliation: affiliation,
                            author_co_author: co_author
                        };
                        url = "{{ route('submission.author.validation') }}";
                        getAjaxRequests(url, params, 'POST', function(response) {
                            changeTab('next');
                        })
                        // getAjaxRequests()
                    } else if (nextTabPaneId === 'statementInformation') {
                        url = "{{ route('submission.reviewer.validation') }}";
                        var reviewer_email = [];
                        var reviewer_firstname = [];
                        var reviewer_lastname = [];
                        var reviewer_affiliation = [];

                        $('.reviewer-details .accordion-item').each(function() {
                            reviewer_email.push($(this).find('.reviewer_email').val());
                            reviewer_firstname.push($(this).find('.reviewer_firstname').val());
                            reviewer_lastname.push($(this).find('.reviewer_lastname').val());
                            reviewer_affiliation.push($(this).find('.reviewer_affiliation').val());
                        });
                        var params = {
                            reviewer_email: reviewer_email,
                            reviewer_firstname: reviewer_firstname,
                            reviewer_lastname: reviewer_lastname,
                            reviewer_affiliation: reviewer_affiliation,
                        };
                        getAjaxRequests(url, params, 'POST', function(response) {
                            changeTab('next');
                        })
                    }
                })


                $('.prev-btn').click(function(e) {
                    e.preventDefault();
                    changeTab('prev');
                });

                function changeTab(direction) {
                    var currentTab = $('.nav-link.active');
                    var currentTabPane = $('.tab-pane.active');

                    var targetTab = (direction === 'next') ? currentTab.parent().next('.nav-item').find('.nav-link') :
                        currentTab.parent().prev('.nav-item').find('.nav-link');

                    if (targetTab.length) {
                        var targetTabPane = $(targetTab.attr(
                            'href')); // Get the target tab-pane by using the href of the nav-link

                        currentTab.removeClass('active');
                        currentTabPane.removeClass('active');

                        targetTab.addClass('active');
                        targetTabPane.addClass('active');

                        toggleButtons(targetTab);
                    }
                }

                function toggleButtons(targetTab) {
                    // Enable the 'Next' and 'Previous' buttons based on the current tab
                    var nextButton = $('.next-btn');
                    var prevButton = $('.prev-btn');

                    if (targetTab.attr('href') === '#manuscriptInformation') {
                        prevButton.prop('disabled', true);
                    } else if (targetTab.attr('href') === '#statementInformation') {
                        nextButton.prop('disabled', true);
                    } else {
                        prevButton.prop('disabled', false);
                        nextButton.prop('disabled', false);
                    }
                }

                $('#addAuthor').on('click', function() {
                    var lastAuthorId = $('#accordionWithplusicon .accordion-item').last().data(
                            'author-id') ||
                        0;
                    var authorCount = lastAuthorId + 1; // Get the next unique author ID
                    let getRows = addAnAuthorContent(authorCount)
                    $('#accordionWithplusicon').append(getRows)
                })

                function addAnAuthorContent(authorCount) {
                    var newAuthor = `
                                        <div class="accordion-item" id="author${authorCount}" data-author-id="${authorCount}">
                                            <h2 class="accordion-header d-flex" id="accordionwithplusExample${authorCount}">
                                                <button class="btn btn-danger cross_icon remove-btn"><span>x</span></button>
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#accor_plusExamplecollapse${authorCount}" aria-expanded="true"
                                                    aria-controls="accor_plusExamplecollapse${authorCount}">
                                                    <span class="auth-counter">
                                                        Author ${authorCount}
                                                    </span>

                                                </button>
                                            </h2>
                                            <div id="accor_plusExamplecollapse${authorCount}" class="accordion-collapse collapse"
                                                aria-labelledby="accordionwithplusExample${authorCount}" data-bs-parent="#accordionWithplusicon">
                                                        <div class="accordion-body">
                                                                               <div class="row gy-2">

                                                                            <div class="col-xxl-12 col-md-12">
                                                                                <label for="" class="form-label">Email</label>
                                                                                <input type="text" class="form-control author_email" name="author_email[]"
                                                                                    value="{{ @$submission->email }}" placeholder="email"
                                                                                    required>
                                                                            </div>
                                                                            <div class="col-xxl-12 col-md-12">
                                                                                <label for="" class="form-label">Title</label>
                                                                                <input type="text" class="form-control author_title" name="author_title[]"
                                                                                    value="{{ @$submission->title }}" placeholder="title"
                                                                                    required>
                                                                            </div>
                                                                            <div class="col-xxl-12 col-md-12">
                                                                                <label for="" class="form-label">Name</label>
                                                                                <div class="row">
                                                                                    <div class="col-md-4">
                                                                                        <input type="text" class="form-control author_firstname"
                                                                                            name="author_firstname[]" value="{{ @$submission->firstname }}"
                                                                                            placeholder="Firstname" required>
                                                                                    </div>

                                                                                    <div class="col-md-4">
                                                                                        <input type="text" class="form-control col-md-4 author_middlename[]"
                                                                                            name="author_middlename[]"
                                                                                            value="{{ @$submission->middlename }}"
                                                                                            placeholder="Middlename" required>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <input type="text" class="form-control col-md-4 author_lastname[]"
                                                                                            name="author_lastname[]" value="{{ @$submission->lastname }}"
                                                                                            placeholder="Lastname" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xxl-12 col-md-12">
                                                                                <label for="" class="form-label">Affiliation</label>
                                                                                <input type="text" class="form-control author_affiliation" name="author_affiliation[]"
                                                                                    value="{{ @$submission->affiliation }}"
                                                                                    placeholder="affiliation" required>
                                                                            </div>
                                                                            <div class="col-xxl-12 col-md-12">
                                                                                <label for="" class="form-label">Corresponding
                                                                                    Author</label>
                                                                                <div class="check-wrapper d-flex ms-1">
                                                                                    <div class="form-check ">
                                                                                        <input name="co_author[${authorCount}]" class="form-check-input" type="radio"
                                                                                          value="1" >
                                                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                                                            Yes
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="form-check ms-2">
                                                                                        <input class="form-check-input" type="radio"
                                                                                           value="0" name="co_author[${authorCount}]" id="flexRadioDefault2">
                                                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                                                            No
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        </div>
                                            </div>
                                        </div>`;
                    return newAuthor;
                }
                $(document).on('click', '.remove-btn', function() {
                    var authorId = $(this).data('author-id');
                    $('div[data-author-id="' + authorId + '"]').remove();

                    // Reindex all the accordion items to update the data-author-id dynamically
                    $('#accordionWithplusicon .accordion-item').each(function(index) {
                        $(this).attr('data-author-id', index + 1);
                        $(this).find('.auth-counter').text('Author ' + (index + 1));
                        $(this).find('.remove-author').data('author-id', index + 1);
                        $(this).find('.accordion-collapse').attr('id', 'accor_plusExamplecollapse' +
                            (
                                index + 1));
                        $(this).find('.accordion-button').attr('data-bs-target',
                            '#accor_plusExamplecollapse' + (index + 1));
                    });
                    $(this).parent().parent().remove()
                });
                let tags = [];

                function updateHiddenInput() {
                    $("#tags-hidden").val(tags.join(","));
                }

                // Load existing keywords if editing
                let existingTags = $("#keywords").val();
                if (existingTags) {
                    tags = existingTags.split(";").map(tag => tag.trim());
                    tags.forEach(tag => {
                        $(".tags-container").prepend(
                            `<span class="tag"><span class="remove-tag">&times;</span> ${tag} </span>`
                        );
                    });
                    updateHiddenInput();
                }

                // Add new keyword on Enter or Comma

                $(".tags-input").on("input", function(e) {
                    let inputValue = $(this).val();

                    // Check if the input contains `;`
                    if (inputValue.includes(";")) {
                        let tagArray = inputValue.split(";").map(tag => tag.trim()).filter(tag => tag);

                        tagArray.forEach(tagText => {
                            if (!tags.includes(tagText)) {
                                tags.push(tagText);
                                $(".tags-container").prepend(
                                    `<span class="tag"><span class="remove-tag">&times;</span> ${tagText} </span>`
                                );
                            }
                        });

                        $(this).val(""); // Clear input after processing
                        updateHiddenInput();
                    }
                });

                // Remove a keyword on clicking `×`
                $(document).on("click", ".remove-tag", function() {
                    let tagText = $(this).parent().text().replace("×", "").trim();
                    tags = tags.filter(tag => tag !== tagText);
                    $(this).parent().remove();
                    updateHiddenInput();
                });
            });
        </script>
    @endpush
</x-app-layout>
