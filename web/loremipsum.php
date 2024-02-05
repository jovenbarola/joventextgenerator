<style>
    div#output {
        background-color: black;
        color: lime;
        padding: 12px;
        border-radius: 6px;
        border: 1px solid lime;
        margin-top: 20px;
    }
</style>
<div class="wrap">
    <h2>Joven Generate Text - Lorem Ipsum</h2>
    <p>This page is used to generate sample lorem ipsum.</p>
    <form id="loremIpsumForm">
        <label for="paragraphs">Number of Paragraphs:</label>
        <input type="number" id="paragraphs" name="paragraphs" value="3" min="1" max="10">

        <label for="wordsPerParagraph">Words per Paragraph:</label>
        <input type="number" id="wordsPerParagraph" name="wordsPerParagraph" value="50" min="1" max="100">

        <button type="button" onclick="generateLoremIpsum()">Generate Lorem Ipsum</button>
    </form>

    <div id="output" style="display:none;"></div>

    <script>
        function generateLoremIpsum() {
            var paragraphs = document.getElementById('paragraphs').value;
            var wordsPerParagraph = document.getElementById('wordsPerParagraph').value;

            // You can replace this URL with your own server-side script or API endpoint.
            var apiUrl = 'https://baconipsum.com/api/';

            // Fetch Lorem Ipsum content from the server.
            fetch(apiUrl + '?type=all-meat&paras=' + paragraphs + '&sentences=' + wordsPerParagraph)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    jQuery('#output').show()
                    // Display the generated Lorem Ipsum content.
                    document.getElementById('output').innerHTML = data.join('<p>');
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</div>
