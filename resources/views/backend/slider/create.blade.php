<div class="modal fade" id="sliderCreateModal" tabindex="-1" aria-labelledby="sliderCreateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #f8f9fa; border-radius: 8px; border: 1px solid #ddd;">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #333333; border-bottom: 1px solid #ccc;">
                <h5 class="modal-title" id="sliderCreateModalLabel" style="color: #ffffff;">Create New Slider</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="sliderCreateModalForm" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- Image Upload -->
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label fw-bold text-dark">Slider Image : <span
                                    class="text-danger ml-1">*</span></label>
                            <input type="file" class="form-control border-dark" id="image" name="image"
                                accept="image/*">
                            <div class="invalid-feedback image-error"></div>
                        </div>
                        <!-- title -->
                        <div class="col-md-6 mb-3">
                            <label for="title" class="form-label fw-bold text-dark">Title:</label>
                            <input type="text" class="form-control border-dark" id="title" name="title"
                                placeholder="Enter title">
                            <div class="invalid-feedback title-error"></div>
                        </div>

                        <!-- short_description -->
                        <div class="col-md-12 mb-3">
                            <label for="short_description" class="form-label fw-bold text-dark">Description:</label>
                            <textarea name="short_description" id="short_description" class="form-control border-dark" cols="30" rows="2"
                                placeholder="Enter short description"></textarea>

                            <div class="invalid-feedback short-description-error"></div>
                        </div>
                    </div>



                    <!-- Submit Button -->
                    <div class="text-end">
                        <button type="submit" class="btn submit-btn"
                            style="background-color: #FF4C29; color: #ffffff; border-radius: 5px;">
                            Create Slider
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
        $("#sliderCreateModalForm").on("submit", function(e) {
            // showLoading();
            e.preventDefault(); // Prevent default form submission

            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('slider.store') }}", // Laravel route for storing Slider
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
                        $("#sliderCreateModalForm")[0].reset();
                        $("#sliderCreateModal").modal("hide");

                        hideLoading();
                        window.location.href =
                            "{{ route('slider.index') }}?added-successfully=" +
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
