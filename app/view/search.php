<?php
function html_search_form($kw = '', $limite = LIMIT_ARTICLES, $date_min = '', $date_max = '', $readtime = '')
{
    return <<<HTML
<div class="search-container">
    <h4>Recherche</h4>
    <form id="searchForm" class="search-form">
        <div class="form-group">
            <input name="kw" type="text" placeholder="Mot-clé" value="$kw" class="form-control">
        </div>

        <div class="form-group">
            <label>Résultats par page:</label>
            <select name="limit" class="form-control">
                <option value="5" " . ($limite == 5 ? "selected" : "") . ">5</option>
                <option value="10" " . ($limite == 10 ? "selected" : "") . ">10</option>
                <option value="20" " . ($limite == 20 ? "selected" : "") . ">20</option>
                <option value="50" " . ($limite == 50 ? "selected" : "") . ">50</option>
            </select>
        </div>

        <div class="form-group">
            <label>Date:</label>
            <input type="date" name="date_min" value="$date_min" class="form-control">
            <span>à</span>
            <input type="date" name="date_max" value="$date_max" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>
</div>

<div id="search-results">
    <p>Saisissez un mot-clé pour lancer une recherche.</p>
</div>

<style>
    .search-container {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .search-form {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        align-items: flex-end;
    }

    .form-group {
        margin-bottom: 10px;
        flex: 1;
        min-width: 200px;
    }

    .form-control {
        width: 100%;
        padding: 8px;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    .btn-primary {
        background-color: #0d6efd;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0b5ed7;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('searchForm');
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        fetch('rechercher_articles.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById('search-results').innerHTML = data;
        })
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