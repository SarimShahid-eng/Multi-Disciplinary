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
    </style>
    <form class=" needs-validation ajax-image-Form" action="{{ route('submission.store') }}" method="post">
        @csrf
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center pb-2">
                        <h4 class="card-title mb-0 flex-grow-1">{{ isset($submission) ? 'Edit' : 'Add' }} submission
                        </h4>
                        <div><a href="{{ route('submission.index') }}"
                                class="btn btn-success d-flex align-items-center"><i style="font-size: 15px;"
                                    class="ri-arrow-left-line me-1"></i> Back </a>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview row gy-3">

                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title"
                                    value="{{ @$submission->title }}" placeholder="Title" required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Abstract</label>
                                <textarea class="form-control" name="abstract" placeholder="Write Abstract" cols="30"
                                    rows="10"{{ @$submission->abstract }}"></textarea>
                                {{-- <input type="text" class="form-control" name="abstract" value=""
                                    placeholder="Abstract" required> --}}
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Keywords</label>
                                <div class="tags-container">
                                    <input type="text" class="form-control tags-input" name="keywords"
                                        value="{{ @$submission->keywords }}" placeholder="keywords">
                                </div>
                                <input type="hidden" name="tags" id="tags-hidden">
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Upload File</label>
                                <input type="file" class="form-control" name="file">
                            </div>
                            {{-- journal selection --}}

                            <div class="col-xxl-12 col-md-12">
                                <label for="country" class="d-block">Select Jounrnal</label>
                                <select class="js-example-basic-single" name="journal_id">
                                    <option value="" selected>Select Journal</option>

                                    @foreach ($journals as $journal)
                                        <option @selected(@$journal->id === @$submission->journal_id) value="{{ $journal->id }}">
                                            {{ $journal->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>



                        </div>
                        {{-- <h5 class="mt-3 mb-2 bg-primary text-center text-white p-2">Suggest Reviewers</h5>
                        <div class="row gy-3">


                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ @$submission->name }}" placeholder="name" required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email"
                                    value="{{ @$submission->email }}" placeholder="email" required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Affiliation</label>
                                <input type="text" class="form-control" name="affiliation"
                                    value="{{ @$submission->affiliation }}" placeholder="affiliation" required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Reason</label>
                                <input type="text" class="form-control" name="reason"
                                    value="{{ @$submission->reason }}" placeholder="reason" required>
                            </div>
                        </div>
                        <input type="hidden" name="update_id" value="{{ @$submission->id }}">
                        <div class="col-12 mt-3">
                            <button class="btn btn-primary" type="submit">
                                {{ isset($submission) ? 'Edit' : 'Add' }}
                                submission
                            </button>
                        </div> --}}
    </form>
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
                let tags = [];

                function updateHiddenInput() {
                    $("#tags-hidden").val(tags.join(",")); // Store updated tags
                }

                // Load existing keywords if editing
                let existingTags = $("input[name='keywords']").val();
                if (existingTags) {
                    tags = existingTags.split(",").map(tag => tag.trim());
                    tags.forEach(tag => {
                        $(".tags-container").prepend(
                            `<span class="tag"><span class="remove-tag">&times;</span> ${tag} </span>`
                        );
                    });
                    updateHiddenInput();
                }

                // Add new keyword on Enter or Comma
                $(".tags-input").on("keypress", function(e) {
                    if (e.key === "Enter" || e.key === ",") {
                        e.preventDefault();
                        let tagText = $(this).val().trim();
                        if (tagText && !tags.includes(tagText)) {
                            tags.push(tagText);
                            $(".tags-container").prepend(
                                `<span class="tag"><span class="remove-tag">&times;</span> ${tagText} </span>`
                            );
                            $(this).val("");
                            updateHiddenInput();
                        }
                    }
                });

                // Remove a keyword on clicking `×`
                $(document).on("click", ".remove-tag", function() {
                    let tagText = $(this).parent().text().slice(0, -2);
                    tags = tags.filter(tag => tag !== tagText);
                    $(this).parent().remove();
                    updateHiddenInput();
                });
            });
        </script>
        {{-- <script>
            $(document).ready(function() {
                let tags = [];

                function updateHiddenInput() {
                    $("#tags-hidden").val(tags.join(","));
                }

                $(".tags-input").on("keypress", function(e) {
                    if (e.key === "Enter" || e.key === ",") {
                        e.preventDefault();
                        let tagText = $(this).val().trim();
                        if (tagText && !tags.includes(tagText)) {
                            tags.push(tagText);
                            $(".tags-container").prepend(
                                `<span class="tag"><span class="remove-tag">&times;</span> ${tagText} </span>`
                            );
                            $(this).val("");
                            updateHiddenInput();
                        }
                    }
                });

                $(document).on("click", ".remove-tag", function() {
                    let tagText = $(this).parent().text().slice(0, -2);
                    tags = tags.filter(tag => tag !== tagText);
                    $(this).parent().remove();
                    updateHiddenInput();
                });
            });
        </script> --}}
    @endpush
</x-app-layout>
