<!-- Modal Header -->
<div class="modal-header" style="background-color: #333333; border-bottom: 1px solid #ccc;">
    <h5 class="modal-title" id="sliderEditModalLabel" style="color: #ffffff;">Edit New Slider</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<!-- Modal Body -->
<div class="modal-body">
    <form id="sliderEditModalForm" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <!-- Image Upload -->
            <div class="col-md-6 mb-3">
                <label for="image" class="form-label fw-bold text-dark">Slider Image:</label>
                <input type="file" class="form-control border-dark" id="image" name="image" accept="image/*">
                <div class="invalid-feedback image-error"></div>
                <img src="{{ asset('image/' . $data->image) }}" width="150" alt="">
            </div>
            <!-- title -->
            <div class="col-md-6 mb-3">
                <label for="title" class="form-label fw-bold text-dark">Title:</label>
                <input type="text" class="form-control border-dark" id="title" name="title"
                    placeholder="Enter title" value="{{ $data->title }}">
                <div class="invalid-feedback title-error"></div>
            </div>

            <!-- short_description -->
            <div class="col-md-12 mb-3">
                <label for="short_description" class="form-label fw-bold text-dark">Description:</label>
                <textarea name="short_description" id="short_description" class="form-control border-dark" cols="30" rows="2"
                    placeholder="Enter short description">{{ $data->short_description }}</textarea>

                <div class="invalid-feedback short-description-error"></div>
            </div>
        </div>


        <input type="hidden" value="{{ $data->id }}" id="slider_id">
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
        $("#sliderEditModalForm").on("submit", function(e) {

            // showLoading();
            e.preventDefault(); // Prevent default form submission

            let formData = new FormData(this);
            let sliderId = $("#slider_id").val();

            $.ajax({
                url: "{{ route('slider.update', ':id') }}".replace(':id', sliderId),
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
                        $("#sliderEditModalForm")[0].reset();
                        $("#sliderEditModal").modal("hide");

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
