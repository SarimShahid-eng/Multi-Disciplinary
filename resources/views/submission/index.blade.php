<x-app-layout>

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Submission List</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="{{ route('submission.create') }}" class="btn btn-success add-btn"
                                                id="create-btn"><i class="ri-add-line align-bottom me-1"></i> Add</a>

                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control search_filter"
                                                    placeholder="Search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>

                                                <th class="sort" data-sort="title">Title</th>
                                                <th class="sort" data-sort="abstract">Abstract</th>
                                                <th class="sort" data-sort="file_path">File Path</th>
                                                <th class="sort" data-sort="keywords">Keywords</th>
                                                <th class="sort" data-sort="status">Status</th>
                                                {{-- <th class="sort" data-sort="action">Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @foreach ($submissions as $submission)
                                                <tr>
                                                    <td class="title">{{ $submission->title }}</td>
                                                    <td class="abstract">{{ $submission->abstract }}</td>
                                                    <td class="file_path">{{ $submission->file_path }}
                                                    </td>
                                                    <td class="keywords">
                                                        @foreach ($submission->keywords as $keyword)
                                                            <span
                                                                class="badge bg-primary-subtle text-primary">{{ $keyword }}</span>
                                                        @endforeach
                                                    </td>
                                                    <td class="status">{{ $submission->status }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                {{ $submissions->links('pagination::bootstrap-5') }}
                            </div>
                        </div><!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    @push('page-script')
        <script>
            $(document).ready(function() {
                $('.search_filter').on('keyup', function() {
                    search_table($(this).val());
                })
            })

            function search_table(value) {
                $('table tbody tr').each(function() {
                    var found = 'false';
                    $(this).each(function() {
                        if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                            found = 'true';
                        }
                    });
                    if (found == 'true') {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }
        </script>
    @endpush
</x-app-layout>
