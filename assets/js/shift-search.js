
        // Search functionality

        document.getElementById('emp-search').addEventListener('input', function () {
            let searchValue = this.value.toLowerCase();
            let rows = document.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
            let noRecordRow = document.getElementById('no-record-row');
        
            
            if (!noRecordRow) {
                let tableBody = document.getElementsByTagName('tbody')[0];
                noRecordRow = tableBody.insertRow();
                noRecordRow.id = 'no-record-row';
        
                let cell = noRecordRow.insertCell();
                cell.colSpan = 7; 
                cell.innerText = 'NO RECORD FOUND!';
                cell.style.textAlign = 'center';
                cell.style.fontWeight = 'bold';
                cell.style.color = 'red';
            }
        
           
            noRecordRow.style.display = 'none';
        
           
            for (let i = 0; i < rows.length; i++) {
                let rowText = rows[i].innerText.toLowerCase();
                let shouldDisplay = false;
        
                
                let idNumber = rows[i].cells[0].innerText.toLowerCase();
                if (idNumber.includes(searchValue)) {
                    shouldDisplay = true;
                } else {
                 
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