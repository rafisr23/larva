<x-layout.default>
    <x-slot name="title">{{ $title }}</x-slot>

    <div x-data="partner">
        <div class="panel">
            <div class="flex items-center mb-5">
                <h5 class="font-semibold text-xl me-5">Partner List</h5>
                <a href="{{ route('admin.partner.create') }}" class="btn btn-danger">Add New</a>
            </div>
            <table class="whitespace-nowrap table-hover" id="partnerTable">
                
            </table>
        </div>
    </div>

    <script>
        const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        document.addEventListener("alpine:init", () => {
            let datatable = null;
            Alpine.data("partner", () => ({
                init() {
                    datatable = new simpleDatatables.DataTable('#partnerTable', {
                        data: {
                            headings: ["<div class='text-center'>No</div>", "Company Name", "<div class='text-center'>Logo</div>", "<div class='text-center'>Status</div>", "<div class='text-center'>Action</div>"],
                            data: this.getData(),
                        },
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [10, 20, 30, 50, 100],
                        columns: [
                            {
                                select: 2,
                                render: (data, cell, row) => {
                                    let element =  data ? `<div class="flex items-center justify-center"><img src="{{ asset('storage') }}/${data}" alt="${row.cells[1].textContent}" class="w-20 h-20 object-cover" /></div>` : '';
                                    return element;
                                },
                                sortable: false
                            },
                            {
                                select: 3,
                                render: (data, cell, row) => {
                                    const isChecked = (data == 'Active');
                                    return `
                                        <div class="flex items-center justify-center">
                                            <label class="w-12 h-6 relative">
                                            <input type="checkbox" class="is_active custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer" name="is_active" ${isChecked ? 'checked' : ''} />
                                            <span for="is_active" class="bg-danger dark:bg-danger block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-success before:transition-all before:duration-300"></span>
                                            </label>
                                        </div>
                                    `;
                                },
                                sortable: false
                            },
                            {
                                select: 4,
                                sortable: false
                            }
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
                    fetch("{{ route('admin.partner.get-partners') }}", {
                        method: "GET",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": CSRF_TOKEN
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        let partnerData = data.map((partner, index) => {
                            return [
                                "<div class=''>" + (index + 1) + "</div>",
                                partner.company_name,
                                partner.icon,
                                partner.is_active == 1 ? 'Active' : 'Inactive',
                                `<div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.partner.edit', ':slug') }}" class="text-primary btn-edit" type="button" title="Edit Data">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M3 17.46v3.04c0 .28.22.5.5.5h3.04c.13 0 .26-.05.35-.15L17.81 9.94l-3.75-3.75L3.15 17.1c-.1.1-.15.22-.15.36M20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75z"/>
                                        </svg>
                                    </a>
                                    <button class="text-danger btn-delete" data-slug="${partner.slug}" type="button" title="Delete Data">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2zM18 4h-2.5l-.71-.71c-.18-.18-.44-.29-.7-.29H9.91c-.26 0-.52.11-.7.29L8.5 4H6c-.55 0-1 .45-1 1s.45 1 1 1h12c.55 0 1-.45 1-1s-.45-1-1-1"/>
                                        </svg>    
                                    </button>
                                </div>`.replace(':slug', partner.slug)
                            ];
                        });
                        console.log(partnerData);
                        datatable.insert({ data: partnerData });
                    })
                    .catch(error => {
                        console.error("Error:", error);
                    });
                },
            }));

            $('#partnerTable').on('click', '.btn-delete', function() {
                let slug = $(this).data('slug');

                new window.Swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    customClass: 'sweet-alerts',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = "{{ route('admin.partner.destroy', ':slug') }}".replace(':slug', slug);
                        $.ajax({
                            url: url,
                            type: "DELETE",
                            data: {
                                _token: CSRF_TOKEN,
                                slug: slug
                            },
                            success: (response) => {
                                if (response.success) {
                                    new window.Swal({
                                        title: 'Success!',
                                        text: 'Partner has been deleted!',
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
                                        text: 'Failed to delete partner!',
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

            $('#partnerTable').on('change', '.is_active', function() {
                let slug = $(this).closest('tr').find('.btn-delete').data('slug');
                let status = $(this).prop('checked') ? 1 : 0;

                let url = "{{ route('admin.partner.update-status', ':slug') }}".replace(':slug', slug);
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
            });
        });
        
    </script>  
    
</x-layout.default>