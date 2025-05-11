<x-admin-layout>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center pb-2">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($journal) ? 'Edit' : 'Add' }} Journal</h4>
                    <div><a href="{{ route('admin.journal.index') }}" class="btn btn-success d-flex align-items-center"><i
                                style="font-size: 15px;" class="ri-arrow-left-line me-1"></i> Back </a>
                    </div>
                </div>
                <!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form class="row g-3 needs-validation ajaxForm" novalidate
                            action="{{ route('admin.journal.store') }}" method="post">
                            @csrf
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ @$journal->name }}"
                                    placeholder="Name" required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ @$journal->email }}"
                                    placeholder="Email" required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Issn</label>
                                <input type="text" class="form-control" name="issn" value="{{ @$journal->issn }}"
                                    placeholder="Issn" required>
                            </div>

                            <div class="col-xxl-12 col-md-12">
                                <label for="country" class="d-block">Select Editor In Chief</label>
                                <select class="js-example-basic-single" name="editor_in_chief_id">
                                    <option value="" selected>Select Editor In Chief</option>

                                    @foreach ($users as $editorInChief)
                                        <option @selected(@$editorInChief->id === @$journal->editor_in_chief_id) value="{{ $editorInChief->id }}">
                                            {{ $editorInChief->firstname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Descriptions</label>
                                <textarea class="form-control" name="description" placeholder="Enter description" id="" cols="30"
                                    rows="10">{{ @$journal->description }}</textarea>
                            </div>

                            <input type="hidden" name="update_id" value="{{ @$journal->id }}">
                            {{-- @endisset --}}
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit"> {{ isset($journal) ? 'Edit' : 'Add' }}
                                    Journal
                                </button>
                            </div>
                        </form>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
