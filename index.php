<!DOCTYPE html>
<html lang="si">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Vojna Kraljestev - Podatki</title>
</head>
<body>
    <div class="container">
        <h1>Podatki o igrah</h1>
        <div id="controls-div">
            <button class="btn" id="prev">Nazaj</button>
            <button class="btn" id="next">Naprej</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>IP Napadalca</th>
                    <th>IP Branilca</th>
                    <th>Datum</th>
                    <th>Čas</th>
                </tr>
            </thead>
            <tbody id="tdata"></tbody>
        </table>
    </div>
</body>
<script src="fetch.js"></script>
<script>
let currPage = 0;

const prevBtn = document.getElementById('prev').addEventListener("click", function() {
    if(currPage >= 1) {
        currPage--;
        loadPage();
    }
});

const nextBtn = document.getElementById('next').addEventListener("click", function() {
    currPage++;
    loadPage();
});

window.onload = loadPage();

async function loadPage() {
    const data = await fetchData(10, currPage * 10);

    if (!data || data.length === 0) {
        currPage--;
        return;
    }


    const tdata = document.getElementById('tdata');
    tdata.innerHTML = '';

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
}

</script>
</html>