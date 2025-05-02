<x-manuscript-layout>
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
    </style>
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
                    <option @selected(@$journal->id === @$manuscript->journal_id) value="{{ $journal->id }}">
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
            <select id="article_type" class="js-example-basic-single" name="article_type_id">
                <option value="" selected>Select Article Type</option>

                @foreach ($article_types as $article_type)
                    <option @selected(@$article_type->id === @$manuscript->article_type_id) value="{{ $article_type->id }}">
                        {{ $article_type->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-xxl-12 col-md-12">
            <label for="" class="form-label">Title</label>
            <input type="text" value="{{ @$manuscript->title }}" id="title" class="form-control" name="title"
                placeholder="Title" required>
        </div>
        <div class="col-xxl-12 col-md-12">
            <label for="" class="form-label">Abstract</label>
            <textarea class="form-control" id="abstract" name="abstract" placeholder="Write Abstract" cols="30"
                rows="10">{{ @$manuscript->abstract }}</textarea>

        </div>

        <div class="col-xxl-12 col-md-12">
            <label for="" class="form-label">Keywords</label>
            <div class="tags-container">
                {{-- @isset($manuscipt->keywords)
                    <span class="tag"><span class="remove-tag">&times;</span> </span>
                @endisset --}}
                <input type="text" class="form-control tags-input" id="keywords" value=""
                    placeholder="keywords">
            </div>
            <input type="hidden" name="keyword" id="tags-hidden"
                value="@isset($manuscript->keywords)@foreach ($manuscript->keywords as $keyword){{ $keyword }};
                        @endforeach @endisset">
        </div>


        <div class="row align-items-center justify-content-between mt-3">

            <div class="col-lg-12 col-6 d-flex justify-content-end">
                <button type="button" id="submitManuscript" class="btn btn-primary d-flex alig-items-center ">
                    Proceed To Next Step <i class="ri-arrow-right-line ms-2"></i>
                </button>
            </div>
        </div>
    </div>
    </div>
    @push('page-script')
        <script>
            $(document).ready(function() {

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
                        manuscript_id: "{{ $manuscriptId }}"
                    }

                    removeDisableBtn(this, btnHtml);
                    getAjaxFileRequests(url, params, 'POST', function(response) {
                        console.log('success')
                    })
                })
                let tags = [];

                function updateHiddenInput() {
                    $("#tags-hidden").val(tags.join(","));
                }

                // Load existing keywords if editing
                let existingTags = $("#tags-hidden").val();
                if (existingTags) {
                    tags = existingTags.split(";").map(tag => tag.trim()).filter(tag => tag.length >
                        0);
                    console.log(tags)
                    tags.forEach(tag => {
                        $(".tags-container").append(
                            `<span class="tag"><span class="remove-tag">&times;</span>${tag}</span>`
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
            })
        </script>
    @endpush
</x-manuscript-layout>
