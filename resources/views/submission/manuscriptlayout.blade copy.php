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

                        {{-- <li> <a href="{{ route('submission.create_manuscript') }}" @class([
                        'text-primary',
                        'new-class',
                        'p-2',
                        'rounded-1',
                        'active-link' => request()->routeIs('submission.create_manuscript'),
                        ])
                        class="">Step 1 | Manuscript Information</a>
                        </li> --}}
                        {{-- @dd($manuscript) --}}
                        <x-submission-step route="submission.create_manuscript" label="Step 1 | Manuscript Information"
                            :manuscript="$manuscript" />
                        <x-submission-step route="submission.create_author" label="Step 2 | Author Information"
                            :manuscript="$manuscript" />
                        <x-submission-step route="submission.create_reviewer" label="Step 3 | Reviewer Information"
                            :manuscript="$manuscript" />
                        <x-submission-step route="submission.create_statement" label="Step 4 | Statement"
                            :manuscript="$manuscript" />


                    </ul>

                </div>
                <div class="card-body p-4">
                    {{ $slot }}
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
            $('.country').select2();
            $('#submitManuscript').click(function() {
                var url = "{{ route('submission.manuscript.validation') }}";
                let btnHtml = $(this).html();
                disableBtn(this);
                var params = {
                    journal_id: $('#journal_id').val(),
                    file: 'file',
                    article_type_id: $('#article_type').val(),
                    title: $('#title').val(),
                    abstract: $('#abstract').val(),
                    keyword: $('#tags-hidden').val(),
                    manuscript_id: $('#manuscript_id').val()
                }

                removeDisableBtn(this, btnHtml);
                getAjaxFileRequests(url, params, 'POST', function(response) {
                    console.log('success')
                })
            })
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
                $('.author-details .accordion-item').each(function(index) {
                    const newIndex = index + 1;
                    firstname.push($(this).find('.author_firstname').val());
                    lastname.push($(this).find('.author_lastname').val());
                    middlename.push($(this).find('.author_middlename').val());
                    email.push($(this).find('.author_email').val());
                    title.push($(this).find('.author_title').val());
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
                    manuscript_id: "{{ $manuscript }}"
                };
                console.log(params)
                var url = "{{ route('submission.author.validation') }}";
                removeDisableBtn(this, btnHtml);
                getAjaxRequests(url, params, 'POST', function(response) {
                    console.log('success')

                })
            })
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
                    manuscript_id: "{{ $manuscript }}"


                };
                removeDisableBtn(this, btnHtml);
                getAjaxRequests(url, params, 'POST', function(response) {
                    console.log(response)
                })
            })
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
                    manuscript_id: "{{ $manuscript }}"
                };
                removeDisableBtn(this, btnHtml);
                getAjaxRequests(url, params, 'POST', function(response) {
                    console.log(response)
                })
            })



            $('#addAuthor').on('click', function() {
                var authorCount = $('#accordionWithplusicon .accordion-item').length + 1;
                let getRows = addAnAuthorContent(authorCount)

                $('#accordionWithplusicon').append(getRows)
                $(`#select${authorCount}`).select2();
                //
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
                            $(".tags-container").append(
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