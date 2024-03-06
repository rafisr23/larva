<x-layout.default>
    <x-slot name="title">{{ $title }}</x-slot>

    <div>
        <div class="grid gap-6 mb-6">
            <div class="panel">
                <div class="flex items-center justify-between">
                    <h5 class="font-semibold text-xl">Edit Service</h5>
                </div>
            </div>
            <div class="panel">
                <div class="md:flex">
                    <form action="{{ route('admin.service.update', $service->slug) }}" method="POST" class="flex-grow" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="@error('service_name') has-error @enderror">
                                <label for="service_name">Service Name <sup class="text-danger">*</sup></label>
                                <input id="service_name" name="service_name" type="text" placeholder="Enter Service Name" class="form-input" required value="{{ old('service_name', $service->service_name) }}"/>
                                @error('service_name')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="@error('tagline') has-error @enderror">
                                <label for="tagline">Tagline </label>
                                <input id="tagline" name="tagline" type="text" placeholder="Enter Tagline" class="form-input" value="{{ old('tagline', $service->tagline) }}"/>
                                @error('tagline')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4 @error('description') has-error @enderror">
                            <label for="description">Description <sup class="text-danger">*</sup></label>
                            <input id="description" type="hidden" name="description">
                            <trix-editor input="description" class="form-input" placeholder="Enter Description">{!! old('description', $service->description) !!}</trix-editor>
                            @error('description')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div class="@error('min_price') has-error @enderror">
                                <fieldset>
                                    <label for="min_price">Min Price <sup class="text-danger">*</sup></label>
                                    <input id="min_price" name="min_price" type="text" placeholder="Enter Minimum Price" class="form-input" required x-mask:dynamic="$money($input, ',')" x-init="$el.value = 'Rp' + $el.value" value="{{ old('min_price', $service->min_price) }}"/>
                                    @error('min_price')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="@error('max_price') has-error @enderror">
                                <label for="max_price">Max Price <sup class="text-danger">*</sup></label>
                                <input id="max_price" name="max_price" type="text" placeholder="Enter Maximum Price" class="form-input" required x-mask:dynamic="$money($input, ',')" x-init="$el.value = 'Rp' + $el.value" value="{{ old('max_price', $service->max_price) }}"/>
                                @error('max_price')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4 @error('notes') has-error @enderror">
                            <label for="notes">Notes</label>
                            <input id="notes" type="hidden" name="notes">
                            <trix-editor input="notes" class="form-input" placeholder="Enter Notes">{!! old('notes', $service->notes) !!}</trix-editor>
                            @error('notes')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-4 @error('service_icon') has-error @enderror">
                            <label for="service_icon">Service Icon <span class="text-sm block italic">icon size: 96px * 96px</span></label>
                            <input id="service_icon" name="service_icon" type="file" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary" onchange="displayIcon(this)" />
                            <div id="iconPreview" class="mt-2 flex flex-wrap gap-2">
                                @if ($service->icon)
                                    <img src="{{ asset('storage/' . $service->icon) }}" class="w-24 h-24 object-cover border rounded" />
                                @else
                                    {{-- service has not icon --}}
                                    <p>Icon not found.</p>
                                @endif
                            </div>
                            @error('service_icon')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-4 @error('service_image') has-error @enderror">
                            <label for="service_image">Service Image</label>
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($service->serviceImage as $image)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div id="" class="mt-2 flex flex-wrap gap-2">
                                                        <img src="{{ asset('storage/' . $image->file_path) }}" class="w-24 h-24 object-cover border rounded" />
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="flex justify-center">
                                                        <label class="w-12 h-6 relative">
                                                            <input type="checkbox" data-id="{{ encrypt($image->id) }}"  class="is_active custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer" name="is_active" {{ $image->is_active ? 'checked' : '' }} />
                                                            <span class="bg-danger dark:bg-danger block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-success before:transition-all before:duration-300"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="flex justify-center">
                                                        <button type="button" class="btn btn-danger btn-delete-img" data-id="{{ encrypt($image->id) }}">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <input id="service_image" name="service_image[]" type="file" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary" multiple onchange="displayImage(this)" />
                            <div id="imagePreview" class="mt-2 flex flex-wrap gap-2">
                            </div>
                            @error('service_image')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-4 flex items-center">
                            <label for="is_active" class="me-4">Service Status</label>
                            <label class="w-12 h-6 relative">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer" id="is_active" name="is_active" {{ $service->is_active ? 'checked' : '' }} />
                                <span for="is_active" class="bg-danger dark:bg-danger block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-success before:transition-all before:duration-300"></span>
                            </label>
                        </div>
                        <div class="!mt-8 flex">
                            <a href="{{ route('admin.service.index') }}" class="btn btn-warning me-1">Back</a>
                            <button type="submit" class="btn btn-primary ">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        document.addEventListener("alpine:init", () => {
            $('.btn-delete-img').on('click', function() {
                let imageId = $(this).data('id');

                new window.Swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    customClass: 'sweet-alerts',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = "{{ route('admin.service.destroy-image', ':imageId') }}".replace(':imageId', imageId);
                        $.ajax({
                            url: url,
                            type: "DELETE",
                            data: {
                                _token: CSRF_TOKEN,
                            },
                            success: (response) => {
                                if (response.success) {
                                    new window.Swal({
                                        title: 'Success!',
                                        text: 'Image has been deleted!',
                                        icon: 'success',
                                        customClass: 'sweet-alerts',
                                    }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.reload();
                                            }
                                        });
                                } else {
                                    new window.Swal({
                                        title: 'Failed!',
                                        text: 'Failed to delete image!',
                                        icon: 'error',
                                        customClass: 'sweet-alerts',
                                    });
                                }
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    }
                });
            });

            $('.is_active').on('change', function() {
                let imageId = $(this).data('id');
                let status = $(this).prop('checked') ? 1 : 0;

                let url = "{{ route('admin.service.update-status-image', ':imageId') }}".replace(':imageId', imageId);
                $.ajax({
                    url: url,
                    type: "PUT",
                    data: {
                        _token: CSRF_TOKEN,
                        status: status
                    },
                    success: (response) => {
                        if (response.success) {
                            const toast = window.Swal.mixin({
                                toast: true,
                                position: 'top-right',
                                animation: true,
                                showConfirmButton: false,
                                timer: 3000,
                                customClass: {
                                    popup: 'color-success'
                                },
                                showCloseButton: true,
                                target: document.getElementById('toast')
                            });
                            toast.fire({
                                icon: 'success',
                                title: response.message,
                                padding: '10px 20px'
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
        
        function displayImage(input) {
            var preview = document.getElementById('imagePreview');
            preview.innerHTML = '';
            if (input.files && input.files.length > 0) {
                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var image = document.createElement('img');
                        image.src = e.target.result;
                        image.className = 'w-32 h-32 object-cover border rounded';
                        preview.appendChild(image);
                    };
                    reader.readAsDataURL(input.files[i]);
                }
            }
        }

        function displayIcon(input) {
            var preview = document.getElementById('iconPreview');
            preview.innerHTML = '';

            if (input.files && input.files.length > 0) {
                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var image = document.createElement('img');
                        image.src = e.target.result;
                        image.className = 'w-32 h-32 object-cover border rounded';
                        preview.appendChild(image);
                    };

                    reader.readAsDataURL(input.files[i]);
                }
            }
        }
    </script>
</x-layout.default>