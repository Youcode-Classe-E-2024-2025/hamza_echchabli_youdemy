<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Non Trouvée</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Global Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Background Styling */
body {
    background: #f3f4f6;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    text-align: center;
}

/* 404 Container */
.container {
    max-width: 600px;
    background: #ffffff;
    padding: 50px 30px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* 404 Heading */
.container h1 {
    font-size: 8rem;
    font-weight: 700;
    color: #4C51BF;
}

.container h2 {
    font-size: 2rem;
    font-weight: 600;
    color: #2D3748;
    margin-bottom: 15px;
}

.container p {
    font-size: 1.2rem;
    color: #4A5568;
    margin-bottom: 30px;
}

/* Button Styling */
.btn {
    text-decoration: none;
    background: #4C51BF;
    color: #ffffff;
    padding: 14px 30px;
    font-size: 1.1rem;
    border-radius: 8px;
    transition: background 0.3s ease;
    display: inline-block;
}

.btn:hover {
    background: #4338CA;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container h1 {
        font-size: 6rem;
    }
    .container h2 {
        font-size: 1.8rem;
    }
    .container p {
        font-size: 1rem;
    }
    .btn {
        padding: 12px 20px;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <h2>Oops! Page Non Trouvée</h2>
        <p>La page que vous recherchez a peut-être été supprimée, son nom a changé ou est temporairement indisponible.</p>
        <a href="/" class="btn">Retour à l'accueil</a>
    </div>
</body>
</html>
