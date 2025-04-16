<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Podatki o igri!</title>
</head>
<body>
    <div class="container">
        <h1>Game Log</h1>
        <table>
            <thead>
                <tr>
                    <th>Attacker IP</th>
                    <th>Defender IP</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody id="tdata"></tbody>
        </table>
    </div>
</body>
<script src="fetch.js"></script>
<script>

window.onload = async () => {
    const data = await fetchData(10, 0);

    const tdata = document.getElementById('tdata');

    data.forEach((row) => {
        tdata.innerHTML += `
        <tr>
            <td>${row.Attacker}</td>    
            <td>${row.Defender}</td>    
            <td>${row.Date}</td>    
            <td>${row.Time}</td>    
        </tr>
        `;
    });
};


</script>
</html>