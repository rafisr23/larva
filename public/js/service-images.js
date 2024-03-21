// window.onload = function() {
//     $(document).ready(function() {
//         let currentURL = window.location.href;
//         let url = new URL(currentURL);
//         let serviceSlug = url.searchParams.get('type');

//         // Fungsi untuk memuat gambar menggunakan Ajax
//         function loadImages(serviceId) {
//             $.ajax({
//                 url: '/service/' + serviceId + '/getImages',
//                 type: 'GET',
//                 success: function(response) {
//                     // Menghapus semua gambar yang ada sebelumnya
//                     $('#imageContainer').empty();

//                     // Menambahkan gambar ke dalam container
//                     response.forEach(function(image) {
//                         let imageUrl = window.storagePath + '/' + image.file_path;
//                         let imageElement = `
//                         <div class="col-xl-3">
//                             <div class="project-detail-img">
//                                 <img src="${imageUrl}" alt="${image.file_name}">
//                             </div>
//                         </div>`;
//                         $('#imageContainer').append(imageElement);
//                     });
//                 },
//                 error: function(xhr, status, error) {
//                     console.error(error);
//                 }
//             });
//         }

//         // Memanggil fungsi untuk memuat gambar setelah halaman sepenuhnya dimuat
//         loadImages(serviceSlug);
//     });
// };