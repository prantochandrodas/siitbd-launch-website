<div class="modal fade" id="statisticsCreateModal" tabindex="-1" aria-labelledby="statisticsCreateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #f8f9fa; border-radius: 8px; border: 1px solid #ddd;">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #333333; border-bottom: 1px solid #ccc;">
                <h5 class="modal-title" id="statisticsCreateModalLabel" style="color: #ffffff;">Create New Statistics
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="statisticsCreateModalForm" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- Image Upload -->
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label fw-bold text-dark">Icon:</label>
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

                        <!-- value -->
                        <div class="col-md-6 mb-3">
                            <label for="value" class="form-label fw-bold text-dark">Value:</label>
                            <input type="text" class="form-control border-dark" id="value" name="value"
                                placeholder="Enter value">
                            <div class="invalid-feedback value-error"></div>
                        </div>
                    </div>



                    <!-- Submit Button -->
                    <div class="text-end">
                        <button type="submit" class="btn submit-btn"
                            style="background-color: #FF4C29; color: #ffffff; border-radius: 5px;">
                            Create Statistics
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
        $("#statisticsCreateModalForm").on("submit", function(e) {
            // showLoading();
            e.preventDefault(); // Prevent default form submission

            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('statistics.store') }}", // Laravel route for storing Statistics
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
                        $("#statisticsCreateModalForm")[0].reset();
                        $("#statisticsCreateModal").modal("hide");

                        hideLoading();
                        window.location.href =
                            "{{ route('statistics.index') }}?added-successfully=" +
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
                        if (errors.value) {
                            $(".value-error").text(errors.value[0]).show();
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
