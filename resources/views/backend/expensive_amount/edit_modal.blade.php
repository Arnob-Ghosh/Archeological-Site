<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="" id="updateForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Edit Expensive Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <div class="errMsgContainer mb-2"></div> --}}
                    <input type="hidden" name="expensiveType_id" id="expensiveType_id">
                    {{-- <input type="hidden" name="speech_img" id="speech_img"> --}}

                    <div class="col-md-5">
                        <label class="form-label" >Expensive Type </label>
                        <select class="selectpicker form-control" data-live-search="true" name="expensive" id="edit_expensive">
                            <option  disabled selected>plesse select</option>
                            @foreach ( $expensiveTypes as $expensiveType )
                                <option value="{{ $expensiveType->name }}">{{ $expensiveType->name }}</option>
                            @endforeach
                            <!-- Add more years as needed -->
                        </select>
                        <div class="expensiveError text-danger errors d-none"></div>
                    </div>
                    <div class="col-md-5">
                        <label for="" class="form-label">Expensive Amount</label>
                        <input type="number" name="expensive_amount" class="form-control" id="edit_expensive_amount">
                        <div class="expensive_amountError text-danger errors d-none"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary update_user_btn">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
