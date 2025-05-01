<x-manuscript-layout>
    <div class="tab-pane " id="authorInformation" role="tabpanel">
        <div class="heading-sub_heading mb-3">
            <h5 class="mb-0">Author Details</h5>
            <p class="text-muted fs-11">Input author details ...</p>
        </div>
        <hr>
        <div class="live-preview">
            <div class="accordion author-details custom-accordionwithicon-plus" id="accordionWithplusicon">
                @isset($authors)
                    @if ($authors->count() >= 1)
                        @foreach ($authors as $author)
                            @include('submission.create_author_append', [
                                'recordType' => $loop->first ? 'firstRecord' : 'remove',
                                'count' => $loop->iteration,
                            ])
                        @endforeach
                    @else
                        @include('submission.create_author_append', [
                            'recordType' => 'firstRecord',
                        ])
                    @endif
                @endisset
                {{-- <div class="accordion-item">
                    <h2 class="accordion-header d-flex " id="accordionwithplusExample1">

                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accor_plusExamplecollapse1" aria-expanded="true"
                            aria-controls="accor_plusExamplecollapse1">
                            <span class="auth-counter">
                                Author 1
                            </span>
                        </button>
                    </h2>
                    <div id="accor_plusExamplecollapse1" class="accordion-collapse collapse show"
                        aria-labelledby="accordionwithplusExample1" data-bs-parent="#accordionWithplusicon">
                        <div class="accordion-body">

                            <div class="row gy-2">
                                <div class="col-xxl-12 col-md-12">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" class="form-control author_email" id="author_email"
                                        name="author_email[]" value="{{ @$submission->email }}" placeholder="email"
                                        required>
                                </div>
                                <div class="col-xxl-12 col-md-12">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" class="form-control author_title" id="author_title"
                                        name="author_title[]" value="{{ @$submission->title }}" placeholder="title"
                                        required>
                                </div>
                                <div class="col-xxl-12 col-md-12">
                                    <label for="" class="form-label">Name</label>
                                    <div class="row">

                                        <div class="col-md-4 col-">
                                            <input type="text" class="form-control author_firstname"
                                                name="author_firstname[]" id="author_firstname"
                                                value="{{ @$submission->firstname }}" placeholder="Firstname" required>
                                        </div>

                                        <div class="col-md-4 col-">
                                            <input type="text" class="form-control col-md-4 author_middlename"
                                                name="author_middlename[]" id="author_middlename"
                                                value="{{ @$submission->middlename }}" placeholder="Middlename"
                                                required>
                                        </div>
                                        <div class="col-md-4 col-">
                                            <input type="text" class="form-control col-md-4 author_lastname"
                                                name="author_lastname[]" id="author_lastname"
                                                value="{{ @$submission->lastname }}" placeholder="Lastname" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-12 col-md-12">
                                    <label for="" class="form-label">Affiliation</label>
                                    <input type="text" class="form-control author_affiliation"
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
                                            <input class="form-check-input co_author" value="1" type="radio"
                                                name="co_author[1]" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check ms-2">
                                            <input class="form-check-input co_author" value="0" type="radio"
                                                name="co_author[1]" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div> --}}

            </div>
            <div class="col-lg-12 mt-2">
                <div class="text-center">
                    <button id="addAuthor" type="button" class="btn btn-success">+ Add an
                        author</button>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between mt-3">

            <div class="col-lg-12 col-6 d-flex justify-content-end">
                <button type="button" id="submitAuthor" class="btn btn-primary d-flex alig-items-center ">
                    Proceed To Next Step <i class="ri-arrow-right-line ms-2"></i>
                </button>
            </div>
        </div>
    </div>
    @push('page-script')
        <script>
            $(document).ready(function() {
                $('#author1').select2();
                $('#submitAuthor').click(function() {
                    let btnHtml = $(this).html();
                    disableBtn(this);
                    var firstname = [];
                    var lastname = [];
                    var middlename = [];
                    var email = [];
                    var title = [];
                    var affiliation = [];
                    var co_author = [];
                    var country = [];
                    $('.author-details .accordion-item').each(function(index) {
                        const newIndex = index + 1;
                        firstname.push($(this).find('.author_firstname').val());
                        lastname.push($(this).find('.author_lastname').val());
                        middlename.push($(this).find('.author_middlename').val());
                        email.push($(this).find('.author_email').val());
                        title.push($(this).find('.author_title').val());
                        country.push($(this).find('.country').val());
                        affiliation.push($(this).find('.author_affiliation').val());
                        $(this).find('.form-check-input[type="radio"]').each(function() {
                            const val = $(this).val();
                            $(this).attr('name', 'co_author[' + newIndex + ']');
                        });
                        co_author.push(
                            $(this).find('input[name="co_author[' + newIndex + ']"]:checked')
                            .val() || null
                        );


                    });
                    var params = {
                        author_email: email,
                        author_title: title,
                        author_firstname: firstname,
                        author_middlename: middlename,
                        author_lastname: lastname,
                        author_affiliation: affiliation,
                        author_co_author: co_author,
                        country: country,
                        manuscript_id: "{{ $manuscriptId }}"
                    };
                    console.log(params)
                    var url = "{{ route('submission.author.validation') }}";
                    removeDisableBtn(this, btnHtml);
                    getAjaxRequests(url, params, 'POST', function(response) {
                        console.log('success')

                    })
                })
                $('#addAuthor').on('click', function() {
                    var authorCount = $('#accordionWithplusicon .accordion-item').length + 1;
                    let getRows = addAnAuthorContent(authorCount)

                    $('#accordionWithplusicon').append(getRows)
                    $(`#select${authorCount}`).select2();
                })

                function addAnAuthorContent(authorCount) {
                    var newAuthor = `
                                        <div class="accordion-item" id="author${authorCount}" >
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
                                                                                        <input type="text" class="form-control col-md-4 author_middlename"
                                                                                            name="author_middlename[]"
                                                                                            value="{{ @$submission->middlename }}"
                                                                                            placeholder="Middlename" required>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <input type="text" class="form-control col-md-4 author_lastname"
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
                                                                                <label for="" class="form-label">Country</label>
                                                                                <select id="select${authorCount}" class="country" name="journal_id">
                                                                                    <option value="" selected>Select Country</option>
                                                                                    <option value="Sindh">Sindh</option>
                                                                                    <option value="Punjab">Punjab</option>
                                                                                    <option value="KPK">KPK</option>

                                                                                </select>
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
                    // Remove the current accordion item
                    $(this).closest('.accordion-item').remove();

                    // Reindex all accordion items
                    $('#accordionWithplusicon .accordion-item').each(function(index) {
                        const newIndex = index + 1;

                        $(this).attr('data-author-id', newIndex);

                        // Update Author counter
                        $(this).find('.auth-counter').text('Author ' + newIndex);

                        // Update collapse section ID and button target
                        const collapseId = 'accor_plusExamplecollapse' + newIndex;
                        const headingId = 'accordionwithplusExample' + newIndex;

                        $(this).find('.accordion-collapse')
                            .attr('id', collapseId)
                            .attr('aria-labelledby', headingId);

                        $(this).find('.accordion-header').attr('id', headingId);

                        $(this).find('.accordion-button')
                            .attr('data-bs-target', '#' + collapseId)
                            .attr('aria-controls', collapseId);

                        // Update corresponding author radio name
                        $(this).find('.form-check-input[type="radio"]').each(function() {
                            const val = $(this).val();
                            $(this).attr('name', 'co_author[' + newIndex + ']');
                        });
                    });
                });
            })
        </script>
    @endpush
</x-manuscript-layout>
