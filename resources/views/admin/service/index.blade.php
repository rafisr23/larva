<x-layout.default>

    <div x-data="service">
        <div class="grid gap-6 mb-6">
            {{-- <div class="panel P-3 h-full">
                <div class="flex items-center justify-between">
                    <h5 class="font-semibold text-xl">Service List</h5>
                    <a href="{{ route('admin.service.create') }}" class="btn btn-danger">Add New</a>
                </div>
            </div> --}}

            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-xl">Service List</h5>
                    <a href="{{ route('admin.service.create') }}" class="btn btn-danger">Add New</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="table" id="service-table">
                        
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("service", () => ({
                datatable: null,
                init() {
                    $.ajax({
                        url: "{{ route('admin.service.index') }}", 
                        type: 'GET',
                        success: (data) => {
                            // Initialize the DataTable after successfully fetching data
                            this.datatable = new simpleDatatables.DataTable('#service-table', {
                                data: {
                                    headings: ["No", "Name", "Description", "Range Price", "Status", "Action"],
                                    data: data.map(element => [
                                        element.id,
                                        element.service_name,
                                        element.description,
                                        element.min_price + ' - ' + element.max_price,
                                        element.is_active == 1 ? 'Active' : 'Inactive',
                                        `<div class="flex items-center space-x-2">
                                            <a href="{{ route('admin.service.edit', ':id') } }".replace(':id', element.id)" class="btn btn-primary">Edit</a>
                                            <button class="btn btn-danger" x-on:click="deleteService(${element.id})">Delete</button>
                                        </div>`
                                    ]),
                                },
                                searchable: true,
                                perPage: 10,
                                perPageSelect: [10, 20, 30, 50, 100],
                                columns: [{
                                    select: 0,
                                    sort: "asc"
                                }],
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
        });

    </script>
</x-layout.default>