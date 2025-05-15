<x-app-layout>
    @push('style')
        <link rel="stylesheet" href="{{ asset('layout_assets/css/manuscript_details.css?<?date();?>') }}" />
    @endpush
    <div class="title manuscript-title">
        <h4>Manuscript Information Overview</h4>
    </div>

    <div class="submission-details">
        <div class="submission-info">
            <div class="info-item">
                <p class="info-label">Manuscript ID</p>
                <p class="info-value">{{ $manuscript->manuscriptId }}</p>
            </div>
            <div class="info-item">
                <p class="info-label">Status</p>
                <p class="info-value">{{ $manuscript->latestStatus->status }}</p>
            </div>
            <div class="info-item">
                <p class="info-label">Article type</p>
                <p class="info-value">{{ $manuscript->articleType->name }}</p>
            </div>
            <div class="info-item">
                <p class="info-label">Title</p>
                <p class="info-value">{{ $manuscript->title }}</p>
            </div>
            <div class="info-item">
                <p class="info-label">Journal</p>
                <p class="info-value blue italic">{{ $manuscript->journal->name }}</p>
            </div>
            {{-- <div class="info-item">
                <p class="info-label">Section</p>
                <p class="info-value blue">Digital Agriculture</p>
            </div> --}}
            {{-- <div class="info-item">
                <p class="info-label">Special Issue</p>
                <p class="info-value blue">Internet of Things (IoT) and Agricultural Unmanned Aerial
                    Vehicles in Smart Agriculture</p>
            </div> --}}
            <div class="info-item">
                <p class="info-label">Abstract</p>
                <p class="info-value">
                    {{ $manuscript->abstract }}
                </p>
            </div>
            <div class="info-item">
                <p class="info-label">Keywords</p>
                <p class="info-value">
                    @php
                        $keyword = implode(', ', $manuscript->keywords);
                    @endphp
                    {{ $keyword }}

                </p>
            </div>
            <div class="info-item">
                <p class="info-label">Manuscript File</p>
                <p cla bluess="info-value"><a href="{{ asset('users-uploaded-file/' . $manuscript->file_path) }}"
                        class="text-primary">manuscript.docx</a></p>
            </div>
        </div>

        <div class="data-container">
            <div class="data">
                <div class="data-left">
                    <img src="assets/images/qr-code.png" alt="QR Code" />
                    <h1 class="data-heading">data</h1>
                </div>
                <div class="data-right">
                    <p>
                        Data are of paramount importance to scientific progress, yet most research data are
                        hidden in supplementary files or remain private. Enhancing the transparency of data
                        processes will help to render scientific research results reproducible and thus more
                        accountable. Co-submit your methodical data-processing articles or data descriptors
                        for a linked dataset in <i>Data</i> journal to make your data more citable and
                        reliable.
                    </p>
                    <ul>
                        <li>Deposit your dataset in an online repository, obtain the DOI number or link to
                            the deposited dataset.
                        <li>
                        <li>Download and use the <a href="#">Microsoft Word template</a> or <a
                                href="#">LaTeX template</a> to prepare your data article.</li>
                        <li>Upload and send your data article to the <i>Data</i> journal <a href="#">here</a>.
                        </li>
                    </ul>
                    <button class="submit-btn">Submit To Data</button>
                </div>
            </div>
        </div>
        <div class="author-container">
            <div class="author-header">Author Information</div>
            <div class="author-body">
                <div class="custom-row"><span class="label">Submitting Author</span><span
                        class="value">{{ $manuscript->user->firstname }}</span>
                    {{-- user image --}}<img src="">
                    </span></div>

                <div class="custom-row d-flex" style="margin-left: 70px;"><span class="label">Corresponding
                        Authors</span>
                    @foreach ($manuscript->manuscriptAuthor as $author)
                        @if ($author->is_corresponding)
                            <span class="value ">{{ $author->firstname }}
                                {{-- <img> --}}
                            </span>
                        @endif
                    @endforeach
                </div>
                @php
                    $counter = 0;
                @endphp

                @foreach ($manuscript->manuscriptAuthor as $author)
                    @php
                        $counter++;
                    @endphp
                    <div class="custom-row"><span class="label">Author #{{ $counter }}</span>
                        <span class="value">{{ $author->firstname }}</span>
                        {{-- <img> if available --}}
                    </div>
                    <div class="custom-row"><span class="label">Affiliation</span><span
                            class="value">{{ $author->affiliation }}</span></div>
                    <div class="custom-row"><span class="label">E-Mail</span><span
                            class="value">{{ $author->email }}</span>
                        @if ($author->is_corresponding)
                            <span class="text-green-600">(corresponding author email)</span>
                        @else
                            <span class="text-gray-500">(co-author email will not be published)</span>
                        @endif
                    </div>
                @endforeach

            </div>
        </div>
        <div class="manuscript-container">
            <div class="manuscript-header">Manuscript Information</div>
            <div class="manuscript-body">
                @foreach ($manuscript->statuses as $currentStatus)
                    {{-- on rejected only this date will be showed --}}
                    @if ($currentStatus->status == 'submitted')
                        <div class="custom-row"><span class="label">Received Date
                            </span><span class="value">{{ $currentStatus->formatted_status_date }}</span></div>
                    @elseif($currentStatus->status == 'accepted')
                        <div class="custom-row"><span class="label">Accepted Date
                            </span><span class="value">{{ $manuscript->formatted_status_date }}</span></div>
                        {{-- when published/website_online --}}
                        {{-- <div class="custom-row"><span class="label">Published Date
                </span><span class="value">{{ $manuscript->formatted_created_at }}</span></div> --}}
                    @endif
                @endforeach
                {{-- page count --}}
                {{-- <div class="custom-row"><span class="label">Page Count</span><span class="value">Yeungnam
                        University</span></div> --}}
            </div>
        </div>
        {{-- <div class="apc-info-container">
            <div class="apc-info-header">APC Information</div>
            <div class="apc-info-body">
                <div class="custom-row"><span class="label">Journal APC</span><span class="value">2,600.00
                        CHF</span></div>
                <div class="custom-row"><span class="label">IOAP Participant</span><span class="value">Yeungnam
                        University</span></div>
                <div class="custom-row"><span class="label">IOAP Payment</span><span class="value">Non-central
                        Invoiced to author</span></div>
                <div class="custom-row"><span class="label">Author Eligible Central</span><span
                        class="value">No</span></div>
                <div class="custom-row"><span class="label">IOAP Discount</span><span class="value">10%</span>
                </div>
                <div class="custom-row"><span class="label">Total Payment Account</span><span
                        class="value">2,340.00 CHF</span></div>
            </div>
        </div> --}}
        <div class="funding-container">
            <div class="funding-header">Funding</div>
            <div class="funding-body">
                <div class="custom-row"><span class="label">Funding Information</span><span
                        class="value">{{ $manuscript->manuscriptStatement->funding_reason }}</span></div>
            </div>
        </div>
        @role('editor-in-chief', 'assistant-editor', 'associate-editor')
            {{-- @include('users.commonModal.postModal') --}}

            <div class="funding-container">
                <div class="funding-header">Suggested Reviewers</div>
                <div class="funding-body">

                    <div class="wrpper d-flex">

                        <div class="custom-row">
                            <span class="label">Reviewer 1 Firstname</span><span class="value"
                                id="reviewer1Firstname">{{ $manuscript->suggestedReviewer->suggested_reviewer_1_firstname }}</span>
                            <span class="label">Reviewer 1 Lastname</span><span class="value"
                                id="reviewer1Lastname">{{ $manuscript->suggestedReviewer->suggested_reviewer_1_lastname }}</span>
                            <span class="label">Reviewer 1 Email</span><span class="value"
                                id="reviewer1Email">{{ $manuscript->suggestedReviewer->suggested_reviewer_1_email }}

                            </span>
                            <span class="label">Reviewer 1 Affiliation</span><span class="value"
                                id="reviewer1Affiliation">{{ $manuscript->suggestedReviewer->suggested_reviewer_1_affiliation }}
                                <input type="checkbox" class="reviewer-checkbox" id="reviewer1"
                                    data-firstname="{{ $manuscript->suggestedReviewer->suggested_reviewer_1_firstname }}"
                                    data-lastname="{{ $manuscript->suggestedReviewer->suggested_reviewer_1_lastname }}"
                                    data-email="{{ $manuscript->suggestedReviewer->suggested_reviewer_1_email }}"
                                    data-affiliation="{{ $manuscript->suggestedReviewer->suggested_reviewer_1_affiliation }}"
                                    style="display: none;">
                            </span>
                        </div>
                        <div class="custom-row">
                            <span class="label">Reviewer 2 Firstname</span><span
                                class="value">{{ $manuscript->suggestedReviewer->suggested_reviewer_2_firstname }}</span>
                            <span class="label">Reviewer 2 Lastname</span><span
                                class="value">{{ $manuscript->suggestedReviewer->suggested_reviewer_2_lastname }}</span>
                            <span class="label">Reviewer 2 Email</span><span
                                class="value">{{ $manuscript->suggestedReviewer->suggested_reviewer_2_email }}
                            </span>
                            <span class="label">Reviewer 2 Affiliation</span><span
                                class="value">{{ $manuscript->suggestedReviewer->suggested_reviewer_2_affiliation }}
                                <input type="checkbox" class="reviewer-checkbox" id="reviewer2"
                                    data-firstname="{{ $manuscript->suggestedReviewer->suggested_reviewer_2_firstname }}"
                                    data-lastname="{{ $manuscript->suggestedReviewer->suggested_reviewer_2_lastname }}"
                                    data-email="{{ $manuscript->suggestedReviewer->suggested_reviewer_2_email }}"
                                    data-affiliation="{{ $manuscript->suggestedReviewer->suggested_reviewer_2_affiliation }}"
                                    style="display: none;">
                            </span>
                        </div>
                    </div>
                    <hr>
                    <form id="decisionForm">
                        @csrf
                        <input type="hidden" name="manuscript_id" value="{{ $manuscript->encoded_id }}">
                        <div class="wrapper2 d-flex">

                            <div class="custom-row">
                                <span class="label">Reviewer 3 Firstname</span><span
                                    class="value">{{ $manuscript->suggestedReviewer->suggested_reviewer_3_firstname }}</span>
                                <span class="label">Reviewer 3 Lastname</span><span
                                    class="value">{{ $manuscript->suggestedReviewer->suggested_reviewer_3_lastname }}</span>
                                <span class="label">Reviewer 3 Email</span><span
                                    class="value">{{ $manuscript->suggestedReviewer->suggested_reviewer_3_email }}
                                </span>
                                <span class="label">Reviewer 3 Affiliation</span><span
                                    class="value">{{ $manuscript->suggestedReviewer->suggested_reviewer_3_affiliation }}
                                    <input type="checkbox" class="reviewer-checkbox" id="reviewer3"
                                        data-firstname="{{ $manuscript->suggestedReviewer->suggested_reviewer_3_firstname }}"
                                        data-lastname="{{ $manuscript->suggestedReviewer->suggested_reviewer_3_lastname }}"
                                        data-email="{{ $manuscript->suggestedReviewer->suggested_reviewer_3_email }}"
                                        data-affiliation="{{ $manuscript->suggestedReviewer->suggested_reviewer_3_affiliation }}"
                                        style="display: none;">
                                </span>
                            </div>
                            <div class="d-flex align-items-start gap-2">
                                <label>Reject</label> <input class="" value="rejected" type="radio"
                                    name="decision" id="reject">
                                <label>Invite Reviewers</label> <input value="invited" class="" type="radio"
                                    name="decision" id="invite">
                            </div>

                        </div>
                        <div class="parentContiner reviewerTab" style="display: none;">

                            {{-- <div class="inputs-group append-container d-flex gap-2 align-items-start">
                                <input class="form-control email-field" placeholder="email" type="text"
                                    name="email[]">
                                <input class="form-control firstname-field" placeholder="firstname" type="text"
                                    name="firstname[]">
                                <input class="form-control lastname-field" placeholder="lastname" type="text"
                                    name="lastname[]">
                                <input class="form-control affiliation-field" placeholder="affiliation" type="text"
                                    name="affiliation[]">
                            </div> --}}

                        </div>
                        <div class="submit d-flex gap-2">
                            <button id="submitDecision" type="button" class="btn btn-primary mt-1 ">
                                Submit
                            </button>
                            <div class=" button-container w-100 text-center mt-2" style="display: none;">
                                <button id="addReviewer" type="button" class="btn btn-primary mt-1 ">
                                    + Add reviewer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
            @push('page-script')
                <script>
                    $(document).ready(function() {
                        $('#submitDecision').on('click', function() {
                            let params = $('#decisionForm').serialize();
                            let url = '{{ route('mansucript_details.submit_decision') }}'
                            Swal.fire({
                                title: "Are you sure?",
                                text: "By this action your decision will be confirmed!",
                                type: "warning",
                                showCancelButton: !0,
                                confirmButtonColor: "#405189",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Yes,Sure",
                                cancelButtonText: "Cancel",
                                didOpen: () => {
                                    document.querySelector('.swal2-icon').style.border = 'none';
                                }
                            }).then(function(t) {
                                if (t.value) {
                                    getAjaxRequests(url, params, 'POST', function(response) {}, true, 1500,
                                        'Decision Implemented Successfully!')
                                }
                            })
                        });
                        $('input[name="decision"]').on('change', function() {
                            if (this.id === 'reject') {
                                $('.reviewer-checkbox').hide(); // Hide checkboxes
                                $('.reviewerTab').hide();
                                $('.button-container').hide()
                            } else if (this.id === 'invite') {
                                $('.reviewer-checkbox').show();
                                $('.reviewerTab').show() // Show checkboxes
                                $('.button-container').show()
                            }
                        });

                        $('.reviewer-checkbox').on('change', function() {
                            const reviewerId = $(this).attr('id');
                            const containerClass = `${reviewerId}-inputs`;

                            if ($(this).is(':checked')) {
                                const firstname = $(this).data('firstname');
                                const lastname = $(this).data('lastname');
                                const email = $(this).data('email');
                                const affiliation = $(this).data('affiliation');

                                const hiddenFields = `
                                        <div class="inputs-group auto-generated ${containerClass}" style="display: none;">
                                            <input type="hidden" name="firstname[]" value="${firstname}">
                                            <input type="hidden" name="lastname[]" value="${lastname}">
                                            <input type="hidden" name="email[]" value="${email}">
                                            <input type="hidden" name="affiliation[]" value="${affiliation}">
                                        </div>`;

                                $('.parentContiner').append(hiddenFields);
                            } else {
                                $(`.${containerClass}`).remove();
                            }
                        });
                        $('#addReviewer').on('click', function() {
                            let oldContainer =
                                ` <div class="inputs-group append-container d-flex gap-2 mt-2 align-items-start ">
                            <input class="form-control email-field" placeholder="email" type="text" name="email[]">
                            <input class="form-control firstname-field" placeholder="firstname" type="text"
                                name="firstname[]">
                            <input class="form-control lastname-field" placeholder="lastname" type="text"
                                name="lastname[]">
                            <input class="form-control affiliation-field" placeholder="affiliation" type="text"
                                name="affiliation[]">
                                      <button class="btn btn-danger cross_icon remove-btn"><span>x</span></button>
                        </div>`;
                            $('.parentContiner').append(oldContainer)
                        })
                        $(document).on('click', '.remove-btn', function() {
                            $(this).parent().remove()
                        })
                        // Event delegation to handle dynamically added rows
                        $(document).on('focus', '.firstname-field', function() {
                            let $row = $(this).closest('.append-container');
                            let email = $row.find('.email-field').val().trim();

                            if (email !== '') {
                                $.ajax({
                                    url: '{{ route('mansucript_details.fetch_email_data') }}', // 🔁 Replace with your actual route
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        email: email
                                    },
                                    success: function(response) {
                                        if (response.data && response.data.firstname) {
                                            $row.find('.firstname-field').val(response.data.firstname);
                                            $row.find('.lastname-field').val(response.data.lastname);
                                            $row.find('.affiliation-field').val(response.data.affiliation);
                                        } else {
                                            console.log('Reviewer not found');
                                        }
                                    },
                                    error: function() {
                                        console.error('AJAX error occurred.');
                                    }
                                });
                            }
                        });
                    })
                </script>
            @endpush
        @endrole
    </div>
</x-app-layout>
