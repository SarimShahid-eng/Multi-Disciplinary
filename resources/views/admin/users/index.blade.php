<x-admin-layout>

    {{-- <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Module list</h4>


            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center pb-2">
                            <h4 class="card-title mb-0">Users List</h4>

                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="{{ route('admin.user.create') }}" class="btn btn-success add-btn"
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

                                                <th class="sort" data-sort="name">Name</th>
                                                <th class="sort" data-sort="username">Username</th>
                                                <th class="sort" data-sort="email">Email</th>
                                                {{-- <th class="sort" data-sort="affiliation">Affiliation</th> --}}
                                                <th class="sort" data-sort="roles">Roles</th>
                                                {{-- <th class="sort" data-sort="country">Country</th> --}}
                                                <th class="sort" data-sort="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td class="name">{{ $user->name }}</td>
                                                    <td class="username">{{ $user->username }}</td>
                                                    <td class="email">{{ $user->email }}</td>

                                                    <td class="roles">
                                                        @foreach ($user->roles as $role)
                                                            <span
                                                                @class([
                                                                    'badge',
                                                                    'bg-danger-subtle' => $role->name === 'author',
                                                                    'text-danger' => $role->name === 'author',
                                                                    'bg-info-subtle' => $role->name === 'reviewer',
                                                                    'text-info' => $role->name === 'reviewer',
                                                                    'bg-warning-subtle' => $role->name === 'editor-in-chief',
                                                                    'text-warning' => $role->name === 'editor-in-chief',
                                                                    'bg-success-subtle' => $role->name === 'assistant-editor',
                                                                    'text-success' => $role->name === 'assistant-editor',
                                                                    'bg-primary-subtle' => $role->name === 'associate-editor',
                                                                    'text-primary' => $role->name === 'associate-editor',
                                                                ])>{{ Str::ucfirst($role->name) }}
                                                            </span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-2">

                                                            <div class="edit">
                                                                <a href="{{ route('admin.user.edit', $user) }}"
                                                                    class="btn btn-sm btn-success edit-item-btn">Edit</a>
                                                            </div>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                {{ $users->links('pagination::bootstrap-5') }}
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
