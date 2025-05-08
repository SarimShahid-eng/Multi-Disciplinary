<x-app-layout>
    <div class="row">

        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header pb-1">
                    <ul class="d-flex ps-0 mb-1">
                        @php
                            $incompleteCount = Cache::get('incompleteCount');
                            $underReview = Cache::get('underReview');
                            $accepted = Cache::get('accepted');
                            $rejected = Cache::get('rejected');
                        @endphp
                        <x-submitted-manuscript-tab route="submitted_manuscripts.incomplete_manuscripts"
                            label="Incomplete Submissions ({{ $incompleteCount }})" />
                        <x-submitted-manuscript-tab route="submitted_manuscripts.under_processing_manuscripts"
                            label="Under Processing ({{ $underReview }})" />
                        <x-submitted-manuscript-tab route="submitted_manuscripts.website_online_manuscripts"
                            label="Website Online ({{ $accepted }})" />
                        <x-submitted-manuscript-tab route="submitted_manuscripts.reject_withdrawn_manuscripts"
                            label="Rejected / Withdrawn / Archived ({{ $rejected }})" />
                    </ul>

                </div>
                <div class="card-body pt-0 pb-0">
                    <table class="table p-0">
                        <thead>
                            <tr>
                                <th class="manuscriptId">ManuscriptId</th>
                                <th class="journal">Journal</th>
                                {{-- <th class="section">Section/Special Issue</th> --}}
                                <th class="title">Title</th>
                                <th class="status">Status</th>
                                <th class="submission_date">Submission Date</th>
                                <th class="action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{ @$rows }}
                        </tbody>
                    </table>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
