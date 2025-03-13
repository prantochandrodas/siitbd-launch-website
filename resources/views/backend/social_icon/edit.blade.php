<!-- Modal Header -->
<div class="modal-header" style="background-color: #333333; border-bottom: 1px solid #ccc;">
    <h5 class="modal-title" id="socialIconEditModalLabel" style="color: #ffffff;">Edit Social-Icon</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<!-- Modal Body -->
<div class="modal-body">
    <form id="socialIconEditModalForm" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <!-- name -->
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label fw-bold text-dark">Name:</label>
                <input type="text" class="form-control border-dark" id="name" name="name"
                    placeholder="Enter name" value="{{ $data->name }}">
                <div class="invalid-feedback name-error"></div>
            </div>


            <!-- url -->
            <div class="col-md-6 mb-3">
                <label for="url" class="form-label fw-bold text-dark">Url:</label>
                <input type="text" class="form-control border-dark" id="url" name="url"
                    placeholder="Enter url" value="{{ $data->url }}">
                <div class="invalid-feedback url-error"></div>
            </div>
            <!-- Image Upload -->
            <div class="col-md-6 mb-3">
                <label for="image" class="form-label fw-bold text-dark">Image:</label>
                <input type="file" class="form-control border-dark" id="image" name="image" accept="image/*">
                <div class="invalid-feedback image-error"></div>
                <img src="{{ asset('image/' . $data->image) }}" width="50" alt="" class="mt-2">
            </div>

        </div>


        <input type="hidden" value="{{ $data->id }}" id="data_id">
        <!-- Submit Button -->
        <div class="text-end">
            <button type="submit" class="btn submit-btn"
                style="background-color: #FF4C29; color: #ffffff; border-radius: 5px;">
                Update Slider
            </button>
        </div>
    </form>
</div>

<!-- Modal Footer -->
<div class="modal-footer" style="background-color: #f8f9fa; border-top: 1px solid #ccc;">
    <button type="button" class="btn" style="background-color: #FF4C29; color: #ffffff; border-radius: 5px;"
        data-bs-dismiss="modal">Close</button>
</div>
<script>
    $(document).ready(function() {
        $("#socialIconEditModalForm").on("submit", function(e) {

            // showLoading();
            e.preventDefault(); // Prevent default form submission

            let formData = new FormData(this);
            let dataId = $("#data_id").val();

            $.ajax({
                url: "{{ route('social.icon.update', ':id') }}".replace(':id', dataId),
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $(".invalid-feedback").text("").hide(); // Clear previous errors
                },
                success: function(response) {
                    if (response.success) {
                        // Success message


                        // Reset form and close modal
                        $("#socialIconEditModalForm")[0].reset();
                        $("#socialIconEditModal").modal("hide");

                        hideLoading();
                        window.location.href =
                            "{{ route('social.icon.index') }}?added-successfully=" +
                            encodeURIComponent(response.message);

                    }
                },
                error: function(xhr) {
                    // hideLoading();
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;

                        // Display validation errors
                        if (errors.title) {
                            $(".title-error").text(errors.title[0]).show();
                        }
                        if (errors.short_description) {
                            $(".short-description-error").text(errors.short_description[0])
                                .show();
                        }
                        if (errors.image) {
                            $(".image-error").text(errors.image[0]).show();
                        }

                        // Auto-hide error messages after 3 seconds
                        setTimeout(function() {
                            $(".invalid-feedback").fadeOut();
                        }, 3000);
                    }
                }
            });
        });
    });
</script>
