
<?php



$sql = "SELECT
    p.id_phim,
    p.ten_phim,
    p.nam_san_xuat,
    p.mo_ta,
    p.loai_phim,
    p.hinh_anh,
    p.created_at,
    p.diem_danh_gia,
    pb.id_phimbo,
    pl.id_phimle
FROM phim p
LEFT JOIN phim_bo pb ON p.id_phim = pb.id_phim
LEFT JOIN phim_le pl ON p.id_phim = pl.id_phim
WHERE p.loai_phim = 0 OR p.loai_phim = 1
ORDER BY p.diem_danh_gia DESC
;
";

$result = $mysqli->query($sql);

$movies = [];

if ($result && $result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
}


?>
<main>
    <section class="tv-series">

        <div class="container">
        <input type="text" id="searchInput" placeholder="Nhập từ khóa tìm kiếm">


            <ul id="searchResults" class="movies-list">
              
            </ul>
        </div>
    </section>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const searchResults = document.getElementById('searchResults');
        const moviesList = document.querySelector('.movies-list');
        const movies = <?php echo json_encode($movies); ?>;


        searchInput.addEventListener('input', function () {

            const searchTerm = searchInput.value.trim().toLowerCase();


            const filteredMovies = movies.filter(movie => movie.ten_phim.toLowerCase().includes(searchTerm));


            displaySearchResults(filteredMovies);
        });


        function displaySearchResults(results) {

            moviesList.style.display = results.length > 0 ? 'none' : 'flex';
            searchResults.style.display = results.length > 0 ? 'grid' : 'none';


            searchResults.innerHTML = '';


            results.forEach(function (movie) {
                const li = document.createElement('li');
                li.innerHTML = `
                    <div class="movie-card">
                        <a href="index.php?quanly=details&id_phim=${movie.id_phim}&${movie.loai_phim == 0 ? 'id_phimle=' + movie.id_phimle : 'id_phimbo=' + movie.id_phimbo}">
                            <figure class="card-banner">
                                <img src="./admin/modules/quanlyphim/uploads/img/${movie.hinh_anh}" alt="${movie.ten_phim} movie poster">
                            </figure>
                        </a>
                        <div class="title-wrapper">
                            <a href="./movie-details.html">
                                <h3 class="card-title">${movie.ten_phim}</h3>
                            </a>
                            <time datetime="${movie.nam_san_xuat}">${movie.nam_san_xuat}</time>
                        </div>
                        <div class="card-meta">
                            <div class="badge badge-outline">2K</div>
                            <div class="duration"></div>
                            <div class="rating">
                                <ion-icon name="star"></ion-icon>
                                <data>${movie.diem_danh_gia}</data>
                            </div>
                        </div>
                    </div>
                `;
                searchResults.appendChild(li);
            });
        }
    });
</script>
