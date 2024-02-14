<x-layout.default>
    <x-slot name="title">{{ $title }}</x-slot>

    <div x-data="serviceTeam">
        <div class="panel">
            <div class="flex items-center mb-5">
                <h5 class="font-semibold text-xl me-5">{{ ucwords(strtolower($serviceName)) }} Team List</h5>
                <a href="{{ route('admin.service.create') }}" class="btn btn-danger">Add New</a>
            </div>
            <table class="whitespace-nowrap table-hover" id="serviceTeamTable">
                
            </table>
            <div class="overflow-x-auto">
            </div>
            <a href="{{ route('admin.service.index') }}" class="btn btn-warning w-24 !mt-6">Back</a>
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
                        searchable: false,
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
                                item.sosial_link,
                                // `<img src="{{ asset('storage') }}/${item.image}" class="w-20 h-20 object-cover rounded" alt="${item.name}">`,
                                '',
                                `<div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.service.edit', $serviceSlug) }}?team_id=${item.id}" class="btn btn-primary">Edit</a>
                                    <button class="btn btn-danger" @click="deleteTeam(${item.id})">Delete</button>
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
        
    </script>  
    
</x-layout.default>