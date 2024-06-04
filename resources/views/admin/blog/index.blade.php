<x-layout.default>
    <x-slot name="title">{{ $title }}</x-slot>

    <div x-data="blog">
        <div class="panel">
            <div class="flex items-center mb-5">
                <h5 class="font-semibold text-xl me-5">Blog List</h5>
                <a href="{{ route('admin.blog.create') }}" class="btn btn-danger">Add New</a>
            </div>
            <table class="whitespace-nowrap table-hover" id="blogTable" x-ref="blogTable">
                
            </table>
            <div class="overflow-x-auto">
            </div>
        </div>
    </div>

    <script>
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
            Alpine.data("blog", () => ({
                init() {
                    datatable = new simpleDatatables.DataTable("#blogTable", {
                        data: {
                            headings: ["<div class='text-center'>No</div>", "Title", "Category", "<div class='text-center'>Publish Date</div>", "<div class='text-center'>Status</div>", "<div class='text-center'>Action</div>"],
                            data: this.getData(),
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
                
                getStatusBadge(status) {
                    if (status === 'draft') {
                        return '<span class="badge bg-warning">Draft</span>';
                    } else if (status === 'published') {
                        return '<span class="badge bg-success">Published</span>';
                    } else if (status === 'archived') {
                        return '<span class="badge bg-secondary">Archived</span>';
                    }
                    return '<span class="badge bg-light">Unknown</span>';
                },

                getData() {
                    fetch("{{ route('admin.blog.get-blogs') }}", {
                        method: "GET",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": CSRF_TOKEN
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        // data to aray
                        // console.log(data);
                        let blogData = data.map((item, index) => {
                            return [
                                "<div class='text-center'>" + (index + 1) + "</div>",
                                item.title,
                                item.category.name, 
                                new Date(item.published_at).toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric' }),
                                this.getStatusBadge(item.status),
                                `<div class="flex items-center justify-center gap-2">
                                    <a href="/admin/blog/${item.slug}/edit" class="text-primary" title="Edit Data">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M3 17.46v3.04c0 .28.22.5.5.5h3.04c.13 0 .26-.05.35-.15L17.81 9.94l-3.75-3.75L3.15 17.1c-.1.1-.15.22-.15.36M20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75z"/>
                                        </svg>
                                    </a>
                                    <button class="text-info btn-archive" data-slug="${item.slug}" type="button" title="Archive Data">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="m12 18l4-4l-1.4-1.4l-1.6 1.6V10h-2v4.2l-1.6-1.6L8 14zm-7 3q-.825 0-1.412-.587T3 19V6.525q0-.35.113-.675t.337-.6L4.7 3.725q.275-.35.687-.538T6.25 3h11.5q.45 0 .863.188t.687.537l1.25 1.525q.225.275.338.6t.112.675V19q0 .825-.587 1.413T19 21zm.4-15h13.2l-.85-1H6.25z"/>
                                        </svg>
                                    </button>
                                    <button class="text-danger btn-delete" data-slug="${item.slug}" type="button" title="Delete Data">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2zM18 4h-2.5l-.71-.71c-.18-.18-.44-.29-.7-.29H9.91c-.26 0-.52.11-.7.29L8.5 4H6c-.55 0-1 .45-1 1s.45 1 1 1h12c.55 0 1-.45 1-1s-.45-1-1-1"/>
                                        </svg>    
                                    </button>
                                </div>`
                            ];
                        });
                        // console.log(blogData);
                        datatable.insert({ data: blogData });
                    })
                    .catch(error => {
                        console.error("Error:", error);
                    });
                },
            }));

            $('#blogTable').on('click', '.btn-delete', function() {
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
                        let url = "{{ route('admin.blog.destroy', ':slug') }}".replace(':slug', slug);
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
                                        text: 'Blog has been deleted!',
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
                                        text: 'Failed to delete blog!',
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

            $('#blogTable').on('change', '.is_active', function() {
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