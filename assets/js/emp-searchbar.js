// Search functionality

document.getElementById('emp-search').addEventListener('input', function () {
    let searchValue = this.value.toLowerCase();
    let rows = document.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    let noRecordRow = document.getElementById('no-record-row');

    // Check if the "NO RECORD FOUND!" row exists, if not, create it
    if (!noRecordRow) {
        let tableBody = document.getElementsByTagName('tbody')[0];
        noRecordRow = tableBody.insertRow();
        noRecordRow.id = 'no-record-row';

        let cell = noRecordRow.insertCell();
        cell.colSpan = 7; // Set the colspan to the number of columns in your table
        cell.innerText = 'NO RECORD FOUND!';
        cell.style.textAlign = 'center';
        cell.style.fontWeight = 'bold';
        cell.style.color = 'red';
    }

    // Hide the "NO RECORD FOUND!" row by default
    noRecordRow.style.display = 'none';

    // Check each row in the table for a match
    for (let i = 0; i < rows.length; i++) {
        let rowText = rows[i].innerText.toLowerCase();
        let shouldDisplay = false;

        // Check if the search input matches the ID Number
        let idNumber = rows[i].cells[0].innerText.toLowerCase();
        if (idNumber.includes(searchValue)) {
            shouldDisplay = true;
        } else {
            // Check each cell in the row for a match
            for (let j = 1; j < rows[i].cells.length; j++) {
                let cellText = rows[i].cells[j].innerText.toLowerCase();
                if (cellText.includes(searchValue)) {
                    shouldDisplay = true;
                    break;
                }
            }
        }

        rows[i].style.display = shouldDisplay ? '' : 'none';
    }

    // Display the "NO RECORD FOUND!" row if no matches are found
    noRecordRow.style.display = (Array.from(rows).every(row => row.style.display === 'none')) ? '' : 'none';
});
