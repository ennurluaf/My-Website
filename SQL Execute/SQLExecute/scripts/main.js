function executeSQL() {
    const sqlCode = document.getElementById('sqlCode').value;
    console.log(sqlCode);

    // Make an AJAX request to execute SQL
    fetch('execute_sql.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ sqlCode }),
    })
    .then(response => response.json())
    .then(data => {
        console.log('data \n' + data);
        const resultElement = document.getElementById('result');
        resultElement.innerHTML = '';  // Clear previous results
        console.log(resultElement);
        if (data.success) {
            console.log(data);
            if (data.data.length === 0) {
                resultElement.innerHTML = '<p>No results found.</p>';
                console.log(resultElement.innerHTML);
            } else {
                const table = document.createElement('table');
                table.innerHTML = '<tr><th>Column Name</th><th>Value</th></tr>';
                console.log(table.innerHTML);
                
                data.data.forEach(row => {
                    const tr = document.createElement('tr');
                    Object.keys(row).forEach(key => {
                        const td = document.createElement('td');
                        td.textContent = row[key];
                        tr.appendChild(td);
                    });
                    table.appendChild(tr);
                    console.log(tr);
                });

                resultElement.appendChild(table);
            }
        } else {
            // Display error message
            resultElement.innerHTML = `<p>Error: ${data.message}</p>`;
        }
    })
    .catch(error => {
       console.log('Error:', error);
    });
}
