<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .toc {
    border: 1px solid #ccc;
    padding: 10px;
    background-color: #f7f7f7;
    width: 250px;
}

.toc strong {
    font-size: 16px;
}

.toc ul {
    list-style: none;
    padding: 0;
}

.toc li {
    margin-left: 10px;
}

.toc a {
    text-decoration: none;
}

.toc a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <div id="toc-placeholder"></div>

<h2 id="section-1">Section 1</h2>
<p>Content for Section 1</p>

<h2 id="section-2">Section 2</h2>
<p>Content for Section 2</p>

<!-- Add more sections as needed -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Function to generate the Table of Contents
    function generateTableOfContents() {
        var tocPlaceholder = document.getElementById('toc-placeholder');
        if (!tocPlaceholder) {
            return;
        }

        var headings = document.querySelectorAll('h2, h3, h4'); // Add more heading levels if needed
        if (headings.length === 0) {
            // No headings found, don't generate the TOC
            return;
        }

        var toc = document.createElement('div');
        toc.className = 'toc';
        toc.innerHTML = '<strong>Table of Contents</strong><ul>';

        headings.forEach(function (heading) {
            var level = parseInt(heading.tagName.charAt(1));
            var title = heading.textContent;
            var id = heading.id;
            var listItem = '<li class="toc-level-' + level + '"><a href="#' + id + '">' + title + '</a></li>';
            toc.innerHTML += listItem;
        });

        toc.innerHTML += '</ul>';

        // Insert the generated TOC into the placeholder
        tocPlaceholder.appendChild(toc);
    }

    // Call the function to generate the TOC
    generateTableOfContents();
});

</script>
</body>
</html>
