<x-app-layout>
    @include('users.commonModal.modal')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Manuscripts Decisions</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">


                                <div class="table-responsive table-card  mb-1">
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>

                                                <th class="sort" data-sort="manuscriptID">ManuscriptID</th>
                                                <th class="sort" data-sort="journal">Journal</th>
                                                <th class="sort" data-sort="submissionDate">Submission Date</th>
                                                <th class="sort" data-sort="">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @foreach ($manuscripts as $manuscript)
                                                <tr>
                                                    <td class="title">{{ $manuscript->manuscriptId }}</td>
                                                    <td class="abstract">{{ $manuscript->journal->name }}</td>

                                                    {{-- <td class="changeStatus">
                                                        @if ($manuscript->latestStatus->status == 'under review')
                                                            <button
                                                                data-url="{{ route('decision.reject_manuscript', $manuscript) }}"
                                                                class="reject
                                                            btn btn-danger btn-sm">
                                                                Reject
                                                            </button>
                                                            <button
                                                                data-url="{{ route('decision.accept_manuscript', $manuscript) }}"
                                                                class="accept btn btn-success btn-sm">
                                                                Accept
                                                            </button>
                                                        @elseif($manuscript->latestStatus->status == 'submitted')
                                                            <button
                                                                data-url="{{ route('decision.under_review_manuscript', $manuscript) }}"
                                                                class="underReview
                                                            btn btn-primary btn-sm">
                                                                Under Review
                                                            </button>
                                                        @else
                                                            <span @class([
                                                                'fw-medium',
                                                                'text-success' => $manuscript->latestStatus->status == 'accepted',
                                                                'text-danger' => $manuscript->latestStatus->status == 'rejected',
                                                                'text-info' => $manuscript->latestStatus->status == 'under review',
                                                            ])>
                                                                {{ ucfirst($manuscript->latestStatus->status) }}
                                                            </span>
                                                        @endif
                                                    </td> --}}

                                                    <td class="submissionDate">
                                                        {{ $manuscript->formatted_created_at }}
                                                    </td>

                                                    <td class="">
                                                        <a href="{{ route('mansucript_details.view_manuscript_details',$manuscript->encoded_id) }}">
                                                        <i data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="view" class="ri-search-line text-primary fw-medium" ></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                {{ $manuscripts->links('pagination::bootstrap-5') }}
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
            $('.reject').on('click', function() {
                var currentUrl = $(this).data('url');

                $('#remove_data').modal('show');
                $('.customText').text('Are you sure you want to reject this manuscript?');
                $('.notfiy_me').attr('data-url', currentUrl)
            });
            $('.accept').on('click', function() {
                var currentUrl = $(this).data('url');
                $('#remove_data').modal('show');
                $('.customText').text('Are you sure you want to accept this manuscript?');
                $('.notfiy_me').attr('data-url', currentUrl)
            });
            $('.underReview').on('click', function() {
                var currentUrl = $(this).data('url');
                $('#remove_data').modal('show');
                $('.customText').text('Are you sure you wanted this manuscript to be under reviewed?');
                $('.notfiy_me').attr('data-url', currentUrl)

            });
        </script>
    @endpush
</x-app-layout>
