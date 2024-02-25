<x-layout.default>
    <x-slot name="title">{{ $title }}</x-slot>

    <div x-data="modal" class="mb-5">
        <div x-data="pageImage">
            <div class="panel">
                <div class="flex items-center mb-5">
                    <h5 class="font-semibold text-xl me-5">Testimoni List</h5>
                    {{-- <a href="{{ route('admin.image-category.create') }}" class="btn btn-danger" @click="toggle">Add New</a> --}}
                    <button type="button" class="btn btn-danger w-18 text-xs px-2 md:w-26 md:text-sm md:px-5 md:py-2" @click="toggle">Add New</button>
    
                    <!-- modal -->
                    <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'" id="modalTeam">
                        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                            :class="open && '!block'">
                            <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                <div x-show="open" x-transition x-transition.duration.300
                                    class="panel border-0 p-0 rounded-lg overflow-hidden my-8 w-full max-w-lg">
                                    <div
                                        class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                        <div class="font-bold text-lg">Add New Testimoni</div>
                                        <button type="button" class="text-white-dark hover:text-dark" @click="toggle">
    
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                class="w-6 h-6">
                                                <line x1="18" y1="6" x2="6" y2="18">
                                                </line>
                                                <line x1="6" y1="6" x2="18" y2="18">
                                                </line>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="p-5">
                                        <form action="{{ route('admin.page-image.store') }}" method="POST" id="imageForm" enctype="multipart/form-data">
                                            @csrf
                                            <div class="">
                                                <div class="mt-4 @error('description') has-error @enderror">
                                                    <label for="description">Description <sup class="text-danger">*</sup></label>
                                                    <input id="description" type="hidden" name="description">
                                                    <trix-editor input="description" class="form-input" placeholder="Enter Description">{!! old('description') !!}</trix-editor>
                                                    {{-- <textarea id="description" name="description" class="form-textarea" placeholder="Enter Description" required>{{ old('description') }}</textarea> --}}
                                                    @error('description')
                                                        <p class="text-danger mt-1">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="flex justify-end items-center mt-8">
                                                <button type="button" class="btn btn-outline-danger" @click="toggle">Discard</button>
                                                <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="whitespace-nowrap table-hover" id="testimoniTable">
                    
                </table>
            </div>
        </div>
    </div>

    <script>
        const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        function formatCurrency(amount, decimalPlaces = 0) {
            // Format nilai menjadi mata uang Rupiah
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: decimalPlaces,
                maximumFractionDigits: decimalPlaces
            }).format(amount);
        }

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

        document.addEventListener("alpine:init", () => {
            let datatable = null;
            Alpine.data("pageImage", (initialOpenState = false) => ({
                init() {
                    datatable = new simpleDatatables.DataTable('#testimoniTable', {
                        data: {
                            headings: ["<div class='text-center'>No</div>", "Service Name", "Description", "<div class='text-center'>Action</div>"],
                            data: [],
                        },
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [10, 20, 30, 50, 100],
                        columns: [
                        ],
                        firstLast: true,
                        firstText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        lastText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        prevText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        nextText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        labels: {
                            perPage: "{select}"
                        },
                        layout: {
                            top: "{search}",
                            bottom: "{info}{select}{pager}",
                        },
                        fixedColumns: true,
                    });
                },

                getData() {
                    fetch("{{ route('admin.page-image.get-header-page-images') }}", {
                        method: "GET",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": CSRF_TOKEN
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        // console.log(data);
                        let imageData = data.map((image, index) => {
                            // console.log(image);
                            return [
                                "<div class=''>" + (index + 1) + "</div>",
                                image.category.category_name,
                                image.file_path,
                                image.is_active == 1 ? 'Active' : 'Inactive',
                                `<div class="flex justify-center gap-2">
                                    <button data-id="${image.encId}" class="text-primary btn-edit" type="button" @click="toggle" title="Edit Data">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M3 17.46v3.04c0 .28.22.5.5.5h3.04c.13 0 .26-.05.35-.15L17.81 9.94l-3.75-3.75L3.15 17.1c-.1.1-.15.22-.15.36M20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75z"/>
                                        </svg>
                                    </button>
                                    <button class="text-danger btn-delete" data-id="${image.encId}" type="button" title="Delete Data">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2zM18 4h-2.5l-.71-.71c-.18-.18-.44-.29-.7-.29H9.91c-.26 0-.52.11-.7.29L8.5 4H6c-.55 0-1 .45-1 1s.45 1 1 1h12c.55 0 1-.45 1-1s-.45-1-1-1"/>
                                        </svg>    
                                    </button>
                                </div>`
                            ];
                        });
                        // console.log(projectData);
                        datatable.insert({ data: imageData });
                    })
                    .catch(error => {
                        console.error("Error:", error);
                    });
                },
                
                open: initialOpenState,
                toggle() {
                    var preview = document.getElementById('imagePreview');
                    preview.innerHTML = '';
                    $('#imageForm').attr('action', "{{ route('admin.page-image.store') }}");
                    $('#method').remove();
                    this.open = !this.open;
                },
            }));

            $('#testimoniTable').on('click', '.btn-edit', function() {
                let id = $(this).data('id');
                let url = "{{ route('admin.page-image.get-one', ':id') }}".replace(':id', id);

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        console.log(response);
                        $('#category_id_old').val(response.encCategoryId);
                        $('#seachable-select').val(null).trigger('change');
                        
                        $('#is_active').prop('checked', response.is_active == 1 ? true : false);
                        $('#page_image').attr('required', false);
                        $('#imagePreview').html(`<img src="{{ asset('storage') }}/${response.file_path}" class="w-32 h-32 object-cover border rounded">`);

                        $('#imageForm').attr('action', "{{ route('admin.page-image.update', ':id') }}".replace(':id', id));
                        $('#imageForm').append('<input type="hidden" name="_method" value="PUT" id="method">');
                    }
                });
            })

            $('#testimoniTable').on('click', '.btn-delete', function() {
                let id = $(this).data('id');

                new window.Swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    customClass: 'sweet-alerts',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = "{{ route('admin.page-image.destroy', ':id') }}".replace(':id', id);
                        $.ajax({
                            url: url,
                            type: "DELETE",
                            data: {
                                _token: CSRF_TOKEN,
                                id: id
                            },
                            success: (response) => {
                                if (response.success) {
                                    new window.Swal({
                                        title: 'Success!',
                                        text: response.message,
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
                                        text: 'Failed to delete data',
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

            $('#testimoniTable').on('change', '.is_active', function() {
                let id = $(this).closest('tr').find('.btn-delete').data('id');
                let status = $(this).prop('checked') ? 1 : 0;

                let url = "{{ route('admin.page-image.update-status', ':id') }}".replace(':id', id);
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

            document.addEventListener('DOMContentLoaded', function() {
                @if (session('success'))
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
                        title: "{{ session('success') }}",
                        padding: '10px 20px'
                    });
                @endif

                var options = {
                    searchable: true,
                    placeholder: 'Select Category',
                };
                NiceSelect.bind(document.getElementById("seachable-select"), options);
            });
        });

        
    </script>

    
</x-layout.default>