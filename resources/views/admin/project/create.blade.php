<x-layout.default>
    <x-slot name="title">{{ $title }}</x-slot>

    <div>
        <div class="grid gap-6 mb-6">
            <div class="panel">
                <div class="tems-center justify-between">
                    <h5 class="font-semibold text-xl">Create Project</h5>
                    {{-- <p class="text-xs">* Is Required</p> --}}
                </div>
            </div>
            <div class="panel">
                <div class="md:flex">
                    <form action="{{ route('admin.project.store') }}" method="POST" class="flex-grow" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="@error('project_name') has-error @enderror">
                                <label for="project_name">Project Name <sup class="text-danger">*</sup></label>
                                <input id="project_name" name="project_name" type="text" placeholder="Enter Project Name" class="form-input" required value="{{ old('project_name') }}"/>
                                @error('project_name')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="@error('company_name') has-error @enderror">
                                <label for="company_name">Company Name <sup class="text-danger">*</sup></label>
                                <input id="company_name" name="company_name" type="text" placeholder="Enter Company Name" class="form-input" value="{{ old('company_name') }}"/>
                                @error('company_name')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="@error('service_id') has-error @enderror">
                                <label for="service_id">Service <sup class="text-danger">*</sup></label>
                                <select id="seachable-select" class="border-primary" name="service_id" required>
                                    @foreach ($services as $service)
                                        <option value="{{ encrypt($service->id) }}">{{ $service->service_name }}</option> 
                                    @endforeach
                                </select>
                                {{-- <input id="service_id" name="service_id" type="text" placeholder="Enter Company Name" class="form-input" value="{{ old('service_id') }}"/> --}}
                                @error('service_id')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4 @error('description') has-error @enderror">
                            <label for="description">Description <sup class="text-danger">*</sup></label>
                            <input id="description" type="hidden" name="description">
                            <trix-editor input="description" class="form-input" placeholder="Enter Description">{!! old('description') !!}</trix-editor>
                            {{-- <textarea id="description" name="description" class="form-textarea" placeholder="Enter Description" required>{{ old('description') }}</textarea> --}}
                            @error('description')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-4 @error('project_image') has-error @enderror">
                            {{-- <div class="custom-file-container" data-upload-id="serviceImage"></div> --}}
                            <label for="project_image">Service Image <sup class="text-danger">*</sup></label>
                            <input id="project_image" name="project_image[]" type="file" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary" multiple onchange="displayImage(this)" />
                            <div id="imagePreview" class="mt-2 flex flex-wrap gap-2"></div>
                            @error('project_image')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-4 flex items-center">
                            <label for="is_active" class="me-4">Project Posting Status</label>
                            <label class="w-12 h-6 relative">
                                <input type="checkbox" class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer" id="is_active" name="is_active" checked />
                                <span for="is_active" class="bg-danger dark:bg-danger block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-success before:transition-all before:duration-300"></span>
                            </label>
                        </div>
                        <div class="!mt-8 flex">
                            <a href="{{ route('admin.project.index') }}" class="btn btn-warning me-1">Back</a>
                            <button type="submit" class="btn btn-primary ">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
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

        document.addEventListener("DOMContentLoaded", function(e) {
            // seachable 
            var options = {
                searchable: true,
                placeholder: 'Select Service',
            };
            NiceSelect.bind(document.getElementById("seachable-select"), options);
        });
    </script>
</x-layout.default>