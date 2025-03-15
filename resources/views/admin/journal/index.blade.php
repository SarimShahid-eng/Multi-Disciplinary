<x-admin-layout>

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Journal List</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="{{ route('admin.journal.create') }}"
                                                class="btn btn-success add-btn" id="create-btn"><i
                                                    class="ri-add-line align-bottom me-1"></i> Add</a>

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

                                                <th class="sort" data-sort="name">Name</th>
                                                <th class="sort" data-sort="issn">Issn</th>
                                                <th class="sort" data-sort="editor_in_chief_first">Editor In Chief
                                                    F.Name
                                                </th>
                                                <th class="sort" data-sort="editor_in_chief_last">Editor In Chief
                                                    L.Name
                                                </th>
                                                <th class="sort" data-sort="description">description</th>
                                                <th class="sort" data-sort="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @foreach ($journals as $journal)
                                                <tr>
                                                    <td class="name">{{ $journal->name }}</td>
                                                    <td class="issn">{{ $journal->issn }}</td>
                                                    <td class="editor_in_chief_first">
                                                        {{ $journal->editor_in_chief->firstname }}
                                                    </td>
                                                    <td class="editor_in_chief_last">
                                                        {{ $journal->editor_in_chief->lastname }}
                                                    </td>
                                                    <td class="description">{{ $journal->description }}</td>
                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            <div class="edit">
                                                                <a href="{{ route('admin.journal.edit', $journal) }}"
                                                                    class="btn btn-sm btn-success edit-item-btn">Edit</a>
                                                            </div>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                {{ $journals->links('pagination::bootstrap-5') }}
                            </div>
                        </div><!-- end card -->
                    </div>
                    <!-- end col -->
                </div>

                <!-- end col -->
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
</x-admin-layout>
