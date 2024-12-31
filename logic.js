document.getElementById('narocanje_obrazec').addEventListener('submit', function(event) { 
    event.preventDefault(); // Prevent the default form submission 
    // Change content on the current page 
    document.getElementById('narocanje_sporocilo').innerText = `Hvala za vaše sporočilo. Odgovorili vam bomo v najkrajšem možnem času. `; 
    document.getElementById('narocanje_obrazec').style.display = 'none';
    
    // Optionally, you can clear the form 
    this.reset(); 
}); 