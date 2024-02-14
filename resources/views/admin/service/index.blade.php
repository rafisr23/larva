<x-layout.default>
    <x-slot name="title">{{ $title }}</x-slot>

    <div x-data="service">
        <div class="panel">
            <div class="flex items-center mb-5">
                <h5 class="font-semibold text-xl me-5">Service List</h5>
                <a href="{{ route('admin.service.create') }}" class="btn btn-danger">Add New</a>
            </div>
            <table class="whitespace-nowrap table-hover" id="service-table" x-ref="serviceTable">
                
            </table>
            <div class="overflow-x-auto">
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
                                    headings: ["<div class='text-center'>No</div>", "Name", "Description", "Range Price", "<div class='text-center'>Status</div>", "<div class='text-center'>Action</div>"],
                                    data: data.map((element, index) => [
                                        index + 1,
                                        element.service_name,
                                        element.description,
                                        formatCurrency(element.min_price) + ' - ' + formatCurrency(element.max_price),
                                        element.is_active == 1 ? 'Active' : 'Inactive',
                                        `<div class="flex items-center justify-center gap-2">
                                            <a href="/admin/service/${element.slug}/team" class="text-info" title="Service Team">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14.754 10c.966 0 1.75.784 1.75 1.75v4.749a4.501 4.501 0 0 1-9.002 0V11.75c0-.966.783-1.75 1.75-1.75zm-7.623 0a2.72 2.72 0 0 0-.62 1.53l-.01.22v4.749c0 .847.192 1.649.534 2.365A4.001 4.001 0 0 1 2 14.999V11.75a1.75 1.75 0 0 1 1.606-1.744L3.75 10zm9.744 0h3.375c.966 0 1.75.784 1.75 1.75V15a4 4 0 0 1-5.03 3.866c.3-.628.484-1.32.525-2.052l.009-.315V11.75c0-.665-.236-1.275-.63-1.75M12 3a3 3 0 1 1 0 6a3 3 0 0 1 0-6m6.5 1a2.5 2.5 0 1 1 0 5a2.5 2.5 0 0 1 0-5m-13 0a2.5 2.5 0 1 1 0 5a2.5 2.5 0 0 1 0-5"/></svg>    
                                            </a>
                                            <a href="/admin/service/${element.slug}/edit" class="text-primary" title="Edit Data">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M3 17.46v3.04c0 .28.22.5.5.5h3.04c.13 0 .26-.05.35-.15L17.81 9.94l-3.75-3.75L3.15 17.1c-.1.1-.15.22-.15.36M20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75z"/>
                                                </svg>
                                            </a>
                                            <button class="text-danger btn-delete" data-slug="${element.slug}" type="button" title="Delete Data">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2zM18 4h-2.5l-.71-.71c-.18-.18-.44-.29-.7-.29H9.91c-.26 0-.52.11-.7.29L8.5 4H6c-.55 0-1 .45-1 1s.45 1 1 1h12c.55 0 1-.45 1-1s-.45-1-1-1"/>
                                                </svg>    
                                            </button>
                                        </div>`
                                    ]),
                                },
                                searchable: true,
                                perPage: 10,
                                perPageSelect: [10, 20, 30, 50, 100],
                                columns: [
                                    {
                                        select: 0,
                                        // add class text-center
                                        render: (data, cell, row) => {
                                            return `<div class="flex items-center justify-center ">${data}</div>`;
                                        },
                                    },
                                    {
                                        select: 1,
                                        sortable: true,
                                    },
                                    {
                                        select: 2,
                                        sortable: true,
                                    },
                                    {
                                        select: 3,
                                        sortable: true,
                                    },
                                    {
                                        select: 4,
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