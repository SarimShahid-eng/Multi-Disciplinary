<x-admin-layout>

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Article Type List</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <button type="button" class="btn btn-success add-btn"
                                                id="create-article"><i class="ri-add-line align-bottom me-1"></i>
                                                Add</button>

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
                                @include('admin.article_type.add_modal')

                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>

                                                <th class="sort" data-sort="name">Name</th>
                                                <th class="sort" data-sort="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @foreach ($article_types as $article_type)
                                                <tr>
                                                    <td class="name">{{ $article_type->name }}</td>
                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            <div class="edit">
                                                                <button id="edit-article-type" {{-- onclick="ajaxRequest(this)" --}}
                                                                    data-url="{{ route('admin.article_type.edit', $article_type) }}"
                                                                    class="btn btn-sm btn-success edit-item-btn">Edit</button>
                                                            </div>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                {{ $article_types->links('pagination::bootstrap-5') }}
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
                $('#edit-article-type').on('click', function() {
                    let url = $(this).data('url');
                    getAjaxRequests(url, '', "GET", function(response) {
                        $('#articleTypeModal').modal('show')
                        $('#update_id').val(response.data.id);
                        $('#name').val(response.data.name);
                        $('#submitBtn').text('Update');
                    })
                })
                $('#create-article').on('click', function() {
                    $('#articleTypeModal').modal('show')
                })
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
