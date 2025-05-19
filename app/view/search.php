<?php
/*
 * Display the search form with keyword , limit , date min , date max and reading time
 */
function html_search_form($kw = '', $limite = LIMIT_ARTICLES, $date_min = '', $date_max = '', $readtime = '')
{
    return <<<HTML
<style>
    .spa-layout {
        display: flex;
        flex-direction: column;
        height: 100vh;
    }
    .spa-header, .spa-footer {
        background-color: #eee;
        padding: 1rem;
        text-align: center;
    }
    .spa-body {
        display: flex;
        flex: 1;
    }
    .sidebar {
        width: 15%;
        padding: 1rem;
        background-color: #d4f8d4;
        box-sizing: border-box;
    }
    .sidebar.right {
        background-color: #f8d4d4;
    }
    .main-content {
        flex: 1;
        padding: 1rem;
        background-color: #d4e7f8;
        overflow-y: auto;
    }
</style>

<div class="spa-layout">
    <div class="spa-header">Header</div>
    <div class="spa-body">
      
        <div class="sidebar">
            <h4>Recherche</h4>
            <form id="searchForm">
                <label>Mot-clé :</label><br>
                <input name="kw" type="text" value="$kw"><br><br>

                <label>Nombre de résultats :</label><br>
                <input name="limit" type="number" value="$limite"><br><br>

                <label>Date minimale :</label><br>
                <input type="date" name="date_min" value="$date_min"><br><br>

                <label>Date maximale :</label><br>
                <input type="date" name="date_max" value="$date_max"><br><br>

                <label>Temps de lecture :</label><br>
                <input type="range" name="reading-time" min="1" max="60" value="$readtime" class="slider">
                <span id="slider-value">$readtime minutes</span><br><br>

                <button type="submit">Rechercher</button>
            </form>
        </div>

      
        <div class="sidebar right">
            <h4>Options</h4>
           
        </div>

      
        <div class="main-content" id="search-results">
            <p>Les résultats de votre recherche apparaîtront ici.</p>
        </div>
    </div>
    <div class="spa-footer">Footer</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const slider = document.querySelector('input[name="reading-time"]');
    const sliderValue = document.getElementById('slider-value');
    slider.addEventListener('input', () => {
        sliderValue.textContent = slider.value + ' minutes';
    });

    const form = document.getElementById('searchForm');
    form.addEventListener('submit', function (e) {
        e.preventDefault();

       fetch('../app/controller/search.php', {
    method: "POST",
    body: formData
})
.then(response => response.text()) // Ou .json() si le serveur renvoie du JSON
.then(data => {
    document.getElementById("search-results").innerHTML = data;
})
.catch(error => {
    console.error("Erreur lors de la requête :", error);

        .catch(error => {
            document.getElementById('search-results').innerHTML = "<p>Erreur lors de la recherche.</p>";
            console.error(error);
        });
    });
});
</script>
HTML;
}
?>
