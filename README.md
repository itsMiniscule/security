# Laravel Authentication System

This Laravel application implements user authentication, ensuring that certain routes are only accessible to authenticated users. It allows users to register, log in, and stay authenticated indefinitely (or until they manually log out).

## Features
- **Protected Routes**: Some routes require authentication.
- **User Registration**: Users can create an account to access protected routes.
- **Persistent Authentication**: Users can remain logged in indefinitely using the "Remember Me" feature.

## Posts Management
- **Public Post Listing**: All posts are visible to every authenticated user.
- **Creator Marker**: Each post displays a "Created by: [User Name]" marker so you know who created the post.
- **CRUD Operations**: 
  - **Create Post**: Authenticated users can create new posts.
  - **Edit Post**: Users can edit posts they have created.
  - **Delete Post**: Users can delete posts they have created.

## Installation
### Prerequisites
Ensure you have the following installed:
- PHP 8.x
- Composer
- Node.js & npm
- A database (MySQL, SQLite, etc.)

### Setup
1. **Clone the Repository**
   ```bash
   git clone https://github.com/itsMiniscule/security.git
   cd security
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install && npm run build
   ```

3. **Configure Environment Variables**
   - Copy `.env.example` to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Update the database settings in `.env`:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**
   ```bash
   php artisan migrate
   ```

6. **Start the Application**
   ```bash
   php artisan serve
   ```
   Visit `http://127.0.0.1:8000` in your browser.

## Authentication Features

### Registration
- Users can register at `/register`.
- Upon successful registration, users are automatically logged in.

### Login
- Users can log in at `/login`.
- The "Remember Me" option keeps users logged in indefinitely.

### Protected Routes
- Routes requiring authentication are protected using the `auth` middleware.
- Example:
  ```php
  Route::get('/dashboard', function () {
      return view('dashboard');
  })->middleware('auth');
  ```
### Posts Management Usage
#### Viewing Posts
After logging in, all posts created by any user are visible.
Each post displays the title, content, and a marker showing the name of the creator (e.g., "Created by: John Doe").
#### Managing Your Posts
- **Create Post**: Use the "Create New Post" button to add a post.
- **Edit Post**: Posts you have created can be edited by clicking the "Edit" button.
- **Delete Post**: Posts you have created can be deleted by clicking the "Delete" button.

### Logout
- Users can log out via `/logout`, which invalidates their session.

## License
This project is open-source under the [MIT License](LICENSE).

