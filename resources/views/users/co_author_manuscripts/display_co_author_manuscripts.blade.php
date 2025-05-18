<x-app-layout>
    <div class="row">

        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header pb-1">
                    <h5>
                        Display Co author manuscripts
                    </h5>

                </div>
                <div class="card-body pt-0 pb-0">
                    <table class="table p-0">
                        <thead>
                            <tr>
                                <th class="manuscriptId">Manuscript ID</th>
                                <th class="journal">Journal</th>
                                <th class="title">Title</th>
                                <th class="status">Status</th>
                                <th class="submission_date">Submission Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($manuscripts as $manuscript)
                            <tr>
                                <td>{{ $manuscript->manuscriptId }}</td>
                                <td>{{ $manuscript->journal->name }}</td>
                                <td>{{ $manuscript->title }}</td>
                                <td>{{ $manuscript->latestStatus->status }}</td>
                                <td>{{ $manuscript->formatted_created_at }}</td>

                                <td>
                                    <a
                                        href="{{ route('mansucript_details.view_manuscript_details', ['manuscriptId' => $manuscript->encoded_id]) }}">
                                        <i data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            data-bs-original-title="view"
                                            class="ri-search-line text-primary fw-medium"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="text-center">

                                        <span class="fw-medium">No Records Found</span>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
