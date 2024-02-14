<x-layout.default>
    <x-slot name="title">{{ $title }}</x-slot>

    <div x-data="modal" class="mb-5">
        <div x-data="serviceTeam">
            <div class="panel">
                <div class="flex items-center mb-5">
                    <h5 class="font-semibold text-base md:text-xl me-5">{{ ucwords(strtolower($serviceName)) }} Team List</h5>
                    {{-- <a href="{{ route('admin.service.create') }}" class="btn btn-danger">Add New</a> --}}
                    <button type="button" class="btn btn-danger w-18 text-xs px-2 md:w-26 md:text-sm md:px-5" @click="toggle">Add New</button>
                    <!-- button -->
            
                    <!-- modal -->
                    <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                            :class="open && '!block'">
                            <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                <div x-show="open" x-transition x-transition.duration.300
                                    class="panel border-0 p-0 rounded-lg overflow-hidden my-8 w-full max-w-lg">
                                    <div
                                        class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                        <div class="font-bold text-lg">Add New Team Member</div>
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
                                        <form action="{{ route('admin.service.store-team', $serviceSlug) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="">
                                                <div class="@error('name') has-error @enderror">
                                                    <label for="name">Member Name <sup class="text-danger">*</sup></label>
                                                    <input id="name" name="name" type="text" placeholder="Enter Member Name" class="form-input" value="{{ old('name') }}" autofocus/>
                                                    @error('name')
                                                        <p class="text-danger mt-1">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mt-4 @error('position') has-error @enderror">
                                                    <label for="position">Position <span class="text-sm block italic">ex: Leader</span></label>
                                                    <input id="position" name="position" type="text" placeholder="Enter Position" class="form-input" value="{{ old('position') }}"/>
                                                    @error('position')
                                                        <p class="text-danger mt-1">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mt-4 @error('social_link') has-error @enderror">
                                                    <label for="social_link">Social Link <span class="text-sm block italic">ex: https://instagram.com/larvacreative.id</span></label>
                                                    <input id="social_link" name="social_link" type="text" placeholder="Enter Social Link" class="form-input" value="{{ old('social_link') }}"/>
                                                    @error('social_link')
                                                        <p class="text-danger mt-1">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mt-4 @error('team_image') has-error @enderror">
                                                    {{-- <div class="custom-file-container" data-upload-id="serviceImage"></div> --}}
                                                    <label for="team_image">Member Team Image</label>
                                                    <input id="team_image" name="team_image" type="file" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary" multiple onchange="displayImage(this)" />
                                                    <div id="imagePreview" class="mt-2 flex flex-wrap gap-2"></div>
                                                    @error('team_image')
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
                <table class="whitespace-nowrap table-hover" id="serviceTeamTable">
                    
                </table>
                <div class="overflow-x-auto">
                </div>
                <a href="{{ route('admin.service.index') }}" class="btn btn-warning w-24 !mt-6">Back</a>
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

        document.addEventListener("alpine:init", () => {
            let datatable = null;
            Alpine.data("serviceTeam", () => ({
                init() {
                    datatable = new simpleDatatables.DataTable('#serviceTeamTable', {
                        data: {
                            headings: ["<div class='text-center'>No</div>", "Name", "Position", "Sosial Link", "Image", "<div class='text-center'>Action</div>"],
                            data: this.getData(),
                        },
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [10, 20, 30, 50, 100],
                        columns: [
                            {
                                select: 0,
                                sortable: false,
                                // headerClass: "text-center",
                            },
                            {
                                select: 3,
                                sortable: false,
                            },
                            {
                                select: 4,
                                sortable: false,
                            },
                            {
                                select: 5,
                                sortable: false,
                            },
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
                    fetch("{{ route('admin.service.get-teams', $serviceSlug) }}", {
                        method: "GET",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": CSRF_TOKEN
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        // data to aray
                        console.log(data);
                        let teamData = data.map((item, index) => {
                            return [
                                "<div class='text-center'>" + (index + 1) + "</div>",
                                item.name,
                                item.position,
                                item.social_link ? `<a href="${item.social_link}" target="_blank">${item.social_link}</a>` : "-",
                                `<img src="{{ asset('storage') }}/${item.image}" class="w-20 h-20 object-cover rounded" alt="${item.name}">`,
                                `<div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.service.edit', $serviceSlug) }}?team_id=${item.id}" class="text-primary" title="Edit Data">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M3 17.46v3.04c0 .28.22.5.5.5h3.04c.13 0 .26-.05.35-.15L17.81 9.94l-3.75-3.75L3.15 17.1c-.1.1-.15.22-.15.36M20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75z"/>
                                        </svg>
                                    </a>
                                    <button class="text-danger btn-delete" data-slug="${item.id}" type="button" title="Delete Data">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2zM18 4h-2.5l-.71-.71c-.18-.18-.44-.29-.7-.29H9.91c-.26 0-.52.11-.7.29L8.5 4H6c-.55 0-1 .45-1 1s.45 1 1 1h12c.55 0 1-.45 1-1s-.45-1-1-1"/>
                                        </svg>    
                                    </button>
                                </div>`
                            ];
                        });
                        console.log(teamData);
                        datatable.insert({ data: teamData });
                    })
                    .catch(error => {
                        console.error("Error:", error);
                    });
                },
            }));

            Alpine.data("modal", (initialOpenState = false) => ({
                open: initialOpenState,

                toggle() {
                    this.open = !this.open;
                },
            }));
            
            // getData();

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
        
    </script>  
    
</x-layout.default>