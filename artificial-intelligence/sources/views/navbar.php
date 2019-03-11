<nav class="indigo accent-4">
    <div class="nav-wrapper white-text">
        <form>
            <div class="input-field">
                <input id="search" type="search" onkeyup="filter()" required>
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
            </div>
        </form>
    </div>
</nav>


<script>
function filter() {
    var input, filter, table, tr, td, i;
    input  = document.getElementById("search");
    filter = input.value.toUpperCase();
    table  = document.getElementById("table");
    tr     = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[0];
		if (td) {
			if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			} else {
				tr[i].style.display = "none";
			}
      	}
    }
}
</script>
