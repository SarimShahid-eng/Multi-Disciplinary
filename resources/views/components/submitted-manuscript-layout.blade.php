<x-app-layout>
    <div class="row">

        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header pb-1">
                    <ul class="d-flex ps-0">

                        <x-submitted-manuscript-tab route="submitted_manuscripts.incomplete_manuscripts"
                            label="Incomplete Submissions (2)" />
                        <x-submitted-manuscript-tab route="submitted_manuscripts.under_processing_manuscripts"
                            label="Under Processing (2)" />
                        <x-submitted-manuscript-tab route="submitted_manuscripts.website_online_manuscripts"
                            label="Website Online (2)" />
                        <x-submitted-manuscript-tab route="submitted_manuscripts.reject_withdrawn_manuscripts"
                            label="Rejected / Withdrawn / Archived (2)" />
                    </ul>

                </div>
                <div class="card-body p-4">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
