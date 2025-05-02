<div class="accordion-item">
    <h2 class="accordion-header d-flex " id="accordionwithplusExample{{ $recordType === 'firstRecord' ? '1' : $count }}">
        @if ($recordType === 'remove')
            <button class="btn btn-danger cross_icon remove-btn"><span>x</span></button>
        @endif
        <button @class([
            'accordion-button',
            'collapsed' => $recordType !== 'firstRecord',
        ]) type="button" data-bs-toggle="collapse"
            data-bs-target="#accor_plusExamplecollapse{{ $recordType === 'firstRecord' ? '1' : $count }}"
            aria-expanded="true"
            aria-controls="accor_plusExamplecollapse{{ $recordType === 'firstRecord' ? '1' : $count }}">
            <span class="auth-counter">
                Author {{ $recordType === 'firstRecord' ? '1' : $count }}
            </span>
        </button>

    </h2>
    <div id="accor_plusExamplecollapse{{ $recordType === 'firstRecord' ? '1' : $count }}" @class([
        'accordion-collapse',
        'collapse',
        'show' => $recordType === 'firstRecord',
    ])
        aria-labelledby="accordionwithplusExample{{ $recordType === 'firstRecord' ? '1' : $count }}"
        data-bs-parent="#accordionWithplusicon">
        <div class="accordion-body">

            <div class="row gy-2">
                <div class="col-xxl-12 col-md-12">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control author_email" id="author_email" name="author_email[]"
                        value="{{ @$author->email }}" placeholder="email" required>
                </div>
                <div class="col-xxl-12 col-md-12">
                    <label for="" class="form-label">Title</label>
                    <select class="form-control author_title" id="author_title" name="author_title[]">
                        <option value="" selected>Select Title</option>
                        @foreach ($titles as $title)
                            <option @selected(@$author->title === $title) value="{{ $title }}">{{ $title }}
                            </option>
                        @endforeach

                    </select>
                    {{-- <input type="text" class="form-control author_title" id="author_title" name="author_title[]"
                        value="{{ @$author->title }}" placeholder="title" required> --}}
                </div>
                <div class="col-xxl-12 col-md-12">
                    <label for="" class="form-label">Name</label>
                    <div class="row">

                        <div class="col-md-4 col-">
                            <input type="text" class="form-control author_firstname" name="author_firstname[]"
                                id="author_firstname" value="{{ @$author->firstname }}" placeholder="Firstname"
                                required>
                        </div>

                        <div class="col-md-4 col-">
                            <input type="text" class="form-control col-md-4 author_middlename"
                                name="author_middlename[]" id="author_middlename" value="{{ @$author->middlename }}"
                                placeholder="Middlename" required>
                        </div>
                        <div class="col-md-4 col-">
                            <input type="text" class="form-control col-md-4 author_lastname" name="author_lastname[]"
                                id="author_lastname" value="{{ @$author->lastname }}" placeholder="Lastname" required>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12 col-md-12">
                    <label for="" class="form-label">Affiliation</label>
                    <input type="text" class="form-control author_affiliation" name="author_affiliation[]"
                        id="author_affiliation" value="{{ @$author->affiliation }}"
                        placeholder="Department, College, University name, City, Postcode" required>
                </div>
                <div class="col-xxl-12 col-md-12">
                    <label for="" class="form-label">Country</label>
                    <select id="author{{ $recordType === 'firstRecord' ? '1' : $count }}" class="country"
                        name="author_country[]">
                        <option value="" selected>Select Country</option>
                        @foreach ($countries['countries'] as $key => $country)
                            <option @selected(@$country == @$author->country) value="{{ $country }}">{{ $country }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xxl-12 col-md-12">
                    <label for="" class="form-label">Corresponding
                        Author</label>
                    <div class="check-wrapper d-flex ms-1">
                        <div class="form-check ">
                            <input class="form-check-input co_author" value="1" type="radio"
                                name="{{ $recordType === 'firstRecord' ? 'co_author[1]' : "co_author[$count]" }}"
                                id="flexRadioDefault1" @checked(@$author->is_corresponding)>

                            <label class="form-check-label" for="flexRadioDefault1">
                                Yes
                            </label>
                        </div>
                        <div class="form-check ms-2">
                            <input class="form-check-input co_author" value="0" type="radio"
                                name="{{ $recordType === 'firstRecord' ? 'co_author[1]' : "co_author[$count]" }}"
                                id="flexRadioDefault2" @checked(!@$author->is_corresponding)>
                            <label class="form-check-label" for="flexRadioDefault2">
                                No
                            </label>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

{{-- <div class="secondParent row mt-2 justify-content-center align-items-end">
    <div class="col-xxl-3 col-md-4">
        <label class="form-label">Size</label>
        <select name="size_id[]" class="form-control">
            <option value="">Select Size</option>
            @foreach ($sizes as $size)
                <option @selected(@$selectedSize->id === $size->id) value="{{ $size->id }}">{{ $size->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-xxl-3 col-md-4">
        <label class="form-label">Available Stock</label>
        <input type="number" value="{{ @$selectedSize->pivot->stock_quantity }}" name="stock_quantity[]"
            class="form-control">
    </div>

    <div class="col-xxl-3 col-md-2">
        @if (isset($buttonType) && $buttonType === 'add')
            <button id="sizeAndStockAddRow" type="button" class="btn btn-primary px-3 py-1">
                <i class="ri-add-line" style="font-size: 18px;"></i>
            </button>
        @elseif(isset($buttonType) && $buttonType === 'remove')
            <button type="button" class="removeRow btn btn-danger px-3 py-1">
                <i class="ri-subtract-fill" style="font-size: 18px;"></i>
            </button>
        @endif
    </div>
</div> --}}
