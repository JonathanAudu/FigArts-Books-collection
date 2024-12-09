## Book Collection System

A robust web-based application built with Laravel for the backend and Vue.js (using Inertia.js) for the frontend. This project allows seamless management of books, including adding, editing, and deleting book records.

## Features
- Add, edit, and delete book records.
- Validation for book fields such as title, author, description, published year, and status.
- Smooth frontend integration using Vue.js and TailwindCSS.
- Backend powered by Laravel, ensuring security and performance.

## Installation and Setup
### Prerequisites
- PHP 8.1 or higher
- Composer
- Node.js (with npm or yarn)
- MySQL or any other database supported by Laravel

### Steps
1. **Clone the repository:**
    ```
    git clone https://https://github.com/JonathanAudu/FigArts-Books-collection.git
    cd library-management
    ```

2. **Install dependencies:**
    - Backend:
      ```
      composer install
      ```
    - Frontend:
      ```
      npm install
      ```

3. **Set up the environment:**
    ```
    cp .env.example .env
    ```
    Update the `.env` file with your database and other configurations.

4. **Generate application keys:**
    ```
    php artisan key:generate
    ```

5. **Run migrations:**
    ```
    php artisan migrate
    ```

6. **Compile frontend assets:**
    ```
    npm run dev
    ```

7. **Start the development server:**
    ```
    php artisan serve
    ```

## Book Management
### Database Schema

| Field           | Type    | Description                          |
|-----------------|---------|--------------------------------------|
| id              | Integer | Primary key                          |
| title           | String  | Book title                           |
| author          | String  | Author of the book                    |
| description     | Text    | Description or summary of the book    |
| published_year  | Integer | Year the book was published           |
| status          | Enum    | Current status (available, borrowed, reserved) |

## Endpoints

| Method | URI                  | Action  | Description           |
|--------|----------------------|---------|-----------------------|
| GET    | /books               | index   | Display list of books |
| GET    | /books/create        | create  | Show form to add a book |
| POST   | /books               | store   | Save a new book       |
| GET    | /books/{book}        | show    | View a specific book  |
| GET    | /books/{book}/edit   | edit    | Show form to edit a book |
| PATCH/PUT | /books/{book}     | update  | Update a book         |
| DELETE | /books/{book}        | destroy | Delete a book         |

## Common Issues and Fixes
### Error: The PUT method is not supported for route
Ensure the route handles both `PUT` and `PATCH` methods:
