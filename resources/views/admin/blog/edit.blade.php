<x-layout.default>
    <x-slot name="title">{{ $title }}</x-slot>

    <div>
        <div class="grid gap-6 mb-6">
            <form action="{{ route('admin.blog.update', $blog->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="panel">
                    <div class="flex items-center justify-between">
                        <h5 class="font-semibold text-xl">Edit Blog</h5>
                    </div>
                </div>
                <div class="panel mt-5">
                    <div class="md:flex">
                        <div class="flex-grow">
                            <div class="grid grid-cols-1 gap-4">
                                <div class="@error('title') has-error @enderror">
                                    <label for="title">Title <sup class="text-danger">*</sup></label>
                                    <input id="title" name="title" type="text" placeholder="Enter Title" class="form-input" required value="{{ old('title', $blog->title) }}"/>
                                    @error('title')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 mt-4 gap-4">
                                <div class="@error('category_id') has-error @enderror">
                                    <label>Category <sup class="text-danger">*</sup></label>
                                    <select id="searchable-select" class="border-primary" name="category_id" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ encrypt($category->id) }}" {{ $blog->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option> 
                                        @endforeach
                                    </select>
                                    {{-- <input id="category_id" name="category_id" type="text" placeholder="Enter Company Name" class="form-input" value="{{ old('category_id') }}"/> --}}
                                    @error('category_id')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="@error('tag_id') has-error @enderror">
                                    <label for="tag_id">Tag</label>
                                    <select id="tag_id" class="border-primary multiple-select" name="tag_id[]" multiple="multiple">
                                        @foreach ($tags as $tag)
                                            {{-- <option value="{{ encrypt($tag->id) }}">{{ $tag->name }}</option>  --}}
                                            <option value="{{ encrypt($tag->id) }}" 
                                                @if (in_array($tag->id, $blog->tags->pluck('id')->toArray())) selected @endif>
                                                {{ $tag->name }}
                                            </option> 
                                        @endforeach
                                    </select>
                                    @error('tag_id')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 mt-4 gap-4">
                                <div class="@error('content') has-error @enderror">
                                    <label for="content">Content <sup class="text-danger">*</sup></label>
                                    <input id="content" type="hidden" name="content" value="{{ old('content', $blog->content) }}" />
                                    <trix-editor input="content" class="form-input trix-editor" placeholder="Enter Content" id="content"></trix-editor>
                                    @error('content')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 mt-4 gap-4">
                                <div class="@error('thumbnail_image') has-error @enderror">
                                    {{-- <div class="custom-file-container" data-upload-id="serviceImage"></div> --}}
                                    <label for="thumbnail_image">Blog Thumbnail <span class="text-sm block italic">thumbnail size: 370px * 336px or 1:1</span></label>
                                    <input id="thumbnail_image" name="thumbnail_image" type="file" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary" onchange="displayThumbnail(this)" />
                                    <div id="thumbnailPreview" class="mt-2 flex flex-wrap gap-2">
                                        <img src="{{ asset('storage/' . $blog->thumbnail_image) }}" class="w-32 h-32 object-cover border rounded" alt="thumbnail image" />
                                    </div>
                                    @error('thumbnail_image')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="@error('header_image') has-error @enderror">
                                    {{-- <div class="custom-file-container" data-upload-id="serviceImage"></div> --}}
                                    <label for="header_image">Blog Header <span class="text-sm block italic">header size: 770px * 428px or 16:9</span></label>
                                    <input id="header_image" name="header_image" type="file" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary" onchange="displayHeader(this)" />
                                    <div id="headerPreview" class="mt-2 flex flex-wrap gap-2">
                                        <img src="{{ asset('storage/' . $blog->header_image) }}" class="w-32 h-32 object-cover border rounded" alt="header image" />
                                    </div>
                                    @error('header_image')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- <div class="mt-4 @error('blog_images') has-error @enderror">
                                    <label for="service_cover">Blog Images <span class="text-sm block italic">cover size ratio: 1:1</span></label>
                                    <input id="blog_images" name="blog_images[]" type="file" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary" multiple onchange="displayImage(this)" />
                                    <div id="imagePreview" class="mt-2 flex flex-wrap gap-2"></div>
                                    @error('blog_images')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div> --}}
                            </div>
                            <div class="grid grid-cols-1 mt-4 gap-4">
                                <div class="mt-4 flex items-center">
                                    <div class="flex items-center">
                                        <label for="status" class="me-4">Publish</label>
                                        <label class="w-12 h-6 relative">
                                            <input type="checkbox" class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer" id="status" name="status" {{ $blog->status == 'published' ? 'checked' : '' }} />
                                            <span for="status" class="bg-danger dark:bg-danger block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-success before:transition-all before:duration-300"></span>
                                        </label>
                                    </div>
                                    <div class="ms-2 items-start">
                                        @if ($blog->status === 'draft')
                                            <span class="badge bg-warning">Draft</span>
                                        @elseif ($blog->status === 'published')
                                            <span class="badge bg-success">Published</span>
                                        @elseif ($blog->status === 'archived')
                                            <span class="badge bg-secondary">Archived</span>
                                        @else
                                            <span class="badge bg-light">Unknown</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel mt-8">
                    <div class="flex items-center justify-between">
                        <h5 class="font-semibold text-lg flex items-center">
                            <i class="mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="currentColor" d="M19.9 12.66a1 1 0 0 1 0-1.32l1.28-1.44a1 1 0 0 0 .12-1.17l-2-3.46a1 1 0 0 0-1.07-.48l-1.88.38a1 1 0 0 1-1.15-.66l-.61-1.83a1 1 0 0 0-.95-.68h-4a1 1 0 0 0-1 .68l-.56 1.83a1 1 0 0 1-1.15.66L5 4.79a1 1 0 0 0-1 .48L2 8.73a1 1 0 0 0 .1 1.17l1.27 1.44a1 1 0 0 1 0 1.32L2.1 14.1a1 1 0 0 0-.1 1.17l2 3.46a1 1 0 0 0 1.07.48l1.88-.38a1 1 0 0 1 1.15.66l.61 1.83a1 1 0 0 0 1 .68h4a1 1 0 0 0 .95-.68l.61-1.83a1 1 0 0 1 1.15-.66l1.88.38a1 1 0 0 0 1.07-.48l2-3.46a1 1 0 0 0-.12-1.17ZM18.41 14l.8.9l-1.28 2.22l-1.18-.24a3 3 0 0 0-3.45 2L12.92 20h-2.56L10 18.86a3 3 0 0 0-3.45-2l-1.18.24l-1.3-2.21l.8-.9a3 3 0 0 0 0-4l-.8-.9l1.28-2.2l1.18.24a3 3 0 0 0 3.45-2L10.36 4h2.56l.38 1.14a3 3 0 0 0 3.45 2l1.18-.24l1.28 2.22l-.8.9a3 3 0 0 0 0 3.98m-6.77-6a4 4 0 1 0 4 4a4 4 0 0 0-4-4m0 6a2 2 0 1 1 2-2a2 2 0 0 1-2 2"/></svg>
                            </i>
                            SEO Option
                        </h5>
                    </div>
                </div>
                <div class="panel mt-5">
                    <div class="md:flex">
                        <div class="flex-grow">
                            <div class="grid grid-cols-1 gap-4">
                                <div class="@error('meta_title') has-error @enderror">
                                    <label for="meta_title">Meta Title</label>
                                    <input id="meta_title" name="meta_title" type="text" placeholder="Enter Meta Title" class="form-input" value="{{ old('meta_title', $blog->meta_title) }}"/>
                                    <label class="inline-flex mt-2">
                                        <input type="checkbox" class="form-checkbox" id="get_meta_title" {{ $blog->meta_title == $blog->title ? 'checked' : '' }} />
                                        <span>Same as title</span>
                                    </label>
                                    @error('meta_title')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                                <div class="@error('slug') has-error @enderror">
                                    <label for="slug">Slug</label>
                                    <input id="slug" name="slug" type="text" placeholder="Enter Slug or Keyword" class="form-input" value="{{ old('slug', $blog->slug) }}"/>
                                    @error('slug')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="@error('meta_author') has-error @enderror">
                                    <label for="meta_author">Meta Author</label>
                                    <input id="meta_author" name="meta_author" type="text" placeholder="Enter Meta Author" class="form-input" value="{{ old('meta_author', $blog->meta_author) }}"/>
                                    @error('meta_author')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="@error('meta_keyword') has-error @enderror">
                                    <label for="meta_keyword">Meta Keyword</label>
                                    <input id="meta_keyword" name="meta_keyword" type="text" placeholder="Enter Meta Author" class="form-input" value="{{ old('meta_keyword', $blog->meta_keyword) }}"/>
                                    <label class="inline-flex mt-2">
                                        <input type="checkbox" class="form-checkbox" id="get_meta_keyword" />
                                        <span>Same as Tag</span>
                                    </label>
                                    @error('meta_keyword')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-4 mt-4">
                                <div class="@error('meta_description') has-error @enderror">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea id="meta_description" name="meta_description" type="text" placeholder="Enter Meta Description" class="form-input" rows="4">{{ old('meta_description', $blog->meta_description) }}</textarea>
                                    @error('meta_description')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="!mt-8 flex">
                        <a href="#" type="button" class="btn btn-info me-1">Analyze SEO</a>
                    </div>
                </div>
                <div class="!mt-8 flex">
                    <a href="{{ route('admin.blog.list') }}" class="btn btn-warning me-1">Back</a>
                    <button type="submit" class="btn btn-primary ">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {});
        
        function displayThumbnail(input) {
            var preview = document.getElementById('thumbnailPreview');
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
        
        function displayHeader(input) {
            var preview = document.getElementById('headerPreview');
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
                placeholder: 'Select Category',
            };
            NiceSelect.bind(document.getElementById("searchable-select"), options);

            var els = document.querySelectorAll(".multiple-select");
            els.forEach(function(select) {
                NiceSelect.bind(select);
            });

            const title = document.querySelector('#title');
            const slug = document.querySelector('#slug');
            const get_meta_title = document.querySelector('#get_meta_title');
            const meta_title = document.querySelector('#meta_title');
            const tag = document.querySelector('#tag_id')
            const get_meta_keyword = document.querySelector('#get_meta_keyword');
            const meta_keyword = document.querySelector('#meta_keyword')

            title.addEventListener('keyup', function() {
                fetch('/admin/blog/check-slug?title=' + title.value, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    }
                })
                .then(response => response.json())
                .then(data => slug.value = data.slug);
                
                // check if get_meta_title is checked
                if (get_meta_title.checked) {
                    meta_title.value = title.value;
                }
            });
            
            get_meta_title.addEventListener('change', function() {
                if (get_meta_title.checked) {
                    meta_title.value = title.value;
                } else {
                    meta_title.value = '';
                }
            });

            get_meta_keyword.addEventListener('change', function() {
                if (get_meta_keyword.checked) {
                    // Get selected options
                    const selectedOptions = Array.from(tag.selectedOptions).map(option => option.text);
                    // Join the selected options into a single string
                    meta_keyword.value = selectedOptions.join(', ');
                } else {
                    meta_keyword.value = '';
                }
            });
        });

        (function() {
            addEventListener("trix-attachment-add", function(event) {
                if (event.attachment.file) {
                    uploadFileAttachment(event.attachment)
                }
            })

            function uploadFileAttachment(attachment) {
                uploadFile(attachment.file, setProgress, setAttributes)

                function setProgress(progress) {
                    attachment.setUploadProgress(progress)
                }

                function setAttributes(attributes) {
                    attachment.setAttributes(attributes)
                }
            }

            function uploadFile(file, progressCallback, successCallback) {
                var key = createStorageKey(file)
                var formData = createFormData(key, file)
                var xhr = new XMLHttpRequest()

                xhr.open("POST", "{{ route('admin.blog.store-image-content') }}", true)
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}')

                xhr.upload.addEventListener("progress", function(event) {
                    var progress = event.loaded / event.total * 100
                    progressCallback(progress)
                })

                xhr.addEventListener("load", function(event) {
                    if (xhr.status == 200) {
                        var response = JSON.parse(xhr.responseText)
                        // console.log(response.url);
                        var attributes = {
                            url: response.url,
                            href: response.url + "?content-disposition=attachment"
                        }
                        successCallback(attributes)
                    }
                })

                xhr.send(formData)
            }

            function createStorageKey(file) {
                var date = new Date()
                var day = date.toISOString().slice(0,10)
                var name = date.getTime() + "-" + file.name
                return [ "tmp", day, name ].join("/")
            }

            function createFormData(key, file) {
                var data = new FormData()
                data.append("key", key)
                data.append("Content-Type", file.type)
                data.append("file", file)
                return data
            }
        })();
    </script>
</x-layout.default>