<!DOCTYPE html>
<html>
<head>
    <title>Route Commands</title>
</head>
<body>

<h2>Artisan Command Runner</h2>

<form id="commandForm">
    <label>Command:</label>
    <input type="text" name="command" placeholder="e.g. make:model" required>

    <br><br>

    <label>Options (JSON):</label>
    <textarea name="options" placeholder='{"name":"Post"}'></textarea>

    <br><br>

    <button type="submit">Run</button>
</form>

<h3>Output:</h3>
<pre id="output"></pre>

<script>
document.getElementById('commandForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    const response = await fetch('/route-commands/run', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
    });

    const data = await response.json();
    document.getElementById('output').innerText = data.output;
});
</script>

</body>
</html>