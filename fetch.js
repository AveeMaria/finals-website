async function fetchData(limit, offset) {
    try {
        const response = await fetch(`http://localhost/game/izpisi.php?n=${limit}&o=${offset}`);
        if (!response.ok) throw new Error("Fetch failed");

        const data = await response.json();
        //console.log(data);
        return data;
    } catch (error) {
        console.error("Error fetching data:", error);
        return [];
    }
}