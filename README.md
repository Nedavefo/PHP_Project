# PHP Image Gallery with User Accounts

PHP + MySQL web app (coursework) where users register, log in and manage their own images.

## Features

- Registration and login, with the login query using a prepared statement
- Session-based access to the upload and gallery pages
- Image upload limited to JPG, JPEG, PNG and GIF, with a check that the file is a real image
- Gallery ordered by upload date
- Delete an image (removes both the database row and the file)
- Logout

## Tech stack

PHP (mysqli), MySQL, HTML and CSS.

## Known limitations

This was a learning project. Passwords are stored as plain text and the registration query is built with string concatenation; a production version would use `password_hash()` / `password_verify()` and prepared statements everywhere.
