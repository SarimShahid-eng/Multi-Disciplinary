<x-admin-layout>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center pb-2 ">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($admin) ? 'Edit' : 'Add' }} admin</h4>
                    <div><a href="{{ route('admin.index') }}" class="btn btn-success d-flex align-items-center"><i
                                style="font-size: 15px;" class="ri-arrow-left-line me-1"></i> Back </a>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form class="row g-3 needs-validation ajaxForm" novalidate action="{{ route('admin.store') }}"
                            method="post">
                            @csrf
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ @$admin->name }}"
                                    placeholder="Name" required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ @$admin->email }}"
                                    placeholder="Email" required>
                            </div>

                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Password</label>
                                <input type="text" class="form-control" name="password" value=""
                                    placeholder="password">
                            </div>


                            <input type="hidden" name="update_id" value="{{ @$admin->id }}">
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit"> {{ isset($admin) ? 'Edit' : 'Add' }}
                                    admin
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-admin-layout>
