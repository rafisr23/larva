<x-layout.default>
    <x-slot name="title">{{ $title }}</x-slot>

    <div x-data="service">
        <div class="grid gap-6 mb-6">
            {{-- <div class="panel P-3 h-full">
                <div class="flex items-center justify-between">
                    <h5 class="font-semibold text-xl">Service List</h5>
                    <a href="{{ route('admin.service.create') }}" class="btn btn-danger">Add New</a>
                </div>
            </div> --}}

            <div class="panel">
                <div class="flex items-center mb-5">
                    <h5 class="font-semibold text-xl me-5">Service List</h5>
                    <a href="{{ route('admin.service.create') }}" class="btn btn-danger">Add New</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="table" id="service-table" x-ref="serviceTable">
                        
                    </table>
                </div>
            </div>
            <div id="toast"></div>
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
            Alpine.data("service", () => ({
                datatable: null,
                init() {
                    $.ajax({
                        url: "{{ route('admin.service.get-services') }}", 
                        type: 'GET',
                        success: (data) => {
                            if (this.datatable) {
                                this.datatable.destroy();
                            }

                            this.datatable = new simpleDatatables.DataTable(this.$refs.serviceTable, {
                                data: {
                                    headings: ["No", "Name", "Description", "Range Price", "Status", "Action"],
                                    data: data.map((element, index) => [
                                        index + 1,
                                        element.service_name,
                                        element.description,
                                        formatCurrency(element.min_price) + ' - ' + formatCurrency(element.max_price),
                                        element.is_active == 1 ? 'Active' : 'Inactive',
                                        `<div class="flex items-center space-x-2">
                                            <a href="/admin/service/${element.slug}/edit" class="btn btn-primary">Edit</a>
                                            <button class="btn btn-danger btn-delete" data-slug="${element.slug}" type="button">Delete</button>
                                        </div>`
                                    ]),
                                },
                                searchable: true,
                                perPage: 10,
                                perPageSelect: [10, 20, 30, 50, 100],
                                columns: [{
                                    select: 0,
                                    sort: "asc"
                                }, {
                                    select: 4,
                                    render: (data, cell, row) => {
                                        const isChecked = (data == 'Active');
                                        return `
                                            <div class="flex items-center">
                                                <label class="w-12 h-6 relative">
                                                    <input type="checkbox" class="is_active custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer" name="is_active" ${isChecked ? 'checked' : ''} />
                                                    <span for="is_active" class="bg-danger dark:bg-danger block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-success before:transition-all before:duration-300"></span>
                                                </label>
                                            </div>
                                        `;
                                    }
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
                            });
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                },
            }));

            $('#service-table').on('click', '.btn-delete', function() {
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
                        let url = "{{ route('admin.service.destroy', ':slug') }}".replace(':slug', slug);
                        $.ajax({
                            url: url,
                            type: "DELETE",
                            data: {
                                _token: CSRF_TOKEN,
                                slug: slug
                            },
                            success: (response) => {
                                if (response.success) {
                                    window.location.reload();
                                    // Alpine.store('service').init();
                                    // const toast = window.Swal.mixin({
                                    //     toast: true,
                                    //     position: 'top-right',
                                    //     animation: true,
                                    //     showConfirmButton: false,
                                    //     timer: 3000,
                                    //     customClass: {
                                    //         popup: 'color-success'
                                    //     },
                                    //     showCloseButton: true,
                                    //     target: document.getElementById('toast')
                                    // });
                                    // toast.fire({
                                    //     icon: 'success',
                                    //     title: response.message,
                                    //     padding: '10px 20px'
                                    // });
                                }
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    }
                });
            });

            $('#service-table').on('change', '.is_active', function() {
                let slug = $(this).closest('tr').find('.btn-delete').data('slug');
                let status = $(this).prop('checked') ? 1 : 0;

                let url = "{{ route('admin.service.update-status', ':slug') }}".replace(':slug', slug);
                $.ajax({
                    url: url,
                    type: "PUT",
                    data: {
                        _token: CSRF_TOKEN,
                        slug: slug,
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