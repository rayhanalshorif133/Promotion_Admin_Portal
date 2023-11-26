{{-- Create Modal --}}
<div class="modal fade" id="createCountry" tabindex="-1" role="dialog" aria-labelledby="createCountryLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCountryLabel">
                    Create New Country
                </h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('country.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="required">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Country name">
                        <label for="name" class="required text-danger">Space not allowed </label>
                    </div>
                    <div class="form-group">
                        <label for="status" class="required">Select status</label>
                        <select class="form-control" name="status" id="status">
                            <option selected value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- update Modal --}}
<div class="modal fade" id="updateCountry" tabindex="-1" role="dialog" aria-labelledby="updateCountryLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateCountryLabel">
                    Update Country
                </h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('country.update') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="country_id">
                    <div class="form-group">
                        <label for="updateName" class="required">Name</label>
                        <input type="text" class="form-control" id="updateName" name="name"
                            placeholder="Country name">
                        <label for="updateName" class="required text-danger">Space not allowed </label>
                    </div>
                    <div class="form-group">
                        <label for="updateStatus" class="required">Select status</label>
                        <select class="form-control" name="status" id="updateStatus">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
