<x-admin-layout>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center pb-2">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($volume) ? 'Edit' : 'Add' }} Volume</h4>
                    <div><a href="{{ route('admin.volume.index') }}" class="btn btn-success d-flex align-items-center"><i
                                style="font-size: 15px;" class="ri-arrow-left-line me-1"></i> Back </a>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form class="row g-3 needs-validation ajaxForm" novalidate
                            action="{{ route('admin.volume.store') }}" method="post">
                            @csrf
                            <div class="col-xxl-12 col-md-12">
                                <label for="country" class="d-block">Select Journal</label>
                                <select class="js-example-basic-single" name="journal_id">
                                    <option value="" selected>Select Journal</option>
                                    @foreach ($journals as $journal)
                                        <option @selected(@$journal->name === @$volume->journal->name) value="{{ $journal->id }}">
                                            {{ $journal->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="Select Year" class="d-block">Select Year</label>
                                <select class="form-control" id="dropdownYear" name="year">
                                    <option value="" selected>Select Year</option>
                                </select>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Start Date</label>
                                <input name="start_date" type="date" value="{{ @$volume->start_date }}"
                                    class="form-control">
                            </div>
                            <div class="col-xxl-12 col-md-12">

                                <label for="" class="form-label">End Date</label>
                                <input name="end_date" type="date" value="{{ @$volume->end_date }}"
                                    class="form-control">
                            </div>

                            <input type="hidden" name="update_id" value="{{ @$volume->id }}">
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit"> {{ isset($volume) ? 'Edit' : 'Add' }}
                                    Volume
                                </button>
                            </div>
                        </form>
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
                $('#dropdownYear').each(function() {

                    var year = (new Date()).getFullYear();
                    var current = year;
                    for (var i = 0; i < 6; i++) {
                        if ((year + i) == current)
                            $(this).append('<option selected value="' + (year + i) + '">' + (year + i) +
                                '</option>');
                        else
                            $(this).append('<option value="' + (year + i) + '">' + (year + i) + '</option>');
                    }
                })
            })
        </script>
    @endpush
</x-admin-layout>
