document.addEventListener('DOMContentLoaded', function () {
  const searchForm = document.getElementById('searchForm');
  const searchInput = document.getElementById('searchInput');

  if (searchForm && searchInput) {
    searchForm.addEventListener('submit', function (e) {
      e.preventDefault();
      const searchValue = searchInput.value.trim();

      if (searchValue) {
        window.location.href = `/search.php?q=${encodeURIComponent(searchValue)}`;
      }
    });
  }
});

