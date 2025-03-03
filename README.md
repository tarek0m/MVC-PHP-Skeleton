# MVC-PHP-Skeleton

A lightweight MVC (Model-View-Controller) framework built with plain PHP, designed to help you quickly build web applications with a clean and organized structure.

## Features

- Simple and lightweight MVC architecture
- PDO database integration
- Clean URL routing
- Basic session handling
- Error handling and debugging options
- Secure by default with basic security measures

## Requirements

- PHP 8.0 or higher
- PDO PHP Extension
- Apache web server with mod_rewrite enabled

## Project Structure

```
MVC-PHP-Skeleton/
├── app/
│   ├── controllers/     # Controller classes
│   ├── models/         # Model classes
│   ├── views/          # View templates
│   └── core/           # Core framework files
└── public/            # Public accessible files
    ├── assets/        # CSS, JS, images
    ├── .htaccess      # URL rewrite rules
    └── index.php      # Entry point
```

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/yourusername/MVC-PHP-Skeleton.git
   ```

2. Configure your web server to point to the `public` directory

3. Configure your database connection in `app/core/config.php`

4. Make sure mod_rewrite is enabled on your Apache server

## Basic Usage

### Creating a Controller

```php
<?php

class Home {
    use Controller;

    public function index() {
        $this->view('home');
    }
}
```

### Creating a Model

```php
<?php

class User {
    use Model;

    protected $table = 'users';
    protected $allowedColumns = [
        'username',
        'email'
    ];
}
```

### Creating a View

Create a new file in `app/views/` with the `.view.php` extension:

```php
<h1>Welcome to <?=esc($title)?></h1>
<p>This is a sample view</p>
```

## Security Features

- SQL injection prevention using PDO prepared statements
- XSS protection with output escaping
- CSRF protection capabilities
- Secure session handling

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## Credits

Developed by Tarek Alnaggar © April, 2023

## License

This project is open-sourced software licensed under the MIT license.
