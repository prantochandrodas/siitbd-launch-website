<div class="modal fade" id="socialIconCreateModal" tabindex="-1" aria-labelledby="socialIconCreateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #f8f9fa; border-radius: 8px; border: 1px solid #ddd;">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #333333; border-bottom: 1px solid #ccc;">
                <h5 class="modal-title" id="socialIconCreateModalLabel" style="color: #ffffff;">Create New Social-Icon
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="socialIconCreateModalForm" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- name -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label fw-bold text-dark">Name:</label>
                            <input type="text" class="form-control border-dark" id="name" name="name"
                                placeholder="Enter name">
                            <div class="invalid-feedback name-error"></div>
                        </div>
                        <!-- Image Upload -->
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label fw-bold text-dark">Image : <span
                                    class="text-danger ml-1">*</span></label>
                            <input type="file" class="form-control border-dark" id="image" name="image"
                                accept="image/*">
                            <div class="invalid-feedback image-error"></div>
                        </div>

                        <!-- url -->
                        <div class="col-md-6 mb-3">
                            <label for="url" class="form-label fw-bold text-dark">Url:</label>
                            <input type="text" class="form-control border-dark" id="url" name="url"
                                placeholder="Enter url">
                            <div class="invalid-feedback url-error"></div>
                        </div>

                    </div>



                    <!-- Submit Button -->
                    <div class="text-end">
                        <button type="submit" class="btn submit-btn"
                            style="background-color: #FF4C29; color: #ffffff; border-radius: 5px;">
                            Create Social-Icon
                        </button>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer" style="background-color: #f8f9fa; border-top: 1px solid #ccc;">
                <button type="button" class="btn"
                    style="background-color: #FF4C29; color: #ffffff; border-radius: 5px;"
                    data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#socialIconCreateModalForm").on("submit", function(e) {
            // showLoading();
            e.preventDefault(); // Prevent default form submission

            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('social.icon.store') }}", // Laravel route for storing Social-Icon
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
                        $("#socialIconCreateModalForm")[0].reset();
                        $("#socialIconCreateModal").modal("hide");

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

                        if (errors.name) {
                            $(".name-error").text(errors.name[0]).show();
                        }
                        if (errors.url) {
                            $(".url-error").text(errors.url[0])
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
