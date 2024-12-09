<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System - README</title>
</head>
<body>
    <header>
        <h1>Book Collection System</h1>
        <p>
            A robust web-based application built with Laravel for the backend and Vue.js (using Inertia.js) for the frontend.
            This project allows seamless management of books, including adding, editing, and deleting book records.
        </p>
    </header>

    <section>
        <h2>Features</h2>
        <ul>
            <li>Add, edit, and delete book records.</li>
            <li>Validation for book fields such as title, author, description, published year, and status.</li>
            <li>Smooth frontend integration using Vue.js and TailwindCSS.</li>
            <li>Backend powered by Laravel, ensuring security and performance.</li>
        </ul>
    </section>

    <section>
        <h2>Installation and Setup</h2>
        <h3>Prerequisites</h3>
        <ul>
            <li>PHP 8.1 or higher</li>
            <li>Composer</li>
            <li>Node.js (with npm or yarn)</li>
            <li>MySQL or any other database supported by Laravel</li>
        </ul>

        <h3>Steps</h3>
        <ol>
            <li><strong>Clone the repository:</strong>
                <pre><code>git clone https://https://github.com/JonathanAudu/FigArts-Books-collection.git
cd library-management</code></pre>
            </li>
            <li><strong>Install dependencies:</strong>
                <ul>
                    <li>Backend:
                        <pre><code>composer install</code></pre>
                    </li>
                    <li>Frontend:
                        <pre><code>npm install</code></pre>
                    </li>
                </ul>
            </li>
            <li><strong>Set up the environment:</strong>
                <pre><code>cp .env.example .env</code></pre>
                Update the <code>.env</code> file with your database and other configurations.
            </li>
            <li><strong>Generate application keys:</strong>
                <pre><code>php artisan key:generate</code></pre>
            </li>
            <li><strong>Run migrations:</strong>
                <pre><code>php artisan migrate</code></pre>
            </li>
            <li><strong>Compile frontend assets:</strong>
                <pre><code>npm run dev</code></pre>
            </li>
            <li><strong>Start the development server:</strong>
                <pre><code>php artisan serve</code></pre>
            </li>
        </ol>
    </section>

    <section>
        <h2>Book Management</h2>
        <h3>Database Schema</h3>
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>id</td>
                    <td>Integer</td>
                    <td>Primary key</td>
                </tr>
                <tr>
                    <td>title</td>
                    <td>String</td>
                    <td>Book title</td>
                </tr>
                <tr>
                    <td>author</td>
                    <td>String</td>
                    <td>Author of the book</td>
                </tr>
                <tr>
                    <td>description</td>
                    <td>Text</td>
                    <td>Description or summary of the book</td>
                </tr>
                <tr>
                    <td>published_year</td>
                    <td>Integer</td>
                    <td>Year the book was published</td>
                </tr>
                <tr>
                    <td>status</td>
                    <td>Enum</td>
                    <td>Current status (<code>available</code>, <code>borrowed</code>, <code>reserved</code>)</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section>
        <h2>Endpoints</h2>
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Method</th>
                    <th>URI</th>
                    <th>Action</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>GET</td>
                    <td>/books</td>
                    <td>index</td>
                    <td>Display list of books</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/books/create</td>
                    <td>create</td>
                    <td>Show form to add a book</td>
                </tr>
                <tr>
                    <td>POST</td>
                    <td>/books</td>
                    <td>store</td>
                    <td>Save a new book</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/books/{book}</td>
                    <td>show</td>
                    <td>View a specific book</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/books/{book}/edit</td>
                    <td>edit</td>
                    <td>Show form to edit a book</td>
                </tr>
                <tr>
                    <td>PATCH/PUT</td>
                    <td>/books/{book}</td>
                    <td>update</td>
                    <td>Update a book</td>
                </tr>
                <tr>
                    <td>DELETE</td>
                    <td>/books/{book}</td>
                    <td>destroy</td>
                    <td>Delete a book</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section>
        <h2>Common Issues and Fixes</h2>
        <h3>Error: The PUT method is not supported for route</h3>
        <p>
            Ensure the route handles both <code>PUT</code> and <code>PATCH</code> methods:
        </p>
        <pre><code>Route::match(['PUT', 'PATCH'], '/books/{book}', [BookController::class, 'update'])->name('books.update');</code></pre>
    </section>

    <section>
        <h2>Contributing</h2>
        <p>Contributions are welcome! Please fork the repository and submit a pull request.</p>
    </section>

    <section>
        <h2>License</h2>
        <p>This project is licensed under the MIT License.</p>
    </section>
</body>
</html>
