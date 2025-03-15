<x-admin-layout>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center pb-2 ">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($user) ? 'Edit' : 'Add' }} User</h4>
                    <div><a href="{{ route('admin.user.index') }}" class="btn btn-success d-flex align-items-center"><i
                                style="font-size: 15px;" class="ri-arrow-left-line me-1"></i> Back </a>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form class="row g-3 needs-validation ajaxForm" novalidate
                            action="{{ route('admin.user.store') }}" method="post">
                            @csrf
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Firstname</label>
                                <input type="text" class="form-control" name="firstname"
                                    value="{{ @$user->firstname }}" placeholder="Firstname" required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Lastname</label>
                                <input type="text" class="form-control" name="lastname"
                                    value="{{ @$user->lastname }}" placeholder="Lastname" required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ @$user->email }}"
                                    placeholder="Email" required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username"
                                    value="{{ @$user->username }}" placeholder="username" required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Password</label>
                                <input type="text" class="form-control" name="password" value=""
                                    placeholder="password">
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="" class="form-label">Affiliation</label>
                                <input type="text" class="form-control" name="affiliation"
                                    value="{{ @$user->affiliation }}" placeholder="affiliation" required>
                            </div>
                            <div class="col-xxl-12 col-md-12">
                                <label for="country" class="d-block">Select Country</label>
                                <select class="js-example-basic-single" name="country">
                                    <option value="" selected>Select Country</option>
                                    @foreach ($countries as $country)
                                        <option @selected(@$user->country === $country) value="{{ $country }}">
                                            {{ $country }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xxl-12 col-md-12">
                                <label for="iconInput" class="form-label">Roles</label>
                                <select class="js-example-basic-multiple" name="role_id[]" multiple="multiple">
                                    @foreach ($roles as $role)
                                        <option @selected(in_array($role->id, @$user->roles?->pluck('id')->toArray() ?? [])) value="{{ $role->id }}">
                                            {{ ucfirst($role->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="update_id" value="{{ @$user->id }}">
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit"> {{ isset($user) ? 'Edit' : 'Add' }}
                                    user
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
