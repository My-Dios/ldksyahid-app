@extends('AdminPageView.AdminPageViewTemplate.bodyadminpage')

@section('content')
<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h5 class="mb-4">Create Gallery LDK Syahid</h5>
                <form role="form" action='/admin/about/gallery/store' method='post' enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                @method('POST')
                    <div class="mb-3">
                        <label for="inputEventName" class="form-label">Event Name</label>
                        <input type="text" class="form-control" id="inputEventName" name='eventName' placeholder="Enter the Event Name ..." required>
                        <div class="invalid-feedback">
                            Please fill in the Event Name.
                        </div>
                        <div class="valid-feedback">
                            Cool Event Name!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputEventTheme" class="form-label">Event Theme</label>
                        <input type="text" class="form-control" id="inputEventTheme" name='eventTheme' placeholder="Enter the Event Theme ..." required>
                        <div class="invalid-feedback">
                            Please fill in the Event Theme.
                        </div>
                        <div class="valid-feedback">
                            Cool Event Theme!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputEventDescription" class="form-label">Event Description</label>
                        <textarea class="form-control" name="eventDescription" id="inputEventDescription" required></textarea>
                        <div class="invalid-feedback">
                            Please fill in the Event Description.
                        </div>
                        <div class="valid-feedback">
                            Cool Description!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputLinkEmbedYoutube" class="form-label">Link Embed Youtube</label>
                        <input type="text" class="form-control" id="inputLinkEmbedYoutube" name='linkEmbedYoutube' placeholder="Ex. https://www.youtube.com/embed/ZwP7HLK4JxQ">
                        <div class="invalid-feedback">
                            Please fill in the Link Embed Youtube.
                        </div>
                        <div class="valid-feedback">
                            Cool Link!
                        </div>
                    </div>
                    <div class="mb-0 col-xl-6">
                        <label for="groupPhoto" class="form-label"><i>Insert Photos gradually (maximum 4 Photos), then update to re-insert.</i></label>
                    </div>
                    <div class="mb-3 col-xl-4">
                        <label for="groupPhoto" class="form-label">Group Photo</label>
                        <input class="form-control" type="file" id="groupPhoto" name = 'groupPhoto' accept="image/png, image/jpeg, image/jpg, image/JPG, image/PNG" required>
                        <div class="invalid-feedback">
                            Please insert a Big Photo.
                        </div>
                        <div class="valid-feedback">
                            Nice Photo!
                        </div>
                    </div>
                    <div class="mb-3 col-xl-4">
                        <label for="photo1" class="form-label">Photo 1</label>
                        <input class="form-control" type="file" id="photo1" name ='photo1' accept="image/png, image/jpeg, image/jpg, image/JPG, image/PNG">
                        <div class="invalid-feedback">
                            Please insert Photo.
                        </div>
                        <div class="valid-feedback">
                            Nice Photo!
                        </div>
                    </div>
                    <div class="mb-3 col-xl-4">
                        <label for="photo2" class="form-label">Photo 2</label>
                        <input class="form-control" type="file" id="photo2" name ='photo2' accept="image/png, image/jpeg, image/jpg, image/JPG, image/PNG">
                        <div class="invalid-feedback">
                            Please insert Photo.
                        </div>
                        <div class="valid-feedback">
                            Nice Photo!
                        </div>
                    </div>
                    <div class="mb-3 col-xl-4">
                        <label for="photo3" class="form-label">Photo 3</label>
                        <input class="form-control" type="file" id="photo3" name ='photo3' accept="image/png, image/jpeg, image/jpg, image/JPG, image/PNG">
                        <div class="invalid-feedback">
                            Please insert Photo.
                        </div>
                        <div class="valid-feedback">
                            Nice Photo!
                        </div>
                    </div>
                    <div class="mb-3 col-xl-4">
                        <label for="photo4" class="form-label">Photo 4</label>
                        <input class="form-control" type="file" id="photo4" name ='photo4' accept="image/png, image/jpeg, image/jpg, image/JPG, image/PNG">
                        <div class="invalid-feedback">
                            Please insert Photo.
                        </div>
                        <div class="valid-feedback">
                            Nice Photo!
                        </div>
                    </div>
                    <div class="mb-3 col-xl-4">
                        <label for="photo5" class="form-label">Photo 5</label>
                        <input class="form-control" type="file" id="photo5" name ='photo5' accept="image/png, image/jpeg, image/jpg, image/JPG, image/PNG">
                        <div class="invalid-feedback">
                            Please insert Photo.
                        </div>
                        <div class="valid-feedback">
                            Nice Photo!
                        </div>
                    </div>
                    <div class="mb-3 col-xl-4">
                        <label for="photo6" class="form-label">Photo 6</label>
                        <input class="form-control" type="file" id="photo6" name ='photo6' accept="image/png, image/jpeg, image/jpg, image/JPG, image/PNG">
                        <div class="invalid-feedback">
                            Please insert Photo.
                        </div>
                        <div class="valid-feedback">
                            Nice Photo!
                        </div>
                    </div>
                    <div class="mb-3 col-xl-4">
                        <label for="photo7" class="form-label">Photo 7</label>
                        <input class="form-control" type="file" id="photo7" name ='photo7' accept="image/png, image/jpeg, image/jpg, image/JPG, image/PNG">
                        <div class="invalid-feedback">
                            Please insert Photo.
                        </div>
                        <div class="valid-feedback">
                            Nice Photo!
                        </div>
                    </div>
                    <div class="mb-3 col-xl-4">
                        <label for="photo8" class="form-label">Photo 8</label>
                        <input class="form-control" type="file" id="photo8" name ='photo8' accept="image/png, image/jpeg, image/jpg, image/JPG, image/PNG">
                        <div class="invalid-feedback">
                            Please insert Photo.
                        </div>
                        <div class="valid-feedback">
                            Nice Photo!
                        </div>
                    </div>
                    <div class="mb-3 col-xl-4">
                        <label for="photo9" class="form-label">Photo 9</label>
                        <input class="form-control" type="file" id="photo9" name ='photo9' accept="image/png, image/jpeg, image/jpg, image/JPG, image/PNG">
                        <div class="invalid-feedback">
                            Please insert Photo.
                        </div>
                        <div class="valid-feedback">
                            Nice Photo!
                        </div>
                    </div>
                    <div class="mb-3 col-xl-4">
                        <label for="photo10" class="form-label">Photo 10</label>
                        <input class="form-control" type="file" id="photo10" name ='photo10' accept="image/png, image/jpeg, image/jpg, image/JPG, image/PNG">
                        <div class="invalid-feedback">
                            Please insert Photo.
                        </div>
                        <div class="valid-feedback">
                            Nice Photo!
                        </div>
                    </div>
                    <div class="mb-3 col-xl-4">
                        <label for="photo11" class="form-label">Photo 11</label>
                        <input class="form-control" type="file" id="photo11" name ='photo11' accept="image/png, image/jpeg, image/jpg, image/JPG, image/PNG">
                        <div class="invalid-feedback">
                            Please insert Photo.
                        </div>
                        <div class="valid-feedback">
                            Nice Photo!
                        </div>
                    </div>
                    <div class="mb-3 col-xl-4">
                        <label for="photo12" class="form-label">Photo 12</label>
                        <input class="form-control" type="file" id="photo12" name ='photo12' accept="image/png, image/jpeg, image/jpg, image/JPG, image/PNG">
                        <div class="invalid-feedback">
                            Please insert Photo.
                        </div>
                        <div class="valid-feedback">
                            Nice Photo!
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a type="submit" class="btn btn-primary" href="/admin/about/gallery">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Form End -->
@endsection
@section('scripts')
<script>
    // Pemanggilan Validation
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@endsection
